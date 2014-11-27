<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_default_businesses extends MX_Controller {

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
		$this->load->model('mdl_default_businesses');

	}

	public function insert_businesses()
	{
	
		$this->load->library('csvreader');
        $result = $this->csvreader->parse_file(base_url().'_assets/flipstopbiz/csv/default_businesses.csv');//path to csv file
      	$business_code = "";
      	$count = 0;

	    foreach ($result as $key) {

	  		$business_code =  substr(time().'-'.uniqid(true),0,10).$count;
	  		$business_name = str_replace("'", "\\'", trim($key['Business/Company Name']));
	  		$street_address = str_replace("'", "\\'", trim($key['Street Address']));
	  		$city = str_replace("'", "\\'", trim($key['City']));
	  		$state = str_replace("'", "\\'", trim($key['State']));
	  		$zip_code = str_replace("'", "\\'", trim($key['Zip Code']));
	    	$category = '{"main":"'.trim($key['Main Category']).'","sub":"'.trim($key['Sub Category']).'"}';
	    	
	     	$geocode_address = $key['Street Address'].'+'.$key['City'].'+'.$key['State'].'+'.$key['Zip Code'];
            $response = Modules::run('_api_google_map/geocode_address',$geocode_address);
		  	$lat = $response->results[0]->geometry->location->lat;
		  	$lng = $response->results[0]->geometry->location->lng;
	    	$lat = "14.4845405";
	    	$lng = "121.0110063"; 
	    	$sql = "INSERT INTO `fs_db`.`default_businesses` (`id`,`business_code`,`name`, `description`, `address`, `city`, `state`, `postal_code`, `country`, `category`, `phone_number`, `fax_number`, `mobile_number`, `web_url`, `lat`, `lng`, `ownership`) VALUES (NULL,'".$business_code."','".$business_name."', 'desc', '".$street_address."', '".$city."', '".$state."', '".$zip_code."', '".$key['Country']."', '".$category."', '".$key['Phone Number']."', 'fax', 'mobile', 'weburl', '".$lat."', '".$lng."', 'open')";
	    	$this->db->query($sql);
	    	$count++;

	    }
	
	}	

	public function get_info($id = NULL)
	{
		if($id)
		{
			$query = $this->mdl_default_businesses->get_where_custom('id',$id);
			return $query;
		}
		
	}

	public function get_list()
	{
		$query = $this->mdl_default_businesses->get('name ASC');
		return $query;
	}
    
    function update_geocode()
    {
            $geocode_address = $key['Street Address'].'+'.$key['City'].'+'.$key['State'].'+'.$key['Zip Code'];
            $response = Modules::run('_api_google_map/geocode_address',$geocode_address);
            $lat = $response->results[0]->geometry->location->lat;
            $lng = $response->results[0]->geometry->location->lng;
    }
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/_api_google_map.php */