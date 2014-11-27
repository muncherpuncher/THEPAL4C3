<!-- <script src="/socket.io/socket.io.js"></script> -->
<script src="http://localhost:3000/socket.io/socket.io.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
  

  // var socket = io.connect('http://54.187.71.230:8080');
  var socket = io.connect('localhost:3000');
  var chat_name = "";
  var send_to = "";

  // on connection to server, ask for user's name with an anonymous callback
  socket.on('connect', function(){
    // call the server-side function 'adduser' and send one parameter (value of prompt)
    var user_list = {

                      socketid : socket.id,
                      username: get_user_info

                    }


    socket.emit('adduser', user_list);
    console.log(user_list);

  });


  

   $('.fs_chat_box .message_box ul li').click(function(){

      alert($this.html());

   });



  // listener, whenever the server emits 'updatechat', this updates the chat body
  socket.on('updatechat', function (from,to,msg) {
    // $('#conversation').append('<b>'+username + ':</b> ' + data + '<br>');

    $('.fs_chat_box .message_box ul').append('<li><b>'+from+'</b><br>'+msg+'<br></li>');

  });

  

  // listener, whenever the server emits 'updateusers', this updates the username list
  socket.on('updateusers', function(data) {
    $('.friends_box .list_box ul').empty();
    console.log()
    // $.each(data, function(key, value) {
    //   if(key!="")
    //   {
    //     $(".friends_box .list_box ul").append('<li>'+key+'</li>');
    //   }
      
    // });
  });


    function get_user_info()
    {
        $.ajax({
            url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','WA25',HTTP_ROUTE_TYPE);?>",
            type: "POST",
            data: '',
            asynch: false,
            success: function(data, textStatus, jqXHR)
            {    

              chat_name = data;

            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
                
            }

        }); 

        return chat_name;


    }


  // on load of page
  $(function(){
    // when the client clicks SEND

      // when the client hits ENTER on their keyboard
      $('.fs_chat_box .shout_box_container #shout_message').keypress(function(e) {
        if(e.which == 13) {
            
          var msg = $(this).val();

          // tell server to execute 'sendchat' and send along one parameter
       
          socket.emit('newmessage',chat_name,'',msg);
           $(this).val('');

        }
      });


  });

</script>



<!-- Box Friends -->
<div class="friends_box">
  <div class="header"> Chat Friends <div class="close_btn btn"> </div></div>
  <div class="toggle_chat">
    <div class="list_box">
      <ul></ul>
    </div>
    
  </div>
</div>

<!-- Friends Message Box -->
<div class="fs_chat_box">
  <div class="header">  <div class="close_btn btn"> </div></div>
    <div class="toggle_chat">
    <div class="message_box">

      <ul></ul>

    </div>
    <div class="shout_box_container">
        <input name="shout_message" id="shout_message" type="text" placeholder="Type Message Hit Enter" maxlength="100" />
      </div>
    </div>
</div>

<!-- shoutbox end -->


<script>

//toggle hide/show Friends Box
$(".friends_box .header").click(function (e) {
    //get CSS display state of .toggle_chat element
    var toggleState = $('.shout_box .toggle_chat').css('display');

    //toggle show/hide chat box
    $('.friends_box .toggle_chat').slideToggle();
   
    //use toggleState var to change close/open icon image
    if(toggleState == 'block')
    {
        $(".friends_box .header div").attr('class', 'open_btn');
    }else{
        $(".friends_box .header div").attr('class', 'close_btn');
    }
});


//toggle hide/show Message Box
$(".fs_chat_box .header").click(function (e) {
    //get CSS display state of .toggle_chat element
    var toggleState = $('.fs_chat_box .toggle_chat').css('display');

    //toggle show/hide chat box
    $('.fs_chat_box .toggle_chat').slideToggle();
   
    //use toggleState var to change close/open icon image
    if(toggleState == 'block')
    {
        $(".fs_chat_box .header div").attr('class', 'open_btn');
    }else{
        $(".fs_chat_box .header div").attr('class', 'close_btn');
    }
});

checkUserPresence();
  
function checkUserPresence()
{ 

    $(".friends-column .pin-friends").each(function(){

        $.ajax({
            url: base_url + 'friends_presence',
            type: "POST",
            data: { username : $(this).attr('username') },
            dataType: 'json',
            success: function(data, textStatus, jqXHR)
            {
                console.log(data);
                   
            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
                //displayMessage('Request failed','error');
            }

        });

    });

}



</script>
