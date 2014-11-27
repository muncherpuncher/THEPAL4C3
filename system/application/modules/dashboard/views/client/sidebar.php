<!--sidebar start-->
<aside>

    <div id="sidebar">
  <!-- sidebar menu start-->
  <ul class="sidebar-menu" id="nav-accordion">
    <li>
      <a href="<?php echo base_url('dashboard/profile');?>">
        <i class="icon-user"></i> 
        <span> Profile </span>
      </a>
    </li>
    <li class="">
      <a href="<?php echo base_url('dashboard/analytics');?>">
        <i class="glyphicon glyphicon-signal"></i> 
        <span> Analytics </span>
      </a>
    </li>
    <li class="">
     <a href="<?php echo base_url('dashboard/businesses');?>">
        <i class="icon-briefcase"></i> 
        <span> Business Listings </span>
      </a>
    </li>
    <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-cogs"></i>
                      <span>Account Settings</span>
                      <span class="arrow"></span>
                  </a>
                  <ul style="display: none;" class="sub">
                      <li><a href="<?php echo base_url('dashboard/account/general');?>">General</a></li>
                      <li><a href="<?php echo base_url('dashboard/account/billing');?>">Billing</a></li>
                      <li><a href="<?php echo base_url('dashboard/account/support');?>"> Support </a></li>
                  </ul>
              </li>
  </ul>
  <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->