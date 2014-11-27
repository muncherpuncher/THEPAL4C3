<section>
   <div class="panel-heading">
   	 	<span class="glyphicon glyphicon-signal"></span> ANALYTICS
   </div>
</section>   	
<section>
	<div class="panel-body">
		<strong> Business Name : </strong> <?php echo $branch_info->name;?> <br>
		<strong> Address : </strong> 
		<?php echo $branch_info->address;?> 
		<?php echo $branch_info->city;?> 
		<?php echo $branch_info->state;?> ,
		<?php echo $branch_info->country;?>
		<?php echo $branch_info->postal_code;?> 
	</div>
</section> 


<?php if(count($_GET) > 0):?>

<section>

   <div class="panel-heading">
   	 	<span class="glyphicon glyphicon-info-sign"></span> DETAILS
   </div>	

   <div class="panel-body">
   		<?php include('analytics_favorites.php');?>
   		<?php include('analytics_likes.php');?>
   		<?php include('analytics_buckets.php');?>
   		<?php include('analytics_checkins.php');?>
   		<?php include('analytics_opens.php');?>
   		<?php include('analytics_impressions.php');?>
   		<?php include('analytics_shares.php');?>
   		<?php include('analytics_maps.php');?>
   </div>

</section>   
<?php endif;?>





	<!--main content end-->

	<!-- <footer class="site-footer">
		<div class="text-center">
			<div class="copyrights fl"><p>&copy; 2013 Salespace - Create your own store.</p></div>
			
			<div class="clr"></div>
		</div>
	</footer>
	 -->


	<!--All Javascript Here-->
	<!-- Custom Chart  -->
	<script>
	$(function(){
		
		

		$("#btn-view-analytics").click(function(){
			$("#form-analytics-business").submit()
		});

		if ($(".chart-bar")) {
	        $(".chart-bar .bar-bg .bar").each(function () {
	        	var height = $(this).attr('height');
	            $(this).animate({
	                height: height + '%'
	            }, 1000)
	        })
   	 	}

	});
		
	
	</script>
