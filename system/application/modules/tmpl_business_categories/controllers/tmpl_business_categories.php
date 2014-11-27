<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tmpl_business_categories extends MX_Controller {

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
		$this->load->model('mdl_tpl_business_categories');

		// Load modules
		$this->load->module('template');	
		$this->load->module('notifications');

		// load Library 
		

		// View Template and Layout
		$this->_view_module 			  = "tmpl_business_categories";
		$this->_view_template_name		  = "admin_panel_default/";
		$this->_view_template_layout	  = "layout_sections";
		$this->_view_content 			  = "";

	}

	function save($data)
	{
		$data = array(


					 );

		$this->mdl_tpl_business_categories->_insert($data);
		
	}


	function get_id_by_name($name = NULL)
	{
		if($name)
		{
			$query = $this->mdl_tpl_business_categories->get_where_custom('name',$name);
			return $query;
		}
		
	}

	function get_list_parent()
	{
		$query = $this->mdl_tpl_business_categories->get_where_custom('parent','');
		return $query;
	}

	function get_list_child($parent_id = NULL)
	{ 
		if($parent_id) {
			$sql = "SELECT t1.id as id1,t2.id as id2, t1.name AS lev1, t2.name as lev2
			FROM tpl_business_categories AS t1
			LEFT JOIN tpl_business_categories AS t2 ON t2.parent = t1.id
			WHERE t1.id='".$parent_id."'";

			$query = $this->mdl_tpl_business_categories->_custom_query($sql);
			return $query;
		}
	}

	function get_info_by_parent_name($parent_name = NULL)
	{ 

		if($_POST)
		{
			$parent_name = $this->input->post('parent_name');
			$query = $this->mdl_tpl_business_categories->_custom_query("SELECT * FROM tpl_business_categories WHERE name LIKE %".$parent_name."% ");
			echo json_encode($query->result());
		}
		else
		{
			$parent_name = $parent_name;
			$query = $this->mdl_tpl_business_categories->get_where_custom('name',$parent_name);
			return $query;
		}
	

	}

	function get_list_child_by_parent_name($parent_name = NULL)
	{ 
		if($parent_name) {
			
			$sql = "SELECT t1.id as id1,t2.id as id2, t1.name AS lev1, t2.name as lev2
			FROM tpl_business_categories AS t1
			LEFT JOIN tpl_business_categories AS t2 ON t2.parent = t1.id
			WHERE t1.name='".$parent_name."'";

			$query = $this->mdl_tpl_business_categories->_custom_query($sql);
			return $query;

		}
	}

	function get_info_by_id($id = NULL)
	{ 
		if($id) {
			
			$query = $this->mdl_tpl_business_categories->get_where_custom('id',$id);
			return $query;

		}
	}

	function get_child_info_by_name($child_name)
	{ 

			$sql = "SELECT * FROM `tpl_business_categories` WHERE name='".$child_name."'";
			$query = $this->mdl_tpl_business_categories->_custom_query($sql);
			return $query;
	}

	function get_list_child_by_parent_id()
	{ 	
		$parent_id = $this->input->post('parent_id');
		
		$sql = "SELECT t1.id as id1,t2.id as id2, t1.name AS lev1, t2.name as lev2
		FROM tpl_business_categories AS t1
		LEFT JOIN tpl_business_categories AS t2 ON t2.parent = t1.id
		WHERE t1.id='".$parent_id."'";
		$query = $this->db->query($sql);
		$data = array();
		
		foreach ($query->result() as $key) {

			if($key->lev2!="")
			{
				$data[] = array(
                        'category_id'=>$key->id2,
						'category'=>$key->lev2
				);
			}
			
		}
		echo json_encode($data);
	}

	function get_list_child_all()
	{ 
		$query = $this->mdl_tpl_business_categories->_custom_query("SELECT * FROM tpl_business_categories WHERE parent IS NOT NULL");
		return $query;
	}

	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */