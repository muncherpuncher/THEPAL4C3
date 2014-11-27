<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Tmpl_countries extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->_data                      = new stdClass;
		// Load Model

		$this->load->model('mdl_tpl_countries');


		// load Library 
		

		// View Template and Layout
		$this->_view_module 			  = "Tmpl_countries";
		$this->_view_template_name		  = "site/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

    }
    
    function get_list()
	{
		$query = $this->mdl_tpl_countries->get('name ASC');
		return $query;
	}

	




}