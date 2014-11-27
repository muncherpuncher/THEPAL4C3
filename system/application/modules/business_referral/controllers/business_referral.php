<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Business_referral extends MX_Controller {

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
		$this->load->model('mdl_business_refer');

		// load Library 
		
		$this->load->library('email');

	}


 	public function refer()
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

			$this->db->insert('business_referrals',$data);
			$id = $this->db->insert_id();

			if((bool)($this->db->affected_rows()) == TRUE)
			{	
				$referral_info = $this->db->get_where('business_referrals',array('id'=>$id));

		        $message = array(

		        	 'business_name' => $referral_info->row()->business_name,
		             'business_owner_name' => $referral_info->row()->business_owner,
		             'business_email' => $referral_info->row()->business_email,
					 'referrer_name' => $referral_info->row()->referrer_name,
					 'referrer_email' => $referral_info->row()->referrer_email,
					 'business_url' => base_url()

		        	);

		        $from_name = 'yourfriends@myflipst.biz'; 
				$status = $this->email->send_email(HTTP_ROUTE_TYPE,$referral_info->row()->business_email, strtolower(trim($from_name)), 'FlipStop Business Referral', $message, 'refer_business');
				return $status;
			}
			



		}

 			
 	}


 	public function get_info($id)
 	{	
 		if($id)
 		{
 			$query = $this->mdl_business_refer->get_where_custom('id',$id);
 			return $query;
 		}
 		
 	}


 	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */