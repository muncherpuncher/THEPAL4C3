<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Redirection 
{

    public $code;

	
	function __construct()
	{
		$this->CI =& get_instance();

	}
	
	public function load($code)
    {
	     
         $url = "";

         switch ($code) {
             case 'dashboard':
                 $url = base_url('dashboard');
                 break;
             case 'store_set_up':
                 $url = base_url('dashboard/quickstart/supplier');
                 break;
             default:
                 # code...
                 break;

                
         }

        return $url;
	
	

    }

    

    
}

/* End of file welcome.php */
/* Location: ./application/controllers/theme.php */