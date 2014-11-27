    
    var type = "";
    var business_id = "";

    // Functions
    function interactBusiness(type,business_id)
    {   

            $.ajax({
                url: base_url + "sites_flipstop/interact_business",
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


    // Functions
    function add_to_collection(type,business_id)
    {   

            $.ajax({
                url: base_url + "sites_flipstop/add_business_collection",
                type: "POST",
                data: {
                        type : type,
                        business_id: business_id
                      },
                dataType: 'json',
                success: function(data, textStatus, jqXHR)
                {        

                    $(".share-buttons img#"+type).attr('src',base_url + "_assets/myflipstop/img/share-icons/"+data.icon_image);
                    $(".share-buttons img#"+type).attr('title',data.icon_title);
                    $(".share-buttons img#"+type).toggleClass('animated bounceIn');

                }, 
                error: function (jqXHR, textStatus, errorThrown)
                {
                    //displayMessage('Request failed','error');
                }

            });


    }

  


    //interactionsAdImpression();