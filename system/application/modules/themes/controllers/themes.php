<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Themes extends MX_Controller {

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
	}

	function load($_theme_name, $_view_theme_layout, $data)
	{	

		 // Asset URLS
		$data['theme'] = $_theme_name;
		$data['template_url_css'] =  base_url() . '_assets/' .$_theme_name . '/' . 'css/';
		$data['template_url_js'] = base_url() . '_assets/' .$_theme_name . '/' . 'js/';
		$data['template_url_fonts'] = base_url() . '_assets/' .$_theme_name . '/' . 'fonts/';
		$data['template_url_img'] = base_url() . '_assets/' .$_theme_name. '/' . 'img/';

		$this->load->view($_theme_name . '/' . $_view_theme_layout,$data);

	
	}

	
 	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */