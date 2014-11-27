<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');
/*

Author: Sylvester Molina
Client Plans 

*/

class Tmpl_clients_plan extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->_data                      = new stdClass;

		// Load Model
		$this->load->model('mdl_tpl_clients_plan');
		// load Library 
		

		// View Template and Layout
		$this->_view_module 			  = "tmpl_clients_plan";
		$this->_view_template_name		  = "site/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

    }
    
    

    public function get_list()
    {	

    	$query = $this->mdl_tpl_clients_plan->get('name ASC');
    	return $query;
    	
    	
    }

    
   



}