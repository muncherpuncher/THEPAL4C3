/*
 * Variable names for input fields.
 */

var inputText   	= $('input[type="text"]'),
    inputPass   	= $('input[type="password"]'),
    firstname   	= $('input[name="first_name"]'),
    lastname    	= $('input[name="last_name"]'),
    middle_name     = $('input[name="middle_name"]'),
    birth_date     = $('input[name="birth_date"]'),
    gender          = $("input[name='opt-gender']:checked").attr('id'),
    phone_number    = $('input[name="phone_number"]'),
    title_role      = $('input[name="title_role"]'),
    username    	= $('input[name="username"]'),
    password    	= $('input[name="password"]'),
    cpassword   	= $('input[name="cpassword"]'),
    email       	= $('input[name="email"]'),
    phone			= $('input[name="phone"]'),
    address         = $('input[name="address"]'),
    country    	    = $('select[name="country"]'),
    state   		= $('input[name="state"]'),
    postal_code     = $('input[name="postal_code"]'),
    city            = $('input[name="city"]'),
    state_dropdown         = $('select[name="state_dropdown"]'),
    city_dropdown         = $('select[name="city_dropdown"]'),
    postal_code_dropdown   = $('select[name="postal_code_dropdown"]'),
    business_category   = $('select[name="business_category"]'),
    business_sub_category   = $('select[name="business_sub_category"]'),
    web_url   = $('input[name="web_url"]'),
    fax         	= $('input[name="fax"]'),
    company     	= $('input[name="company"]'),
    company_address	= $('input[name="company_address"]'),
    addressline1    = $('input[name="address_1"]'),
    addressline2    = $('input[name="address_2"]'),
    company_phone	= $('input[name="company_phone"]'),
    company_fax		= $('input[name="company_fax"]'),
    company_email   = $('input[name="company_email"]'),
    cc_type         = $('select[name="cc_type"]'),
    month           = $('select[name="month"]'),
    year            = $('select[name="year"]'),
    business_id     = "";
    business_name   = $('input[name="business_name"]'),
    business_owner  = $('input[name="business_owner"]'),
    business_email  = $('input[name="business_email"]'),
    referrer_email   = $('input[name="referrer_email"]'),
    referrer_name   = $('input[name="referrer_name"]'),
    business_type   = $('select[name="business_type"]'),
    user_type       = $("input[name='opt-user-type']:checked").attr('id'),
    business_v_code = $("input[name='business_verification_code']"),
    branch_name = $('input[name="branch_name"]'),
    biz_description = $('textarea[name="biz-description"]'),
    business_description = $('textarea[name="business_description"]'),

    crm_subject   = $('input[name="crm_subject"]'),
    crm_type_dropdown  = $('select[name="crm_type_dropdown"]'),
    crm_message = $('textarea[name="crm_message"]'),

    branch_image_active = 0;
    branch_image_cover = "";
    return_url      = "",
    id              = "",
    callBackValue   = false,
    error           = 0,
    form_id         = "", // Calling forms to open as modal
    media_id        = "",
    media_url       = "",
    cart_items      = "",
    user_type       = "",
    isexists        = 0;
    message         = "";




//################## INITIALIZE FUNCTIONS ############################//

/*  
 * RegEx validation for Email 
 */
function isValidEmail(email) {
    return /^[a-z0-9]+([-._][a-z0-9]+)*@([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{2,4}$/.test(email)
    && /^(?=.{1,64}@.{4,64}$)(?=.{6,100}$).*/.test(email);
}

/* 
 * Force input fields to input 
 * numeric only 
 */
jQuery.fn.ForceNumericOnly = function() {
    return this.each(function() {
        $(this).keydown(function(e) {
                var key = e.charCode || e.keyCode || 0;
                // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
                // home, end, period, and numpad decimal
                return ( key == 8 || key == 9 || key == 46 || key == 110 || key == 190 || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
        });
    });
};


 /* 
 * Display Messages 
 */

 function displayMessage(message,type)
 {  
    $(".app-alert").hide();
    

    switch(type)
    {   
        case 'error':
                $(".app-alert.alert-danger").show();
                $(".app-alert.alert-danger p").html('');
                $(".app-alert.alert-danger p").html(message);
            break;
        case 'success':
                $(".app-alert.alert-success").show();
                $(".app-alert.alert-success p").html('');
                $(".app-alert.alert-success p").html(message);
            break;

    }

    

 }

function hideMessage(message,type)
 {
    $("#app-alert").hide();

 }

 /* 
 * Display Messages
 */



/* User Login - ajax */

function userLogin(username,password)
{
      $.ajax({
        url: 'login',
        type: "POST",
        data: { 
            username : username.val(), 
            password : password.val(),
            isajax: 1
        },
        dataType: 'json',
        async:false,
        success: function(data, textStatus, jqXHR)
        {
           if(data.success == true)
            {
                displayMessage(data.message,'success');
                window.location.href = data.redirect_url;
            }
            else
            {
                displayMessage(data.message,'error');

            }
        }, 
        error: function (jqXHR, textStatus, errorThrown)
        {
            displayMessage('Request failed','error');
        }

    });

}
 


/* User Registration set Email  
   redirects to the list business section
*/



     
/* User Registration Check Email Existance */
/* Basic Site */
function userEmailExists_basic(email)
{
      $.ajax({
        url: base_url + 'users/checkemail',
        type: "POST",
        data: { 
            email: email,
            isajax: 1
        },
        dataType: 'json',
        async:false,
        success: function(data, textStatus, jqXHR)
        {
            callBack(data.success);
        }, 
        error: function (jqXHR, textStatus, errorThrown)
        {
            displayMessage('Request failed','error');
        }

    });

}
/* Business Site */
/* User Registration Check Email Existance */

function userEmailExists_business(email)
{
      $.ajax({
        url: base_url + 'business/users/checkemail',
        type: "POST",
        data: { 
            email: email,
            isajax: 1
        },
        dataType: 'json',
        async:false,
        success: function(data, textStatus, jqXHR)
        {
            callBack(data.success);
        }, 
        error: function (jqXHR, textStatus, errorThrown)
        {
            displayMessage('Request failed','error');
        }

    });

}



/* Reset Password */

function resetPassword(email,password)
{   
    
      $.ajax({
        url: base_url + 'resetpassword',
        type: "POST",
        data: { 
            password: password,
            email: email,
            isajax: 1
        },
        dataType: 'json',
        async:false,
        success: function(data, textStatus, jqXHR)
        {
           if(data.success==true)
           {
                displayMessage('We have sent your new password to your email','success');
                
           }
           else
           {
                displayMessage('Request failed','error');
           }
        }, 
        error: function (jqXHR, textStatus, errorThrown)
        {
            displayMessage('Request failed','error');
        }

    });
}

// Call Back


function callBack(value)
{   
    callBackValue = value;
    isexists = value;

}


// Google Map


//################## END OF FUNCTIONS ############################//



function showLoader_biz()
{
     $(".overlay").css('display','block');
}

function hideLoader_biz()
{
     $(".overlay").css('display','none');
}

function showMessage_biz(type,message)
{
    switch(type)
    {
        case 'error':
                $(".app-alert").fadeIn();
                $(".app-alert .alert-danger .message").html(message);
            break;
        case 'warning':
            break;
        case 'success':
                $(".app-alert").fadeIn();
                $(".app-alert .alert-success .message").html(message);
        break;
    }

}

function hideMessage_biz(type,message)
{
    
    $(".app-alert").hide().html('');

}


function showLoader_webapp()
{
     $(".overlay").css('display','block');
}

function hideLoader_webap()
{
     $(".overlay").css('display','none');
}


function searchFS()
{
        var html = "";

        if($("#search_keyword").val()=="")
        {
            alert('Please enter friends name or email');
        }
        else
        {
            $.ajax({
            url: base_url + 'search',
            type: "POST",
            data: { 

                 search_keyword : $("#search_keyword").val() 
            },
            dataType: 'json',
            async:false,
            success: function(data, textStatus, jqXHR)
            {       
                
                    switch(data.search_category)
                    {
                        case 'friends':
                            
                             $(".friends-column").html('');

                            $.each(data.results, function(i, item) {
                                

                                html += '<div class="pin-friends" id="'+data.results[i].user_id+'">'+
                                            '<div class="presence">'+
                                                '<a class="circle '+data.results[i].presence+'" data-placement="top" href="javascript:void()" title="Offline">'+
                                                '</a>' +
                                            '</div>'+
                                            '<div class="pin-image" style="background:url(' + "'"+data.results[i].photo+"'" + ') no-repeat;background-size:112%;background-position: center;width:150px;height:150px"></div>'+
                                            '<div class="friend-detail-ini" style="width:150px"></div>'+
                                            '<div class="friend-detail-content">'+
                                                '<div class="name" alt="Leslie">'+data.results[i].first_name+'</div>'+
                                                 '<div class="option">'+
                                                  '<a href="javascript:void(0)" class="btn-add-friend btn btn-info btn-xs" id="'+data.results[i].user_id+'"> Add as a Friend </a>'
                                                 '</div>'+
                                            '</div>'+
                                        '</div>';

                               
                            });
                            

                            $(".friends-column").append(html);
                        
                            

                        break;
                    }
            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
                displayMessage('Request failed','error');
            }

        });
        }

        

}


function socialRequestFriend(user_id)
{
 
      $.ajax({
            url: base_url + 'request_friend',
            type: "POST",
            data: { id : user_id},
            dataType: 'json',
            async: false,
            success: function(data, textStatus, jqXHR)
            {   
                 if(data.success==true)
                 {
                    displayMessage(data.message,'success');  
                 }
                 else
                 {
                    displayMessage(data.message,'error');  
                 }
            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
                
            }

        });
}


function socialApproveFriendRequest(id)
{
 
      $.ajax({
            url: base_url + 'approve_friend',
            type: "POST",
            data: { id : id},
            dataType: 'json',
            async: false,
            success: function(data, textStatus, jqXHR)
            {   
                 if(data.success==true)
                 {
                    displayMessage(data.message,'success');  
                 }
                 else
                 {
                    displayMessage(data.message,'error');  
                 }
            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
                
            }

        });
}






 /* 
 * Forgot Password
 */

// $("#form-signin").submit(function(e){
//      e.preventDefault();   
       

//         $('*').removeClass('error');
        
//             var error = 0;
            
//             if(username.val() == '') {
//                 username.parent().addClass('has-error');
//                 error = 1;
//             } else {
//                 if(!isValidEmail(username.val())) {
//                     username.parent().addClass('has-error');
//                     error = 1;
//                 }
//                 else
//                 {
//                     username.parent().removeClass('has-error');
//                 }
//             }
            
//             if(password.val() == '') {
//                 password.parent().addClass('has-error');
//                 error = 1;
//             }else
//             {
//                 password.parent().removeClass('has-error');
//             }      


//             if(error == 0) {


//                     $.ajax({
//                         url: base_url + 'users/auth',
//                         type: "POST",
//                         data: { 
//                             username : username.val(), 
//                             password : password.val(),
//                             isajax: 1
//                         },
//                         dataType: 'json',
//                         success: function(data, textStatus, jqXHR)
//                         {

                           
//                            if(data.success == true)
//                             {
//                                 displayMessage(data.message,'success');
//                                 window.location.href = data.redirect_url;
//                             }
//                             else
//                             {
//                                 displayMessage(data.message,'error');

//                             }
//                         }, 
//                         error: function (jqXHR, textStatus, errorThrown)
//                         {
//                             displayMessage('Request failed','error');
//                         }

//                     });

                        
                        


//             } else {
//                 return false;
//             }

// });

/* 
 * Forgot Password
 */




