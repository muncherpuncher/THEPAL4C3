<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MX_Controller {

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
       
		// load Model 
		$this->load->model('mdl_pages');

		// Load Pages
		$pages = $this->get_pages();

		foreach ($pages as $key) {	
			$data[] = array( base_url(). $key->slug);
		}

		$this->_site_info = $this->db->get_where('sites',array('id'=>SITE_ID))->row();
		$this->_view_theme_name = $this->_site_info->theme;
        $this->_view_theme_layout = "layout_sections";


	}

	public function index($slug,$section = NULL,$sub_section = NULL){


		if($slug)
		{	
			// get pages for menu
			$query = $this->get_pages();
			$page_menu = array();
		
			foreach ($query as $key) {
				
				$page_menu[''.$key->name.''] = array( 'name'=>$key->name, 'url'=>base_url() . strtolower($key->slug) );
			}

			if($slug==="default")
			{
				$query = $this->mdl_pages->get_where_array(array('sites_id'=>SITE_ID,'default_flag'=>1));
				$page_info = $query->row();
				$this->load($page_info,$page_menu);
			}
			else if($slug==='dashboard')
			{	
				echo Modules::run('dashboard/index',$slug,$section,$sub_section);
			}
			else
			{	
				
				$page_info = $this->get_info($slug);

				if(count($page_info)>0)
				{
					$this->load($page_info,$page_menu);
				}

				else
				{
					redirect();
				}
				

			}
		}
		


	}

	public function view()
	{	
		$data['menu'] = $this->_menu;
		$this->load($data);
	}

	public function get_pages()
	{
		$query = $this->mdl_pages->get_where_custom('sites_id',SITE_ID)->result();
		return $query;
	}

	public function get_footer()
	{
		$this->load->view($this->_view_theme_name . '/footer.php');
	}

	
	public function get_info($slug)
	{
		$query = $this->mdl_pages->get_where_array(array('slug'=>$slug,'sites_id'=>SITE_ID));
		return $query->row();
	}


	public function load($page_info,$page_menu)
	{	
		$data['site_info'] = $this->_site_info;
		$data['page_menu'] = $page_menu;
		$data['page_info'] = $page_info;
		$data['view_file'] = $page_info->name;
		echo Modules::run('themes/load',$this->_view_theme_name,$this->_view_theme_layout,$data);		

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */