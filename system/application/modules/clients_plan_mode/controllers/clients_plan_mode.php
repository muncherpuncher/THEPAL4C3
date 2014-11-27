<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Clients_plan_mode extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->_data                      = new stdClass;

		// Load Model
		$this->load->model('mdl_clients_plan_mode');
		// load Library 
		

		// View Template and Layout
		$this->_view_module 			  = "clients_plan_settings";
		$this->_view_template_name		  = "site/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

    }
    
    
  
    function get_info_by_id($id = NULL)
    {
    	$query = $this->mdl_clients_plan_mode->get_where_custom('id',$id);
    	return $query;
    }


}