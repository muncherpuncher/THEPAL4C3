<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Social_friends extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->_data                      = new stdClass;

		// Load Model
		$this->load->model('mdl_social_friends');

		// load Library 
		

		// View Template and Layout
		$this->_view_module 			  = "clients_business";
		$this->_view_template_name		  = "site/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

    }

    public function get_friends_list($user_id)
    {
    	$sql = "SELECT * FROM social_friends WHERE status_flag=1 AND friend_one_id='".$user_id."' OR friend_two_id='".$user_id."'";
    	$query = $this->mdl_social_friends->_custom_query($sql);
		return $query;
    }

    public function get_pending_friends_list($user_id)
    {
    	$sql = "SELECT * FROM social_friends WHERE status_flag=0 AND friend_one_id='".$user_id."' OR friend_two_id='".$user_id."'";
    	$query = $this->mdl_social_friends->_custom_query($sql);
		return $query;
    }

    public function check_user_presence($user_id)
    {
    	$is_off_line = Modules::run('users/is_off_line',$user_id); 
    	return $is_off_line;	
    }

    public function request_friend($data)
    {
    	$this->mdl_social_friends->_insert($data);	
    }

    public function check_friends_online($user_id)
    {
    	$is_off_line = Modules::run('users/is_off_line',$user_id); 
    	return $is_off_line;	
    }
  
    public function approve_friend($data)
	{	
		$sql = 'UPDATE social_friends
				SET status_flag="1"
				WHERE
				(friend_one_id="'.$data['friend_one_id'].'" OR friend_two_id="'.$data['friend_one_id'].'")
				AND
				(friend_one_id="'.$data['friend_two_id'].'" OR friend_two_id="'.$data['friend_two_id'].'")';

		$this->mdl_social_friends->_custom_query($sql);	
	}


	public function get_friend_info($friend_one_id,$friend_two_id)
	{	
		$data = array(

						'friend_one_id' => $friend_one_id,
						'friend_two_id' => $friend_two_id
					);

		$query = $this->mdl_social_friends->get_where_array($data);
		return $query;
	}




}