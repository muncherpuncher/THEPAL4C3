<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notifications extends MX_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.htmlf
	 */
	function __construct()
	{
		parent::__construct();
		$this->_data                      = new stdClass;
	
		// Load Model
		$this->load->model('mdl_notifications');

		// Load Modules
		$this->load->module('user');
		$this->load->module('template');
	
		// load Library 
		

		// View Template and Layout
		$this->_view_template			  = "fbtab";
		$this->_view_template			  = "admin_panel_default/";
		$this->_view_template_layout	  = "layout_sections";

		 $this->load->library('form_validation');
		
	}
		

	function index()
	{

		
	}



    public function count()
    {
    	$data = $this->mdl_notifications->get_where_custom('user_id',$this->session->userdata('user_id'));
		return  count($data->result());

    }

    public function display()
    {
    	$data = $this->mdl_notifications->_custom_query("SELECT * FROM notifications WHERE user_id='".$this->session->userdata('user_id')."' ORDER BY id LIMIT 5");
		return  $data;

    }


	public function view()
	{

		$type = $this->uri->segment(4);

		// Filter per type
		if($type)	
		{

		}
		else
		{	
			// display all
					
				// Template view content
			
				$data['notifications_list'] = $this->mdl_notifications->get_where_custom('user_id',$this->session->userdata('user_id'));
				$data['list_count'] = count($data['notifications_list']->result());

					
				if( $data['list_count'] > 0)
				{	

					
					$data['view_content'] = "tpl_notifications_list";
					// Render View from Template layout
					echo Modules::run('template/set_template',$this->_view_template, $this->_view_template_layout,$data);

				}
				else
				{
					

					$data['view_content'] = "tpl_message";
				    $data['message'] = $this->message->display('error_noritems');
				    echo Modules::run('template/set_template',$this->_view_template, $this->_view_template_layout,$data);

				}

		}



	}




	function create($notification_type,$notification_event,$notification_table,$notification_id)
	{	

		$data = array(

					'user_id'=> $this->session->userdata('user_id'),
					'notification_type'=> $notification_type ,
					'notification_content'=> $notification_event,
					'notification_table_name'=> $notification_table,
					'notification_table_id'=> $notification_id,
					'notification_readflag'=> '0',
					'notification_timestamp'=> time(),
					'notification_dateadded'=> date('Y-m-d')

					);


		$this->mdl_notifications->_insert($data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */