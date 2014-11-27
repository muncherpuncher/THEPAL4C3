
<div class="full-page-container">
    <div class="page-margin-top"></div>


    <div class="full-page">
  

        <!-- Sign in -->
        <div class="col-lg-12" id="step-1">
            <div class="col-lg-10">
                <h1 class="subpage-header"> SIGN IN </h1>
            </div>
        </div>

        <div class="col-lg-12"> 
            <hr class="subpage-divider">
        </div>
            <!-- <p class="col-lg-3 pull-right"> * Required Information </p> -->
            
            <div class="col-lg-8 page-margin-left">
                
                <form method="POST"  id="form-signin">
                        
                        <div class="form-group">
                            <label for="business_name"> Password </label>
                        
                                <input style="display:none;width:300px;" class="form-control" name="password" placeholder="" autofocus="" type="password">
                                 <span class="field-status-error"></span>
                          
                        </div>
                        
                         
                        <input type="submit" class="btn btn-fsbiz-sigin" value="Sign in using our secure server"> 
                        <br><br>
                       
                        <a href="" class="pull-left" style="color:#ffffff" data-toggle="modal" data-target="#modal-forgotpassword">Forgot your password? </a>
                        
                </form>
            </div>

        </div>
        


        <!-- Sign in -->
        

    </div>
    <div id="marker"></div>
        <?php include('tpl_page_footer.php');?>
</div>

<?php include('js.php');?>
<script>


$(document).ready(function(){

    var isexists = 0;
    var  error = 0;

    $(".form-signin").submit(function(e){
   
            alert('r');



    });
    
     
    

    // Check user existance

    function checkUserEmail(email)
    {
        $.ajax({
            url: base_url + "listing/register/check_user_email",
            type: "POST",
            data: { email : email },
            dataType: "json",
            async: false,
            success: function(data, textStatus, jqXHR)
            {
              if(data.success == false)
              {
                 isexists = 1;
              }
              else
              {
                 isexists = 0;  
              }
            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
              
            }

        });
    }

    // Set user email on business listing contact info form
    function userSetEmail(email)
    {
          $.ajax({
            url: base_url + 'listing/register/set_user_email',
            type: "POST",
            data: { 
                email: email.val(),
                isajax: 1
            },
            dataType: 'json',
            success: function(data, textStatus, jqXHR)
            {
               if(data.success == true)
                {
                   // displayMessage(data.message,'success');
                   window.location.href = base_url + "listing/register";
                   
                }
                else
                {
                    //displayMessage(data.message,'error');

                }
            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
                displayMessage('Request failed','error');
            }

        });

    }

    // Set user email on business listing contact info form
    function UserAuth(email,password)
    {
          $.ajax({
            url: base_url + 'user/auth',
            type: "POST",
            data: { 
               username : email.val(),
               password : password.val(),
               isajax: 1
            },
            dataType: 'json',
            success: function(data, textStatus, jqXHR)
            {
                // if(data.success == true)
                // {
                //    window.location.href = base_url + "business/listing/register";
                   
                // }
                // else
                // {

                // }
            }, 
            error: function (jqXHR, textStatus, errorThrown)
            {
                displayMessage('Request failed','error');
            }

        });

    }


});


</script>
      
     