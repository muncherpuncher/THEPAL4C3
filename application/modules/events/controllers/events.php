<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends MX_Controller {

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

	public function __construct() {
        parent::__construct();
        $this->load->model('mdl_events');
	}


	function get_list()
	{	
		$query = $this->mdl_events->get('start_date DESC');
    	return $query;
	}

	function delete_event()
	{	
		if($_POST)
		{
			$id				= $this->input->post('event_id');	
			$this->mdl_events->_delete($id);

		}
	}

	function add_event()
	{	
		if($_POST)
		{
			$title			= $this->input->post('title');		
			$description	= $this->input->post('description');	
			$location		= $this->input->post('location');	
			$start_date		= $this->input->post('start_date');		
			$start_time		= $this->input->post('start_time');	
			$end_date		= $this->input->post('end_date');	
			$end_time		= $this->input->post('end_time');	
					
			$data = array(

						'title' => $title,
						'description' => $description,
						'location' => $location,
						'start_date' => $start_date,
						'start_time' => $start_time,
						'end_date' => $end_date,
						'end_time' => $end_time,
						'date_added' => date('Y-m-d'),
						'status_flag' => 1

						);

			$this->mdl_events->_insert($data);

			return true;

		}
	}

	function update_event()
	{	
		if($_POST)
		{	
			$id				= $this->input->post('id');	
			$title			= $this->input->post('title');		
			$description	= $this->input->post('description');	
			$location		= $this->input->post('location');	
			$start_date		= $this->input->post('start_date');		
			$start_time		= $this->input->post('start_time');	
			$end_date		= $this->input->post('end_date');	
			$end_time		= $this->input->post('end_time');	
					
			$data = array(

						'title' => $title,
						'description' => $description,
						'location' => $location,
						'start_date' => $start_date,
						'start_time' => $start_time,
						'end_date' => $end_date,
						'end_time' => $end_time,
						'date_added' => date('Y-m-d'),
						'status_flag' => 1		
							
						);

			$this->mdl_events->_update( $id, $data );

			return true;

		}
	}
	
	function get_info( $id )
	{	
		if( $id )
		{
			$query = $this->mdl_events->get_where_custom('id', $id );
			return $query;
		}
	}
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */