  <body class="login-body">

    <div class="container">

      <form class="form-signin" method="post" action="<?php echo base_url();?>users/authd">
        <h2 class="form-signin"></h2>
        <div class="login-wrap text-center">
            <img src="<?php echo base_url();?>_assets/sites_business/default/img/logo.jpg">
            <input type="text" name="username" class="form-control" placeholder="Email" autofocus>
            <input type="password" name="password" class="form-control" placeholder="Password">
            <input type="submit" class="btn btn-primary" style="width:100px"  value="Sign in">
           <!--  <p>or you can sign in via social network</p>
            <div class="login-social-link">
                <a href="index.html" class="facebook">
                    <i class="icon-facebook"></i>
                    Facebook
                </a>
                <a href="index.html" class="twitter">
                    <i class="icon-twitter"></i>
                    Twitter
                </a>
            </div> -->

        </div>

      </form>

    </div>


  </body>

