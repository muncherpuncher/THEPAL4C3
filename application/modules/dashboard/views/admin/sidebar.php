
<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">

                  <li class="active">
                      <a class="" href="<?php echo base_url('dashboard');?>">
                          <i class="icon-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                     <a class="" href="<?php echo base_url('dashboard/users');?>">
                          <i class="icon-user"></i>
                          <span>Users</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-book"></i>
                          <span> Events </span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo base_url('dashboard/events/create');?>"> Add New </a></li>
                          <li><a class="" href="<?php echo base_url('dashboard/events');?>"> View List </a></li>
                      </ul>
                  </li>
                 
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
</aside>