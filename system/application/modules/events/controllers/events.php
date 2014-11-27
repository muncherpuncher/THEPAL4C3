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
        
	}


	/* Flipstop Biz */

	function personal_info($type)
	{	

		switch ($type) {

			case 'update':
						
			
					 $data = array(

                        'last_name'=> $this->input->post('last_name'),
                        'first_name'=> $this->input->post('first_name'),
                        'middle_name'=> $this->input->post('middle_name'),
                        'gender'=> $this->input->post('gender'),
                        'email'=> $this->input->post('email'),
                        'title'=> $this->input->post('title'),
                        'country'=> $this->input->post('country'),
                        'address'=> $this->input->post('address'),
                        'city'=> $this->input->post('city'),
                        'state'=> $this->input->post('state'),
                        'postal_code'=> $this->input->post('postal_code'),
                        'phone_number'=> $this->input->post('phone_number')

                    );

                    $this->db->where('users_id', $this->session->userdata('user_id'));
					$this->db->update('clients_personal_info', $data); 
					return (bool)($this->db->affected_rows() > 0);
				

				break;
			
			default:
				# code...
				break;
		}

		
	}

	function analytics($type,$timeline = NULL,$data = NULL)
	{	

		switch ($type) 
		{
			case 'get':

						if($timeline)
						{
								

							$counter = 0;

						        foreach($data as $key)
						        {   
						            $d_month = date("m",strtotime($key->date_created));
						            $d_year = date("Y",strtotime($key->date_created));

						            if($d_month==$timeline['month'] && $d_year==$timeline['year'])
						            {
						                 $counter++;
						            }
						 
						        }
						        return $counter;
							
						}
						else
						{
							$analytics_type = $data['type'];
							$business_id = $data['business_id'];
					    	$query = $this->db->get_where('clients_business_interaction',array('name'=>$analytics_type,'clients_business_branches_id'=>$business_id));
					    	return $query;	
						}
						
				break;


			
			default:
				# code...
				break;
		}

		
	}

	
	



	/* MyFlipstop */

	 

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */