<style>
body
{
    background: #5c6270;
}
</style>
<div class="full-page-container">
    <div class="page-margin-top"></div>

    <div class="full-page">
  

        <!-- Sign in -->
        <div class="col-lg-12" id="step-1">
            <div class="col-lg-10">

                <h1 class="subpage-header"> SIGN IN  </h1>
               
            </div>
        </div>
        <div class="col-lg-12"> 
            <hr class="subpage-divider">
        </div>
            <!-- <p class="col-lg-3 pull-right"> * Required Information </p> -->
            
            <div class="col-lg-8 page-margin-left">
                
                <form method="POST" action="<?php echo base_url('users/auth');?>">
                        <div class="form-group">
                            <label for="email"> Email </label>
                            <input style="width:300px" class="form-control" name="username" placeholder="yourname@email.com" autofocus="" type="text">
                        </div>
                        <div class="form-group">
                            <label for="password"> Password </label>
                            <input style="width:300px" class="form-control" name="password" placeholder="password" autofocus="" type="password">
                        </div>
                        
                        <input type="submit" class="btn btn-fsbiz-sigin" value="Sign in using our secure server"> 
                        <br><br>
                       
                        <a href="" class="pull-left" style="color:#ffffff" data-toggle="modal" data-target="#modal-forgotpassword">Forgot your password? </a>
                        
                </form>
            </div>

        </div>
        


        <!-- Sign in -->


    </div>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
</div>
<?php include('page_footer.php');?>
<?php include('js.php');?>

      
     