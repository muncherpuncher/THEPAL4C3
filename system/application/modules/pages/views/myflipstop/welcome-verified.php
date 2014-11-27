<?php $new_user_info = $this->session->userdata('new_user_info');?>

<div class="row text-center col-lg-6 center-block top-buffer">

	<div class="col-lg-12 text-center">
		<div class="section">
			<img class="fs-logo" src="<?php echo base_url('_assets/'.$theme.'/img/fs_logo_dark.jpg');?>">
			<br><br>
			<br><br>
			<h1 style="color:#ff4747"> Welcome <?php echo ucfirst($new_user_info['firstname']);?> ! </h1>
			<h5>
				You have successfully verified your account.
			</h5>
			<a href="<?php echo base_url();?>" class="btn btn-primary" style="width:160px"> Click here to get started </a>
		</div>

	</div>
	
</div>


<script>


</script>