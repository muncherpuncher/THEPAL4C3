<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends MX_Controller {

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

		$this->_view_theme_name = 'myflipstop';
        $this->_view_theme_layout = "layout_sections";
        $this->_user_info = array();

		//Get User Role
		if($this->session->userdata('is_logged_in')==1)
		{
			$this->_user_info = Modules::run('clients_personal_info/get_info',$this->session->userdata('user_id'));
		}

    }


    //## Views ##// 
	public function index(  )
	{	
		
		echo Modules::run('pages/index','home');
		
	}

	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */