<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_role extends MX_Controller {

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

		$this->load->model('mdl_users_role');

		// load Library 
		

		// View Template and Layout
		$this->_view_module 			  = "users_role";
		$this->_view_template_name		  = "admin_panel_default/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

	}


	public function get_info($id = NULL)
	{
		$query = $this->mdl_users_role->get_where_custom('id',$id);
		return $query;

	}


	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */