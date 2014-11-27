<?php include('js.php');?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<div class="fs-header-home" style="z-index:1">
      <?php include('tpl_home_header.php');?>
</div>

<div class="col-lg-12"style="z-index:0;padding-top:180px">

    <div class="friends-column col-lg-12">

        <?php $background_image = "";?>
        <?php foreach ($friends as $key):?>
   
              <?php if($key['photo']=="none" && strtolower($key['gender'])=="female"):?>
              <?php $background_image = $template_url_img.'/menu-icons/icon_female.gif';?>
              <?php endif;?>
              <?php if($key['photo']=="none" && strtolower($key['gender'])=="male"):?>
              <?php $background_image = $template_url_img.'/menu-icons/icon_male.gif';?>
              <?php endif;?>
              <div  class="pin-friends">
                  <div class="presence">
                        <a class="circle <?php echo $key['presence']== FALSE ? 'online' : 'offline';?>" data-placement="top" href="javascript:void()" title="<?php echo $key['presence']==TRUE ? 'Offline' : 'Online';?>">
                        </a>
                  </div>
                  <div class="pin-image" style="background:url('<?php echo $background_image;?>') no-repeat;background-size:112%;background-position: center;width:150px;height:150px"></div>
                  <div class="friend-detail-ini" style="width:150px"></div>
                  <div class="friend-detail-content">
                    <div class="name" alt="<?php echo $key['name'];?>">
                       <?php echo ucfirst($key['name']);?>
                    </div>
                    <div class="option">
                     
                    </div>
                  </div>
                  
              </div>
        
        <?php endforeach;?>


            
    </div>

</div>


 <!-- Business Info pop up -->    
 <div  class="modal" id="fs-business-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-body">
                       <div class="cover-image">
                            <div class="share-buttons">
                                <ul>
                                    <li> <img  id="like" src="<?php echo $template_url_img;?>/share-icons/like.png" title="Like"> </li>
                                    <li> <img  id="star" src="<?php echo $template_url_img;?>/share-icons/star.png" title="Add to Favorites"> </li>
                                    <li> <img  id="bucket" src="<?php echo $template_url_img;?>/share-icons/bucket.png" title="Add to Bucket"> </li>
                                    <li> <img  id="checkin" src="<?php echo $template_url_img;?>/share-icons/check.png" title="Check In"> </li>
                                    <li> <img  id="flare" src="<?php echo $template_url_img;?>/share-icons/flare.png" title="Share to Friends"> </li>
                                </ul>
                            </div>    
                       </div>
                       <div class="business-name">
                            <div class="title"></div>
                            <div class="type"> Type </div>
                            <hr>
                            <div class="address col-lg-9"></div>

                            <div class="location col-lg-3">
                                <div class="caption">
                                <h6>Distance <br>
                                from you</h6>
                                </div>
                                <div class="value"></div>
                            </div>
                       </div>
                       <div id="map-canvas"></div>
                       <div class="business-directions">
                        Directions
                       </div>
                       <div class="business-hours">
                            More Info <br>
                            Hours <br>
                            <hr>

                            <table>
                                <tr>
                                    <td>
                                        Monday: 
                                    </td>
                                    <td style="padding-left:5px;">
                                        <div class="monday">
                                        <span class="day"></span>
                                        </div>
                                    </td>
                                    <td style="padding-left:30px;">
                                        Thursday:
                                    </td>
                                    <td style="padding-left:5px;">
                                        <div class="thursday">
                                        <span class="day"></span>
                                        </div>
                                     </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tuesday: 
                                    </td>
                                    <td style="padding-left:5px;">
                                        <div class="tuesday">
                                        <span class="day"></span>
                                        </div>
                                    </td>
                                    <td style="padding-left:30px;">
                                        Friday:
                                    </td>
                                    <td style="padding-left:5px;">
                                        <div class="friday">
                                        <span class="day"></span>
                                        </div>
                                     </td>
                                </tr>
                                <tr>
                                    <td>
                                        Wednesday: 
                                    </td>
                                    <td style="padding-left:5px;">
                                        <div class="wednesday">
                                        <span class="day"></span>
                                        </div>
                                    </td>
                                    <td style="padding-left:30px;">
                                        Saturday:
                                    </td>
                                    <td style="padding-left:5px;">
                                        <div class="saturday">
                                        <span class="day"></span>
                                        </div>
                                     </td>
                                </tr>
                                <tr>
                                    <td>
                                        
                                    </td>
                                    <td style="padding-left:5px;">
                                       
                                    </td>
                                    <td style="padding-left:30px;">
                                        Sunday:
                                    </td>
                                    <td style="padding-left:5px;">
                                        <div class="sunday">
                                        <span class="day"></span>
                                        </div>
                                     </td>
                                </tr>
                                

                            </table>

                            <!-- <div class="col-lg-6 pull-left">
                                
                                <div class="tueday">
                                    Tuesday <span class="day"></span>
                                </div>
                                <div class="wednesday">
                                    Wednesday <span class="day"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 pull-right">
                                <div class="thursday">
                                    Thursday <span class="day"></span>
                                </div>
                                <div class="friday">
                                    Friday <span class="day"></span>
                                </div>
                                <div class="saturday">
                                    Saturday <span class="day"></span>
                                </div>
                                <div class="sunday">
                                    Thursday <span class="day"></span>
                                </div>
                            </div>  -->   

                       </div>
                       <div class="business-about">
                            
                            <div class="title"> <h4> GET TO KNOW <span class="name"></span> </h4></div>
                            <div class="clearfix"></div>
                            <div class="description"></div>
                       </div>

                  </div>
                  <div class="modal-footer">
                      <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                  </div>
              </div>
          </div>
 </div>
 <!-- Business Info pop up -->  

<script>

//toggle hide/show Friends Box
$(".shout_box .header").click(function (e) {
    //get CSS display state of .toggle_chat element
    var toggleState = $('.shout_box .toggle_chat').css('display');

    //toggle show/hide chat box
    $('.shout_box .toggle_chat').slideToggle();
   
    //use toggleState var to change close/open icon image
    if(toggleState == 'block')
    {
        $(".shout_box .header div").attr('class', 'open_btn');
    }else{
        $(".shout_box .header div").attr('class', 'close_btn');
    }
});


//toggle hide/show Message Box
$(".fs_message_box .header").click(function (e) {
    //get CSS display state of .toggle_chat element
    var toggleState = $('.fs_message_box .toggle_chat').css('display');

    //toggle show/hide chat box
    $('.fs_message_box .toggle_chat').slideToggle();
   
    //use toggleState var to change close/open icon image
    if(toggleState == 'block')
    {
        $(".fs_message_box .header div").attr('class', 'open_btn');
    }else{
        $(".fs_message_box .header div").attr('class', 'close_btn');
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

$(document).on('click','.pin-friends .btn-add-friend',function(){
socialRequestFriend($(this).attr('id'));
});

$(document).on('click','.shout_box .message_box li',function(){

      // $.ajax({
      //       url: base_url + 'add_friend',
      //       type: "POST",
      //       data: { id : $(this).attr('id') },
      //       dataType: 'json',
      //       async: false,
      //       success: function(data, textStatus, jqXHR)
      //       {   
      //            if(data.success==true)
      //            {
      //               displayMessage(data.message,'success');  
      //            }
      //            else
      //            {
      //               displayMessage(data.message,'error');  
      //            }
      //       }, 
      //       error: function (jqXHR, textStatus, errorThrown)
      //       {
                
      //       }

      //   });
alert('e');

});




</script>



