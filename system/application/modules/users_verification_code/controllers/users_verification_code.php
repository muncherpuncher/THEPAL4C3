<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_verification_code extends MX_Controller {

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

	function __construct()
	{
		parent::__construct();
		$this->_data                      = new stdClass;
	
		// Load Model
		$this->load->model('mdl_users_verification_code');

		// load Library 
		

		// View Template and Layout
		$this->_view_module 			  = "users_verification_code";
		$this->_view_template_name		  = "dashboard_company/default/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

	}


 	public function get_info($username = NULL,$user_id = NULL)
 	{	
 		if($username)
 		{
 			$query = $this->mdl_users_verification_code->get_where_custom('username',$username);
 			return $query;
 		}
 		else if($user_id)
 		{
 			$query = $this->mdl_users_verification_code->get_where_custom('id',$user_id);
 			return $query;
 		}
 		
 		
 	}

 	public function delete($col,$value)
 	{
		$this->mdl_users_verification_code->_delete($col,$value);
 	}

 	public  function save($data)
 	{
		$this->mdl_users_verification_code->_insert($data);
 	}

 	public  function resend_code()
 	{
 		
 	}

    public  function verify()
    {
		$user_sess_info = $this->session->userdata('user_sess_info');
		$user_email = $user_sess_info['email'];
		$verification_code = $this->input->post('business_verification_code');
		$this->db->get_where('users_verification_code',array('email'=>$user_email,'verification_code'=>$verification_code));
	
		if((bool)($this->db->affected_rows())>0)
		{
			return TRUE;
		}

 	}


 	public  function set_email()
    {
    	if($_POST)
    	{
    		$email = $this->input->post('email');
    		$this->session->set_userdata('user_sess_info',array('email'=>$email));
    		$result = array('success'=>true, 'message'=>'','redirect_url' => '');
            echo json_encode($result);
    	}
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */