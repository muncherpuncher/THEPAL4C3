                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                       <!--  <input type="text" class="form-control search" placeholder="Search"> -->
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                           <!--  <img alt="" src="<?php echo $template_url_img;?>/avatar1_small.jpg"> -->

                            <img  style="height:35px;" alt="" src="http://www.e-codes.net/SmartRankSEO/plugins/mono_line/Themes/Images/default-user.png">


                            <span class="username">
                              <?php echo $user_info->first_name;?>
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
             <!--                <li><a href="#"><i class=" icon-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="icon-cog"></i> Settings</a></li> -->
                            <li><a href="<?php echo base_url();?>admin/notifications/view"><i class="icon-bell-alt"></i> Notification</a></li>
                            <li><a href="<?php echo base_url();?>users/logout"><i class="icon-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->