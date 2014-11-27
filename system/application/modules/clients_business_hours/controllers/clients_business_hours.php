<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Clients_business_hours extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->_data                      = new stdClass;

		// Load Model
		$this->load->model('mdl_clients_business_hours');
		// load Library 
		

		// View Template and Layout
		$this->_view_module 			  = "clients_business_hours";
		$this->_view_template_name		  = "site/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

    }

    public function save($data)
    {	

			$data = array(
				
				'monday'=> $data['office_hour_monday'],
				'tuesday'=> $data['office_hour_tuesday'],
				'wednesday'=> $data['office_hour_wednesday'],
				'thursday'=> $data['office_hour_thursday'],
				'friday'=> $data['office_hour_friday'],
				'saturday'=> $data['office_hour_saturday'],
				'sunday'=> $data['office_hour_sunday'],
				'clients_business_branches_id'=>$branch_id,$data['branch_id']
			);

			// Save business branches hours
			$this->mdl_clients_business_hours->_insert('clients_business_branches_hours',$data);

			echo json_encode(array('success'=>true,'message'=>'','redirect_url'=> '','id'=>$this->db->insert_id()));
	

    }

    public function update($id,$data)
    {	
    
			$data = array(
				
				'monday'=> $data['office_hour_monday'],
				'tuesday'=> $data['office_hour_tuesday'],
				'wednesday'=> $data['office_hour_wednesday'],
				'thursday'=> $data['office_hour_thursday'],
				'friday'=> $data['office_hour_friday'],
				'saturday'=> $data['office_hour_saturday'],
				'sunday'=> $data['office_hour_sunday']
			);

			$this->mdl_clients_business_hours->_update_where('clients_business_branches_id',$id,$data);
		
    }

    
    public function get_info($business_id = NULL)
	{	
		$query = $this->mdl_clients_business_hours->get_where_custom('clients_business_branches_id',$business_id);
		return $query;
	}

	


}