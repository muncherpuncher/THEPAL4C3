<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Clients_order extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->_data                      = new stdClass;

		// Load Model
		$this->load->model('mdl_clients_order');
		// load Library 
		

		// View Template and Layout
		$this->_view_module 			  = "clients_plan";
		$this->_view_template_name		  = "site/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

    }
    

    function save($user_id = NULL,$data = NULL)
    {   
    
            $shipping_method_info = $this->session->userdata('shipping_method_info');
            $payment_method_info = $this->session->userdata('payment_method_info');

            $data = array(

                            'orders_id' => $data['order_id'],
                            'users_id' => $user_id,
                            'tpl_payment_method_id' => $data['payment_method_id'],
                            'tpl_shipping_method_id' => $data['shipping_method_id']

                        );

            $this->mdl_clients_order->_insert($data);

    }

    function get_list($user_id = NULL)
    {   
        if($user_id)
        {
            $query = $this->mdl_clients_order->get_where_custom('users_id',$user_id);
            return $query;
        }

    }

    
    function get_info($order_id = NULL)
    {
        if($order_id)
        {
            $query = $this->mdl_clients_order->get_where_custom('orders_id',$order_id);
            return $query;
        }

    }





}