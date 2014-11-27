<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MX_Controller {

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

		$this->load->model('mdl_users');

		// load Library 
		
		$this->load->library('email');

		// View Template and Layout
		$this->_view_module 			  = "users";
		$this->_view_template_name		  = "dashboard_company/default/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

	}

	public function logout()
	{

		$data = array(
			  			'is_logged_in'=>0,
			  			'user_id'=>'',
			  			'user_fullname' => '',
			  			'username' => ''
			  		 );

 		$this->session->set_userdata($data);
		redirect();

	}

	public function is_off_line($user_id)
	{	

		$sql = 'SELECT last_activity FROM ci_sessions WHERE user_data LIKE "%'.$this->get_field('users','username',$user_id).'%"';    
		$query = $this->mdl_users->_custom_query($sql);
		
		if ($query->num_rows() > 0) {
			return FALSE;
		}
		else
		{
			return TRUE;
		}
    	
	}

	protected function get_field($table, $field, $id)
	{
	    $CI =& get_instance();
	    $CI->db->where('id', $id);
	    $query = $CI->db->get($table);
	    $row = $query->row();
	    return $row->$field;
	} 

	public function is_logged_in()
	{

		if($this->session->userdata('is_logged_in')===0)
		{
			return FALSE;

		}
		else if($this->session->userdata('is_logged_in')===1)
		{
			return TRUE;

		}
		
	}
	
 	public function auth()
 	{
 	
 		if($_POST)
		{

			$username = strtolower($this->input->post('username'));
			$password = md5($this->input->post('password'));
			$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
			$query = $this->db->query($sql, array($username,$password)); 
			$data = array();
			$usertype = "";

			foreach ($query->result() as $key):
		  		$data = array(
					
		  			'is_logged_in'=>1,
		  			'user_id'=>$key->id,
		  			'username'=>$username,
		  	
			  		);

		  		$usertype = $key->type;

		  	endforeach;

		 

			$this->session->set_userdata($data);

			if(count($query->result()) === 1)
			{	
				switch ($usertype) {
					case 'basic':
						redirect(base_url());
						break;
					case 'business':
						redirect('dashboard');
						break;
				}
				
			}
			else
			{
				return FALSE;
			}

		}
 		
 	}

 	public function get_info($usertype = NULL,$username = NULL,$user_id = NULL)
 	{	
 		if($username)
 		{
 			$data = array('username'=>$username,'type'=>$usertype);
 			$query = $this->mdl_users->get_where_array($data);
 			return $query;
 		}
 		else if($user_id)
 		{
 			$query = $this->mdl_users->get_where_custom('id',$user_id);
 			return $query;
 		}
 		
 	}

 	public function email_account_info()
 	{
        $this->load->library('email');

 		if($_POST)
 		{
 			$username = $this->input->post('username');
 			$user_info = $this->get_info($username);

 			$email = $user_info->row()->username;
 			$password = $user_info->row()->password;

 			$data = array(

                'email' => $email,
                'password' => $password

                );
               
               $new_pass = random_string('alnum', 6);
               
               $data_user_update = array("password" => md5($new_pass));
               $this->mdl_users->_update($user_info->row()->id, $data_user_update);
               
               $message = array(
                     'email'   => $email,
                     'new_password' => $new_pass
                );

                $status = $this->email->send_email($email, 'no-reply@salespace.com', 'Salespace Forgot Password', $message, 'forgot_password');

                if($status === TRUE) {
                    $data['error'] = FALSE;
                    $data['msg'] = "Successfully Sent";
                } else {
                    $data['error'] = TRUE;
                    $data['msg'] = "Can't send at this moment";
                }
 		}
 	}

 	public  function check_session($user_type)
 	{
 		if($this->session->userdata('is_logged_in')==1 && $this->session->userdata('user_type')==$user_type)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
 	}

 	/*
	 check if user is logged in
 	 return: boolean 
 	*/

 	public  function user_is_logged_in()
 	{

 		if(!$this->session->userdata('is_logged_in'))
 		{
 			return FALSE;
 		}
 		else
 		{
 			return TRUE;
 		}

 	}

 	public  function email_is_exists($usertype)
 	{	
 	
 		if($_POST)
 		{
 			$email = $this->input->post('email');
 			$data = array('username'=>$email,'type'=>$usertype);
 			$query = $this->mdl_users->get_where_array($data);

 			if(count($query->result()) > 0)
 			{
 				// Prompt and Display Message
 				$result = array('success'=>false, 'message'=>'Email already taken','redirect_url' => base_url());
                echo json_encode($result);
 			}
 			elseif(count($query->result()) < 1)
 			{
 				$result = array('success'=>true, 'message'=>'','redirect_url' => base_url());
                echo json_encode($result);
 			}
 		}

 	}

 	public function save_email_verification($verification_code,$email)
 	{
	    $this->mdl_users->insert_email_verification($email,$verification_code); 
 	}

 	public function register($usertype,$data = NULL)
 	{

 		if($_POST)
 		{

 			switch ($usertype) {
 				case 'basic':

 						$fd_email = $this->input->post('email');
						$fd_password = $this->input->post('password');
						$fd_access_flag = $this->input->post('access_flag');
						$fd_verify_flag = $this->input->post('verify_flag');

						$fd_date_created = date('Y-m-d');			

				        $data = array(

									'username' => $fd_email,
									'password' => md5($fd_password),
									'access_flag'=> '0',
									'verify_flag' => '0',
									'type' => $this->session->userdata('signin_usertype'),
									'type'=>$usertype,
									'date_created' => date('Y-m-d')

									);

				        // Save user access info
				        $this->mdl_users->_insert($data);

				        $user_id = $this->db->insert_id();

				        $data = array(

									'username' => $fd_email,
									'password' => md5($fd_password),
									'access_flag'=> '0',
									'verify_flag' => '0',
									'type' => $this->session->userdata('signin_usertype'),
									'type'=>$usertype,
									'date_created' => date('Y-m-d')

									);

						echo Modules::run('users_access_roles/save',$usertype);
						echo Modules::run('clients_personal_info/save',$user_id,$usertype);
						$user_personal_info = Modules::run('clients_personal_info/get_info',$user_id);
						$user_info =  $this->get_info($usertype,$user_personal_info->row()->email);
					
				        $verification_url = base_url().'users/verify/';

			 			$verification_code = random_string('alnum', 24);
					 	$this->save_email_verification($verification_code,$user_info->row()->username);
					 	$email = base64_encode($user_info->row()->username);

						
				        // Set new user session
				        $this->session->set_userdata(array('new_user'=>TRUE));

				        // Send Mail
				        $message = array(
				             'name' => $user_personal_info->row()->first_name,
				             'verification_url' => $verification_url.$verification_code.'/'.$email
				        );

				        $from_name = 'yourfriends@myflipstop.com';
						$status = $this->email->send_email(HTTP_ROUTE_TYPE,$this->input->post('email'), strtolower(trim($from_name)), 'FlipStop User Account', $message, 'registration');
						return $status;

						

 					break;
 				
 				case 'business':


				        $data = array(

									'username' => $data['username'],
									'password' => $data['password'],
									'access_flag'=> $data['access_flag'],
									'verify_flag' => $data['verify_flag'],
									'type'=>$data['type'],
									'date_created' => $data['date_created']

									);

				        // Save user access info
				        $this->mdl_users->_insert($data);

 					break;
 				default:
 					# code...
 					break;
 			}
			
 		}

 	}

 	public  function resend_activation()
 	{
 	

 		if($_POST)
 		{
 			$email = $this->input->post('email');
 			$user_personal_info = Modules::run('clients_personal_info/get_info_by_email_address',$email);
 			$verification_info = $this->db->get_where('email_verification',array('email'=>$email));
 			$verification_url = base_url().'users/verify/';

 			 // resend Mail activation
	        $message = array(
	             'name' => $user_personal_info->row()->first_name,
	             'verification_url' => $verification_url.$verification_info->row()->verification_code.'/'.base64_encode($email)
	        );

	        $from_name = 'yourfriends@myflipstop.com';
			$status = $this->email->send_email(HTTP_ROUTE_TYPE,$this->input->post('email'), strtolower(trim($from_name)), 'FlipStop User Account', $message, 'registration');
			return $status;

 		}	

 	}

 	public  function reset_password($usertype,$data)
 	{
 			$this->load->library('email');

 			$user_data = array(
 				
 							'type' => $usertype,
 							'password' => md5($data['password'])
 						 );

       		$this->mdl_users->_update_password($data['email'],$user_data);

	 		$message = array(
	                     'email'   => $data['email'],
	                     'new_password' => $data['password']
	                );

            $status = $this->email->send_email(HTTP_ROUTE_TYPE,$data['email'], 'yourfriends@myflipstop.com', 'Flipstop - Password Reset', $message, 'forgot_password');

            if($status === TRUE) {
                echo json_encode(array('success'=>TRUE));
            } else {
                 echo json_encode(array('success'=>FALSE));
            }

 	}

    public  function verify($verification_code = '', $email = '')
    {
   
        $result = $this->mdl_users->get_activation_code($verification_code, base64_decode($email));
  
        if(!empty($result)) {

            $date_created = $result['date_created'];
            $date_expire = strtotime($date_created . " +1 days");
            $current = strtotime(date('Y-m-d h:i:s'));

            if($current < $date_expire) {
            
                    $this->mdl_users->delete_email_verification($email, $verification_code);
                    
                    // Get user info
                    $user_info = $this->get_info('basic',base64_decode($email),'');
             		$data = array('verify_flag' => 1,'access_flag' => 1,'username' => base64_decode($email));
             		// Update account info
					$this->mdl_users->_update($user_info->row()->id,$data);

					$user_info_personal = Modules::run('clients_personal_info/get_info',$user_info->row()->id);
					$new_user_data = array('new_user_data'=> 1,'firstname'=> $user_info_personal->row()->first_name);
	                $this->session->set_userdata('new_user',$new_user_data);

	                $this->session->set_userdata(array('is_logged_in'=>1,'username'=>$email,'user_id'=>$user_info->row()->id,'user_type'=>'basic'));

					redirect(base_url('welcome-verified'));
            
            } else {
                $this->mdl_users->delete_email_verification($email, $verification_code);
            }
        } else {
           redirect(base_url());
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

    public function get_list()
    {
    	$query = $this->mdl_users->get('username ASC');
    	return $query;
    }

    public function update_access()
    {
    	if($_POST)
		{
			$user_id = $this->input->post('userID');
			$access_flag = $this->input->post('isEnabled');
		
			$data = array(
				'access_flag'=>$access_flag
			);

			$this->mdl_users->_update_where('id',$user_id,$data);

		}
    }

    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */