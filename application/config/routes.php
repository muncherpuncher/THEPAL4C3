<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

require_once( BASEPATH .'database/DB'. EXT );
$db =& DB();

//$site_url = $_SERVER['HTTP_HOST'];
$site_url  = 'www.thepalacemanila.com';

$route = array();

/* Site Info */  
$site_info = $db->get_where('domains',array('domain'=>$site_url));

if(count($site_info->result()) > 0)
{
	$site_id = $site_info->row()->sites_id;
	$site_type = $site_info->row()->type;

	/* Define Site ID and Route Type */ 
	define('SITE_ID',$site_id);
	define('HTTP_ROUTE_TYPE','local');
	
	/* Site Pages from site */
	$pages = $db->get_where('pages',array('sites_id'=>SITE_ID))->result();

	/* Site pages routes */
	foreach ($pages as $key) {
		$route[$key->slug] = 'pages/index/'.$key->slug.'';
	}

	/* Users */
	$route['users/(:any)'] = 'users/$1';

	/* Custom 404 Page */
	$route['404_override'] = 'my404';


	switch ($site_type) {

		case 'basic':

					/* Default Controller */
					$route['default_controller'] = 'site';
					$route['dashboard/(:any)'] = 'dashboard/index/$1';

			break;

	}

}
else
{
	exit();
}





/* End of file routes.php */
/* Location: ./application/config/routes.php */