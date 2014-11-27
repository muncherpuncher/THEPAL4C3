<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Clients_registration extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->_data                      = new stdClass;

		// Load Model
		$this->load->model('mdl_clients_registration');
		// load Library 
		

		// View Template and Layout
		$this->_view_module 			  = "clients_registration";
		$this->_view_template_name		  = "site/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

    }
    
    

    
   





}