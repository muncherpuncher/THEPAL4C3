<?php include('js.php');?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<div class="fs-header-home" style="z-index:1">
      <?php include('tpl_home_header.php');?>
</div>

<div class="col-lg-12"style="z-index:0;padding-top:180px">

      <div id="columns">
        <?php $count = 0;?>
        <?php foreach ($businesses as $key):?> 
        <?php $container_height = $key['image_height'] + 100;?>
          <div  class="pin"  adstatus="<?php echo $key['business_ownership'];?>" id="<?php echo base64_encode($key['id']);?>" alt="<?php echo  $key['business_name'];?>" distance="<?php echo $key['distance'];?>">
            <div class="pin-image" style="background:url('<?php echo $key['image_filename'];?>') no-repeat;background-size: cover;background-position: center;width:<?php echo ($key['image_width']).'px';?>;height:<?php echo ($key['image_height'] + 60).'px';?>"></div>
            <div class="company-detail-ini" style="width:<?php echo $key['image_width'];?>px"></div>
            <div class="company-detail-content">
              <div class="name" alt="<?php echo $key['business_name'];?>">
               <?php echo $key['business_name'];?>
              </div>
              <div class="industry-type">
                <?php echo  $key['business_category'];?>
              </div> 
              <div class="location pull-right">
               <?php echo $key['distance'];?> mi
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


 <!-- Unclaimed Spot pop up -->
  <div id="fs-business-unclaimedspot" style="display: none;" class="modal fade in" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                  <h4 class="modal-title"> Business Listing </h4>
              </div>
              <div class="modal-body">

                   To claim this business. Go to <a target="_blank" href="wwww.myflipstop.biz"> Business Site </a>. While Listing
                   your businesses for application, enter the Business Code on the search box and the item to your listing.
                    <div id="business_code">
                    </div>

              </div>
              <div class="modal-footer">
                  <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                  <button class="btn btn-warning" type="button"> Yes </button>
              </div>
          </div>
      </div>
  </div>
  <div id="column-loader"> 
    <div class="col-lg-2 text-center center-block">
      <img class="text-center center-block" style="height:50px;margin-left:auto;margin-right:auto;" src="<?php echo base_url('_assets/_images/loader.gif');?>"> 
      <h6 class="text-center center-block"> LOADING  </h6>
    </div>
  </div>

 <!-- Unclaimed Spot pop up -->  
<script src="<?php echo base_url();?>_assets/_js/masonry/masonry.pkgd.js"></script>
<script src="<?php echo base_url();?>_assets/_js/masonry/masonry.pkgd.min.js"></script>


