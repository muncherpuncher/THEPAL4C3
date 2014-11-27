<!DOCTYPE html>
<html lang="en">
  <head>
   <!--  <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>  FlipStop </title>
    <?php include('partials/assets_header.php');?>
  </head>
  <body>
  <div class="main-container">

      <div class="overlay">
      <img style="height:70px;margin-top:200px" src="<?php echo base_url('_assets/_images/loader.gif');?>">
      </div>

            <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
              
              <div class="col-sm-1 pull-left header-logo"> 
                <a href="<?php echo base_url();?>"> 
                  <img style="height:73px;" src="<?php echo base_url();?>_assets/myflipstop/img/fs_logo_dark.jpg">
                </a> 
              </div>

              <!-- Set Link Type on HTTP Routings -->
      
                <div class="col-xs-9">
                    <ul class="col-xs-12 header-links">
                        <li><a href="<?php echo $page_menu['about']['url'];?>">ABOUT FLIPSTOP</a></li>
                        <li><a href="<?php echo $page_menu['benefits']['url'];?>"> WHY FLIPSTOP </a></li>
                        <li><a href="#" data-toggle="modal" data-target="#modal-demo">PLAY VIDEO </a></li>
                        <li id="header-user-links">
                        	<?php  echo $this->session->userdata('is_logged_in') === 1 ? '<a href="'.base_url('dashboard').'"> MANAGE ACCOUNT </a> | <a href="'.base_url('users/logout').'"> LOGOUT </a>' : '<a href="'.$page_menu['register-business']['url'].'"> GET STARTED </a> | <a href="'.$page_menu['sign-in']['url'].'"> LOGIN </a>';?>
                        </li>
                    </ul>

                </div>

              <!-- Set Link Type on HTTP Routings -->

              <!-- /.container -->
          </div>
          <!-- Page Message /.container -->
          <div class="app-alert col-xs-10">
            <div class="alert alert-success alert-block fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
               
                <i class="icon-ok-sign"></i>
                Success!
                <div class="message"></div>
                
            </div>
          </div>
          <!--  Page Message  /.container -->

      	  <div class="main-container">
             <?php $this->load->view('pages/' . $theme .'/' . $view_file);?>
          </div>

         
  </div>

  <!-- Modal Demo Video -->
  <div class="modal fade" id="modal-demo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"> How Flipstop works </h4>
        </div>
        <div class="modal-body">
          <iframe width="100%" height="315" src="//www.youtube.com/embed/rGHI4YBwbCo" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Forgot Password -->
  <div class="modal fade" id="modal-forgot-password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"> Forgot Password </h4>
        </div>
        <div class="modal-body">
           <form method="POST"  id="form-forgot-password">
              
                 <div class="form-group">
                      <label for="business_name"> Enter new password </label>
                      <input class="form-control" name="forgot_password" placeholder="" autofocus="" type="text">
                  </div>
                  <div class="form-group">
                      <input class="btn btn-primary" name="submit" type="button" value="Submit">
                  </div>
                  <br>
                  This will be sent to your email.
                  
           </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Session Expired -->
  <div id="modal-session-expired" class="modal fade in"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Business Listing Registration - Session Expired</h4>
            </div>
            <div class="modal-body">

                You session has been expired. Click <b> Renew </b> to continue session. <br>
                Otherwise clicking <b> Close </b> will not save your work in progress.

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" id="btn-clear-session" class="btn btn-default" type="button"> Close </button>
                <button class="btn btn-warning" id="btn-renew-session" type="button"> Renew </button>
            </div>
        </div>
    </div>
  </div>

  </body>
</html>
