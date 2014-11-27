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

	public function index($section = NULL,$sub_section = NULL, $id = null)
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

			}

		}
		else
		{	


				switch (USER_ROLE) 
				{

					case 'ADMIN':
					
						switch (strtolower($section)) 
						{
							case 'index':

									$data['view_file'] = "client/account_dashboard";
									$this->load->view('layout_sections',$data);

								break;

							case 'users': 
							
								$data['users'] = Modules::run('users/get_list');
								$data['view_file'] = "admin/users";
								$this->load->view('layout_sections',$data);

							break;

							case 'events': 
									

								if( $sub_section )
								{	

									switch ( $sub_section ) {

										case 'create':

												$data['view_file'] = "admin/events_create";
												$this->load->view('layout_sections',$data);
								
											break;

										case 'edit':

												
												$data['event_info'] = Modules::run('events/get_info',$id)->row();
												$data['view_file'] = "admin/events_edit";
												$this->load->view('layout_sections',$data);
								
											break;
								
									}
									
								}
								else
								{
										$data['events'] = Modules::run('events/get_list');
										$data['view_file'] = "admin/events";
										$this->load->view('layout_sections',$data);
											
								}
								


							break;
			
						}

					break;
				}

			

			
		}

		
	}




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */