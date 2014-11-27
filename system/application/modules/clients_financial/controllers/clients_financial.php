<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Clients_financial extends MX_Controller {
    
    public function __construct() {
        
        parent::__construct();
		$this->_data                      = new stdClass;
		// Load Model

		$this->load->model('mdl_clients_financial');


		// load Library 
		

		// View Template and Layout
		$this->_view_module 			  = "clients_financial";
		$this->_view_template_name		  = "site/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

    }
    
    /* Load Views */
    public function index() {
    	
    	//$data['view_file'] = "tpl_register";
		//echo Modules::run('template/set_template_site',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);

    }

    public function registration_financial_information() {

    	$data['view_file'] = "tpl_financial";
		echo Modules::run('template/set_template_site',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);
        
    }

    public function process_financial_information()
    {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('tin', 'Tin', 'required');
        $this->form_validation->set_rules('company', 'Company', 'required');
        $this->form_validation->set_rules('company_address', 'Company Address', 'required');
        $this->form_validation->set_rules('company_phone', 'Company phone', 'required|min_length[4]|numeric');
        $this->form_validation->set_rules('company_fax', 'Company Fax', 'required|numeric');
        $this->form_validation->set_rules('sec_number', 'Sec Number', 'required');
        $this->form_validation->set_rules('company_email', 'Company Email', 'required');
        
        $posts = $this->input->post();
        $data['success'] = FALSE;
        
        if($posts) { 
          if ($this->form_validation->run() == FALSE) {
            $data['errors'] = array(
                'tin'               => form_error('tin', ' ', ' '),
                'company'           => form_error('company', ' ', ' '),
                'company_address'   => form_error('company_address', ' ', ' '),
                'company_phone'     => form_error('company_phone', ' ', ' '),
                'company_fax'       => form_error('company_fax', ' ', ' '),
                'sec_number'        => form_error('sec_number', ' ', ' '),
                'company_email'        => form_error('company_email', ' ', ' '),
            );          
          } else {
            $data['success'] = TRUE;
            $data['redirect_url'] = base_url().'payment';
            
            $financial_info = array(
                                    'tin_number'   => $this->input->post('tin', TRUE),
                                    'company_name'   => $this->input->post('company', TRUE),
                                    'company_address'   => $this->input->post('company_address', TRUE),
                                    'company_phone'      => $this->input->post('company_phone', TRUE),
                                    'company_fax'       => $this->input->post('company_fax', TRUE),
                                    'sec_number'     => $this->input->post('sec_number', TRUE),
                                    'company_email'     => $this->input->post('company_email', TRUE)
            );
            echo Modules::run('clients_registration/_parse_session_info',$financial_info, 'financial_info');
          }
        }
        echo json_encode($data);
    }
    
}