<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Clients_business_collections extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->_data                      = new stdClass;

		// Load Model
		$this->load->model('mdl_clients_business_collections');
		// load Library 
		

		// View Template and Layout
		$this->_view_module 			  = "clients_business_collections";
		$this->_view_template_name		  = "site/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

    }
    
    public function save($type,$business_id,$user_id)
    {
        
       if($type)
        {

            $name = $type;
            $users_id = $user_id;
            $branch_id = $business_id;

            $data = array(

                'name'=>$name,
                'users_id'=>$user_id,
                'clients_business_branches_id'=>$branch_id,
                'date_created'=>date('Y-m-d')

            );

            $this->mdl_clients_business_collections->_insert($data);

        }


    }
  	
  	public function delete($collection_id)
    {
        if($collection_id)
        {
            $this->mdl_clients_business_collections->_delete($collection_id);

        }

    }

    

    public function get_info_by_user_collection($type,$business_id,$user_id)
    {
            $data = array(

                        'clients_business_branches_id' => $business_id,
                        'name' => $type,
                        'users_id' => $user_id

                        );

            $query = $this->mdl_clients_business_collections->get_where_array($data);
            return $query;
    }

    public function get_info_by_user_id($user_id)
    {
            $data = array(

                        'clients_business_branches_id' => $business_id,
                        'name' => $name

                        );

            $query = $this->mdl_clients_business_collections->get_where_custom('users_id',$user_id);
            return $query;
    }

}