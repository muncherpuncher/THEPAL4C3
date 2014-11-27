<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Clients_business_interaction extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->_data                      = new stdClass;
		// Load Model

		$this->load->model('mdl_clients_business_interaction');


		// load Library 
		

		// View Template and Layout
		$this->_view_module 			  = "clients_business_interaction";
		$this->_view_template_name		  = "site/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

    }
    


    public function save($type,$business_id,$user_id)
    {
        
       if($type)
        {

            $fd_name = $type;
            $fd_users_id = $user_id;
            $fd_clients_business_branches_id = $business_id;

            $data = array(

                'name'=>$fd_name,
                'users_id'=>$fd_users_id,
                'clients_business_branches_id'=>$fd_clients_business_branches_id,
                'date_created'=>date('Y-m-d')

            );

            $this->mdl_clients_business_interaction->_insert($data);

        }


    }

    public function get_info_by_user_id($user_id)
    {
            $data = array(

                        'clients_business_branches_id' => $business_id,
                        'name' => $name

                        );

            $query = $this->mdl_clients_business_interaction->get_where_custom('users_id',$user_id);
            return $query;
    }

     public function get_info_by_user_analytic_name($user_id,$business_id,$name)
    {
            $data = array(

                        'clients_business_branches_id' => $business_id,
                        'name' => $name,
                        'users_id' => $user_id

                        );

            $query = $this->mdl_clients_business_interaction->get_where_array($data);
            return $query;
    }

    public function get_info_by_analytic($business_id,$name)
    {
            $data = array(

                        'clients_business_branches_id' => $business_id,
                        'name' => $name

                        );

            $query = $this->mdl_clients_business_interaction->get_where_array($data);
            return $query;
    }

    
    public function count_analytics_by_month($data,$month,$year)
    {   

        $counter = 0;

        foreach($data as $key)
        {   
            $d_month = date("m",strtotime($key->date_created));
            $d_year = date("Y",strtotime($key->date_created));

            if($d_month==$month && $d_year==$year)
            {
                 $counter++;
            }
 
        }
        return $counter;

    }

    public function count_analytics_by_year($data,$year)
    {   

        $counter = 0;

        foreach($data as $key)
        {   
            $d_month = date("m",strtotime($key->date_created));
            $d_year = date("Y",strtotime($key->date_created));

            if($d_year==$year)
            {
                 $counter++;
            }
 
        }
        return $counter;

    }

    public function get_list()
    {
        $query = $this->mdl_clients_business_interaction->get('name ASC');
        return $query;
    }


}