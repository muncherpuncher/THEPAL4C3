<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crm extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 	http://example.com/index.php/welcome
	 *	- or -  
	 * 	http://example.com/index.php/welcome/index
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
		$this->load->model('mdl_crm_messages');

		// load Library 
		$this->load->library('email');

	}


 	public function save()
 	{
		if($_POST)
		{	
			$email = strtolower($this->input->post('email'));
			$subject = $this->input->post('crm_subject');
			$message = $this->input->post('crm_message');
			$type = $this->input->post('crm_type_dropdown');
			$ticket_number =  str_shuffle(date('Y') . date('h') . date('i')  . date('s'));

			$data = array(

				'ticket_number'=> $ticket_number,
				'subject'=>$subject,
				'message'=>$message,
				'type'=>$type,
				'users_id'=> $this->session->userdata('user_id'),
				'date_created'=> date('Y-m-d H:i:s')
			);	

			// Save 
			$this->mdl_crm_messages->_insert($data);

			// Send Email
	        $message = array(
	             'ticket_number' => $ticket_number,
	             'message' => $message
	        );

	        $from_name = 'yourfriends@myflipstop.biz'; 
			$status = $this->email->send_email('local',strtolower($email), strtolower(trim($from_name)), 'FlipStop Support', $message, 'support_response'); 

			if($status==TRUE)
			{
				return (bool)($this->db->affected_rows() > 0);
			}
			else
			{
				return FALSE;
			}
			
		}
 			
 	}


 	public function get_list()
    {
    	$query = $this->mdl_crm_messages->get('ticket_number DESC');
    	return $query;
    }

 	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */