<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Tmpl_city_state_region extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->_data                      = new stdClass;

		/* Load Model*/ 
		$this->load->model('mdl_postal_city_state_region');

		/* View Template and Layout */ 
		$this->_view_module 			  = "tmpl_city_state_region";
		$this->_view_template_name		  = "site/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

    }
    
    function get_list_regions()
	{
		$query = $this->mdl_postal_city_state_region->get_where_distinct('state','state ASC');
		return $query;
	}

	function get_list_cities()
	{
		if( $_POST )
		{
			$col_id = $this->input->post('id');

			if($col_id)
			{
				$query = $this->mdl_postal_city_state_region->get_where_distinct_by_id('state',$col_id,'city','city ASC');
				
				foreach ($query->result() as $key) {

					$data[] = array(

							'id' => $key->id,
							'city' => $key->city

							);
				}

				echo json_encode($data);

			}
		}
		else
		{
			$query = $this->mdl_postal_city_state_region->get_where_distinct('city','city ASC');
			return $query;
		}
		
	}

	function get_zip_code()
	{
		$col_id = $this->input->post('id');

		if($col_id)
		{
			$query = $this->mdl_postal_city_state_region->get_where_custom('id',$col_id);
			
			foreach ($query->result() as $key) {

				$data[] = array(

						'zipcode' => $key->postalcode	

						);
			}

			echo json_encode($data);

		}
		else
		{
			$query = $this->mdl_postal_city_state_region->get('postalcode ASC');
			return $query;
		}
		
	}




}