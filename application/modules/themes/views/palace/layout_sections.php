<!DOCTYPE html>
<html lang="en">
  <head>
  <title>  

  </title>
  <?php include('partials/assets_header.php');?>
  </head>
  <script>
   base_url = "<?php echo base_url();?>";
  </script>
  <body>

  <!-- Overlay-->
  <div class="overlay row-fluid center text-center">
    <img style="height:60px;margin-top:100px" src="<?php echo base_url('_assets/_images/loader.gif');?>">
  </div>
  <!-- Overlay-->

  <!--Global alert messages-->

    <div class="alert alert-success">
        <!-- <a class="close" data-dismiss="alert" aria-hidden="true" href="#">x</a> -->
        <p> Message goes here </p>
    </div>

   <!--Global alert messages-->
    
  <div class="content">

    <?php $this->load->view('pages/' . $theme .'/' . $view_file);?>
    
  </div>
    
  </body>

</html>
