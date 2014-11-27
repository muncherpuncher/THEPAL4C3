<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Clients_plan extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->_data                      = new stdClass;

		// Load Model
		$this->load->model('mdl_clients_plan');
		// load Library 
		

		// View Template and Layout
		$this->_view_module 			  = "clients_plan";
		$this->_view_template_name		  = "site/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

    }
    
    public function register($data)
    {
        $this->mdl_clients_plan->_insert($data);
    }

    
    public function get_info($user_id = NULL)
    {
        $query = $this->mdl_clients_plan->get_where_custom('users_id',$user_id);
        return $query;
    }

    public function get_info_by_branch_id($branch_id = NULL)
    {
        $query = $this->mdl_clients_plan->get_where_custom('clients_business_branches_id',$branch_id);
        return $query;
    }




}