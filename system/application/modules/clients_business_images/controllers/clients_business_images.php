<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Clients_business_images extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->_data                      = new stdClass;

		// Load Model
		$this->load->model('mdl_clients_business_images');
		// load Library 
		

		// View Template and Layout
		$this->_view_module 			  = "clients_business_images";
		$this->_view_template_name		  = "site/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

    }
    
    public function save($data)
    {
  
			$data = array(
				
				'filename'=> $data['filename'],
				'size'=> $data['size'],
				'date_created'=> date('Y-m-d'),
				'clients_business_branches_id'=> $data['clients_business_branches_id']
			);

			$this->mdl_clients_business_images->_insert($data);

    }

	public function delete_by_branch()
    {	

    	if($_POST)
		{
			$branch_id = $this->input->post('branch_id');
			$this->mdl_clients_business_images->_delete_where('clients_business_branches_id',$branch_id);
		}

    }

    public function get_list_nearest()
	{	
		$query = $this->mdl_clients_business_images->get('name ASC');
		return $query;
	}
    
    public function get_info($id = NULL)
	{		
		if($id)
		{
			$query = $this->mdl_clients_business_images->get_where_custom('id',$id);
			return $query;
		}
		
	}

	
	public function get_info_by_branch_id($branch_id = NULL)
	{		
		if($branch_id)
		{
			$query = $this->mdl_clients_business_images->get_where_custom('clients_business_branches_id',$branch_id);
			return $query;
		}
		
	}


	public function get_info_by_id($site_id = NULL)
	{
		$query = $this->mdl_clients_business_images->get_where_custom('id',$site_id);
		return $query;
	}
    
   





}