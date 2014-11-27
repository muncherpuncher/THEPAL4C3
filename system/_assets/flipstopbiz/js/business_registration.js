$(function(){
        
    var max_biz_desc_text = 600;
    var cart_items = 0;

    // Check session
    check_session();

    // Update count on business description
    updateCountdown();

    $("select[name='business_category']").change(function(){

        $.ajax({
            url: base_url + "tmpl_business_categories/get_list_child_by_parent_name_by_post",
            type: "POST",
            data: { parent_name : $(this).val()},
            dataType: "json",
            async: false,
            success: function(data, textStatus, jqXHR)
            {   
                $("select[name='business_sub_category']").html('<option value=""> Select </option>');
                $.each(data, function(i,k) {
                    $("select[name='business_sub_category']").append('<option value="'+ data[i].category +'">'+ data[i].category +'</option>');
                 });
            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
              
            }
        });

    });

    $("#btn-geo-biz-address").click(function(){

            if(address.val() == "" &&  city.val() == "" && state.val() == "" && postal_code.val() == "")
            {
                alert("Please specify complete address");
            }
            else
            {   
                var strGeo = address.val() + ',' + city.val() + ',' + state.val() + ',' + postal_code.val();
                geoCodeAddress(encodeURIComponent(strGeo));
            }

    });

    $("#modal-addbranch").on("shown.bs.modal", function () {
        loadMap();
    });


    $("#btn-geo-user-location").click(function(){

        latitude = geoip_latitude();
        longitude = geoip_longitude();
        $("#latitude").val(latitude);
         $("#longitude").val(longitude);
        loadMap();

    });

    $("#remove-link").click(function(){

        removeCoverImage();
        $("#remove-link").hide();
        $("#image-box-holder").hide();
        $("#browse-link").show();
        $("#upload").show();
        branch_image_cover = "";
        branch_image_active = 0;
        
    });

    $("textarea[name='biz-description']").on('keyup',function(){
        updateCountdown();
    }); 
    $("textarea[name='biz-description']").bind('cut paste change', function(e) { 
        updateCountdown();
    });

    $("#btn-renew-session").click(function(){
        renew_session();
    });
     $("#btn-clear-session").click(function(){
        clear_session();
    });

    $("#btn-addbranches").click(function(){


            var form_data = $("#form-register-branches").serialize();
            var error = 0;

            if(branch_name.val() == '') {
                branch_name.next().show().html('* Required');
                error = 1;
            } else {
                branch_name.next().html('');
            }

            if(address.val() == '') {
                address.next().show().html('* Required');
                error = 1;
            } else {
                address.next().html('');
            }

            if(state.val() == '') {
                state.next().show().html('* Required');
                error = 1;
            } else {
                state.next().html('');
            }

            if(city.val() == '') {
                city.next().show().html('* Required');
                error = 1;
            } else {
                city.next().html('');
            }

            if(postal_code.val() == '') {
                postal_code.next().show().html('* Required');
                error = 1;
            } else {
                postal_code.next().html('');
            }

            if(business_category.val() == '') {
                business_category.next().show().html('* Required');
                error = 1;
            } else {
                business_category.next().hide().html('');
            }

            if(business_sub_category.val() == '') {
                business_sub_category.next().show().html('* Required');
                error = 1;
            } else {
                business_sub_category.next().hide().html('');
            }

            if(city_dropdown.val() == '') {
                city_dropdown.next().show().html('* Required');
                error = 1;
            } else {
                city_dropdown.next().html('');
            }


            if(max_biz_desc_text > 600) {
                biz_description.next().show().html('* Max characters reached, Please limit description to 600 characters');
                error = 1;
            } else {
                biz_description.next().html('');
            }

            if(branch_image_active == 0) {
                $("#drop").next().show().html('* Please select ad image');
                error = 1;
            } else {
                $("#drop").next().html('');
            }
            
            if(error == 0)
            {
                $.ajax({
                    url: base_url + "clients_business_branches/add_business_branch_temp",
                    type: "POST",
                    data: form_data,
                    dataType: "json",
                    async: false,
                    success: function(data, textStatus, jqXHR)
                    {
                            adImageSize = $("input[name='adimage-size']").val();
                            adImageSizeClass ="";

                            switch(adImageSize)
                            {
                                case 'single':
                                    adImageSizeClass = "ad-tile-single";
                                break; 
                                case 'double':
                                    adImageSizeClass = "ad-tile-double";
                                break;
                                case 'quad':
                                    adImageSizeClass = "ad-tile-quad";
                                break;

                            }

                            $("input[name='upload-image-name']").val(data.ad_image);

                            $("#tbl-branches").append('<tr id="'+data.branch_id+'">' +
                                        '<td class="col-md-6">' +
                                        '<div class="media" id="'+ data.ad_image +'">'+
                                            '<span class="pull-left" href="#"> <img class="'+adImageSizeClass+'" src="'+base_url + '_assets/_media_uploads/images/business/temp/tiles/' + data.ad_image +'" style="width: 72px; height: 72px;"> </span>' +
                                            '<div class="media-body">'+
                                                '<h4 class="media-heading">'+ data.branch_name +'</h4>'+
                                                '<p>'+ data.address +'</p>'+
                                                '<p>Business Hours: </p>'+
                                                 'Mon: '+data.office_hour_monday+'<br>'+
                                                 'Tue: '+data.office_hour_tuesday+'<br>'+
                                                 'Wed: '+data.office_hour_wednesday+'<br>'+
                                                 'Thu: '+data.office_hour_thursday+'<br>'+
                                                 'Fri: '+data.office_hour_friday+'<br>'+
                                                 'Sat: '+data.office_hour_saturday+'<br>'+
                                                 'Sun: '+data.office_hour_sunday+'<br><br>'+
                                                  '<p> Ad Tile size: '+ adImageSize +'</p>'+
                                                 '<p> Category: '+data.category+'</p>'+
                                            '</div>'+
                                        '</div></td>'+

                                        '<td class="col-md-1" style="text-align: center">'+ data.ad_price +
                                        
                                        '</td>'+

                                        '<td class="col-md-1">'+
                                        '<a href="" class="btn btn-primary pull-right btn-remove-cart-item" style="color:#ffffff" data-toggle="modal" data-target="#modal-removebranch "> Remove </a></td>'+
                                    '</tr>');

                            $('#modal-addbranch').modal('hide');
                            $("#remove-link").hide();
                            $("#image-box-holder").hide();
                            $("#browse-link").show();
                            $("#upload").show();
                            branch_image_cover = "";
                            branch_image_active = 0;
                            // $("#form-register-branches").trigger('reset');
                      
                    }, 
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                      
                    }

                });  
            }
    
    });

    $(document).on('click','.btn-remove-cart-item',function() {


        var  conf = confirm('Remove item?');

        if(conf)
        {
            id = $(this).closest('tr').attr('id');
            $(this).closest('tr').remove();

            $.ajax({
                url: base_url + "clients_business_branches/remove_branch_temp",
                type: "POST",
                data: { branch_id : id },
                dataType: "json",
                success: function(data, textStatus, jqXHR)
                {
                    branch_image_cover = data.image_filename;
                }, 
                error: function (jqXHR, textStatus, errorThrown)
                {
                  
                }

            });

            removeCoverImage();
        }
        
    });

    $("#activate-step-3").click(function(e){
        e.preventDefault();

        // CartTotalItems();
        // alert(cart_items);
        // // if(cart_items == 0)
        // // {
        // //     alert("Please add busixness item");
        
        // // }   
        // // else
        // // {
        // //     $("#form-register-branches").submit();
        // // }

    });

    // Check cart total/active items
    function CartTotalItems()
    {
        $.ajax({
            url: base_url + "clients_business_branches/cart_branch_total",
            type: "POST",
            data: '',
            dataType: "json",
            async: false,
            success: function(data, textStatus, jqXHR)
            {
               cart_items = data;

            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
              
            }

        });
    }

    // Register business listing
    function RegisterBusinessListing()
    {

        $.ajax({
            url: base_url + "",
            type: "POST",
            data: { isajax: 1},
            dataType: "json",
            async: false,
            success: function(data, textStatus, jqXHR)
            {
                console.log(data); 
            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
              
            }

        });

    }

    // Check if the session has been timed out
    function check_session()
    {

        setInterval(function(){

            $.ajax({
                url: base_url + "clients_business_branches/check_business_listing_session",
                type: "POST",
                data: { isajax: 1},
                dataType: "json",
                async: false,
                success: function(data, textStatus, jqXHR)
                {
     
                    if(data.session_time=="expired")
                    {
                        $("#modal-session-expired").modal('show');
                    }
                    else
                    {
                        $("#modal-session-expired").modal('hide');
                    }


                }, 
                error: function (jqXHR, textStatus, errorThrown)
                {
                  
                }

            });

        },5000);

    }

    // Renew listing session
    function renew_session()
    {

         $.ajax({
                url: base_url + "clients_business_branches/renew_business_listing_session",
                type: "POST",
                data: { isajax: 1},
                dataType: "json",
                async: false,
                success: function(data, textStatus, jqXHR)
                {


                }, 
                error: function (jqXHR, textStatus, errorThrown)
                {
                  
                }

            });


         $("#modal-session-expired").modal('hide');

    }

    // Clear Session
    function clear_session()
    {

          $.ajax({
                url: base_url + "clients_business_branches/clear_business_listing_session",
                type: "POST",
                data: { isajax: 1},
                dataType: "json",
                async: false,
                success: function(data, textStatus, jqXHR)
                {


                }, 
                error: function (jqXHR, textStatus, errorThrown)
                {
                  
                }

            });


         window.location.href = base_url + 'business';

    }

    // Remove cover image
    function removeCoverImage(){

        $.ajax({
            url: base_url + "clients_business_branches/remove_branch_image_temp",
            type: "POST",
            data: { img_filename: branch_image_cover},
            dataType: "json",
            async: false,
            success: function(data, textStatus, jqXHR)
            {

            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
              
            }

        });
    }

    // Countdown to business description
    function updateCountdown() {
        
        // 600 is the max message length
        var remaining = 600 - $('textarea[name="biz-description"]').val().length;

        

        if(remaining < 0)
        {
            max_biz_desc_text = 0;
            $('.countdown').text('Max characters reached, Please limit description to 600 characters');
        }
        else
        {
            $('.countdown').text(remaining + ' characters remaining.');
        }

    }


});