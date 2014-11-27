<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Clients_business_gmap extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->_data                      = new stdClass;

		// Load Model
		$this->load->model('mdl_clients_business_gmap');
		// load Library 
		

		// View Template and Layout
		$this->_view_module 			  = "clients_business_gmap";
		$this->_view_template_name		  = "site/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

    }

    public function save($data)
    {

    	$data = array(

    				'x'=> $data['geo_x'],
    				'y'=> $data['geo_y'],
    				'clients_business_branches_id'=> $data['clients_business_branches_id']

    				);

    	$this->mdl_clients_business_gmap->_insert($data);

    }

    public function update($id,$data)
    {

    	$data = array(

    				'x'=> $data['geo_x'],
    				'y'=> $data['geo_y']

    				);

    	$this->mdl_clients_business_gmap->_update_where('clients_business_branches_id',$id,$data);

    }

    public function get_list_nearest()
	{	
		$query = $this->mdl_clients_business_gmap->get('name ASC');
		return $query;
	}
    
    public function get_info($id = NULL)
	{	
		$query = $this->mdl_clients_business_gmap->get_where_custom('users_id',$user_id);
		return $query;
	}

	

	public function get_info_by_business_id($branches_id = NULL)
	{
		$query = $this->mdl_clients_business_gmap->get_where_custom('clients_business_branches_id',$branches_id);
		if(count($query->result())>0)
		{
			return $query;
		}
		else
		{
			return false;
		}

		
	}


	public function get_location_by_coord($lat,$lag)
	{	
		$data = array('x'=>$lat,'y'=>$lang);
		$query = $this->mdl_clients_business_gmap->get_where_array($data);
		return $query;

	}

	public function calculate_distance($lat1, $lon1, $lat2, $lon2, $unit) 
	{ 
	  $theta = $lon1 - $lon2;
	  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	  $dist = acos($dist);
	  $dist = rad2deg($dist);
	  $miles = $dist * 60 * 1.1515;
	  $unit = strtoupper($unit);

	  if ($unit == "K") {
	    return ($miles * 1.609344);
	  } else if ($unit == "N") {
	      return ($miles * 0.8684);
	    } else {
	        return $miles;
	      }
	}
	


}