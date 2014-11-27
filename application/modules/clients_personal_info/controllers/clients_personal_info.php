<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Clients_personal_info extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->_data                      = new stdClass;
		// Load Model

		$this->load->model('mdl_clients_personal_info');

		// View Template and Layout
		$this->_view_module 			  = "clients_account";
		$this->_view_template_name		  = "site/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

    }


    public function save($user_id,$usertype,$data = NULL)
    {   
        switch ($usertype) {
            case 'basic':
                    
                    if($_POST)
                    {
                    
                        $fd_last_name = '';
                        $fd_first_name = $this->input->post('first_name');
                        $fd_middle_name = '';
                        $fd_gender = $this->input->post('opt-gender');
                        $fd_photo = 'none';
                        $fd_email = $this->input->post('email');
                        $fd_title = '';
                        $fd_country = $this->input->post('country');
                        $fd_address = '';
                        $fd_phone_number = '';
                        $fd_birth_date = $this->input->post('birth_date');

                        switch ($fd_country) {
                            case 'Philippines':

                                $fd_city = $this->input->post('city_dropdown');
                                $fd_state = $this->input->post('state_dropdown');
                                $fd_postal_code = '';

                                    $data = array(

                                        'users_id'=>$user_id,
                                        'last_name'=>$fd_last_name,
                                        'first_name'=>$fd_first_name,
                                        'middle_name'=>$fd_middle_name,
                                        'gender'=>$fd_gender,
                                        'photo'=>$fd_photo,
                                        'email'=>$fd_email,
                                        'title'=>$fd_title,
                                        'country'=>$fd_country,
                                        'address'=>$fd_address,
                                        'city'=>$fd_city,
                                        'state'=>$fd_state,
                                        'postal_code'=>$fd_postal_code,
                                        'phone_number'=>$fd_phone_number,
                                        'birth_date' => $fd_birth_date

                                    );

                                    $this->mdl_clients_personal_info->_insert($data);

                                break;
                      
                            default:


                                    $fd_city = $this->input->post('city');
                                    $fd_state = $this->input->post('state');
                                    $fd_postal_code = $this->input->post('postal_code');


                                    $data = array(

                                        'users_id'=>$user_id,
                                        'last_name'=>$fd_last_name,
                                        'first_name'=>$fd_first_name,
                                        'middle_name'=>$fd_middle_name,
                                        'gender'=>$fd_gender,
                                        'photo'=>$fd_photo,
                                        'email'=>$fd_email,
                                        'title'=>$fd_title,
                                        'country'=>$fd_country,
                                        'address'=>$fd_address,
                                        'city'=>$fd_city,
                                        'state'=>$fd_state,
                                        'postal_code'=>$fd_postal_code,
                                        'phone_number'=>$fd_phone_number,
                                        'birth_date' => ''

                                    );

                                    $this->mdl_clients_personal_info->_insert($data);
                                    
                                break;
                        }

                        

                    }


                break;

            case 'business':


                    $data = array(

                        'users_id'=> $data['users_id'],
                        'last_name'=> $data['last_name'],
                        'first_name'=> $data['first_name'],
                        'middle_name'=> $data['middle_name'],
                        'gender'=> $data['gender'],
                        'email'=> $data['email'],
                        'title'=> $data['title'],
                        'country'=> $data['country'],
                        'address'=> $data['address'],
                        'city'=> $data['city'],
                        'state'=> $data['state'],
                        'postal_code'=> $data['postal_code'],
                        'phone_number'=> $data['phone_number']

                    );


                    $this->mdl_clients_personal_info->_insert($data);


                break;    
            
            default:
                # code...
                break;
        }
           

    }

    public function update($user_id,$usertype,$data = NULL)
    {   
        switch ($usertype) {
            case 'basic':
                    
                    if($_POST)
                    {
                    
                        $fd_last_name = '';
                        $fd_first_name = $this->input->post('first_name');
                        $fd_middle_name = '';
                        $fd_gender = $this->input->post('opt-gender');
                        $fd_photo = 'none';
                        $fd_email = $this->input->post('email');
                        $fd_title = '';
                        $fd_country = $this->input->post('country');
                        $fd_address = '';
                        $fd_phone_number = '';
                        $fd_birth_year = $this->input->post('birth_year_dropdown');

                        switch ($fd_country) {
                            case 'Philippines':

                                $fd_city = $this->input->post('city_dropdown');
                                $fd_state = $this->input->post('state_dropdown');
                                $fd_postal_code = '';

                                    $data = array(

                                        'users_id'=>$user_id,
                                        'last_name'=>$fd_last_name,
                                        'first_name'=>$fd_first_name,
                                        'middle_name'=>$fd_middle_name,
                                        'gender'=>$fd_gender,
                                        'photo'=>$fd_photo,
                                        'email'=>$fd_email,
                                        'title'=>$fd_title,
                                        'country'=>$fd_country,
                                        'address'=>$fd_address,
                                        'city'=>$fd_city,
                                        'state'=>$fd_state,
                                        'postal_code'=>$fd_postal_code,
                                        'phone_number'=>$fd_phone_number,
                                        'birth_date' => $fd_birth_year

                                    );

                                    $this->mdl_clients_personal_info->_insert($data);

                                break;
                      
                            default:


                                    $fd_city = $this->input->post('city');
                                    $fd_state = $this->input->post('state');
                                    $fd_postal_code = $this->input->post('postal_code');


                                    $data = array(

                                        'users_id'=>$user_id,
                                        'last_name'=>$fd_last_name,
                                        'first_name'=>$fd_first_name,
                                        'middle_name'=>$fd_middle_name,
                                        'gender'=>$fd_gender,
                                        'photo'=>$fd_photo,
                                        'email'=>$fd_email,
                                        'title'=>$fd_title,
                                        'country'=>$fd_country,
                                        'address'=>$fd_address,
                                        'city'=>$fd_city,
                                        'state'=>$fd_state,
                                        'postal_code'=>$fd_postal_code,
                                        'phone_number'=>$fd_phone_number,
                                        'birth_date' => ''

                                    );

                                    $this->mdl_clients_personal_info->_insert($data);
                                    
                                break;
                        }

                        

                    }


                break;

            case 'business':


                    $data = array(

                        'last_name'=> $data['last_name'],
                        'first_name'=> $data['first_name'],
                        'title'=> $data['title'],
                        'country'=> $data['country'],
                        'address'=> $data['address'],
                        'city'=> $data['city'],
                        'state'=> $data['state'],
                        'postal_code'=> $data['postal_code'],
                        'phone_number'=> $data['phone_number']

                    );

                    $this->mdl_clients_personal_info->_update_where('users_id',$user_id,$data);


                break;    
            
            default:
                # code...
                break;
        }
           

    }

    public function get_info($user_id)
    {
        $query = $this->mdl_clients_personal_info->get_where_custom('users_id',$user_id);
        return $query;

    }

    public function get_info_by_email_address($email)
    {
        $query = $this->mdl_clients_personal_info->get_where_custom('email',$email);
        return $query;

    }
   
    
}