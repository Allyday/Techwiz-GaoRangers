const express = require("express");
const app = express();
const cors = require("cors");
const bodyparser = require("body-parser");

// middleware
app.use(bodyparser.urlencoded({extended:true}));

// app.use(bodyparser.json());

app.use(
  cors({
    origin: true,
  })
);

app.get("/", (req, res) => {
  res.send("hello, from nodejs with port 8003");
});

app.post("/charge", (req, res) => {
  console.log(req.body);
  res.status(200).send("ok con vo");

  
  const paymentIntent = await stripe.paymentIntents.create({
    amount: parseInt(total), // subunits of currentcy
    currency: "usd",
  });

  // ok - create
  res.status(201).send({
    clientSecret: paymentIntent.client_secret,
  });


});

app.listen(8003, () => {
  console.log("server is running on 8003");
});
