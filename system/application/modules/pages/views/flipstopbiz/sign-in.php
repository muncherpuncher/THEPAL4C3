<?php if($this->session->userdata('is_logged_in')===1) {redirect('dashboard');}?>
<div class="full-page-container">
    <div class="full-page"  style="height:600px">
        <div class="page-margin-top">
        </div>
        <!-- Sign in -->
        <?php if($_POST):?>
            <?php $response = Modules::run('users/auth'); ?>
            <?php if($response==FALSE):?>
            <div class="alert alert-block alert-danger fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="icon-remove"></i>
                </button>
                <strong> Invalid credentials </strong> Please check your username and password
            </div>
            <?php endif;?>
            <?php endif;?>
        <!-- <p class="col-lg-3 pull-right"> * Required Information </p> -->
        <div style="width:300px;margin-bottom:200px" class="col-lg-6 text-center center-block">
            <div class="col-lg-12">
                <h1 class="subpage-header"> SIGN IN </h1>
            </div>
            <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                <div class="form-group inline">
                    <label for="email"> Email </label>
                    <input style="width:300px" class="form-control" name="username" placeholder="yourname@email.com" autofocus="" type="text">
                </div>
                <div class="form-group">
                    <label for="password"> Password </label>
                    <input style="width:300px" class="form-control" name="password" placeholder="password" autofocus="" type="password">
                </div>
                <input type="submit" class="btn btn-primary pull-right" value="Sign in using our secure server">
                <br>
                <br>
                <a href="" class="pull-right" style="color:#ffffff" data-toggle="modal" data-target="#modal-forgotpassword">Forgot your password? </a>
            </form>
        </div>
    </div>
</div>

<?php echo Modules::run('pages/get_footer');?>