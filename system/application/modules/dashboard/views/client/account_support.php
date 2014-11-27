<?php 
if($_POST)
{ 

$response = Modules::run('crm/save');

if($response == TRUE)
{
?>
<div class="alert alert-success fade in">
  <button data-dismiss="alert" class="close close-sm" type="button">
      <i class="icon-remove"></i>
  </button>
  <strong> Inquiry Sent!</strong> we will get back to you shortly via your email
</div>
<?php   
}

}
?>

<section class="panel" style="color:#000">
   <div class="panel-heading">
   	 <span class="glyphicon glyphicon-user"></span>   SUPPORT
   </div>	
   <div class="panel-body">
   		<section class="panel">
	          <header class="panel-heading">
	             Send us your inquiry so we can help you out
	          </header>
	          <div class="panel-body">
	              <form role="form" action="" method="POST" class="col-xs-6" id="form-message">
	                  <div class="form-group">
	                      <label for="">Email address</label>
	                      <input class="form-control" name="email" placeholder="Enter email" type="email">
	                  	  <span class="field-status-error"></span>	
	                  </div>
	                  <div class="form-group">
	                      <label for=""> Inquiry Type </label>
	                      <select class="form-control" name="crm_type_dropdown">
	                      		<option value="General" selected> General </option> 
	                      		<option value="Billing"> Billing </option>
	                      		<option value="Technical"> Technical </option>
	                      </select>
	                      <span class="field-status-error"></span>
	                  </div> 
	                  <div class="form-group">
	                      <label for=""> Subject </label>
	                      <input name="crm_subject" class="form-control" placeholder="Subject" type="text">
	                      <span class="field-status-error"></span>
	                  </div>
	                   <div class="form-group">
	                      <label for=""> Message </label>
	                      <textarea class="form-control" name="crm_message"></textarea>
	                      <span class="field-status-error"></span>
	                  </div>
	                                   
	                  <button type="button" id="btn-send" class="btn btn-primary">Submit</button>
	              </form>

	          </div>
	      </section>
    
   </div>
  
</section>

<script type="text/javascript" src="<?php echo base_url();?>_assets/_js/custom/global.js"></script>
<script>
$(document).ready(function(){

    $("#btn-send").click(function(){

            var error = 0;

            if(email.val() == '') {
                email.next().show().html('* Required');
                error = 1;
            } else {
                email.next().hide().html('');
            }

            if(crm_subject.val() == '') {
                crm_subject.next().show().html('* Required');
                error = 1;
            } else {
                crm_subject.next().hide().html('');
            }
          	
          	if(crm_message.val() == '') {
                crm_message.next().show().html('* Required');
                error = 1;
            } else {
                crm_message.next().hide().html('');
            }

            if(error == 0) {
               $("#form-message").submit();
            } else {
                return false;
            }
    });
});
</script>