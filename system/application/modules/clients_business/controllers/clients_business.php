<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Clients_business extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->_data                      = new stdClass;

		// Load Model
		$this->load->model('mdl_clients_business');
		// load Library 
		$this->load->library('email');

    }
    
    public function register_initial($step)
    {
    	
    		switch ($step) {

				case '1':

						if($this->session->userdata('business_reg_status')=="close") { redirect(); }	
						
						$data = array(
							
				            'last_name'=> $this->input->post('last_name'),
				            'first_name'=> $this->input->post('first_name'),
				            'middle_name'=> '',
				            'gender'=> '',
				            'title'=> $this->input->post('title_role'),
				            'email'=> $this->input->post('email'),
				            'user_email'=> $this->input->post('email'),
				            'title'=> $this->input->post('title'),
				            'country'=> $this->input->post('country'),
				            'address'=> $this->input->post('address'),
				            'city'=> $this->input->post('city'),
				            'state'=> $this->input->post('state'),
				            'postal_code'=> $this->input->post('postal_code'),
				            'phone_number'=> $this->input->post('phone_number'),
				            'password'=> md5($this->input->post('password'))

				        );

						$this->db->insert('temp_clients_personal_info', $data); 
					
						$data = array(

							'name'=>$this->input->post('business_name'),
				            'user_email'=> $this->input->post('email'),  
				            'date_registered'=> date('Y-m-d H:i:s')
				        );

						$this->db->insert('temp_clients_business', $data); 

						$verification_code = substr(md5(uniqid(rand(), true)), 8, 8);
						$email = strtolower($this->input->post('email'));
				
						$data = array(
							'email'=>$email,
							'verification_code'=>$verification_code,
							'date_created'=>date('Y-m-d H:i:s')
						);

						echo Modules::run('users_verification_code/save',$data);
					

				 		// Email
				        $message = array(

				             'name' => ucwords(strtolower($this->input->post('first_name'))),
				             'verification_code' => $verification_code
				        );

				        $from_name = 'yourfriends@myflipstop.biz'; 
						$status = $this->email->send_email(HTTP_ROUTE_TYPE,strtolower($email), strtolower(trim($from_name)), 'FlipStop Business Account', $message, 'registration_business'); 
						$this->session->set_userdata('user_sess_info',array('email'=>$email));
						// Update listing session status
						$this->session->set_userdata(array('business_reg_status'=>'open'));
						return $status;

					break;

				case '2':

						if($this->session->userdata('business_reg_status')=="close") { redirect(); }	
						echo Modules::run('users_verification_code/verify');	
						// Update listing session status
						$this->session->set_userdata(array('business_reg_status'=>'open'));

					break;
				case '3':

						if($this->session->userdata('business_reg_status')=="close") { redirect(); }	
						// Update listing session status
						$this->session->set_userdata(array('business_reg_status'=>'open'));
						echo Modules::run('clients_business_branches/list_business');	
						
					break;
				case '4':
						// Update listing session status
						$this->session->set_userdata(array('business_reg_status'=>'close'));
					break;
				default:
					# code...
					break;
			}
    	
    	
    	

	}

	public function register($data)
	{
		$this->mdl_clients_business->_insert($data);
	}

    public function get_list()
	{	
		$query = $this->mdl_clients_business->get('name ASC');
		return $query;
	}

    
    public function get_info($user_id = NULL)
	{	
		$query = $this->mdl_clients_business->get_where_custom('users_id',$user_id);
		return $query;
	}

	public function get_info_by_user_id($user_id = NULL)
	{	
		$query = $this->mdl_clients_business->get_where_custom('users_id',$user_id);
		return $query;
	}
	
	public function get_info_by_id($site_id = NULL)
	{
		$query = $this->mdl_clients_business->get_where_custom('id',$site_id);
		return $query;
	}


}