<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download_app extends MX_Controller {

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
		$this->load->model('mdl_download_app');

		// load Library 
		
		$this->load->library('email');

	}


 	public function download()
 	{
		if($_POST)
		{
			$email = $this->input->post('email');
			$message = array(
	                     'download_link'   => 'www.myflipstop.com/mobile/download/Htrerewe'
	                );
			$from_name = 'yourfriends@myflipst.biz'; 
			$status = $this->email->send_email('local',$email, strtolower(trim($from_name)), 'Flipstop App Download', $message, 'download_app');
			return $status;
		}
 			
 	}




 	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */