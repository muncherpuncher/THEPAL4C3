<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Clients_chat extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->_data                      = new stdClass;

		// Load Model
		$this->load->model('mdl_clients_plan');
		// load Library 
		

		// View Template and Layout
		$this->_view_module             = "clients_chat";
        $this->_view_template_name        = "sites_flipstop/default/";
		$this->_view_template_layout	  = "layout_sections";

		$this->_view_content 			  = "";
        $this->_user_info                 = "";
        $this->_friend_list               = "";

        // Set user type
        DEFINE('USERTYPE','basic');


        //Get User Role
        if($this->session->userdata('is_logged_in')==1 && $this->session->userdata('user_type')=='basic')
        {
            // Get user info
            $this->_user_info = Modules::run('clients_personal_info/get_info',$this->session->userdata('user_id'));
            $this->_pending_friend_request = Modules::run('social_friends/get_pending_friends_list',$this->session->userdata('user_id'));
            $this->_friend_list = Modules::run('social_friends/get_friends_list',$this->session->userdata('user_id'));
    
        }


    }
    
    
    public function index()
    {   

        $data['friends'] = $this->friends_list();  
        $data['view_file'] = "chat/index.php";
        echo Modules::run('template/set_template_site_flipstop',$this->_view_module,$this->_view_template_name,$this->_view_template_layout,$data);

    }
    
    public function user_info()
    {
        $personal_info = Modules::run('clients_personal_info/get_info',$this->session->userdata('user_id'));
        
        if(count($personal_info->result())>0)
        {
            $name = $personal_info->row()->first_name;
            echo $name;
        }
        
    }


    public function friends_list()
    {   

        $friends_data = array();
        $friends_info = $this->_friend_list;

        foreach ($friends_info->result() as $key) 
        {
                
            if($key->friend_two_id == $this->session->userdata('user_id'))
            {
                $friend_id = $key->friend_one_id;
            }
            else if($key->friend_one_id == $this->session->userdata('user_id'))
            {
                $friend_id = $key->friend_two_id;
            }

            $friend_info = Modules::run('clients_personal_info/get_info',$friend_id);
            $is_off_line = Modules::run('social_friends/check_user_presence',$friend_id); 
            $user_info = Modules::run('users/get_info',USERTYPE,'',$friend_id);
        
            $friends_data = array(

                            'friend_info' => array(

                                             'presence' => $is_off_line,
                                             'user_id' => base64_encode($user_info->row()->id),
                                             'name' => $friend_info->row()->first_name,
                                             'gender' => $friend_info->row()->gender,
                                             'photo' => $friend_info->row()->photo

                                            )


                         );

        }

         return $friends_data;
      
        


    }



}