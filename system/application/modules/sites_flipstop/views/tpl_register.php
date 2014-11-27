
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/smoothness/jquery-ui.css" />

<div class="row top-buffer col-lg-12">

    <form style="width:300px" class="text-center col-lg-3 center-block" method="POST"  id="form-registration">
        <img class="fs-logo" src="<?php echo base_url('_assets/'.$template_name.'img/fs_logo_dark.jpg');?>">
  		<br>
        	<div class="form-group">
        		<input class="form-control" name="first_name" placeholder="First Name" autofocus="" type="text">
        	    <span class="field-status-error"></span>
            </div>
            <div class="form-group">
            	<input class="form-control" name="email" placeholder="Email Address" autofocus="" type="text">
                <span class="field-status-error"></span>
            </div>
            <div class="form-group">
            	<input class="form-control" name="password" placeholder="Password" type="password">
                <span class="field-status-error"></span>
            </div>        	
            <div class="form-group">
            	<input class="form-control" name="cpassword" placeholder="Confirm Password" type="password">
                <span class="field-status-error"></span>
            </div>
            <div class="form-group" id="form-group-country">
	            <div class="fs-select">
	            	<select class="form-control" name="country">
		              <option value="" selected>My Country</option>
		              <option value="Philippines"> Philippines </option>
                      <option value="Canada"> Canada </option>
                      <option value="USA"> USA </option>
		        	</select>
	            </div>
                <span class="field-status-error"></span>
	        </div>
            <div class="form-group" id="state" style="display:none">
                <input class="form-control" name="state" placeholder="State" autofocus="" type="text">
                <span class="field-status-error"></span>
            </div>
            <div class="form-group" id="zipcode" style="display:none">
                <input class="form-control" name="postal_code" placeholder="Zip Code" autofocus="" type="text">
                <span class="field-status-error"></span>
            </div>
	        <div class="form-group" id="dr-state" style="display:none">
	            <div class="fs-select">
	            	<select class="form-control" name="state_dropdown">
		              <option value="" selected> My Region </option>
		              <?php foreach ($state_list->result() as $key):?>
		              <option value="<?php echo $key->state;?>"><?php echo $key->state;?></option>
		              <?php endforeach;?>
		        	</select>
	            </div>
                <span class="field-status-error"></span>
	        </div>
            <div class="form-group" id="dr-city" style="display:none">
	            <div class="fs-select">
                    <select class="form-control" name="city_dropdown">
                      <option value="" selected> My City/State </option>
                      <?php foreach ($cities_list->result() as $key):?>
                      <option value="<?php echo $key->city;?>"><?php echo $key->city;?></option>
                      <?php endforeach;?>
                    </select>
                </div>
	            <span class="field-status-error"></span>
	        </div>
             <div class="form-group">
                    <input type="text" class="form-control" id="calendar" name="birth_date" placeholder="Birthdate" autofocus="">
                    <span class="field-status-error"></span>
            </div>
            <!-- <div class="form-group">
	            <div class="fs-select">
	            	<select class="form-control" name="birth_year_dropdown">
		              <option value="" selected> Year of Birth </option>
                      <?php //for ($i=date('Y') - 18; $i > 1950; $i--):?>
		              <option value="<?php //echo $i;?>"><?php// echo $i;?></option>
		              <?php //endfor;?>
		        	</select>                  
	            </div>
                <span class="field-status-error"></span>

            </div> -->

            <br>
            <div class="form-group colg-lg-12">
            	<div class="btn-group">
                    <span class="fs-text-gray" style="padding-left:5px;margin-top:5px;padding-right:5px;"> I am  </span>
				  	<input type="radio" name="opt-gender"  class="css-checkbox" value="Male" checked/><label for="" class="css-label"> <h6 class="fs-text-gray" style="padding-left:5px;margin-top:5px;padding-right:5px;"> Male </h6> </label>
				    <input type="radio" name="opt-gender"  class="css-checkbox" value="Female"/><label for="" class="css-label"> <h6 class="fs-text-gray" style="padding-left:5px;margin-top:5px;padding-right:5px;"> Female </h6> </label>
                </div>
            </div>
            <div class="form-group">
            	<label class="checkbox">
                     <h6 class="fs-text-gray"> Are you a Filipino business? <br> <a href="<?php echo base_url('business');?>" class="fs-link-pink">  Get Started Here </a> </h6> 
                </label>
                
            </div>       

            <div class="form-group">  
            	<div class="border-dotted"></div>
            </div>
  
                 <p class="pull-left" style="font-size:12px;text-align:left;"> By creating an account, I accept Flipstop's 
                  <a href="<?php echo base_url('terms');?>" target="_blank" class="fs-link-pink">  Terms and Conditions </a> and <a href="<?php echo base_url('privacy');?>" class="fs-link-pink" target="_blank"> Privacy Policy </a> 
                 </p> 
            

            <div class="border-dotted"></div> 

            <br>
            <input type="submit" class="btn btn-primary btn-block pull-right" style="width:100px" value="Sign Up">
            <input type="button" id="btn-cancel" class="btn btn-gray btn-block pull-right" style="width:100px" value="Cancel">

    </form>


    

