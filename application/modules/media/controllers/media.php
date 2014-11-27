<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media extends MX_Controller {

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

	function __construct()
	{

		parent::__construct();
		$this->_data                      = new stdClass;
	
		// Load Model
		$this->load->model('mdl_media');
		$this->load->library('uploader');

		// Load modules
		$this->load->module('template');	
		$this->load->module('notifications');

		// load Library 
		

		// View Template and Layout
		$this->_view_module 			  = "media";
		$this->_view_template_name		  = "dashboard_company/default";
		$this->_view_template_layout	  = "layout_sections";
		$this->_view_content 			  = "";




	}

	function jsuploader()
	{
		// A list of permitted file extensions
		$allowed = array('png', 'jpg', 'gif','JPG','GIF');

		if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

			$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

			if(!in_array(strtolower($extension), $allowed)){
				echo '{"status":"error","msg":"Invalid File"}';
				exit;
			}

			if(move_uploaded_file($_FILES['upl']['tmp_name'],'_assets/_media_uploads/images/business/tiles/'.$_FILES['upl']['name'])){
				echo '{"status":"success","image":"'.$_FILES['upl']['name'].'"}';
				exit;
			}
		}

		echo '{"status":"error","msg":"An error occured"}';
		exit;
	}

	function jsuploader_temp()
	{

			// A list of permitted file extensions
			$allowed = array('png', 'jpg', 'gif');

			if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

				$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

				if(!in_array(strtolower($extension), $allowed)){
					echo '{"status":"error"}';
				}

				if(move_uploaded_file($_FILES['upl']['tmp_name'],'_assets/_media_uploads/images/business/temp/tiles/'.time().'.'.$extension)){
					echo '{"status":"success","image":"'.time().'.'.$extension.'"}';
				}
			}
			

	
	}



	function getImagesFromDir($path) {
		echo $path;
	    $images = array();
	    if ( $img_dir = @opendir($path) ) {
	        while ( false !== ($img_file = readdir($img_dir)) ) {
	            // checks for gif, jpg, png
	            if ( preg_match("/(\.gif|\.jpg|\.png)$/", $img_file) ) {
	                $images[] = $img_file;
	            }
	        }
	        closedir($img_dir);
	    }
	    
	    return $images;
	}

	function getRandomFromArray($ar) {
	    $num = array_rand($ar);
	   if( !is_null( $num ) ) return $ar[$num];
	   
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */