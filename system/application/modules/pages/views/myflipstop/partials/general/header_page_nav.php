<?php 
$listing_categories = $this->db->get_where('tpl_business_categories',array('parent'=>''))->result(); 
$user_info = $this->db->get_where('clients_personal_info',array('users_id'=>$this->session->userdata('user_id')));
?>
<div class="row text-center">
	<div class="col-lg-12 fs-header-top">
		<div class="btn-group menu-button-group-fs pull-left">
		  <button type="button" class="btn btn-default dropdown-toggle menu-button-fs" style="background:none;color:#FF4747" data-toggle="dropdown">
		    <span> ... </span> 
		  </button>
		  <ul class="dropdown-menu menu-dropdown-fs" role="menu">
		    <li>

		    	<div class="fs-header-menu">

		    		<?php foreach ($listing_categories as $key):?>
		    		<div class="col-md-2 business-types">
		    			<ul>	
		    				<li> <img src="<?php echo base_url();?>_assets/<?php echo $theme;?>/img/menu-icons/<?php echo $key->icon;?>"> </li>
		    				<li> <b> <?php echo ucfirst($key->name);?> </b> </li>
		    				<?php  $child_cat = Modules::run('tmpl_business_categories/get_list_child_by_parent_name',$key->name);?>
		    				<?php foreach ($child_cat->result() as $key):?>
							<li> <a href="#"> <?php echo $key->lev2;?> </a></li>
		    				<?php endforeach;?>
		    			</ul>
		    		</div>
		    		<?php endforeach;?>

		    		<div class="col-md-2 profile">
		    			<ul class="user-info text-center">
		    				<li> 
		    					<?php if($user_info->row()->photo=="none"):?>
			    					<?php if($user_info->row()->gender=="Male"):?>
			    					<img class="thumbnail" src="<?php echo $template_url_img;?>/menu-icons/icon_male.gif"> 
			    					<?php endif;?>
			    					<?php if($user_info->row()->gender=="Female"):?>
			    					<img class="thumbnail" src="<?php echo $template_url_img;?>/menu-icons/icon_female.gif"> 
			    					<?php endif;?>
		    					<?php endif;?>
		    					<?php if($user_info->row()->photo!="none"):?>
		    					<img class="thumbnail" src=""> 
		    					<?php endif;?>
		    					
		    				</li>
		    				<li style="margin-top:-13px;z-index:2"> 
		    					<b> <?php echo ucfirst($user_info->row()->first_name);?></b>
		    					 <?php echo ucfirst($user_info->row()->country);?>
		    				</li>		    		    
		    			</ul>
		    			<br>
		    			<ul class="user-links text-left">	
		    				<li>
			    				<img class="pull left" src="<?php echo $template_url_img;?>/menu-icons/icon_like.png">	
			    				<span> <a href="#" id="listLikes"> Likes </a> </span> 
		    				</li>
		    				<li>
			    				<img class="pull left" src="<?php echo $template_url_img;?>/menu-icons/icon_favorite.png">	
			    				<span>  <a href="#" id="listFavorites"> Favorites </a></span> 
		    				</li>
		    				<li>
			    				<img class="pull left" src="<?php echo $template_url_img;?>/menu-icons/icon_bucket.png">	
			    				<span>  <a href="#" id="listBuckets"> Bucket List </a></span> 
		    				</li>
		    				<li>
			    				<img class="pull left" src="<?php echo $template_url_img;?>/menu-icons/icon_friends.png">	
			    				<span> <a href="<?php echo base_url('friends');?>">  Friends </a> </span> 
		    				</li>
		    				<li>
			    				<img class="pull left" src="<?php echo $template_url_img;?>/menu-icons/icon_logout.png">	
			    				<span> <a href="<?php echo base_url('logout');?>">  Logout </a> </span> 
		    				</li>

		    			</ul>
		    		
		    		</div>

		    		
		    	</div>
		    	<div class="col-lg-8 fs-header-menu-footer">
		    		<div class="pull-left">
		    			<a target="_blank" href="<?php echo base_url('business/about');?>">About</a> <b style="font-size:20px;"> &middot; </b> <a href="<?php echo base_url('business');?>" target="_blank">Are you a business ?</a> 
		    		</div>
		    		<div class="pull-right">
		    			<a target="_blank" href="<?php echo base_url('terms');?>">Terms of Service</a>  |  <a href="<?php echo base_url('privacy');?>" target="_blank"> Privacy Policy </a> 
		    		</div>	
		    	</div>

		    	
		    </li>
		    
		  </ul>
		</div>

		<div class="col-lg-6 pull-left header-greeting text-left">
		  	<h5> <span class="text">Hi</span> <span class="name"> <b> <?php echo ucfirst($user_info->row()->first_name);?></b>!</span> <span class="text">Kamusta!</span> </h5>
		</div>
		<div class="col-lg-3 pull-right">
	        <div class="input-group">
	       		<input type="text" class="fs-header-search form-control" id="search_keyword" placeholder="Search">
	          	<span class="input-group-btn">
	              	<button class="form-control btn" id="btn_search" type="button" style="width:50px;">
	              		<span class="glyphicon glyphicon-search gly-fs-color"></span>
	            	</button>
	         	</span>
	         </div><!-- /input-group -->
	    </div>
	    <!--- Pending Requests -->
		<div class="social-pending-friend-requests-menu btn-group menu-button-group-fs pull-right">
		  <button type="button" class="btn-user btn btn-default dropdown-toggle menu-button-fs" style="background:none;color:#FF4747" data-toggle="dropdown">
		    <span class="glyphicon glyphicon-user"></span> 
		  </button>
		  <ul class="dropdown-menu menu-dropdown">
		  	<?php if(count($friends_pending_request->result()) < 1):?>
		  	<li> No pending requests </li>
		  	<?php endif;?>

		  	<?php 

		  	$image="";
		  	$friend_id = "";

		  	?>

		  	<?php if(count($friends_pending_request->result()) > 0):?>
			  	<?php foreach ($friends_pending_request->result() as $key):?>
	
			  		<?php 

			  		if($key->friend_two_id == $this->session->userdata('user_id'))
			  		{
			  			$friend_id = $key->friend_one_id;
			  		}
			  		else if($key->friend_one_id == $this->session->userdata('user_id'))
			  		{
			  			$friend_id = $key->friend_two_id;
			  		}

			  		?>
					<?php $friend_info = Modules::run('clients_personal_info/get_info',$friend_id);?>
				    <?php if($friend_info->row()->photo=="none" && strtolower($friend_info->row()->gender)=="female"):?>
		          	<?php $image = $template_url_img.'/menu-icons/icon_female.gif';?>
		          	<?php endif;?>
		          	<?php if($friend_info->row()->photo=="none" && strtolower($friend_info->row()->gender)=="male"):?>
		          	<?php $image = $template_url_img.'/menu-icons/icon_male.gif';?>
		          	<?php endif;?>
				    <li>
				    	<div class="col-lg-12">
				    		<div class="pull-left">
				    			<img height="35px" src="<?php echo $image;?>" title="<?php echo $friend_info->row()->first_name;?>">
				    			<?php echo $friend_info->row()->first_name;?>
				    		</div>
				    		<div class="pull-right">
				    			<button class="btn-add-friend btn btn-primary" id="<?php echo base64_encode($friend_id);?>"> Confirm </button>
				    		</div>	
				    	</div>
				    </li>
			
				<?php endforeach;?>
			<?php endif;?>
		  </ul>
		</div>
		<!--- Pending Requests -->
	
	</div>
	<hr class"hr-fs">
	<div class="text-center fs-header-logo">
		<a href="<?php echo base_url();?>"> <img height="70px" src="<?php echo base_url('_assets/'.$theme.'/img/fs_logo_dark.jpg');?>"> </a>
	</div>
	<hr class"hr-fs">
	<div style="font-size:12px;margin:6px"> 
		<h5><?php echo $page_header_title;?></h5>
    </div>
    <div class="app-alert alert alert-success fade in col-lg-10 center-block">
	  <button data-dismiss="alert" class="close close-sm" type="button">
	      <small>X</small>
	  </button>
	  <p>..</p>
	</div>
	<div class="app-alert alert alert-danger fade in col-lg-10 center-block" id="app-alert">
	  <button data-dismiss="alert" class="close close-sm" type="button">
	      <small>X</small>
	  </button>
	  <p>...</p>
	</div>
	<div class="app-alert alert alert-info fade in col-lg-10 center-block">
	  <button data-dismiss="alert" class="close close-sm" type="button">
	       <small>X</small>
	  </button>
	  <p>...</p>
	</div>

</div>

<script>

$("#btn_search").click(function(){
searchFS();
});

$(document).on('click','.social-pending-friend-requests-menu .btn-add-friend',function(){
	socialApproveFriendRequest($(this).attr('id'));
});

// $(".social-pending-friend-requests-menu .dropdown-menu menu-dropdown").niceScroll({ autohidemode: true });
$(".dropdown-menu").width(($( window ).width() - 30));
$(".fs-header-menu div").width('12.5%');



</script>


