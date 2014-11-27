
  $(function(){

   latitude = geoip_latitude();
   longitude = geoip_longitude();

   // Store Lat and Lng to cookie
   document.cookie="fs_lat=" + latitude;
   document.cookie="fs_lng=" + longitude;

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


    // Masonry | Pinterest Layout
    // $('#columns').masonry({
    //   itemSelector : '.pin',
    //   "columnWidth": -1,
    //   "isFitWidth": true,
    //   "gutter": 2

    // });

    // Business Detail Pop up
 
    $(document).on('click','.pin',function(){

         business_id = $(this).attr('id');
         var adstatus = $(this).attr('adstatus');
         var distance = $(this).find('.location').html();

         $.ajax({
            url: base_url + "sites_business/branch_get_info",
            type: "POST",
            data: { 
                    id : business_id,
                    adstatus: adstatus
                  },
            dataType: 'json',
            success: function(data, textStatus, jqXHR)
            {   
          
                if(adstatus=='open')
                {
                    $("#fs-business-unclaimedspot").modal('show');
                    $("#fs-business-unclaimedspot #business_code").html(data.business_code);
                }
                else
                {     
                 
                    // Interactaction - opens
                    interactBusiness("open",business_id);
                   
                   // Load Map
                    loadMap(data.gmap_lat,data.gmap_lng);
                    
                    // Load Details
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
                    
                    //alert($(".pin#"+business_id+".company-detail-ini .location").html());
                    //$(".business-name .location").html();
              
                }
              
               

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                
            }

        });         

    });



    var last_distance = $(".pin:last").attr('distance');


    // Infinite Scroll Window detection
    $(window).scroll(function(){


      if($(window).scrollTop()==$(document).height()-$(window).height())
      {     
            
            html_data = "";
            image_url = "";
              
        
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
                                                '<div class="location pull-right">'+'</div>'+
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
                add_to_collection("like",business_id);
              break;
            case 'star':
                interactBusiness("star",business_id);
                add_to_collection("star",business_id);
              break;
            case 'bucket':
                interactBusiness("bucket",business_id);
                add_to_collection("bucket",business_id);
              break;
            case 'checkin':
                interactBusiness("checkin",business_id);
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



  
  });
