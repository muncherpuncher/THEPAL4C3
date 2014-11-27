<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Clients_business_branches extends MX_Controller {
    
    public function __construct() {

        parent::__construct();
		$this->_data                      = new stdClass;

		// Load Model
		$this->load->model('mdl_clients_business_branches');
		// load Library 
		

		// View Template and Layout
		$this->_view_module 			  = "clients_business_branches";
		$this->_view_template_name		  = "site/";
		$this->_view_template_layout	  = "layout_full";
		$this->_view_content 			  = "";

    }

    public function save($data)
    {	
			
			$data = array(

				'name'=> $data['name'],
				'description'=> $data['description'],
				'address'=> $data['address'],
				'city'=> $data['city'],
				'state'=> $data['state'],
				'postal_code'=> $data['postal_code'],
				'country'=> $data['country'],
				'category'=> $data['category'],
				'enable_flag'=> $data['enable_flag'],
				'date_registered'=> $data['date_registered'],
				'phone_number'=> $data['phone_number'],
				'clients_business_id'=> $data['clients_business_id'],
				'fax_number'=> $data['fax_number'],
				'mobile_number'=> $data['mobile_number'],
				'web_url' => $data['web_url'],
				'ownership_flag'=> $data['ownership_flag']
			);

			$this->mdl_clients_business_branches->_insert($data);
		
    }

    public function check_business_listing_session()
	{

		 $is_active_on_listing = $this->session->userdata('business_reg_status');
			
		if(!$is_active_on_listing)
		{
			echo json_encode(array('session_time'=>'expired'));
		}
	}

	public function renew_business_listing_session()
	{
		$this->session->set_userdata(array('business_reg_status'=>'open'));
	}

	public function clear_business_listing_session()
	{
		// Close business listing activity
		$this->session->set_userdata(array('business_reg_status'=>''));
		$session_data = $this->db->get_where('ci_sessions',array('session_id'=>$this->session->userdata('session_id')));
		
		$data = array('user_email'=>'');
		$this->db->where('session_id',$this->session->userdata('session_id'));
		$this->db->update('ci_sessions',$data);

		if($session_data->row()->user_email!="")
		{
			// Delete temporary business listing progress
			$this->db->where('user_email',$session_data->row()->user_email);
			$this->db->delete('temp_clients_business');
			$this->db->where('user_email',$session_data->row()->user_email);
			$this->db->delete('temp_clients_business_branches');
			$this->db->where('user_email',$session_data->row()->user_email);
			$this->db->delete('temp_clients_personal_info');
		}
		
	}

    public function add_business_branch_temp()
	{

		if($_POST)
		{		
			$user_sess_info = $this->session->userdata('user_sess_info');
			$user_email = $user_sess_info['email'];

			$fd_branch_name = $this->input->post('branch_name');
			$fd_description = $this->input->post('biz-description');
			$fd_address = $this->input->post('address');
			$fd_city = $this->input->post('city');
			$fd_state = $this->input->post('state');
			$fd_postal_code = $this->input->post('postal_code');
			$fd_country = $this->input->post('country');
			$fd_date_registered = date('Y-m-d');
			$fd_phone_number = $this->input->post('phone_number');
			$fd_web_url = $this->input->post('web_url');
			$fd_user_email =  $user_email;
			$fd_geo_lat =  $this->input->post('geo_lat');
			$fd_geo_lng =  $this->input->post('geo_lng');
			$fd_ad_size =  $this->input->post('adimage-size');
			$fd_ad_image =  $this->input->post('upload-image-name');
			$fd_fax_number = $this->input->post('fax_number');
			$fd_mobile_number = $this->input->post('mobile_number');
			$fd_main_category = $this->input->post('business_category');
			$fd_sub_category = $this->input->post('business_sub_category');

			// Business Hours
			$fd_monday = strtolower($this->input->post('monday_from_time')) . ' - ' . strtolower($this->input->post('monday_to_time')) . ' - ' . strtolower($this->input->post('monday_availability'));
			$fd_tuesday = strtolower($this->input->post('tuesday_from_time')) . ' - ' . strtolower($this->input->post('tuesday_to_time')) . ' - ' . strtolower($this->input->post('tuesday_availability'));
			$fd_wednesday = strtolower($this->input->post('wednesday_from_time')) . ' - ' . strtolower($this->input->post('wednesday_to_time')) . ' - ' . strtolower($this->input->post('wednesday_availability'));
			$fd_thursday = strtolower($this->input->post('thursday_from_time')) . ' - ' . strtolower($this->input->post('thursday_to_time')) . ' - ' . strtolower($this->input->post('thursday_availability'));
			$fd_friday = strtolower($this->input->post('friday_from_time')) . ' - ' . strtolower($this->input->post('friday_to_time')) . ' - ' . strtolower($this->input->post('friday_availability'));
			$fd_saturday = strtolower($this->input->post('saturday_from_time')) . ' - ' . strtolower($this->input->post('saturday_to_time')) . ' - ' . strtolower($this->input->post('saturday_availability'));
			$fd_sunday = strtolower($this->input->post('sunday_from_time')) . ' - ' . strtolower($this->input->post('sunday_to_time')) . ' - ' . strtolower($this->input->post('sunday_availability'));


			// Ad Rate info
			$ad_rate_info = $this->db->get_where('tpl_ad_rates',array('name'=>$fd_ad_size));

			$data = array(

				'name'=>$fd_branch_name,
				'description'=>$fd_description,
				'address'=>$fd_address,
				'city'=>$fd_city,
				'state'=>$fd_state,
				'postal_code'=>$fd_postal_code,
				'country'=>$fd_country,
				'date_registered'=>$fd_date_registered,
				'phone_number'=>$fd_phone_number,
				'mobile_number'=>$fd_mobile_number,
				'fax_number'=>$fd_fax_number,
				'web_url'=>$fd_web_url,
				'user_email'=>$fd_user_email,
				'geo_x'=>$fd_geo_lat,
				'geo_y'=>$fd_geo_lng,
				'ad_size'=>$fd_ad_size,
				'ad_price'=>number_format($ad_rate_info->row()->price,2),
				'ad_image'=>$fd_ad_image,
				'office_hour_monday'=>$fd_monday,
				'office_hour_tuesday'=>$fd_tuesday,
				'office_hour_wednesday'=>$fd_wednesday,
				'office_hour_thursday'=>$fd_thursday,
				'office_hour_friday'=>$fd_friday,
				'office_hour_saturday'=>$fd_saturday,
				'office_hour_sunday'=>$fd_sunday,
				'category'=>'{"main":"'.$fd_main_category.'","sub":"'.$fd_sub_category.'"}'

			);

			$this->db->insert('temp_clients_business_branches',$data);

			$this->db->where('id',$this->db->insert_id());
			$query = $this->db->get('temp_clients_business_branches');

			// Ad rate
			foreach ($query->result() as $key) {
			
					$data = array(

							'branch_id'=> base64_encode($key->id),
							'branch_name'=>$key->name,
							'ad_image'=>$key->ad_image,
							'ad_price'=>number_format($ad_rate_info->row()->price,2),
							'address'=> $fd_address . ' ' . $fd_city . ' ' . $fd_state . ' ' . $fd_postal_code . ' ' . $fd_country,
							'date_registered'=>$fd_date_registered,
							'phone_number'=>$fd_phone_number,
							'web_url'=>$fd_web_url,
							'user_email'=>$fd_user_email,
							'geo_y'=>$fd_geo_lat,
							'geo_x'=>$fd_geo_lng,
							'office_hour_monday'=>$fd_monday,
							'office_hour_tuesday'=>$fd_tuesday,
							'office_hour_wednesday'=>$fd_wednesday,
							'office_hour_thursday'=>$fd_thursday,
							'office_hour_friday'=>$fd_friday,
							'office_hour_saturday'=>$fd_saturday,
							'office_hour_sunday'=>$fd_sunday,
							'category'=> $fd_main_category . ' - ' . $fd_sub_category

							);

					echo json_encode($data);

			}

			
		


		}
		
	}

    public function remove_branch_image_temp()
    {
    	if($_POST)
		{
			$image_filename = $this->input->post('img_filename');
			$path ='_assets/_media_uploads/images/business/temp/tiles/'; // upload directory
			unlink($path . $image_filename);
		}
    }

    public function cart_branch_total()
	{
		$user_sess_info = $this->session->userdata('user_sess_info');
		$user_email = $user_sess_info['email'];
		$query = $this->db->get_where('temp_clients_business_branches',array('user_email'=>$user_email));
		echo count($query->result());
	}

	public function remove_branch_temp()
	{

		if($_POST)
		{	
			$branch_id = base64_decode($this->input->post('branch_id'));
			$image_info = $this->db->get_where('temp_clients_business_branches', array('id' => $branch_id));
			$this->db->delete('temp_clients_business_branches', array('id' => $branch_id)); 
			echo json_encode(array('image_filename'=>$image_info->row()->ad_image));
		}

	}

	public function list_business()
	{


			$user_sess_info = $this->session->userdata('user_sess_info');
			$user_email = $user_sess_info['email'];
			$clients_personal_info = $this->db->get_where('temp_clients_personal_info',array('user_email'=>$user_email));

			$data = array(

							'username' => $user_email,
							'password' => $clients_personal_info->row()->password,
							'access_flag'=> '1',
							'verify_flag' => '1',
							'type'=>'business',
							'date_created' => date('Y-m-d')

							);
			

			// Save user
			echo Modules::run('users/register','business',$data);
			$user_id = $this->db->insert_id();

			// Delete verification code
			echo Modules::run('users_verification_code/delete','email',$user_email);

			$data = array(
							'role_enable_flag'=> 1,
							'users_id' => $user_id,
							'users_role_id' => 2
						 );

			echo Modules::run('users_access_role/save',$data);

			$data = array(

                            'users_id'=> $user_id,
                            'last_name'=> $clients_personal_info->row()->last_name,
                            'first_name'=> $clients_personal_info->row()->first_name,
                            'middle_name'=>	$clients_personal_info->row()->middle_name,
                            'gender'=> $clients_personal_info->row()->gender,
                            'email'=> $clients_personal_info->row()->email,
                            'title'=> $clients_personal_info->row()->title,
                            'country'=> $clients_personal_info->row()->country,
                            'address'=> $clients_personal_info->row()->address,
                            'city'=> $clients_personal_info->row()->city,
                            'state'=> $clients_personal_info->row()->state,
                            'postal_code'=> $clients_personal_info->row()->postal_code,
                            'phone_number'=> $clients_personal_info->row()->phone_number

                        );

			// Save client personal info
			echo Modules::run('clients_personal_info/save',$user_id,'business',$data);

			$clients_business_info = $this->db->get_where('temp_clients_business',array('user_email'=>$user_email));

			$data = array(

				'users_id'=>$user_id,
				'name'=>$clients_business_info->row()->name,
				'date_registered'=>date('Y-m-d')
			);


			// Save client business info
			echo Modules::run('clients_business/register',$data);

			$business_id = $this->db->insert_id();
			$this->session->set_userdata(array('business_id'=>$business_id));


			// Fetch busienss branches
			$clients_business_branches_info = $this->db->get_where('temp_clients_business_branches',array('user_email'=>$user_email));
	
			foreach ($clients_business_branches_info->result() as $key) {
				
				$data = array(

					'name'=> $key->name,
					'description'=> $key->description,
					'address'=> $key->address,
					'city'=> $key->city,
					'state'=> $key->state,
					'postal_code'=> $key->postal_code,
					'country'=> $key->country,
					'category'=> $key->category,
					'enable_flag'=> 1,
					'date_registered'=> date('Y-m-d'),
					'phone_number'=> $key->phone_number,
					'fax_number'=> $key->fax_number,
					'mobile_number'=> $key->mobile_number,
					'web_url'=> $key->web_url,
					'ownership_flag'=>'close',
					'clients_business_id'=> $business_id
				);

				// Save business branches
				echo Modules::run('clients_business_branches/save',$data);
				$branch_id = $this->db->insert_id();


				// Get plan mode 

				// Save client plan info
				$data = array(

					'clients_business_branches_id'=> $branch_id,
					'clients_plan_mode_id'=> 1,
					'enable_flag'=> 1,
					'date_created'=> date('Y-m-d'),
					'date_expires'=> date('Y-m-d', strtotime('+30 days'))
				);


				echo Modules::run('clients_plan/register',$data);

				// Save Branch Geo Map
				$data = array(
							
							'monday'=> $key->office_hour_monday,
							'tuesday'=> $key->office_hour_tuesday,
							'wednesday'=> $key->office_hour_wednesday,
							'thursday'=> $key->office_hour_thursday,
							'friday'=> $key->office_hour_friday,
							'saturday'=> $key->office_hour_saturday,
							'sunday'=> $key->office_hour_sunday,
							'clients_business_branches_id'=>$branch_id,
						);

				// Save business branches hours
				$this->db->insert('clients_business_branches_hours',$data);


				// Save Branch Geo Map
				$data = array(

		    				'geo_x'=> $key->geo_x,
		    				'geo_y'=> $key->geo_y,
		    				'clients_business_branches_id'=> $branch_id

							);

				echo Modules::run('clients_business_gmap/save',$data);

				$data = array(
				
					'filename'=> $key->ad_image,
					'size'=> $key->ad_size,
					'date_created'=> date('Y-m-d'),
					'clients_business_branches_id'=> $branch_id
				);

				// Save Branch image cover
				echo Modules::run('clients_business_images/save',$data);

				$source = '_assets/_media_uploads/images/business/temp/tiles/'.$key->ad_image;
				$destination =  '_assets/_media_uploads/images/business/tiles/'.$key->ad_image;
				copy($source,$destination);
				unlink($source);

			
			}

	

			//echo Modules::run('clients_card_info/save',$user_id);
		    $user_info = Modules::run('clients_personal_info/get_info',$user_id);
		  
		    
	        // Mark as new user on session for welcoming
	        $new_user_data = array('new_user_data'=> 1,'firstname'=> $user_info->row()->first_name);
	        $this->session->set_userdata('new_user',$new_user_data);

	        // Send Email
	        $this->load->library('email');
			$this->load->helper('string');
	   		

			// Send Mail
	        $message = array(
	             'name'     => $user_info->row()->first_name
	        );

	        $from_name = 'yourfiends@myflipstop.com'; 
			$status = $this->email->send_email('local',strtolower($user_email), strtolower(trim($from_name)), 'FlipStop Business Account', $message, 'registration_business'); 

	        // Clear Temporary Data
			$this->db->where('user_email',$user_email);
			$this->db->delete('temp_clients_business');
			$this->db->where('user_email',$user_email);
			$this->db->delete('temp_clients_business_branches');
			$this->db->where('user_email',$user_email);
			$this->db->delete('temp_clients_personal_info');
			$this->db->where('email',$user_email);
			$this->db->delete('users_verification_code');

			return $status;

	}

    public function update($id,$data)
    {	
       
			$data = array(

				'name'=> $data['name'],
				'description'=> $data['description'],
				'address'=> $data['address'],
				'city'=> $data['city'],
				'state'=> $data['state'],
				'postal_code'=> $data['postal_code'],
				'country'=> $data['country'],
				'category'=> $data['category'],
				'date_registered'=> $data['date_registered'],
				'phone_number'=> $data['phone_number'],
				'fax_number'=> $data['fax_number'],
				'mobile_number'=> $data['mobile_number'],
				'web_url' => $data['web_url']
			);
        
		$this->mdl_clients_business_branches->_update_where('id',$id,$data);
		
    }

    public function delete()
    {	

    	if($_POST)
		{
			$branch_id = $this->input->post('branch_id');
			$this->mdl_clients_business_branches->_delete($branch_id);
		}

    }

    public function get_list_nearest($lat,$lng,$max)
	{	
			
		$user_lat = $lat; 
		$user_lng = $lng;

		// Search the rows in the markers table
		$query = "(SELECT id,lat,lng,'open' as source, ( 3959 * acos( cos( radians(".$user_lat.") ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(".$user_lng.") ) + sin( radians(".$user_lat.") ) * sin( radians( lat ) ) ) ) AS distance FROM default_businesses HAVING distance > 0) UNION  
				  (SELECT id,x,y,'close',( 3959 * acos( cos( radians(".$user_lat.") ) * cos( radians( x ) ) * cos( radians( y ) - radians(".$user_lng.") ) + sin( radians(".$user_lat.") ) * sin( radians( x ) ) ) ) AS distance FROM clients_business_gmap HAVING distance > 0) ORDER BY distance  LIMIT 0 , 27";
		
		$result = $this->db->query($query);
		return $result;

	}
    	
    public function get_list_nearest_append()
	{		
		
		$user_lat = $_COOKIE["fs_lat"]; 
		$user_lng = $_COOKIE["fs_lng"];

		// No. of items per page
		$last_distance = $this->input->post('last_distance');
		var_dump($last_distance);

		$data = array();

	    $sql_query = "(SELECT id,lat,lng,'open' as source, ( 3959 * acos( cos( radians(".$user_lat.") ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(".$user_lng.") ) + sin( radians(".$user_lat.") ) * sin( radians( lat ) ) ) ) AS distance FROM default_businesses HAVING distance > 0 AND distance > '".$last_distance."') UNION  
				      (SELECT id,x,y,'close',( 3959 * acos( cos( radians(".$user_lat.") ) * cos( radians( x ) ) * cos( radians( y ) - radians(".$user_lng.") ) + sin( radians(".$user_lat.") ) * sin( radians( x ) ) ) ) AS distance FROM clients_business_gmap HAVING distance > 0 AND distance > '".$last_distance."') ORDER BY distance  LIMIT 5";

		$result = $this->db->query($sql_query);

		if(count($result->result()) > 0)
		{
			// Iterate through the rows
			foreach ($result->result() as $key) {

					$source = $key->source;
					$business_id = $key->id;
					$business_info = "";
					$business_name = "";
					$business_category_array = "";
					$business_category = "";
					$business_ownership = "";

				    $image_width = "";
		            $image_height = "";
		            $image_info = "";
		            $image_filename = "";
		            $image_tile_size = "";


					switch ($source) {

						case 'close':

								$business_info = Modules::run('clients_business_branches/get_info',$business_id);
								
								if(count($business_info->result())>0)
								{
									$business_name = $business_info->row()->name;
		  							$business_category_array = json_decode($business_info->row()->category,TRUE);
		  							$business_category = $business_category_array['main'];
		  							$business_ownership = "close";
		  							$image_info = Modules::run('clients_business_images/get_info_by_branch_id',$business_id);
									$image_size_info = Modules::run('tmpl_ad_rates/get_info_by_name',$image_info->row()->size);
						            $image_filename = base_url('_assets/_media_uploads/images/business/tiles/'.$image_info->row()->filename);
						           	$image_tile_size = $image_info->row()->size;
						           	$image_width = $image_size_info->row()->size_width;
									$image_height = $image_size_info->row()->size_height;
									
						        }
					          

							break;

						case 'open':

								$business_info = $this->db->query("SELECT * FROM `default_businesses` WHERE id='".$business_id."'");

								if(count($business_info->result())>0)
								{		

									$array_image = array('single','double','quad');
									$array_image_rand = $array_image[mt_rand(0, count($array_image) - 1)];
									$business_name = $business_info->row()->name;
									$business_category_array = json_decode($business_info->row()->category,TRUE);
		  							$business_category = $business_category_array['main'];
		  							$business_ownership = "open";
		  							$image_info = Modules::run('tmpl_business_categories/get_info_by_parent_name',$business_category);
									$image_size_info = Modules::run('tmpl_ad_rates/get_info_by_name',$array_image_rand);
						            $image_filename = base_url('_assets/sites_flipstop/default/img/tile-covers/'.$image_info->row()->tile);
						            $image_tile_size = $array_image_rand;
						           	$image_width = $image_size_info->row()->size_width;
									$image_height = $image_size_info->row()->size_height;
						   	
						        }

							break;
						default:
							# code...
							break;
					}


		            switch ($image_tile_size) {
		              case 'single':
		                $business_name = strlen($business_name) > 16 ? substr($business_name, 0,16).'...'  : $business_name;     
		                break;
		              case 'double':
		                $business_name = strlen($business_name) > 30 ? substr($business_name, 0,30).'...'  : $business_name;     
		                break;
		              case 'quad':
		                $business_name = strlen($business_name) > 40 ? substr($business_name, 0,40).'...'  : $business_name;     
		                break;
		              default:
		                # code...
		                break;
		            }

		         

					$data[] = array(

									'business_name'=> ucfirst($business_name),
									'business_category'=> $business_category,
									'business_ownership'=>$business_ownership,
									'image_filename'=> $image_filename,
									'image_width'=> $image_width,
									'image_height'=> $image_height,
									'image_tile_size' => $image_tile_size,
									'source'=> $key->source,
									'id'=> $key->id,
									'lat'=> $key->lat,
									'lng'=> $key->lng,
									'distance'=> number_format($key->distance,2)

								 );

			
			}

			var_dump($data);
			//echo json_encode($data);

		}	
		else
		{
			echo json_encode(array('status'=>'nodata'));
		}

	}

	public function get_owned_businesses($business_id)
	{
		$query = $this->mdl_clients_business_branches->get_where_custom('clients_business_id',$business_id);
		return $query;
	}	

	public function get_info($id = NULL)
	{
		if($id)
		{
			$query = $this->mdl_clients_business_branches->get_where_custom('id',$id);
			return $query;
		}
		
	}

	public function get_list()
	{

		$query = $this->mdl_clients_business_branches->get('name ASC');
		return $query;
	}

}