</div>

<?php include('js.php');?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>


<script>

$(document).ready(function(){

   

    $("#form-registration").submit(function(e){
     e.preventDefault();   
       

        $('*').removeClass('error');
        
            var error = 0;
            var form_data = $(this).serialize();
            var isEmailEx = '';

              
            
            if(birth_date.val() == '') {
                birth_date.next().html('* Required');
                error = 1;
            }else
            {
                birth_date.next().html('');
            }  
     
            if(firstname.val() == '') {
                firstname.next().html('* Required');
                error = 1;
            } else {
                firstname.next().html('');
            }

            if(email.val() == '') {
                email.next().html('* Required');
                error = 1;
            } else {
                if(!isValidEmail(email.val())) {
                    email.next().html('Invalid email address');
                    error = 1;
                }
                else
                {
                    email.next().html('');
                }
            }


            if(password.val() == '') {
                password.next().html('* Required');
                error = 1;
            }else
            {
                password.next().html('');
            }      

            if(cpassword.val() == '') {
                cpassword.next().html('* Required');
                error = 1;
            }else
            {
                if(password.val() != cpassword.val()) {
                    cpassword.next().html('Confirm password');
                    error = 1;
                }
                else
                {
                    cpassword.next().html('');
                }
            }

            if(country.val() == '') {
                country.parent().next().html('* Required');
                error = 1;
            } else {


                if(country.val() == 'Philippines')
                {
                        if(state_dropdown.val() == '') {
                            state_dropdown.parent().next().html('* Required');
                            error = 1;
                        } else {
                             state_dropdown.parent().next().html('');
                        }

                        if(city_dropdown.val() == '') {
                            city_dropdown.parent().next().html('* Required');
                            error = 1;
                        } else {
                             city_dropdown.parent().next().html('');
                        }
                }
                else
                {
                        if(state.val() == '') {
                            state.next().html('* Required');
                            error = 1;
                        } else {
                             state.next().html('');
                        }

                        if(postal_code.val() == '') {
                            postal_code.next().html('* Required');
                            error = 1;
                        } else {
                            postal_code.next().html('');
                        }
                }



                country.parent().next().html('');
            }

           

            

        
            if(error == 0) {

            		//displayMessage('Signing up..','success')

                     userEmailExists_basic(email.val());

                     if(isexists==false)
                     {
                        email.next().html('Email already taken');
                     }
                     else
                     {      

                            showLoader_webapp();

                            $.ajax({
                                url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','WA23',HTTP_ROUTE_TYPE);?>",
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
                                     displayMessage(data.message,'error');
                                 }

                                }, 
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    
                                }

                            }); 

                            showLoader_webapp(); 
                     }
     
            } else {
                return false;
            }
     
     

    });

    // Cancel Registration
    $("#btn-cancel").click(function(){
        window.location.href = base_url;
    });

    // Set address options per country
    $("select[name='country']").change(function(){

        if($(this).val()=="Philippines")
        {
            $("#form-registration .form-group#state").hide();
            $("#form-registration .form-group#zipcode").hide();
            $("#form-registration .form-group#dr-state").show();
            $("#form-registration .form-group#dr-city").show();
        }
        else if($(this).val()=="")
        {
            $("#form-registration .form-group#state").hide();
            $("#form-registration .form-group#zipcode").hide();
            $("#form-registration .form-group#dr-state").hide();
            $("#form-registration .form-group#dr-city").hide();
        }
        else
        {
            $("#form-registration .form-group#state").show();
            $("#form-registration .form-group#zipcode").show();
            $("#form-registration .form-group#dr-state").hide();
            $("#form-registration .form-group#dr-city").hide();
        }

    });

    $("#calendar").datepicker({
        minDate: new Date(1900,1-1,1), maxDate: '-18Y',
      dateFormat: 'dd/mm/yy',
      defaultDate: new Date(1970,1-1,1),
      changeMonth: true,
      changeYear: true,
      yearRange: '-110:-18'

    });
  


});


</script>