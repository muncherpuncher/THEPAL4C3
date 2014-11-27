<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message 
{

    public $code;

	
	function __construct()
	{
		$this->CI =& get_instance();

	}
	
	public function display($code)
    {
	     $msg = "";
         $type = "";

         switch ($code) {
             case 'error_login':
                 $msg = 'Invalid access credentials';
                 $type = "error";
                 break;
             case 'success_login':
                $msg = 'Login successful';
                $type = "success";
                break;
             case 'success_db_insert':
                $msg = 'Successfully saved';
                $type = "success";
                break;
             case 'error_db_item_exists':
                $msg = 'Item Exists';
                $type = "error";
                break;            
             case 'error_invalidrequest':
                $msg = 'Invalid Request';
                $type = "error";
                break;
	         case 'error_noritems':
                $msg = 'There are no items to display';	
                $type = "error";
                break;
             case 'error_db_request':
                $msg = 'Something went wrong with your request. Please try again later.';   
                $type = "error";
		        break;
             case 'failed_request':
                $msg = 'Request failed';   
                $type = "error";
                break;
              case 'error_media_file_invalid':
                $msg = 'Invalid file.';   
                $type = "error";
                break;
              case 'error_media_file_notuploaded':
                $msg = 'File not uploaded.';   
                $type = "error";
                break;
              case 'success_media_file_uploaded':
                $msg = 'File uploaded.';   
                $type = "success";
                break;
               case 'success_record_update':
                $msg = 'Successfully updated.';   
                $type = "success";
                break;
              case 'warning_loading_resources':
                $msg = 'Synchronizing Content...';   
                $type = "warning";
                break;
               case 'success_loading_resources':
                $msg = 'Synchronization complete';   
                $type = "success";
                break;
               case 'success_list_copy':
                $msg = 'List successfully copied';   
                $type = "success";
                break; 
               case 'success_list_setdatasource':
                $msg = 'Data source added';   
                $type = "success";
                break; 
               case 'redirect_to_supplier_admin':
                $msg = 'Redirecting to your admin...';   
                $type = "success";
                break; 
               case 'store_set_up_complete':
                $msg = 'Congratulations! your store is set up';   
                $type = "success";
                break; 
               case 'user_account_verified':
                $msg = "Congratulations! you're account is now verified";   
                $type = "success";
               case 'payment_error':
                $msg = "There was an error while processing your payment";   
                $type = "error";
                break;
               case 'payment_success':
                $msg = "Checkout Complete";   
                $type = "success";
                break; 
                case 'registration_success':
                $msg = "Thank you for signing up. We have sent you an email to  verify your account.";   
                $type = "success";
                break;               
             default:
                 # code...
                 break;

                
         }

        $msg_arr = array('type' => $type,'message' => $msg); 

        return $msg_arr;
	
	

    }

    

    
}

/* End of file welcome.php */
/* Location: ./application/controllers/theme.php */