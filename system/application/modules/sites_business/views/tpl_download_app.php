<div class="full-page-container">
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
	                <input type="submit" class="btn btn-fsbiz-getlink" value="Get link"> 
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
<?php include('tpl_page_footer.php');?>
<?php include('js.php');?>
<script type="text/javascript" src="<?php echo base_url();?>_assets/_js/custom/submenu-scroll.js"></script>
<script>
   

$(document).ready(function(){

	$("#form-downloadapp").submit(function(e){
	e.preventDefault();


		email = $("#form-downloadapp input[name='email']");
		error = 0;

		if(email.val() == '') {
            email.next().show().html('* Required');
            error = 1;
        } else {
            email.next().hide().html('');
        }


        if(isValidEmail(email.val()) == false) {
            email.next().show().html('* Invalid Email Address');
            error = 1;
        } else {
            email.next().hide().html('');
        }
	
        if(error==0)
        {

        	showLoader_biz();

        	form_data = $("#form-downloadapp").serialize();

			$.ajax({
	            url: base_url + "<?php echo Modules::run('tmpl_http_routes/get_list_by_request_code','BA27',HTTP_ROUTE_TYPE);?>",
	            type: "POST",
	            data: form_data,
	            dataType: "json",
	            async:false,
	            success: function(data, textStatus, jqXHR)
	            {

	              if(data.success==true)
	              {
	              	showMessage_biz('success','We have successfully sent you the download link');
	              	email.val('')
	              }
	            }, 
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	              
	            }

	        });

			hideLoader_biz();

        }
		

	});

});


</script>




