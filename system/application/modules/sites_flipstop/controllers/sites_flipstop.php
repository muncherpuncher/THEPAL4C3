<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sites_flipstop extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {

        parent::__construct();
		$this->_data                      = new stdClass;

		// load Library 
		
		$this->load->library('email');
		$this->load->helper('string');

		// View Template and Layout
		$this->_site_info = $this->db->get_where('sites',array('id'=>SITE_ID))->row();
		$this->_site_menu = array();
		$this->_page_info = array();
		$this->_view_theme_name = $this->_site_info->theme;
        $this->_view_theme_layout = "layout_sections";
        $this->_user_info = array();

        // Load Pages
		$pages = Modules::run('pages/get_pages');

		foreach ($pages as $key) {	
			$this->_site_menu[''.$key->name.''] = array( 'name'=>$key->name, 'url'=>base_url() . strtolower($key->slug) );
		}

		//Get User Role
		if($this->session->userdata('is_logged_in')==1)
		{

			// Get user info
			$this->_user_info = Modules::run('clients_personal_info/get_info',$this->session->userdata('user_id'));
			$this->_listing_categories = Modules::run('tmpl_business_categories/get_list_parent');
			$this->_pending_friend_request = Modules::run('social_friends/get_pending_friends_list',$this->session->userdata('user_id'));
			$this->_friend_list = Modules::run('social_friends/get_friends_list',$this->session->userdata('user_id'));
	
		}

		
    }

    public function chat()
    {
  //   	$data['view_file'] = "tpl_chat";
		// echo Modules::run('template/set_template_site_flipstop',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);

    }

    //## Views ##// 
	public function index($section = NULL,$sub_section = NULL)
	{		
	
		
		if($section!="")
		{
			switch ($section) 
			{
				case 'collections':
							
						if($sub_section!="")
						{
							$this->view_listings($section,$sub_section);
						}
						

					break;
				
				default:
					# code...
					break;
			}
		}	
		else
		{
			$this->view_listings();
		}
		


	}

	public function view_listings($section = NULL,$sub_section = NULL)
	{
	
	
		$this->_page_info = Modules::run('pages/get_info','home');
	
		if($this->session->userdata('is_logged_in')==1)
		{
			// Check if lat and lng is set for the matrix
			if(isset($_COOKIE["fs_lat"]) && !isset($_COOKIE["fs_lng"]))
			{	
				redirect('geoip-checkpoint');
			}
			else
			{	

				$view_type =  $this->uri->segment(1);

				

				
				$user_lat = $_COOKIE["fs_lat"]; 
				$user_lng = $_COOKIE["fs_lng"];
				$max = 0;
				$data = array();
			
				$result = Modules::run('clients_business_branches/get_list_nearest',$user_lat,$user_lng,$max);
				$total_count = count($result->result());
//
//				echo '<pre>';
//				var_dump($result->result());

				switch ($view_type) {
					case 'collections':
						# code...
						break;
					
					default:
						# code...
						break;
				}	

				


				// Iterate through the rows
				foreach ($result->result() as $key) {

					$source = $key->source;
					$business_id = $key->id;
					$business_info = "";
					$business_name = "";
					$business_category_array = "";
					$business_category = "";
					$business_ownership = "";

				    $image_width = "";
		            $image_height = "";
		            $image_info = "";
		            $image_filename = "";
		            $image_tile_size = "";

					switch ($source) {

						case 'close':

								$business_info = Modules::run('clients_business_branches/get_info',$business_id);
								
								if(count($business_info->result())>0)
								{
									$business_name = $business_info->row()->name;
          							$business_category = Modules::run('tmpl_business_categories/get_info_by_id',$business_info->row()->category);
          							$business_category = Modules::run('tmpl_business_categories/get_info_by_id',$business_category->row()->parent);
          							$business_category = $business_category->row()->name;
          							$business_ownership = "close";
          							$image_info = Modules::run('clients_business_images/get_info_by_branch_id',$business_id);
									$image_size_info = Modules::run('tmpl_ad_rates/get_info_by_name',$image_info->row()->size);
						            $image_filename = base_url('_assets/_media_uploads/images/business/tiles/'.$image_info->row()->filename);
						           	$image_tile_size = $image_info->row()->size;
						           	$image_width = $image_size_info->row()->size_width;
									$image_height = $image_size_info->row()->size_height;
									
						        }
		
							break;

						case 'open':

								$business_info = $this->db->query("SELECT * FROM `default_businesses` WHERE id='".$business_id."'");

								if(count($business_info->result())>0)
								{		

									$array_image = array('single','double','quad');
									$array_image_rand = $array_image[mt_rand(0, count($array_image) - 1)];
									$business_name = $business_info->row()->name;
									$business_category = Modules::run('tmpl_business_categories/get_info_by_id',$business_info->row()->category);
          							$business_ownership = "open";
          							$image_info = Modules::run('tmpl_business_categories/get_info_by_parent_name',$business_category);
									
          							if(count($image_info->result()) < 1 )
          							{	
          								$image_filename = base_url('_assets/myflipstop/img/tile-covers/icon_shop.png');
							      
          							}
          							else
          							{
          								$image_filename = base_url('_assets/myflipstop/img/tile-covers/'.$image_info->row()->tile);
          							}	

      								$image_tile_size = 'single';
      								$image_size_info = Modules::run('tmpl_ad_rates/get_info_by_name',$image_tile_size);
						           	$image_width = $image_size_info->row()->size_width;
									$image_height = $image_size_info->row()->size_height;
						
						        }

							break;
						default:
							# code...
							break;
					}




                    switch ($image_tile_size) {
                      case 'single':
                        $business_name = strlen($business_name) > 16 ? substr($business_name, 0,16).'...'  : $business_name;     
                        break;
                      case 'double':
                        $business_name = strlen($business_name) > 30 ? substr($business_name, 0,30).'...'  : $business_name;     
                        break;
                      case 'quad':
                        $business_name = strlen($business_name) > 40 ? substr($business_name, 0,40).'...'  : $business_name;     
                        break;
                      default:
                        # code...
                        break;
                    }

                 


					$data[] = array(

									'business_name'=> ucfirst($business_name),
									'business_category'=> $business_category,
									'business_ownership'=>$business_ownership,
									'image_filename'=> $image_filename,
									'image_width'=> $image_width,
									'image_height'=> $image_height,
									'image_tile_size' => $image_tile_size,
									'source'=> $key->source,
									'id'=> $key->id,
									'lat'=> $key->lat,
									'lng'=> $key->lng,
									'distance'=> number_format($key->distance,2)

								 );
					
				}

				$data['businesses'] = $data;
				$data['user_info'] = $this->_user_info;
				$data['friends_pending_request'] = $this->_pending_friend_request;
				
				$this->_view_template_layout = "layout_sections";
				$data['tile_img_url'] = '_assets/_media_uploads/images/business/tiles/';
				$data['listing_categories'] = $this->_listing_categories;
				$data['page_header_title'] = 'Just want to browse? Here are a list of businesses near you.';
				$data['view_file'] = "home";
				$data['site_info'] = $this->_site_info;
				$data['page_menu'] = $this->_site_menu;
				$data['page_info'] = $this->_page_info;
				echo Modules::run('themes/load',$this->_view_theme_name,$this->_view_theme_layout,$data);		

			} 
	
		}
		else
		{	

			redirect(base_url('sign-in'));
			
		}
	}

	public function randomPrefix($length)
	{
		$random= "";

		srand((double)microtime()*1000000);

		$data = "AbcDE123IJKLMN67QRSTUVWXYZ";
		$data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
		$data .= "0FGH45OP89";

		for($i = 0; $i < $length; $i++)
		{
		$random .= substr($data, (rand()%(strlen($data))), 1);
		}

		return $random;
	}


	public function view_friends()
	{	
		if($this->session->userdata('is_logged_in')==1 && $this->session->userdata('user_type')=="basic")
		{


			// Set section 
			$this->session->set_userdata(array('page_section'=>'friends'));
			// Load data and view
			$this->_view_template_layout = "layout_sections";
			$data['listing_categories'] = $this->_listing_categories;
			$data['friends_pending_request'] = $this->_pending_friend_request;
			$data['user_info'] = $this->_user_info;
			$friends_data = array();
			$friend_id = "";
			
			$friends_info = $this->_friend_list;
			
			foreach ($friends_info->result() as $key) {
				

				if($key->friend_two_id == $this->session->userdata('user_id'))
		  		{
		  			$friend_id = $key->friend_one_id;
		  		}
		  		else if($key->friend_one_id == $this->session->userdata('user_id'))
		  		{
		  			$friend_id = $key->friend_two_id;
		  		}

				$friend_info = Modules::run('clients_personal_info/get_info',$friend_id);
				$is_off_line = Modules::run('social_friends/check_user_presence',$friend_id); 
				$user_info = Modules::run('users/get_info',USERTYPE,'',$friend_id);
			
				$friends_data = array(

							 	'friend_info' => array(

									 			 'presence' => $is_off_line,
									 			 'user_id' => base64_encode($user_info->row()->id),
									 			 'name' => $friend_info->row()->first_name,
												 'gender' => $friend_info->row()->gender,
												 'photo' => $friend_info->row()->photo

									 			)


							 );

			}


			$data['friends'] = $friends_data;
			$data['page_header_title'] = 'Your Flipstop Friends';
			$data['view_file'] = "tpl_friends";

			echo Modules::run('template/set_template_site_flipstop',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);
	
		}
		else
		{	
			$this->view_login();
		}
	}

	public function view_messages()
	{		
		if($this->session->userdata('is_logged_in')==1 && $this->session->userdata('user_type')=="basic")
		{

			$data['listing_categories'] = $this->_listing_categories;
			$data['user_info'] = $this->_user_info;
			$data['page_header_title'] = 'Messages';
			$data['view_file'] = "tpl_messages";
			echo Modules::run('template/set_template_site_flipstop',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);

		}
		else
		{
			$this->view_login();
		}
	}
	

	public function view_geo()
	{
		$data['view_file'] = "tpl_geo";
		echo Modules::run('template/set_template_site_flipstop',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);

	}

	public function view_about() {
		$data['view_file'] = "tpl_about";
		echo Modules::run('template/set_template_site_flipstop',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);
	}

	public function view_login() {

		if($this->session->userdata('is_logged_in') == 1)
		{
			redirect(base_url());
		}
		else
		{
			$data['view_file'] = "tpl_login";
			echo Modules::run('template/set_template_site_flipstop',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);
		
		}
	}

	public function view_privacy() {
		$data['view_file'] = "tpl_privacy_policy";
		echo Modules::run('template/set_template_site_flipstop',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);
	}

	public function view_terms() {
		$data['view_file'] = "tpl_terms_and_conditions";
		echo Modules::run('template/set_template_site_flipstop',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);
	}	

	public function view_forgot_password() {
		$data['view_file'] = "tpl_forgot_password";
		echo Modules::run('template/set_template_site_flipstop',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);
	}	

	public function view_registration_welcome()
    {	
    
    	$new_user_data = $this->session->userdata('new_user');
    	if($new_user_data)
    	{	
    		$data['firstname'] = $new_user_data['firstname'];
    		$data['view_file'] = "tpl_welcome_registration";
			echo Modules::run('template/set_template_site_flipstop',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);				

    	}
    	else
    	{
    		$this->session->set_userdata(array('new_user'=>FALSE));
    		redirect(base_url());
    	}
    }

    public function view_activation_welcome()
    {	

    	$data['view_file'] = "tpl_welcome_activation";
		echo Modules::run('template/set_template_site_flipstop',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);				
    	
    }

	public function view_register() {

		$data['countries_list'] = Modules::run('tmpl_countries/get_list');
		$data['state_list'] = Modules::run('tmpl_city_state_region/get_list_regions');
		$data['cities_list'] = Modules::run('tmpl_city_state_region/get_list_cities');
		$data['zip_list'] = Modules::run('tmpl_city_state_region/get_zip_code');

		$data['view_file'] = "tpl_register";
		echo Modules::run('template/set_template_site_flipstop',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);
	}

	
	public function view_contact() {
		if($_POST) {              
            $this->load->helper(array('form'));
            $this->load->library(array('form_validation', 'email', 'typography'));
             
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('message', 'Message', 'required');
              
            $data['error'] = FALSE;
             
            if ($this->form_validation->run() == FALSE) {
                $data['msg'] = validation_errors();
                $data['error'] = TRUE;
            } else {   

                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $subject = $this->input->post('subject');
                $message = $this->input->post('message');
                
                $message = array(
                        'name'    => $name,
                        'subject' => $subject,
                        'message' => $this->typography->nl2br_except_pre($message),
                        'email'   => $email
                );

                $status = $this->email->send_email(HTTP_ROUTE_TYPE,$email, 'no-reply@x.com', 'x User Account', $message, 'contact_us');

                if($status === TRUE) {
                    $data['error'] = FALSE;
                    $data['msg'] = "Successfully Sent";
                } else {
                    $data['error'] = TRUE;
                    $data['msg'] = "Can't send at this moment";
                }              
            }
        }
	
		$data['view_file'] = "tpl_contact";
		echo Modules::run('template/set_template_site_flipstop',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);		
	}
	
	public function view_account_verified()
	{
		$data['view_file'] = "tpl_user_account_verified";
		$data['message'] = "Congratulations! you're account is now verified";
		echo Modules::run('template/set_template_site_flipstop',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);		
	}


	public function error_404() {
		$data['view_file'] = "tpl_404";
		echo Modules::run('template/set_template_site_flipstop',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);				
	}

	public function view_payment_response($message,$message_body)
	{	
		$data['message'] = $message;
		$data['message_body'] = $message_body;
		$data['redirect_url'] = '';
		$data['view_file'] = "tpl_payment_response.php";
		echo Modules::run('template/set_template_site_flipstop',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);				
	}




	//## Processes ##//

	public function process_login()
	{
		if($_POST)
		{
			echo Modules::run('users/auth',USERTYPE);
		}
	}

	public function process_logout()
	{
		$data = array(
			  			'is_logged_in'=>0,
			  			'user_id'=>'',
			  			'user_fullname' => '',
			  			'username' => ''
			  		 );

 		$this->session->set_userdata($data);

 		$this->view_login();

	}

	public function process_is_logged_in()
	{	
		// $is_logged_in = Modules::run('users/check_session',USERTYPE);
		// echo $is_logged_in == TRUE ? json_encode(array('success'=>TRUE)) : json_encode(array('success'=>FALSE));
		
	}


	public function process_email_isexist()
	{
		if($_POST)
		{
			echo Modules::run('users/email_is_exists',USERTYPE);
		}
	}

	public function process_reset_password()
	{	
		if($_POST)
		{	

 			$email = $this->input->post('email');
 			$password = $this->input->post('password');

 			$data = array(
 							'password' => $password,
 							'email' => $email
 						 );
 			

			echo Modules::run('users/reset_password',USERTYPE,$data);

		}
		
	}

	public function process_register()
	{
		if($_POST)
		{	
			echo Modules::run('users/register',USERTYPE);
			$user_id = $this->db->insert_id();
			echo Modules::run('users_access_roles/save',$user_id,USERTYPE);
			echo Modules::run('clients_personal_info/save',$user_id,USERTYPE);
			$user_personal_info = Modules::run('clients_personal_info/get_info',$user_id);
			$user_info =  Modules::run('users/get_info',USERTYPE,$user_personal_info->row()->email);
		
	        $verification_url = base_url().'users/verify/';

 			$verification_code = random_string('alnum', 24);
		 	echo Modules::run('users/save_email_verification',$verification_code,$user_info->row()->username);
		 	$email = base64_encode($user_info->row()->username);

			// Send Mail
	        $message = array(
	             'name' => $user_personal_info->row()->first_name,
	             'verification_url' => $verification_url.$verification_code.'/'.$email
	        );

	        // Set new user session
	        $this->session->set_userdata(array('new_user'=>TRUE));

	        $from_name = Modules::run('tmpl_email_list/get_list_by_name','EM7');
			$status = $this->email->send_email(HTTP_ROUTE_TYPE,$this->input->post('email'), strtolower(trim($from_name->row()->email)), 'FlipStop User Account', $message, 'registration');
			echo json_encode(array('success'=>true,'message'=>'Thank you for signing up. We have sent you an email to  verify your account.','redirect_url'=> base_url('register/welcome')));

		}
	}

	public function interact_business()
	{

		if($_POST)
		{	

			if($this->session->userdata('is_logged_in')==1)
			{
				$type = $this->input->post('type');
				$business_id = $this->input->post('business_id');
				$interaction_info = Modules::run('clients_business_interaction/get_info_by_user_id',$type,$business_id,$this->session->userdata('user_id'));
						
				if(count($interaction_info->result())>0)
				{

				}
				else
				{
				 	echo Modules::run('clients_business_interaction/save',$type,$business_id,$this->session->userdata('user_id'));
					echo json_encode(array('success'=>true,'message'=>''));
				}

			}
			else
			{
				echo json_encode(array('success'=>false,'message'=>'You have to login to interact'));
			}
			
			

		}


	}
	
	public function delete_business_collection($collection_id)
	{
		echo Modules::run('clients_business_collections/delete',$collection_id);
	}


	public function add_business_collection()
	{

	

		if($_POST)
		{	
			
				$data = array(
					
		  			'is_logged_in'=>1,
		  			'user_id'=>1
		  	
			  		);

		 
			$this->session->set_userdata($data);

			$type = $this->input->post('type');
			$business_id = $this->input->post('business_id');
			$collection_info = Modules::run('clients_business_collections/get_info_by_user_collection',$type,$business_id,$this->session->userdata('user_id'));
			
			if(count($collection_info->result())>0)
			{
				$this->delete_business_collection($collection_info->row()->id);
				$icon_info = Modules::run('tmpl_business_collections_icons/get_info_by_name',$type);
				echo json_encode(array('success'=>true,'collection_status'=>'inactive','icon_image'=>$icon_info->row()->icon_active,'icon_title'=>$icon_info->row()->title));
			}
			else
			{	
				$icon_info = Modules::run('tmpl_business_collections_icons/get_info_by_name',$type);
			 	echo Modules::run('clients_business_collections/save',$type,$business_id,$this->session->userdata('user_id'));
				echo json_encode(array('success'=>true,'message'=>'','collection_status'=>'active','icon_image'=>$icon_info->row()->icon_inactive,'icon_title'=>$icon_info->row()->title));
			}

			
		}


	}


	public function process_friends_presence()
	{	
		$user_id = base64_decode($this->input->post('username'));
		$is_off_line = Modules::run('social_friends/check_user_presence'); 
		echo json_encode(array('status'=>$is_off_line)) ;
	}

	public function process_search_friends($search_keyword)
	{		

			$data = array();

			// Check if they are searching for an email address
			if(filter_var($search_keyword, FILTER_VALIDATE_EMAIL))
			{	
			    $sql = "SELECT id,username,type
			            FROM users 
			            WHERE MATCH(username) AGAINST('".$search_keyword."')";

			    $query = $this->db->query($sql);


	            if($query->num_rows() > 0)
				{
			
					foreach ($query->result() as $key) {

						$user_personal_info = Modules::run('clients_personal_info/get_info',$key->id);
						$user_info = Modules::run('users/get_info',USERTYPE,'',$key->id);
						$background_image = "";

						if($user_personal_info->row()->photo=="none" && strtolower($user_personal_info->row()->gender)=="female"):
				        $background_image = base_url('_assets/sites_flipstop/default/img/').'/menu-icons/icon_female.gif';
				        endif;

			            if($user_personal_info->row()->photo=="none" && strtolower($user_personal_info->row()->gender)=="male"):
			            $background_image = base_url('_assets/sites_flipstop/default/img/').'/menu-icons/icon_male.gif';
			            endif;

			            $is_off_line_info = Modules::run('social_friends/check_user_presence',$key->id); 
			 
			            
						if($user_info->row()->type=="basic")
						{
							$data[] = array(

											'user_id' => base64_encode($user_info->row()->id),
											'last_name' => $user_personal_info->row()->last_name,
											'first_name' => $user_personal_info->row()->first_name,
											'photo' => $background_image,	
											'gender' => $user_personal_info->row()->gender,
											'username' => base64_encode($user_info->row()->username),
											'presence' => $is_off_line_info == FALSE ? 'online' : 'offline'

										);
						}

					}

					return $data;
				

				}

			
			}
			else
			{
			    $sql = "SELECT users_id,last_name,first_name,photo
			           	FROM clients_personal_info as score
			      		WHERE MATCH(first_name,last_name) AGAINST('".$search_keyword."')";

			    $query = $this->db->query($sql);

			    if($query->num_rows() > 0)
				{

					foreach ($query->result() as $key) {

						$user_personal_info = Modules::run('clients_personal_info/get_info',$key->users_id);
						$user_info = Modules::run('users/get_info',USERTYPE,'',$key->users_id);
						$background_image = "";

						if($user_personal_info->row()->photo=="none" && strtolower($user_personal_info->row()->gender)=="female"):
				        $background_image = base_url('_assets/sites_flipstop/default/img/').'/menu-icons/icon_female.gif';
				        endif;

			            if($user_personal_info->row()->photo=="none" && strtolower($user_personal_info->row()->gender)=="male"):
			            $background_image = base_url('_assets/sites_flipstop/default/img/').'/menu-icons/icon_male.gif';
			            endif;

			            $is_off_line_info = Modules::run('social_friends/check_user_presence',$key->users_id); 
			 
			            
						if($user_info->row()->type=="basic")
						{
							$data[] = array(

											'user_id' => base64_encode($user_info->row()->id),
											'last_name' => $user_personal_info->row()->last_name,
											'first_name' => $user_personal_info->row()->first_name,
											'photo' => $background_image,	
											'gender' => $user_personal_info->row()->gender,
											'username' => base64_encode($user_info->row()->username),
											'presence' => $is_off_line_info == FALSE ? 'online' : 'offline'

										);
						}

						
					}


					return $data;

						

				}
				

			} 


		


				
		
		
		
	}

	public function process_search()
	{

		if($_POST)
		{	
			$search_keyword = $this->input->post('search_keyword');
			$search_section = $this->session->userdata('page_section');
			$search_data = array();
			
			switch ($search_section) {
				case 'friends':
						$search_data = $this->process_search_friends($search_keyword);	
						echo json_encode(array('search_category'=>$search_section,'results'=>$search_data));					
					break;
				
				default:
					# code...
					break;
			}

			
		
		}



	}


	public function process_request_friend()
	{
		if($_POST)
		{	
			// Check if friend already added
			$friend_request_info = Modules::run('social_friends/get_friend_info',$this->session->userdata('user_id'),base64_decode($this->input->post('id')));

			if(count($friend_request_info->result())>0)
			{
				echo json_encode(array('success'=>FALSE,'message'=>'You have already added this member'));
			}
			else
			{

					$data = array(
									'friend_one_id' => $this->session->userdata('user_id'), 
									'friend_two_id' => base64_decode($this->input->post('id')),
									'status_flag' => 0,
									'date_created' => date('Y-m-d H:i:s A')
								 );

					echo Modules::run('social_friends/request_friend',$data);
					echo json_encode(array('success'=>true,'message'=>'We have successfully sent your request'));
			}


		}
	}

	public function process_approve_friend()
	{
		if($_POST)
		{	

			$data = array(
							'friend_one_id' => $this->session->userdata('user_id'), 
							'friend_two_id' => base64_decode($this->input->post('id')),
							'status_flag' => 0
						 );

			echo Modules::run('social_friends/approve_friend',$data);
			echo json_encode(array('success'=>true,'message'=>'Friend added'));

			
		}
	}


	public function generate_business_code($length,$prefix = '') 
	{
	    $alphabets = range('A','Z');
	    $numbers = range('0','9');
	    $additional_characters = array('_','.');
	    $final_array = array_merge($alphabets,$numbers);
	         
	    $password = '';
	  
	    while($length--) {
	      $key = array_rand($final_array);
	      $password .= $final_array[$key];
	    }
	  
	    return $prefix . $password;
	 }


	 public function page($slug)
	 {
	 	echo $slug;
	 	
	 }
    
    function update_lat_lng()
    {
        echo modules::run('admin_default_businesses/update_geocode');
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */