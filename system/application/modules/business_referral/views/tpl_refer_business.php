
<div class="full-page subpage-bg-color">
    <br><br><br><br>

    <div class="col-lg-10 col-lg-offset-1">
        <h2 class="subpage-header"> REFER A BUSINESS </h2>
        <h4> Want to refer a business? </h4>
        <h6> Give us some basic information and we'll make sure they get on the number <br>
             one network for Filipinos accross the Globe!
        </h6>
    </div>

    <div class="col-lg-12"> 
        <hr class="subpage-divider">
    </div>

    <div class="col-lg-10 col-lg-offset-1">
       
        <form method="POST"  id="form-refer-business">
                <p class="pull-right"> * Required Information </p>
                <div class="form-group">
                    <label for="business_name"> * Business Name </label>
                    <input style="width:800px" class="form-control" name="business_name" placeholder="" autofocus="" type="text">
                </div>
                <div class="form-group">
                    <label for="referer_email"> * Your Email </label>
                    <input style="width:300px" class="form-control" name="referer_email" placeholder="" autofocus="" type="text">
                </div>
                <div class="form-group">
                    <label for="business_email"> * Businesses's Email </label>
                    <input style="width:300px" class="form-control" name="business_email" placeholder="" type="text">
                </div>              
                <div class="form-group">
                    <label for="business_type"> * Business Type </label>
                    <br>
                    <select name="business_type">
                        <option value="eat/drink" selected> Eat/Drink </option>

                    </select>
                </div>

                <br>
                <input type="submit" class="btn btn-primary" style="width:100px" value="Submit">
      
        </form>
    </div>

</div>
<?php include('page_footer.php');?>

<script>


$(document).ready(function(){

    $("#form-refer-business").submit(function(e){
     e.preventDefault();   
       
        $('*').removeClass('error');
        
            // var error = 0;
             var form_data = $(this).serialize();
           
            // if(business_name.val() == '') {
            //     business_name.parent().addClass('has-error');
            //     error = 1;
            // } else {
            //     business_name.parent().removeClass('has-error');
            //     error = 0;
            // }

            // if(referer_email.val() == '') {
            //     referer_email.parent().addClass('has-error');
            //     error = 1;
            // } else {
            //     if(!isValidEmail(referer_email.val())) {
            //         referer_email.parent().addClass('has-error');
            //         error = 1;
            //     }
            //     else
            //     {
            //         referer_email.parent().removeClass('has-error');
            //         error = 0;
            //     }
            // }

            // if(business_email.val() == '') {
            //     business_email.parent().addClass('has-error');
            //     error = 1;
            // } else {
            //     if(!isValidEmail(business_email.val())) {
            //         business_email.parent().addClass('has-error');
            //         error = 1;
            //     }
            //     else
            //     {
            //         business_email.parent().removeClass('has-error');
            //         error = 0;
            //     }
            // }


            // alert(error);
            error = 0;

            if(error == 0) 
            {

                 
                $.ajax({
                    url: base_url + 'business_refer/save',
                    type: "POST",
                    data: form_data,
                    dataType: 'json',
                    success: function(data, textStatus, jqXHR)
                    {    
                      
                     if(data.success == true)
                     {
                         window.location.href = data.redirect_url;
                     }
                     else
                     {
                        //displayMessage(data.message,'error');
                     }

                    }, 
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                     //displayMessage('Request failed','error');
                    }

                });  
              
     
            } else {
                return false;
            }
     
     

    });

});


</script>
      
     