<script type="text/javascript">

    $(function(){

      // Ad visibility vars
      var viewportWidth = jQuery(window).width(),
          viewportHeight = jQuery(window).height(),
          documentScrollTop = jQuery(document).scrollTop(),
          documentScrollLeft = jQuery(document).scrollLeft(),
          minTop = documentScrollTop,
          maxTop = documentScrollTop + viewportHeight,
          minLeft = documentScrollLeft,
          maxLeft = documentScrollLeft + viewportWidth;


      // Business Vars
      var business_id = "";
      var adstatus = "";

      // Map vars
      var map;
      var map_lat;
      var map_lng;

      function viewMap(map_lat,map_lng) {
        var mapOptions = {
          zoom: 16,
          center: new google.maps.LatLng(map_lat,map_lng)
        };

        map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);

        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(map_lat,map_lng)
        });

        marker.setMap(map);

      }


      // Masonry | Pinterest Layout
      // $('#columns').masonry({
      //   itemSelector : '.pin',
      //   "columnWidth": -1,
      //   "isFitWidth": true,
      //   "gutter": 2

      // });

      // Business Detail Pop up
      $(".pin").click(function(){

           business_id = $(this).attr('id');
           var adstatus = $(this).attr('adstatus');
           var distance = $(this).find('.location').html();

           $.ajax({
              url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','BA26');?>",
              type: "POST",
              data: { id : business_id,
                      adstatus: adstatus
                    },
              dataType: 'json',
              success: function(data, textStatus, jqXHR)
              {   
                  if(data.spot=='open')
                  { 
                    alert(data.business_code);
                      $("#fs-business-unclaimedspot").modal('show');
                      $("#fs-business-unclaimedspot #business_code").html(data.business_code);
                      
                  }
                  else
                  {     
                   
                      // Interactaction - open
                      interactBusiness("open",business_id);

                      viewMap(data.gmap_lat,data.gmap_lng);
                      // interactionsIconActivity(data.useranalytics.like,'like','Test','like.png','like_gray.png');
                       


                        // function interactionsIconActivity(activity,name,title,icon_active,icon_inactive)
                      // like
                      // switch(data.useranalytics.like)
                      // {
                      //   case 'active':
                      //     $(".share-buttons img#like").attr('src',base_url + "_assets/sites_flipstop/default/img/share-icons/like_gray.png");
                      //     $(".share-buttons img#like").attr('title','You like this');
                      //     break;
                      //   case 'inactive':
                      //       $(".share-buttons img#like").attr('src',base_url + "_assets/sites_flipstop/default/img/share-icons/like.png");
                      //     break;
                      // }

                      // // Favorite
                      // switch(data.useranalytics.star)
                      // {
                      //   case 'active':
                      //     $(".share-buttons img#star").attr('src',base_url + "_assets/sites_flipstop/default/img/share-icons/star_gray.png");
                      //     $(".share-buttons img#star").attr('title','This is on your favorite list');
                      //     break;
                      //   case 'inactive':
                      //       $(".share-buttons img#star").attr('src',base_url + "_assets/sites_flipstop/default/img/share-icons/star.png");
                      //     break;
                      // }

                      // // Bucket
                      // switch(data.useranalytics.bucket)
                      // {
                      //   case 'active':
                      //     $(".share-buttons img#bucket").attr('src',base_url + "_assets/sites_flipstop/default/img/share-icons/bucket_gray.png");
                      //     $(".share-buttons img#bucket").attr('title','This is on your bucket list');
                      //     break;
                      //   case 'inactive':
                      //       $(".share-buttons img#bucket").attr('src',base_url + "_assets/sites_flipstop/default/img/share-icons/bucket.png");
                      //     break;
                      // }


                      $("#fs-business-detail").modal('show');
                      $(".cover-image").css('background-image','url("'+ data.image_filename +'")');
                      $(".business-name .title").html(data.name);
                      $(".business-name .type").html(data.category);
                      $(".business-name .address").html(data.address + ' ' + data.city + ' ' + data.state + ' ' + data.postal_code);
                      $(".business-name .location .value").html(distance);
                      $(".business-about .description").html(data.description);
                      $(".business-about .title .name").html(data.name);
                      $(".business-hours .monday .day").html(data.businesshours.monday);
                      $(".business-hours .tuesday .day").html(data.businesshours.tuesday);
                      $(".business-hours .wednesday .day").html(data.businesshours.wednesday);
                      $(".business-hours .thursday .day").html(data.businesshours.thursday);
                      $(".business-hours .friday .day").html(data.businesshours.friday);
                      $(".business-hours .saturday .day").html(data.businesshours.saturday);
                      $(".business-hours .sunday .day").html(data.businesshours.sunday);
                      $(".business-name .location").html($(".pin#"+business_id.toString()+".company-detail-ini .location").html());
                    

                  }
                
                 

              }

              //  if(data.success == true)
              //  {
              //      //displayMessage(data.message,'success');
              //      window.location.href = data.redirect_url;
              //  }
              //  else
              //  {
              //      displayMessage(data.message,'error');
              //  }

              // }, 
              // error: function (jqXHR, textStatus, errorThrown)
              // {
              //     //displayMessage('Request failed','error');
              // }

          });  

      });
  
      var last_distance = $(".pin:last").attr('distance');


      // Infinite Scroll Window detection
      $(window).scroll(function(){

 
        if($(window).scrollTop()==$(document).height()-$(window).height())
        {     
              
              html_data = "";
              image_url = "";
                
              alert(last_distance);
              $("#column-loader").fadeIn();

              $.ajax({
                  url: base_url + 'clients_business_branches/get_list_nearest_append',
                  type: "POST",
                  data: { last_distance : last_distance },
                  dataType: 'json',
                  async: false,
                  success: function(data, textStatus, jqXHR)
                  {
                         
                          $.each(data, function(index) {
                              
    
                                html_data += '<div class="pin" adstatus="'+data[index].source+'" alt="'+data[index].business_name+'" distance="'+data[index].distance.toString()+'">' + 
                                              '<div class="pin-image" style="background:url('+data[index].image_filename+') no-repeat;background-size: cover;background-position: center;width:'+data[index].image_width+'px;height:'+data[index].image_height+'px"></div>' +
                                              '<div class="company-detail-ini" style="width:'+data[index].image_width+'px">' +
                                                  '<div class="name" alt="'+data[index].business_name.toString()+'">'+data[index].business_name.toString()+'</div>'+
                                                  '<div class="industry-type">'+data[index].business_category.toString()+'</div>'+
                                                  '<div class="location pull-right">'+data[index].distance.toString()+'</div>'+
                                              '</div>'+
                                            '</div>';
                              

                            });

                            
                            $(".pin:last").after(html_data);
                            $("#column-loader").fadeOut();
                            
                            last_distance = $(".pin:last").attr('distance');
                          
                          
      
                  }, 
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                      //displayMessage('Request failed','error');
                  }

              });
  
        }

      });

      

      // Share icons

      // Like

      $("#fs-business-detail .share-buttons img").click(function(){
          
          switch($(this).attr('id'))
          {
              case 'like':
                  interactBusiness("like",business_id);
                break;
              case 'star':
                  interactBusiness("star",business_id);
                break;
              case 'bucket':
                  interactBusiness("bucket",business_id);
                break;
              case 'checkin':
                  interactBusiness("checkin",business_id);
                break;
              case 'flare':
                  interactBusiness("flare",business_id);
                break;

          }

      });


      // Event Bind Triggers

      $("#listLikes").click(function(e){
         e.preventDefault();
         listLikes();
      });

      $("#listFavorites").click(function(e){
        e.preventDefault();
        listFavorites();
      });

      $("#listBuckets").click(function(e){
        e.preventDefault();
        listBuckets();
      });

      $("#listFriends").click(function(e){
        e.preventDefault();
        listFriends();
      });


      // Functions
      function interactBusiness(type,business_id)
      {

              $.ajax({
                  url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','WA21',HTTP_ROUTE_TYPE);?>",
                  type: "POST",
                  data: {
                          type : type,
                          business_id: business_id
                        },
                  dataType: 'json',
                  success: function(data, textStatus, jqXHR)
                  {

                      
                         
   
                  }, 
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                      //displayMessage('Request failed','error');
                  }

              });

      }

      // get friends list
      function listFriends()
      {

      }


      // get likes list
      function listLikes()
      {

      }

      // get buckets list
      function listBuckets()
      {

      }

      // get favorites list
      function listFavorites()
      {

      }

      // Interaction visiblity
      function interactionsIconActivity(activity,name,title,icon_active,icon_inactive)
      {

            switch(activity)
            {
              case 'active':
                $(".share-buttons img#"+name).attr('src',base_url+"_assets/sites_flipstop/default/img/share-icons/"+icon_active);
                $(".share-buttons img#"+name).attr('title',title);
                break;
              case 'inactive':
                  $(".share-buttons img#"+name).attr('src',base_url+"_assets/sites_flipstop/default/img/share-icons/"+icon_inactive);
                break;
            }

      }

      // Ad visibility 
      function interactionsAdImpression()
      {
          $("#columns .pin").each(function(){

              business_id = $(this).attr('id'); 
              elementOffset = $(this).offset();
              if (
                  (elementOffset.top > minTop && elementOffset.top < maxTop) &&
                  (elementOffset.left > minLeft &&elementOffset.left < maxLeft)
              ) {
                 
                interactBusiness("impression",business_id);

              } else {
                  
              }

          });

      }

      interactionsAdImpression();

    
    });

</script>
