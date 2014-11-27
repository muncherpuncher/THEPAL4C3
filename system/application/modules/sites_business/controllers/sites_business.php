<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sites_business extends MX_Controller {

	function __construct() {

        parent::__construct();
		$this->_data                      = new stdClass;

		// load Library 
		
		$this->load->library('email');
		$this->load->library('redirection');
		$this->load->helper('form');

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
		}

	}


	
	public function index()
	{
		$data['view_file'] = "home";
		$data['site_info'] = $this->_site_info;
		$data['page_menu'] = $this->_site_menu;
		$data['page_info'] = $this->_page_info;
		echo Modules::run('themes/load',$this->_view_theme_name,$this->_view_theme_layout,$data);		

	}


	public function view_account()
	{	
		if($this->session->userdata('is_logged_in')==0)
		{
			redirect(base_url('business'));
		}
		else
		{
			echo Modules::run('dashboard_client/index');
		}
	}

	

	public function view_advertiser_agreement()
	{	
		$data['view_file'] = "tpl_advertiser_aggreement";	
		echo Modules::run('template/set_template_site_business',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);		
	}

	public function view_plans()
	{	
		$data['view_file'] = "tpl_plans";	
		echo Modules::run('template/set_template_site_business',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);		
	}


	public function view_signin_list()
	{	
		if($this->session->userdata('is_logged_in')==0)
		{
			redirect(base_url('business/signin'));
		}
		else if($this->session->userdata('is_logged_in')==1)
		{
			$data['view_file'] = "tpl_list_business";	
			echo Modules::run('template/set_template_site_business',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);		
		}
	}

	public function view_download_app()
	{
		$data['view_file'] = "tpl_download_app";	
		echo Modules::run('template/set_template_site_business',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);		
	}

	public function view_refer_business()
	{	
		$data['list_business_categories_parent'] = Modules::run('tmpl_business_categories/get_list_parent');
		$data['view_file'] = "tpl_refer_business";	
		echo Modules::run('template/set_template_site_business',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);		
	}

	public function view_message()
	{
		$data['view_file'] = "tpl_message";
		echo Modules::run('template/set_template_site_business',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);

	}

	//### PROCESSES ###//

	public function check_business_user_email()
	{

		if($_POST)
		{	
			$existance_count = 0;
			$email = $this->input->post('email');
			$users = $this->db->get_where('users',array('username'=>$email));
			$existance_count = $existance_count + count($users->result());
			$users_unverified = $this->db->get_where('users_verification_code',array('email'=>$email));
			$existance_count = $existance_count + count($users_unverified->result());
			
			if(count($users_unverified->result())>0)
			{
				echo json_encode(array('success'=>false));
			}
			else
			{
				echo json_encode(array('success'=>true));
			}

		}

	}

	public function check_business_listing_session()
	{

		 $is_active_on_listing = $this->session->userdata('business_reg_status');
			
		if(!$is_active_on_listing)
		{
			echo json_encode(array('session_time'=>'expired'));
		}
	}

	public function renew_business_listing_session()
	{
		$this->session->set_userdata(array('business_reg_status'=>'open'));
	}

	public function clear_business_listing_session()
	{
		// Close business listing activity
		$this->session->set_userdata(array('business_reg_status'=>''));
		$session_data = $this->db->get_where('ci_sessions',array('session_id'=>$this->session->userdata('session_id')));
		
		$data = array('user_email'=>'');
		$this->db->where('session_id',$this->session->userdata('session_id'));
		$this->db->update('ci_sessions',$data);

		if($session_data->row()->user_email!="")
		{
			// Delete temporary business listing progress
			$this->db->where('user_email',$session_data->row()->user_email);
			$this->db->delete('temp_clients_business');
			$this->db->where('user_email',$session_data->row()->user_email);
			$this->db->delete('temp_clients_business_branches');
			$this->db->where('user_email',$session_data->row()->user_email);
			$this->db->delete('temp_clients_personal_info');
		}
		
	}

	public function set_business_user_email()
	{
		if($_POST)
    	{
    		$email = $this->input->post('email');
    		$this->session->set_userdata('user_sess_info',array('email'=>$email));
    		$result = array('success'=>true);
            echo json_encode($result);
    	}

	}


	public function get_business_sub_category()
	{
		$parent = $this->input->post('parent');
		$query = Modules::run('tmpl_business_categories/get_list_child_by_parent_name',$parent);
		$data = array();
		
		foreach ($query->result() as $key) {

			if($key->lev2!="")
			{
				$data[] = array(
						'category'=>$key->lev2
				);
			}
			
		}
		echo json_encode($data);
	}

	public function register_business_user()
	{

		if($this->session->userdata('business_reg_status')=='open' && USERTYPE=='business')
		{	
			if($_POST)
			{
				$email = strtolower($this->input->post('email'));
				$verification_code = substr(md5(uniqid(rand(), true)), 8, 8);
		 		echo Modules::run('users_verification_code/save',$email,$verification_code);

		        $message = array(

		             'name' => $this->input->post('first_name'),
		             'verification_code' => $verification_code
		        );

		        $from_name = Modules::run('tmpl_email_list/get_list_by_name','EM8'); 
		        $this->session->set_userdata('user_sess_info',array('email'=>$email));
				$this->email->send_email(HTTP_ROUTE_TYPE,$email, strtolower(trim($from_name->row()->email)), 'FlipStop Business Account', $message, 'registration_business');
		
			}
		

		}
		
	}
	
	public function process_refer_business()
	{
		if($_POST)
		{	
			$fd_business_name = $this->input->post('business_name');
			$fd_business_owner = $this->input->post('business_owner');
			$fd_business_email = $this->input->post('business_email');
			$fd_business_type = $this->input->post('business_type');
			$fd_referrer_name = $this->input->post('referrer_name');
			$fd_referrer_email = $this->input->post('referrer_email');
			$fd_date_created = date('Y-m-d');

			$data = array(

				'business_name'=>$fd_business_name,
				'business_owner'=>$fd_business_owner,
				'business_email'=>$fd_business_email,
				'business_type'=>$fd_business_type,
				'referrer_name'=>$fd_referrer_name,
				'referrer_email'=>$fd_referrer_email,
				'date_created'=>$fd_date_created
			);

			$status = Modules::run('business_refer/save',$data);
				
			if($status == TRUE) {
	           // echo json_encode(array('success'=>true));

				$referral_info = Modules::run('business_refer/get_info',$this->db->insert_id());

				// Send Mail
		        $message = array(

		        	 'business_name' => $referral_info->row()->business_name,
		             'business_owner_name' => $referral_info->row()->business_owner,
		             'business_email' => $referral_info->row()->business_email,
					 'referrer_name' => $referral_info->row()->referrer_name,
					 'referrer_email' => $referral_info->row()->referrer_email,
					 'business_url' => base_url('business')

		        	);


		        $from_name = Modules::run('tmpl_email_list/get_list_by_name','EM8'); 
				$status = $this->email->send_email(HTTP_ROUTE_TYPE,$referral_info->row()->business_email, strtolower(trim($from_name->row()->email)), 'FlipStop Business Referral', $message, 'refer_business');

				if($status==TRUE)
				{
					echo json_encode(array('success'=>TRUE));
				}
				else
				{
					echo json_encode(array('success'=>false));
				}


	        } else 
	        {
	            echo json_encode(array('success'=>false));
	        }



		}

		

	}

	public function process_register_business_ini()
	{

		if($this->session->userdata('business_reg_status')=='open' && USERTYPE=='business')
		{

			// Temporarily store information until the user completes the business listing steps
			$business_name = $this->input->post('business_name');
			$business_date_registered = date('Y-m-d');
			$user_email = $this->input->post('email');


			// Include email to CI session db

			$data = array('user_email'=>$user_email);
			$this->db->where('session_id',$this->session->userdata('session_id'));
			$this->db->update('ci_sessions',$data);


			// Business Name
			$data = array(

				'name'=>$business_name,
				'date_registered'=>$business_date_registered,
				'user_email'=>$user_email
			);

			$this->db->insert('temp_clients_business', $data); 

			// Business Applicant Information
			$fd_last_name = $this->input->post('last_name');
			$fd_first_name = $this->input->post('first_name');
			$fd_middle_name = '';
			$fd_gender = '';
			$fd_photo = '';
			$fd_email = $user_email;
			$fd_password = $this->input->post('password');
			$fd_phone_number = $this->input->post('phone_number');
			$fd_title = $this->input->post('title_role');
			$fd_country = $this->input->post('country');
			$fd_address = $this->input->post('address');
			$fd_city = $this->input->post('city');
			$fd_state = $this->input->post('state');
			$fd_postal_code = $this->input->post('postal_code');


			$data = array(

				'last_name'=>$fd_last_name,
				'first_name'=>$fd_first_name,
				'middle_name'=>$fd_middle_name,
				'gender'=>$fd_gender,
				'photo'=>$fd_photo,
				'email'=>$fd_email,
				'title'=>$fd_title,
				'country'=>$fd_country,
				'address'=>$fd_address,
				'city'=>$fd_city,
				'state'=>$fd_state,
				'postal_code'=>$fd_postal_code,
				'user_email'=>$user_email,
				'password'=>md5($fd_password)
			);

			$this->db->insert('temp_clients_personal_info', $data); 



		}

	}


	public function process_register_business_fin()
	{
	
		
		if($this->session->userdata('business_reg_status')=='open' && USERTYPE=='business')
		{

			$user_sess_info = $this->session->userdata('user_sess_info');
			$user_email = $user_sess_info['email'];

			$clients_personal_info = $this->db->get_where('temp_clients_personal_info',array('user_email'=>$user_email));

			$data = array(

							'username' => $user_email,
							'password' => $clients_personal_info->row()->password,
							'access_flag'=> '1',
							'verify_flag' => '1',
							'type'=>'business',
							'date_created' => date('Y-m-d')

							);
			// Save user
			echo Modules::run('users/register',USERTYPE,$data);
			$user_id = $this->db->insert_id();

			// // Delete verification code
			// echo Modules::run('users_verification_code/delete','email',$user_email);

			echo Modules::run('users_access_roles/save',$user_id,USERTYPE);

			$data = array(

                            'users_id'=> $user_id,
                            'last_name'=> $clients_personal_info->row()->last_name,
                            'first_name'=> $clients_personal_info->row()->first_name,
                            'middle_name'=>	$clients_personal_info->row()->middle_name,
                            'gender'=> $clients_personal_info->row()->gender,
                            'email'=> $clients_personal_info->row()->email,
                            'title'=> $clients_personal_info->row()->title,
                            'country'=> $clients_personal_info->row()->country,
                            'address'=> $clients_personal_info->row()->address,
                            'city'=> $clients_personal_info->row()->city,
                            'state'=> $clients_personal_info->row()->state,
                            'postal_code'=> $clients_personal_info->row()->postal_code,
                            'phone_number'=> $clients_personal_info->row()->phone_number

                        );

			// Save client personal info
			echo Modules::run('clients_personal_info/save',$user_id,USERTYPE,$data);

			$clients_business_info = $this->db->get_where('temp_clients_business',array('user_email'=>$user_email));

			$data = array(

				'users_id'=>$user_id,
				'business_name'=>$clients_business_info->row()->name,
				'date_registered'=>date('Y-m-d')
			);


			// Save client business info
			echo Modules::run('clients_business/register',$user_id,$data);

			$business_id = $this->db->insert_id();
			$this->session->set_userdata(array('business_id'=>$business_id));


			// Fetch busienss branches
			$clients_business_branches_info = $this->db->get_where('temp_clients_business_branches',array('user_email'=>$user_email));
	
			foreach ($clients_business_branches_info->result() as $key) {
				
				$data = array(

					'name'=> $key->name,
					'description'=> $key->description,
					'address'=> $key->address,
					'city'=> $key->city,
					'state'=> $key->state,
					'postal_code'=> $key->postal_code,
					'country'=> $key->country,
					'category'=> $key->category,
					'enable_flag'=> 1,
					'date_registered'=> date('Y-m-d'),
					'phone_number'=> $key->phone_number,
					'fax_number'=> $key->fax_number,
					'mobile_number'=> $key->mobile_number,
					'web_url'=> $key->web_url,
					'ownership_flag'=>'close',
					'clients_business_id'=> $business_id
				);

				

				// Save business branches
				echo Modules::run('clients_business_branches/save',$data);

				$branch_id = $this->db->insert_id();

				// Save Branch Geo Map
				$data = array(
							
							'monday'=> $key->office_hour_monday,
							'tuesday'=> $key->office_hour_tuesday,
							'wednesday'=> $key->office_hour_wednesday,
							'thursday'=> $key->office_hour_thursday,
							'friday'=> $key->office_hour_friday,
							'saturday'=> $key->office_hour_saturday,
							'sunday'=> $key->office_hour_sunday,
							'clients_business_branches_id'=>$branch_id,
						);

				// Save business branches hours
				$this->db->insert('clients_business_branches_hours',$data);


				// Save Branch Geo Map
				$data = array(

		    				'geo_x'=> $key->geo_x,
		    				'geo_y'=> $key->geo_y,
		    				'clients_business_branches_id'=> $branch_id

							);

				echo Modules::run('clients_business_gmap/save',$data);

				$data = array(
				
					'filename'=> $key->ad_image,
					'size'=> $key->ad_size,
					'date_created'=> date('Y-m-d'),
					'clients_business_branches_id'=> $branch_id
				);

				// Save Branch image cover
				echo Modules::run('clients_business_images/save',$data);

				$source = '_assets/_media_uploads/images/business/temp/tiles/'.$key->ad_image;
				$destination =  '_assets/_media_uploads/images/business/tiles/'.$key->ad_image;
				copy($source,$destination);
				unlink($source);

			
			}

			// Save Plan
			echo Modules::run('clients_plan/register',$business_id);

			//echo Modules::run('clients_card_info/save',$user_id);
		    $user_info = Modules::run('clients_personal_info/get_info',$user_id);
		    $this->session->set_userdata(array('is_logged_in'=>1,'username'=>$user_email,'user_id'=>$user_id,'user_type'=>USERTYPE));
		    
	        // Mark as new user on session for welcoming
	        $new_user_data = array('new_user_data'=> 1,'firstname'=> $user_info->row()->first_name);
	        $this->session->set_userdata('new_user',$new_user_data);

	        // Send Email
	        $this->load->library('email');
			$this->load->helper('string');
	   		

			// Send Mail
	        $message = array(
	             'name'     => $user_info->row()->first_name
	        );

	        $from_name = Modules::run('tmpl_email_list/get_list_by_name','EM8'); 
			$status = $this->email->send_email($this->input->post('email'), strtolower(trim($from_name->row()->email)), 'FlipStop Business Account', $message, 'registration_business');
			echo json_encode(array('success'=>true,'message'=>'Thank you for signing up. We have sent you an email to  verify your account.','redirect_url'=> base_url('register/welcome')));

	        // Clear Temporary Data
			$this->db->where('user_email',$user_email);
			$this->db->delete('temp_clients_business');
			$this->db->where('user_email',$user_email);
			$this->db->delete('temp_clients_business_branches');
			$this->db->where('user_email',$user_email);
			$this->db->delete('temp_clients_personal_info');
			$this->db->where('email',$user_email);
			$this->db->delete('users_verification_code');

		
		}	

	}

	public function process_downloadapp()
	{
		$email = $this->input->post('email');
		$message = array(
                     'download_link'   => 'www.myflipstop.com/mobile/download/Htrerewe'
                );

		$from_name = Modules::run('tmpl_email_list/get_list_by_name','EM8'); 
		$status = $this->email->send_email(HTTP_ROUTE_TYPE,$email, strtolower(trim($from_name->row()->email)), 'Flipstop App Download', $message, 'download_app');

        if($status == TRUE) {
            echo json_encode(array('success'=>true));
        } else {
            echo json_encode(array('success'=>false));
        }
	}

	public function process_user_verification()
	{	
		if($_POST)
		{	
			$email = $this->input->post('email');
			$this->session->set_userdata('user_sess_info',array('email'=>$email));
			echo Modules::run('users_verification_code/verify',USERTYPE);

		}
	}

    public function add_branch()
	{
		if($_POST)
		{
            
			echo Modules::run('clients_business_branches/save');
			$branch_id = $this->db->insert_id();
			echo Modules::run('clients_business_images/save',$branch_id);
			$image_id = $this->db->insert_id();
            
			$data = array(
                          'branch_id'=>$branch_id,
                          'image_id'=>$image_id
                          );
            
			echo modules::run('cart/add_branch',$data);
            
		}
	}
    
    public function update_branch()
	{
       
		if($_POST)
		{
            $branch_id = $this->session->userdata('branch_id');
            
			$fd_branch_name = $this->input->post('branch_name');
			$fd_description = $this->input->post('biz-description');
			$fd_address = $this->input->post('address');
			$fd_city = $this->input->post('city');
			$fd_state = $this->input->post('state');
			$fd_postal_code = $this->input->post('postal_code');
			$fd_country = $this->input->post('country');
			$fd_date_registered = date('Y-m-d');
			$fd_phone_number = $this->input->post('phone_number');
			$fd_web_url = $this->input->post('web_url');
			$fd_geo_lat =  $this->input->post('geo_lat');
			$fd_geo_lng =  $this->input->post('geo_lng');
			$fd_ad_size =  $this->input->post('adimage-size');
			$fd_ad_image =  $this->input->post('upload-image-name');
			$fd_fax_number = $this->input->post('fax_number');
			$fd_mobile_number = $this->input->post('mobile_number');
			$fd_main_category = $this->input->post('business_category');
			$fd_sub_category = $this->input->post('business_sub_category');
            
			// Business Hours
			$fd_monday = strtolower($this->input->post('monday_from_time')) . ' - ' . strtolower($this->input->post('monday_to_time')) . ' - ' . strtolower($this->input->post('monday_availability'));
			$fd_tuesday = strtolower($this->input->post('tuesday_from_time')) . ' - ' . strtolower($this->input->post('tuesday_to_time')) . ' - ' . strtolower($this->input->post('tuesday_availability'));
			$fd_wednesday = strtolower($this->input->post('wednesday_from_time')) . ' - ' . strtolower($this->input->post('wednesday_to_time')) . ' - ' . strtolower($this->input->post('wednesday_availability'));
			$fd_thursday = strtolower($this->input->post('thursday_from_time')) . ' - ' . strtolower($this->input->post('thursday_to_time')) . ' - ' . strtolower($this->input->post('thursday_availability'));
			$fd_friday = strtolower($this->input->post('friday_from_time')) . ' - ' . strtolower($this->input->post('friday_to_time')) . ' - ' . strtolower($this->input->post('friday_availability'));
			$fd_saturday = strtolower($this->input->post('saturday_from_time')) . ' - ' . strtolower($this->input->post('saturday_to_time')) . ' - ' . strtolower($this->input->post('saturday_availability'));
			$fd_sunday = strtolower($this->input->post('sunday_from_time')) . ' - ' . strtolower($this->input->post('sunday_to_time')) . ' - ' . strtolower($this->input->post('sunday_availability'));
            
            
			// Ad Rate info
			$ad_rate_info = $this->db->get_where('tpl_ad_rates',array('name'=>$fd_ad_size));
            
			$data = array(
                          
                          'name'=>$fd_branch_name,
                          'description'=>$fd_description,
                          'address'=>$fd_address,
                          'city'=>$fd_city,
                          'state'=>$fd_state,
                          'postal_code'=>$fd_postal_code,
                          'country'=>$fd_country,
                          'date_registered'=>$fd_date_registered,
                          'phone_number'=>$fd_phone_number,
                          'mobile_number'=>$fd_mobile_number,
                          'fax_number'=>$fd_fax_number,
                          'web_url'=>$fd_web_url,
                          'geo_x'=>$fd_geo_lat,
                          'geo_y'=>$fd_geo_lng,
                          'ad_size'=>$fd_ad_size,
                          'ad_price'=>number_format($ad_rate_info->row()->price,2),
                          'ad_image'=>$fd_ad_image,
                          'category'=> $fd_sub_category
                          
                          );

            echo modules::run('clients_business_branches/update',$branch_id,$data);
            
            $data = array(
                          'office_hour_monday'=>$fd_monday,
                          'office_hour_tuesday'=>$fd_tuesday,
                          'office_hour_wednesday'=>$fd_wednesday,
                          'office_hour_thursday'=>$fd_thursday,
                          'office_hour_friday'=>$fd_friday,
                          'office_hour_saturday'=>$fd_saturday,
                          'office_hour_sunday'=>$fd_sunday
                          
                          );
            
           echo modules::run('clients_business_hours/update',$branch_id,$data);
 
            //return TRUE;
            
		}
	}

    
    
	public function branch_get_info()
	{
		if($_POST)
		{
            $business_id = $this->input->post('id');
            $adstatus = $this->input->post('adstatus');
            $data = array();
            
            switch ($adstatus) {
                case 'close':
                    
                    $business_info = Modules::run('clients_business_branches/get_info',$business_id);
                    $business_hours_info = Modules::run('clients_business_hours/get_info',$business_id);
                    $business_interaction_user_like_info = Modules::run('clients_business_interaction/get_info_by_user_analytic_name',$this->session->userdata('user_id'),$business_id,'like');
                    $business_interaction_user_star_info = Modules::run('clients_business_interaction/get_info_by_user_analytic_name',$this->session->userdata('user_id'),$business_id,'star');
                    $business_interaction_user_bucket_info = Modules::run('clients_business_interaction/get_info_by_user_analytic_name',$this->session->userdata('user_id'),$business_id,'bucket');
                    $business_interaction_user_checkin_info = Modules::run('clients_business_interaction/get_info_by_user_analytic_name',$this->session->userdata('user_id'),$business_id,'checkin');
                    $business_interaction_user_flare_info = Modules::run('clients_business_interaction/get_info_by_user_analytic_name',$this->session->userdata('user_id'),$business_id,'flare');
                    $business_map_info = Modules::run('clients_business_gmap/get_info_by_business_id',$business_id);
                    $business_image_info = Modules::run('clients_business_images/get_info_by_branch_id',$business_id);
                    $business_hours_days = array();
                    $business_image_filename = base_url('_assets/_media_uploads/images/business/tiles/'.$business_image_info->row()->filename);
                    $business_interactions_user = array();
                    $business_analytic_like = count($business_interaction_user_like_info->result())>0 ? 'active' : 'inactive';
                    $business_analytic_star = count($business_interaction_user_star_info->result())>0 ? 'active' : 'inactive';
                    $business_analytic_bucket = count($business_interaction_user_bucket_info->result())>0 ? 'active' : 'inactive';
                    
                    // Business hours
                    foreach ($business_hours_info->result() as $key){
                        
                        $business_hours_days = array(
                                                     
                                                     'monday' => strtoupper($key->monday),
                                                     'tuesday' => strtoupper($key->tuesday),
                                                     'wednesday' => strtoupper($key->wednesday),
                                                     'thursday' => strtoupper($key->thursday),
                                                     'friday' => strtoupper($key->friday),
                                                     'saturday' => strtoupper($key->saturday),
                                                     'sunday' => strtoupper($key->sunday)
                                                     
                                                     );
                    }
                    
                    
                    $business_interactions_user = array(
                                                        
                                                        'like' => $business_analytic_like,
                                                        'star' => $business_analytic_star,
                                                        'bucket' => $business_analytic_bucket
                                                        
                                                        
                                                        );
                    
                    foreach ($business_info->result() as $key) {
                        
						
                        $business_category = Modules::run('tmpl_business_categories/get_info_by_id',$key->category);
                        $business_category = Modules::run('tmpl_business_categories/get_info_by_id',$business_category->row()->parent);
                        $business_category = $business_category->row()->name;
                        
                        
                        $data = array(
                                      
                                      'name' => $key->name,
                                      'description' => $key->description,
                                      'address' => $key->address,
                                      'city' => $key->city,
                                      'state' => $key->state,
                                      'postal_code' => $key->postal_code,
                                      'country' => $key->country,
                                      'businesshours'=> $business_hours_days,
                                      'useranalytics'=> $business_interactions_user,
                                      'gmap_lat'=>$business_map_info->row()->x,
                                      'gmap_lng'=>$business_map_info->row()->y,
                                      'image_filename'=>$business_image_filename,
                                      'category'=>$business_category,
                                      'spot'=>'close'
                                      
                                      );
                    }
                    
                    break;
                    
                case 'open':
                    
                    $business_info = Modules::run('admin_default_businesses/get_info',$business_id);
                    
                    $data = array(
                                  
                                  'spot'=>'open',
                                  'business_code'=> $business_info->row()->business_code
                                  
                                  );
                    break;
                default:
                    # code...
                    break;
            }
            
            
            echo json_encode($data);	
            
		}
	}
    
	public function remove_branch()
	{
		echo Modules::run('clients_business_images/delete_by_branch');
		echo Modules::run('clients_business_branches/delete');
		echo json_encode(array('success'=>true,'message'=>'','redirect_url'=> ''));		
		
	}
	
	public function gmap()
	{
		$data['view_file'] = "tpl_gmap";
		echo Modules::run('template/set_template_site_business',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);
        
	}

    
    
    /* Temporary Data */

	public function remove_branch_image_temp()
	{
		if($_POST)
		{
			$image_filename = $this->input->post('img_filename');
			$path ='_assets/_media_uploads/images/business/temp/tiles/'; // upload directory
			unlink($path . $image_filename);
		}


	}

	public function remove_branch_temp()
	{

		if($_POST)
		{	
			$branch_id = base64_decode($this->input->post('branch_id'));
			$image_info = $this->db->get_where('temp_clients_business_branches', array('id' => $branch_id));
			$this->db->delete('temp_clients_business_branches', array('id' => $branch_id)); 
			echo json_encode(array('image_filename'=>$image_info->row()->ad_image));
		}

	}

	public function cart_branch_total()
	{
		$user_sess_info = $this->session->userdata('user_sess_info');
		$user_email = $user_sess_info['email'];
		$query = $this->db->get_where('temp_clients_business_branches',array('user_email'=>$user_email));
		echo count($query->result());
	}

	public function add_branch_temp()
	{
		if($_POST)
		{		
			$user_sess_info = $this->session->userdata('user_sess_info');
			$user_email = $user_sess_info['email'];

			$fd_branch_name = $this->input->post('branch_name');
			$fd_description = $this->input->post('biz-description');
			$fd_address = $this->input->post('address');
			$fd_city = $this->input->post('city');
			$fd_state = $this->input->post('state');
			$fd_postal_code = $this->input->post('postal_code');
			$fd_country = $this->input->post('country');
			$fd_date_registered = date('Y-m-d');
			$fd_phone_number = $this->input->post('phone_number');
			$fd_web_url = $this->input->post('web_url');
			$fd_user_email =  $user_email;
			$fd_geo_lat =  $this->input->post('geo_lat');
			$fd_geo_lng =  $this->input->post('geo_lng');
			$fd_ad_size =  $this->input->post('adimage-size');
			$fd_ad_image =  $this->input->post('upload-image-name');
			$fd_fax_number = $this->input->post('fax_number');
			$fd_mobile_number = $this->input->post('mobile_number');
			$fd_main_category = $this->input->post('business_category');
			$fd_sub_category = $this->input->post('business_sub_category');

			// Business Hours
			$fd_monday = $this->input->post('monday_from_time') . ' ' . $this->input->post('monday_from_period') . ' - ' . $this->input->post('monday_to_time') . ' ' . $this->input->post('monday_to_period');
			$fd_tuesday = $this->input->post('tuesday_from_time') . ' ' . $this->input->post('tuesday_from_period') . ' - ' . $this->input->post('tuesday_to_time') . ' ' . $this->input->post('tuesday_to_period');
			$fd_wednesday = $this->input->post('wednesday_from_time') . ' ' . $this->input->post('wednesday_from_period') . ' - ' . $this->input->post('wednesday_to_time') . ' ' . $this->input->post('wednesday_to_period');
			$fd_thursday = $this->input->post('thursday_from_time') . ' ' . $this->input->post('thursday_from_period') . ' - ' . $this->input->post('thursday_to_time') . ' ' . $this->input->post('thursday_to_period');
			$fd_friday = $this->input->post('friday_from_time') . ' ' . $this->input->post('friday_from_period') . ' - ' . $this->input->post('friday_to_time') . ' ' . $this->input->post('friday_to_period');
			$fd_saturday = $this->input->post('saturday_from_time') . ' ' . $this->input->post('saturday_from_period') . ' - ' . $this->input->post('saturday_to_time') . ' ' . $this->input->post('saturday_to_period');
			$fd_sunday = $this->input->post('sunday_from_time') . ' ' . $this->input->post('sunday_from_period') . ' - ' . $this->input->post('sunday_to_time') . ' ' . $this->input->post('sunday_to_period');



			// Ad Rate info
			$ad_rate_info = Modules::run('tmpl_ad_rates/get_info_by_name',$fd_ad_size);

			$data = array(

				'name'=>$fd_branch_name,
				'description'=>$fd_description,
				'address'=>$fd_address,
				'city'=>$fd_city,
				'state'=>$fd_state,
				'postal_code'=>$fd_postal_code,
				'country'=>$fd_country,
				'date_registered'=>$fd_date_registered,
				'phone_number'=>$fd_phone_number,
				'mobile_number'=>$fd_mobile_number,
				'fax_number'=>$fd_fax_number,
				'web_url'=>$fd_web_url,
				'user_email'=>$fd_user_email,
				'geo_x'=>$fd_geo_lat,
				'geo_y'=>$fd_geo_lng,
				'ad_size'=>$fd_ad_size,
				'ad_price'=>number_format($ad_rate_info->row()->price,2),
				'ad_image'=>$fd_ad_image,
				'office_hour_monday'=>$fd_monday,
				'office_hour_tuesday'=>$fd_tuesday,
				'office_hour_wednesday'=>$fd_wednesday,
				'office_hour_thursday'=>$fd_thursday,
				'office_hour_friday'=>$fd_friday,
				'office_hour_saturday'=>$fd_saturday,
				'office_hour_sunday'=>$fd_sunday,
				'category'=>'{"main":"'.$fd_main_category.'","sub":"'.$fd_sub_category.'"}'

			);

			$this->db->insert('temp_clients_business_branches',$data);

			$this->db->where('id',$this->db->insert_id());
			$query = $this->db->get('temp_clients_business_branches');

			// Ad rate
			foreach ($query->result() as $key) {
			
					$data = array(

							'branch_id'=> $key->id,
							'branch_name'=>$key->name,
							'ad_price'=>number_format($ad_rate_info->row()->price,2),
							'address'=>$fd_address,
							'city'=>$fd_city,
							'state'=>$fd_state,
							'postal_code'=>$fd_postal_code,
							'country'=>$fd_country,
							'date_registered'=>$fd_date_registered,
							'phone_number'=>$fd_phone_number,
							'web_url'=>$fd_web_url,
							'user_email'=>$fd_user_email,
							'geo_y'=>$fd_geo_lat,
							'geo_x'=>$fd_geo_lng,
							'office_hour_monday'=>$fd_monday,
							'office_hour_tuesday'=>$fd_tuesday,
							'office_hour_wednesday'=>$fd_wednesday,
							'office_hour_thursday'=>$fd_thursday,
							'office_hour_friday'=>$fd_friday,
							'office_hour_saturday'=>$fd_saturday,
							'office_hour_sunday'=>$fd_sunday

							);

					echo json_encode($data);

			}

			
		


		}
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */