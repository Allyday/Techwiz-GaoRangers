const app = require("express")();
const http = require("http").createServer(app);
const cors = require("cors");
const bodyparser = require("body-parser");
const stripe = require("stripe")(
  "sk_test_51J1ju6FvkgzTVA7aPNh8jBzcQLbuQ1poGcLHJSPQxAcyLne1W0IyP0dBpryRoG1UWVALCc655z5MS5sCvRxCFS6P006fz6axRY"
);

const options = {
  cors: { credentials: true },
};
const io = require("socket.io")(http, options);
const Redis = require("ioredis");
var redis = new Redis();

var users = [];

// middleware
app.use(bodyparser.urlencoded({ extended: true }));

app.use(
  cors({
    origin: true,
  })
);

app.get("/", (req, res) => {
  res.send("hello world");
});

app.post("/charge", async (req, res) => {
  //   console.log(req.body);
  const stripeToken = req.body.stripeToken;
  const total = req.body.total;
  if (stripeToken) {
    // create record
    const paymentIntent = await stripe.paymentIntents.create({
      amount: parseInt(total), // subunits of currentcy
      currency: "usd",
    });

    // ok - create
    res.status(201).send({
      clientSecret: paymentIntent.client_secret,
    });
  } else {
    res.status(400).send({ message: "Not found stripe token" });
  }
});

http.listen(8005, () => {
  console.log("server is running on 8005");
});

// redis io
redis.subscribe("private-channel", () => {
  console.log("subscribe private-channel");
});

redis.on("message", (channel, message) => {
  message = JSON.parse(message);

  if (channel == "private-channel") {
    let data = message.data.dataMess;
    let receiver = data.receiver_username;
    let event = message.event;

    // lay socket id of receiver
    let socketID = "";
    users.forEach((element) => {
      if (element["user_name"] == receiver) {
        socketID = element["socket_id"];
      }
    });

    // emit data to receiver
    io.to(socketID).emit(channel + ":" + event, data);
  }
});

// socket.io
io.on("connection", (socket) => {
  socket.on("user_connected", (user_name) => {
    console.log("connected ", user_name);

    let tuple = {
      user_name: user_name,
      socket_id: socket.id,
    };
    // get unique element
    if (users.length > 0) {
      users.forEach((element) => {
        if (element["user_name"] == tuple["user_name"]) {
          let id = users.indexOf(element);
          // xoa user_name da co trong users
          users.splice(id, 1);
        }
      });
    }

    users.push(tuple);

    // emit array of user with status active
    // lay socket id of receiver
    let socketID = "";
    users.forEach((element) => {
      if (element["user_name"] == "_1admin1") {
        socketID = element["socket_id"];
      }
    });
    io.to(socketID).emit("updateUsers", users);
  });

  // disconnect
  socket.on("disconnect", function() {
    // remove element
    users.forEach((element) => {
      if (element["socket_id"] == socket.id) {
        let id = users.indexOf(element);
        users.splice(id, 1);
      }
    });
    // update users
    io.emit("updateUsers", users);
  });
});
