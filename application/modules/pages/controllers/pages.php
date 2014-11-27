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
		
        $this->_menu  = array();
        $this->_domains  = array();

		// load Model 
		$this->load->model('mdl_pages');

		// Pages
		$pages = $this->get_pages();

		foreach ($pages as $key) {	
			$data[] = array( base_url(). $key->slug);
		}

		$this->_site_info = $this->db->get_where('sites',array('id'=>SITE_ID))->row();
		$this->_view_theme_name = $this->_site_info->theme;
        $this->_view_theme_layout = "layout_sections";
        
       	define('FEATURE_GOOGLEMAP',0);

	}

	public function index($slug,$section = NULL,$sub_section = NULL){
		

		if($slug)
		{	
			// get pages for menu
			$pages = $this->get_pages();
			$domains = Modules::run('domains/get_info_by_id',SITE_ID);

			$page_menu = array();
			$site_domains = array();
		
			foreach ($pages as $key) {
				$page_menu[''.$key->name.''] = array( 'name'=>$key->name, 'url'=>base_url() . strtolower($key->slug) );
			}

			foreach ($domains->result() as $key) {
				$site_domains[] = array( 'domain'=>$key->domain);
			}

			if($slug==="default")
			{
				$query = $this->mdl_pages->get_where_array(array('sites_id'=>SITE_ID,'default_flag'=>1));
				$page_info = $query->row();
				$this->load($page_info,$page_menu,$site_domains);
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
					$this->load($page_info,$page_menu,$site_domains);
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
		$data['domains'] = $this->_domains;
		$this->load($data);
	}

	public function get_pages()
	{
		$query = $this->mdl_pages->get_where_custom('sites_id',SITE_ID)->result();
		return $query;
	}

	public function get_domains()
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


	public function load( $page_info, $page_menu , $site_domains )
	{	
		/* Site Info */
		$data['site_info'] = $this->_site_info;

		/* Business Domain Collections */
		$data['site_domains'] = $site_domains;

		// /* Site business settings */
		// $data['site_business_settings'] = 

		/* Site Page Menu */
		$data['page_menu'] = $page_menu;

		/* Page Info */
		$data['page_info'] = $page_info;

		/* Site Controller View file */
		$data['view_file'] = $page_info->name;

		/* Run and View */
		echo Modules::run('themes/load',$this->_view_theme_name,$this->_view_theme_layout,$data);		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */