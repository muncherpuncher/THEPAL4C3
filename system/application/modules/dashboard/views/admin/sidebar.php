
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
                     <a class="" href="<?php echo base_url('dashboard/businesses');?>">
                          <i class="icon-briefcase"></i>
                          <span> Businesses </span>
                      </a>
                  </li>
<li class="sub-menu">
<a href="javascript:;" class="">
<i class="icon-cogs"></i>
<span> Billing </span>
<span class="arrow"></span>
</a>
<ul style="display: none;" class="sub">
<li><a href="<?php echo base_url('dashboard/billing/active');?>"> Active </a></li>
<li><a href="<?php echo base_url('dashboard/billing/due');?>"> Due </a></li>
</ul>
</li>

                  <li class="sub-menu">
                     <a class="" href="<?php echo base_url('dashboard/crm');?>">
                          <i class="icon-comment"></i>
                          <span> CRM </span>
                      </a>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
</aside>