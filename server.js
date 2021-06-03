const app = require("express")();
const http = require("http").createServer(app);

const options = {
    cors: { credentials: true }
};
const io = require("socket.io")(http, options);
const Redis = require('ioredis');
var redis = new Redis();

var users = [];


http.listen(8005, () => {
    console.log('server is running on 8005');
});

// redis io
redis.subscribe('private-channel', () => {
    console.log('subscribe private-channel')
});

redis.on('message', (channel, message) => {
    message = JSON.parse(message);


    if (channel == 'private-channel') {
        let data = message.data.dataMess;
        let receiver = data.receiver_username;
        let event = message.event;

        // lay socket id of receiver
        let socketID = '';
        users.forEach(element => {
            if (element['user_name'] == receiver) {
                socketID = element['socket_id'];
            }
        });

        // emit data to receiver 
        io.to(socketID).emit(channel + ':' + event, data);
    }
})




// socket.io
io.on("connection", socket => {
    socket.on('user_connected', (user_name) => {
        console.log('connected ', user_name);

        let tuple = {
            user_name: user_name,
            socket_id: socket.id
        };
        // get unique element
        if (users.length > 0) {
            users.forEach(element => {
                if (element['user_name'] == tuple['user_name']) {
                    let id = users.indexOf(element);
                    // xoa user_name da co trong users
                    users.splice(id, 1);
                }

            });
        }

        users.push(tuple);

        // emit array of user with status active
        // lay socket id of receiver
        let socketID = '';
        users.forEach(element => {
            if (element['user_name'] == '_1admin1') {
                socketID = element['socket_id'];
            }
        });
        io.to(socketID).emit('updateUsers', users);
    });

    // disconnect
    socket.on('disconnect', function() {
        // remove element 
        users.forEach(element => {
            if (element['socket_id'] == socket.id) {
                let id = users.indexOf(element);
                users.splice(id, 1);
            }

        });
        // update users
        io.emit('updateUsers', users);
    });

});