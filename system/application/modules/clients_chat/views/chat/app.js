var express = require('express')
  , app = express()
  , http = require('http')
  , server = http.createServer(app)
  , io = require('socket.io').listen(server);

server.listen(3000);


// routing
app.get('/', function (req, res) {
  res.sendfile(__dirname + '/index.php');
});

// usernames which are currently connected to the chat
var usernames = {};

io.sockets.on('connection', function (socket) {


  socket.on('user_info', function (data) {
    // // we store the username in the socket session for this client
    // socket.username = username;
    // // add the client's username to the global list
    // usernames[username] = username;

    io.sockets.emit('get_socket_id',socket.id);


  });

  // when the client emits 'add user', this listens and executes
  socket.on('adduser', function (data) {
    // // we store the username in the socket session for this client
    // socket.username = username;
    // // add the client's username to the global list
    // usernames[username] = username;


    io.sockets.emit('updateusers', data);



  });

   // when the client emits 'new message', this listens and executes
  socket.on('newmessage', function (from,to,msg) {
    
    // we tell the client to execute 'new message'
    // var data = {

    //             from : from,
    //             to : to,
    //             msg: msg

    //             }

    //   socket.emit('updatechat', data);
  });



   // when the client emits 'typing', we broadcast it to others
  socket.on('typing', function () {
    socket.broadcast.emit('typing', {
      username: socket.username
    });
  });

  // when the client emits 'stop typing', we broadcast it to others
  socket.on('stop typing', function () {
    socket.broadcast.emit('stop typing', {
      username: socket.username
    });
  });


  
});