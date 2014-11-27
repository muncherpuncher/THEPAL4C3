<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_access_role extends MX_Controller {

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
		$this->load->model('mdl_users_access_role');


	}


	public function save($data)
	{
		$this->mdl_users_access_role->_insert($data);
	}
	public function edit()
	{

	}

	public function delete()
	{

	}

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */