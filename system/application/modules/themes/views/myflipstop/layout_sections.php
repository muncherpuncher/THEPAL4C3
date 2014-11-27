<!DOCTYPE html>
<html lang="en">
  <head>
  <title>  
  	<?php echo $site_info->name . ' - ' . $page_info->title;?> 
  </title>
  <?php include('partials/assets_header.php');?>
  </head>
  <script>
   base_url = "<?php echo base_url();?>";
  </script>
  <body>
  <div class="overlay">
  <img style="height:70px;margin-top:200px" src="<?php echo base_url('_assets/_images/loader.gif');?>">
  </div>
    
    <?php $this->load->view('pages/' . $theme .'/' . $view_file);?>
    
  </body>

</html>
