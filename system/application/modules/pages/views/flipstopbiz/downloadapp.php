<div class="full-page-container">

	<?php if($_POST):?> 
	<?php $response = Modules::run('Download_app/download');?>
	<?php if($response == TRUE):?>
	<div class="alert alert-success alert-block fade in">
	      <button data-dismiss="alert" class="close close-sm" type="button">
	          <i class="icon-remove"></i>
	      </button>
	      <h4>
	          <i class="icon-ok-sign"></i>
	          Success!
	      </h4>
	      <p> We have sent the download link to your email. </p>
	</div>
	<?php endif;?>
	<?php endif;?>

	<div class="page-margin-top"></div>
	<div class="full-page subpage-bg-color">
	    <div class="marketing-item-content" style="height:350px">
	        <div class="col-xs-5 col-xs-offset-1 col-sm-6">
	            <div class="clearfix"></div>
	            <h2 class="section-heading"> 
	             <h1 class="subpage-header"> Discover Flipstop on Mobile </h1>
	            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
	        </div>
	        <div class="col-xs-5 col-sm-pull-0 col-sm-4">
	            <img height="430px" style="position:absolute;margin-left:10px;margin-top:-20px;" class="responsive" src="<?php echo $template_url_img;?>/biz-download-mi.gif">
	            <br><br>
	        </div>
	        
	   		<div class="col-xs-12 pull-right">
	   			<form id="form-downloadapp" class="col-xs-3 col-xs-5 col-sm-6" action="" method="post" style="margin-left:63px;">
	   	
	   				<div class="form-group">
		                <div class="input-prepend">
		                    <input class="form-control" type="text" id="" name="email" placeholder="yourname@email.com">
		                	<span class="field-status-error"></span>
		                </div>
		            </div>
	                <input type="button" id="btn-download-app" class="btn btn-primary" value="Get link"> 
	      		</form>

	      		<div class="col-xs-offset-7" style="z-index:2;margin-top:140px;padding-left:45px;">
		       		<img height="50px"  src="<?php echo $template_url_img;?>/downloadapp_googleplay.gif">
		       		<img height="50px"  src="<?php echo $template_url_img;?>/downloadapp_applestore.gif">
		   		</div>
	   		</div>
	    </div>
	</div>
</div>
<div id="marker"></div>
<?php echo Modules::run('pages/get_footer');?>
<script type="text/javascript" src="<?php echo base_url();?>_assets/_js/custom/global.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>_assets/_js/custom/submenu-scroll.js"></script>
<script>
   
$(document).ready(function(){

	$("#btn-download-app").click(function(){
		
		error = 0;

		if(email.val() == '') {
        	email.next().show().html('* Required');
       	 	error = 1;
        } else {
            email.next().hide().html('');
        }
        // if(isValidEmail(email.val()) == false) {
        //     email.next().show().html('* Invalid Email Address');
        //     error = 1;
        // } else {
        //     email.next().hide().html('');
        // }
	
        if(error==0)
        {	
        	showLoader_biz();
        	$("#form-downloadapp").submit();
        }


	});

});


</script>




