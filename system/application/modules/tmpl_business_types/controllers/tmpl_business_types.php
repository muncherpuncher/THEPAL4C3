<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tmpl_product_categories extends MX_Controller {

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
		$this->load->model('mdl_tpl_product_categories');

		// Load modules
		$this->load->module('template');	
		$this->load->module('notifications');

		// View Template and Layout
		$this->_view_module 			  = "tmpl_product_categories";
		$this->_view_template_name		  = "admin_panel_default/";
		$this->_view_template_layout	  = "layout_sections";
		$this->_view_content 			  = "";

	}

	function get_id_by_name($name = NULL)
	{

		if($name)
		{
			$query = $this->mdl_tpl_product_categories->get_where_custom('name',$name);
			return $query;
		}
		
	}

	function get_list_parent()
	{
		$query = $this->mdl_tpl_product_categories->get('name ASC');
		return $query;
	}

	function get_list_child($parent_name = NULL)
	{ 
		if($parent_name) {
			$sql = "SELECT t1.id as id1,t2.id as id2, t1.name AS lev1, t2.name as lev2
			FROM tpl_product_categories AS t1
			LEFT JOIN tpl_product_categories AS t2 ON t2.parent = t1.id
			WHERE t1.name='".$parent_name."'";

			$query = $this->mdl_tpl_product_categories->_custom_query($sql);
			return $query;
		}
	}





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */