<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tmpl_crm_statuses extends MX_Controller {

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
		$this->load->model('mdl_tpl_crm_statuses');

		// Load modules
		$this->load->module('template');	


	}

	public function get_list()
	{
		$query = $this->mdl_tpl_crm_statuses->get('name ASC');
		return $query;
	}

	public function get_info_by_id($id)
	{
		if($id)
		{	
			$query = $this->mdl_tpl_crm_statuses->get_where_custom('id',$id);
			return $query;
		
		}

	}





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */