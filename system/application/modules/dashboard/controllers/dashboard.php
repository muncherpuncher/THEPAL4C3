<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MX_Controller {

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

        // Load Geocoder library
        $this->load->library('geocoder');
        $this->_businessses = array();

		if($this->session->userdata('is_logged_in')==1)
		{	

			$this->_user_info = $this->db->get_where('clients_personal_info',array('users_id'=>$this->session->userdata('user_id')))->row();
		 	$user_access_role_info = $this->db->get_where('users_access_roles',array('users_id'=>$this->session->userdata('user_id')))->row();

		 	if(count($user_access_role_info) > 0)
		 	{

		 		$user_role_info = $this->db->get_where('users_role',array('id'=>$user_access_role_info->users_role_id))->row();

				if(count($user_role_info) > 0)
				{
					define('USER_ROLE',strtoupper($user_role_info->role_name));
				}
		 	}
		 	else
		 	{
		 		echo Modules::run('users/logout');
		 	}

			
				

		}
		else{

			redirect('sign-in');
		}


	}

	public function index($section = NULL,$sub_section = NULL)
	{		  

		$data['user_info'] = $this->_user_info;

      
        
		if(!$section)
		{	
			switch (USER_ROLE) 
			{
				case 'ADMIN':
						
					$data['total_users'] = Modules::run('users/get_list');
					$data['total_owned_businesses'] = Modules::run('clients_business_branches/get_list');
					$data['total_open_businesses'] = Modules::run('admin_default_businesses/get_list');
					$data['total_brand_engaments'] = Modules::run('clients_business_interaction/get_list');
					$data['view_file'] = "admin/main";
					$this->load->view('layout_sections',$data);

					break;

				case 'BUSINESS OWNER':
						
					// $data['total_users'] = Modules::run('users/get_list');
					// $data['total_owned_businesses'] = Modules::run('clients_business_branches/get_list');
					// $data['total_open_businesses'] = Modules::run('admin_default_businesses/get_list');
					// $data['total_brand_engaments'] = Modules::run('clients_business_interaction/get_list');
					$data['view_file'] = "client/main";
					$this->load->view('layout_sections',$data);

					break;
			}

		}
		else
		{


			switch (strtolower($section)) 
			{
                case 'billing':
                    
                    switch($sub_section)
                    {
                        case 'active';
                            echo 'List active accounts here';
                            break;
                        case 'due';
                            echo 'List due accounts here';
                           break;
                            
                    }
                    
                    break;
				case 'businesses': 

							
							if(isset($_GET['business_id']))
							{	
								

								$business_id = (int)$_GET['business_id'];
								$business_branches = Modules::run('clients_business_branches/get_owned_businesses',$business_id)->result();
								$branch_id = "";

								foreach ($business_branches as $key) {

									$branch_id = $key->id;
									$business_hours = Modules::run('clients_business_hours/get_info',$branch_id)->row();
									$clients_plan = Modules::run('clients_plan/get_info_by_branch_id',$branch_id)->row();
									$clients_plan_mode = Modules::run('clients_plan_mode/get_info_by_id',$clients_plan->clients_plan_mode_id)->row();	
			

									// Get business hours	
									$business_branches_array[] = array(
															'branch_id' => $key->id,
															'business_name' => $key->name,
															'business_description'=>$key->description,
															'plan' => array(
																			'mode'=>$clients_plan_mode->name,
																			'description'=> $clients_plan_mode->description,
																			'date_registered' => $key->date_registered,
																			'date_expires' => $clients_plan->date_expires
																			),
															'street_address' => $key->address, 
															'city' => $key->city,
															'state' => $key->state,
															'country' => $key->country, 
															'business_hours' => $business_hours, 
															);
								 	
								 }
								
								$data['branch_id'] =  $branch_id;
								$data['business_info'] = Modules::run('clients_business/get_info',$business_id);
								$data['business_branches'] = $business_branches_array;
								$data['view_file'] = "client/business_branches";
								$this->load->view('layout_sections',$data);
								
							}
							else
							{

								

								switch (USER_ROLE) 
								{
									case 'ADMIN':

										$this->_businessses = Modules::run('clients_business/get_list');
										$data['businesses'] = $this->_businessses;
									
										
										break;

									case 'BUSINESS OWNER':

										// List of business branches
										$this->_businessses = Modules::run('clients_business/get_info_by_user_id',$this->session->userdata('user_id'));
										$data['businesses'] = $this->_businessses;
									

										break;

								}

								$data['view_file'] = "client/businesses";
								$this->load->view('layout_sections',$data);
							}
								
					break;

				case 'business_info':
                    
						$business_id = $_GET['branch_id'];
                    
                        // Set id in session
                        $this->session->set_userdata(array('branch_id'=>$business_id));
                    
                    
						$business_branches = Modules::run('clients_business_branches/get_owned_businesses',$business_id)->result();
						
						$adstatus = 'close';
						$data = array();

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

							$business_hours_monday_time = explode(' - ', $business_hours_days['monday']);
							$business_hours_tuesday_time = explode(' - ', $business_hours_days['tuesday']);
							$business_hours_wednesday_time = explode(' - ', $business_hours_days['wednesday']);
							$business_hours_thursday_time = explode(' - ', $business_hours_days['thursday']);
							$business_hours_friday_time = explode(' - ', $business_hours_days['friday']);
							$business_hours_saturday_time = explode(' - ', $business_hours_days['saturday']);
							$business_hours_sunday_time = explode(' - ', $business_hours_days['sunday']);

							$data = array(
										
											'business_id'=> base64_encode($business_id),
											'name' => $key->name,
											'description' => $key->description,
											'address' => $key->address,
											'city' => $key->city,
											'state' => $key->state,
											'postal_code' => $key->postal_code,
											'country' => $key->country,
											'business_hours_monday_from' => strtolower($business_hours_monday_time[0]),
											'business_hours_monday_to' => strtolower($business_hours_monday_time[1]),
											'business_hours_monday_availability' => strtolower($business_hours_monday_time[2]),
											'business_hours_tuesday_from' => strtolower($business_hours_tuesday_time[0]),
											'business_hours_tuesday_to' => strtolower($business_hours_tuesday_time[1]),
											'business_hours_tuesday_availability' => strtolower($business_hours_tuesday_time[2]),
											'business_hours_wednesday_from' => strtolower($business_hours_wednesday_time[0]),
											'business_hours_wednesday_to' => strtolower($business_hours_wednesday_time[1]),
											'business_hours_wednesday_availability' => strtolower($business_hours_wednesday_time[2]),
											'business_hours_thursday_from' => strtolower($business_hours_thursday_time[0]),
											'business_hours_thursday_to' => strtolower($business_hours_thursday_time[1]),
											'business_hours_thursday_availability' => strtolower($business_hours_thursday_time[2]),
											'business_hours_friday_from' => strtolower($business_hours_friday_time[0]),
											'business_hours_friday_to' => strtolower($business_hours_friday_time[1]),
											'business_hours_friday_availability' => strtolower($business_hours_friday_time[2]),
											'business_hours_saturday_from' => strtolower($business_hours_saturday_time[0]),
											'business_hours_saturday_to' => strtolower($business_hours_saturday_time[1]),
											'business_hours_saturday_availability' => strtolower($business_hours_saturday_time[2]),
											'business_hours_sunday_from' => strtolower($business_hours_sunday_time[0]),
											'business_hours_sunday_to' => strtolower($business_hours_sunday_time[1]),
											'business_hours_sunday_availability' => strtolower($business_hours_sunday_time[2]),
											'useranalytics'=> $business_interactions_user,
											'gmap_lat'=>$business_map_info->row()->x,
											'gmap_lng'=>$business_map_info->row()->y,
											'image_filename'=>$business_image_filename,
											'category'=> $key->category,
											'phone_number'=>$key->phone_number,
											'mobile_number'=>$key->mobile_number,
											'fax_number'=>$key->fax_number,
											'web_url'=>$key->web_url,
											'spot'=>'close'

										);
						}

                   
						$data['business_info'] = $data;
						$data['adprice_single'] =  Modules::run('tmpl_ad_rates/get_info_by_name','single');
						$data['adprice_double'] = Modules::run('tmpl_ad_rates/get_info_by_name','double');
						$data['adprice_quad'] = Modules::run('tmpl_ad_rates/get_info_by_name','quad');
						$data['list_business_categories_parent'] = Modules::run('tmpl_business_categories/get_list_parent');
						$data['list_business_categories_child'] =  Modules::run('tmpl_business_categories/get_list_child_all');
                        $data['user_info'] = $this->_user_info;
						$data['view_file'] = "client/business_info";
						$this->load->view('layout_sections',$data);
					
					break;
				
				case 'crm': 

					// CRM Messages
					switch (USER_ROLE) 
					{

						case 'ADMIN':

							$data['crm_messages'] = Modules::run('crm/get_list');
							$data['view_file'] = "admin/crm_messages";
							$this->load->view('layout_sections',$data);
							
						break;

					}

					break;

				case 'users': 
					// Users List
					switch (USER_ROLE) 
					{

						case 'ADMIN':

							$data['users'] = Modules::run('users/get_list');
							$data['view_file'] = "admin/users";
							$this->load->view('layout_sections',$data);

						break;
					}

					break;
				case 'profile':
						$data['personal_info'] = $this->db->get_where('clients_personal_info',array('users_id'=>$this->session->userdata('user_id')));
						$data['view_file'] = "client/profile";
						$this->load->view('layout_sections',$data);
					break;
				case 'analytics':

						if(isset($_GET['branch_id']))
						{
							$business_id = (int)$_GET['branch_id'];
							$data['branch_info'] = Modules::run('clients_business_branches/get_info',$business_id)->row();
							$data['view_file'] = "client/analytics_main";
							$this->load->view('layout_sections',$data);
						}

					break;

				case 'account':
							
							switch ($sub_section) {
								case 'general':
										$data['view_file'] = "client/account_general";
										$this->load->view('layout_sections',$data);
									break;
								case 'billing':
										$data['view_file'] = "client/account_billing";
										$this->load->view('layout_sections',$data);
									break;
								case 'support':
										$data['view_file'] = "client/account_support";
										$this->load->view('layout_sections',$data);
									break;
							}


					break;
				default:
					# code...
					break;
			}
		}

		
	}




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */