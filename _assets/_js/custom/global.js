/*
 * Global variables
 */

var branch_image_active = 0;
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
    bool            = false;
    category_id     = ""
    parent_id       = "";
    is_ad_claimable = false;



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




/* User Registration set Email  
   redirects to the list business section
*/


/* User Registration Check Email Existance */
/* Basic Site */
function userEmailExists(type,email)
{
      $.ajax({
        url: base_url + 'users/email_is_exists',
        type: "POST",
        data: { 
            type: type,
            email: email
        },
        dataType: 'json',
        async:false,
        success: function(data, textStatus, jqXHR)
        {  
            callBack( data.success );

        }, 
        error: function (jqXHR, textStatus, errorThrown)
        {
            
        }

    });

}


/* Resend user activation link */
function resendAccountActivationLink(email)
{   
    
      $.ajax({
        url: base_url + 'users/resend_activation',
        type: "POST",
        data: { 
            
            email: email
        },
        dataType: 'json',
        async:false,
        success: function(data, textStatus, jqXHR)
        {
           console.log(data);
        }, 
        error: function (jqXHR, textStatus, errorThrown)
        {
            
        }

    });
}


/* Reset Password */
function resetPassword(email,password)
{   
    
      $.ajax({
        url: base_url + 'users/reset_password',
        type: "POST",
        data: { 
            password: password,
            email: email
        },
        dataType: 'json',
        async:false,
        success: function(data, textStatus, jqXHR)
        {
           
        }, 
        error: function (jqXHR, textStatus, errorThrown)
        {
            
        }

    });
}

/* Call Back */ 
function callBack( value )
{   
    callBackValue = value;
    bool = value;

}

/* Get form input element values */

function getInput( name )
{
   return $("input[name="+name+"]");
}


function getSelect( name )
{
    return $("select[name="+name+"]");
}


function getTextArea( name )
{
    return $("textarea[name="+name+"]");
}

/* Get form input element values */




