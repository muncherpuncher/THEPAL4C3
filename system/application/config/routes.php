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

$site_url = $_SERVER['HTTP_HOST'];
//$site_url  = 'www.myflipstop.biz';
$site_url  = 'www.myflipstop.com';

// Site 
$site_info = $db->get_where('domains',array('domain'=>$site_url));
$site_id = $site_info->row()->sites_id;
$site_type = $site_info->row()->type;

if(count($site_info->result()) > 0)

	// Define Site ID
	define('SITE_ID',$site_id);
	
		// Page
	$route = array();
	$pages = $db->get_where('pages',array('sites_id'=>SITE_ID))->result();

	foreach ($pages as $key) {
		$route[$key->slug] = 'checkpoint/index/'.$key->slug.'';
	}

	$route['dashboard/(:any)'] = 'dashboard/index/$1/$2';
	$route['users/(:any)'] = 'users/$1';
	$route['media/(:any)'] = 'media/$1';
	$route['crm_messages/(:any)'] = 'crm_messages/$1';
	$route['tmpl_business_categories/(:any)'] = 'tmpl_business_categories/$1';
	$route['clients_business_branches/(:any)'] = 'clients_business_branches/$1';	
    $route['collections/(:any)'] = 'sites_flipstop/view_listings/$1/$2';

	switch ($site_type) {
		case 'basic':
				$route['default_controller'] = 'sites_flipstop/index';

			break;
		case 'business':
				$route['default_controller'] = 'sites_business/index';
			break;
	}


// Default 404
$route['404_override'] = 'my404';

// $_SERVER['HTTP_HOST'] = 'myflipstop.co';


// $route['default_controller'] = 'checkpoint/index';

// if($_SERVER['HTTP_HOST']=="localhost")
// {	
// 	$route['default_controller'] = 'sites_flipstop/index';
// 	$route['business'] = 'sites_business/index';
// 	$route['business/(:any)'] = 'sites_business/page/$1';
// }
// else
// {

// 		$arr_site_app = array(

// 								'myflipstop.co',
// 								'www.myflipstop.com',
// 								'myflipstop.co',
// 								'www.myflipstop.co',
// 								'myflipstop.us',
// 								'www.myflipstop.us',
// 								'everythingfilipino.us',
// 								'www.everythingfilipino.us',
// 								'everythingfilipino.net',
// 								'www.everythingfilipino.net'
							
// 							);

// 		$arr_site_business = array( 

// 								'myflipstop.biz',
// 								'wwww.myflipstop.biz'
// 							);

	
// 		// Set domain specific routes
// 		if(in_array($_SERVER['HTTP_HOST'],$arr_site_app))
// 		{
// 			$route['default_controller'] = 'sites_flipstop/index';
// 		}
// 		else if(in_array($_SERVER['HTTP_HOST'],$arr_site_business))
// 		{
// 			$route['default_controller'] = 'sites_business/index';
// 		}	

// }	




// // Trigger Launch Type
// switch (HTTP_ROUTE_TYPE) {

// 	case 'local':
			
// 			// HTTP Routing
// 			foreach ($http_routes->result() as $key) {	

// 				// Check if root
// 				if($key->app_route_local_prefix=="root")
// 				{
// 					$route[$key->app_route_keyword] = $key->app_controller;

// 				}
// 				else
// 				{	
// 					// Skip Default keyword
// 					if($key->app_route_keyword=="default_controller")
// 					{
// 						$route[$key->app_route_local_prefix] = $key->app_controller;
// 					}
// 					else
// 					{
// 						// Define prefix for extended controller uri(s)
// 						$route[$key->app_route_local_prefix.'/'.$key->app_route_keyword] = $key->app_controller;

// 					}
				
// 				}

// 			}

// 		break;

// 	case 'live':

			
// 			// HTTP Domains
// 			$http_domains_info = $db->get('tpl_http_domains');

// 			foreach ($http_domains_info->result() as $key) {
				
// 				if($key->enable_flag==1)
// 				{

// 					switch ($key->type) {

// 						case 'web_app':
							
// 								$arr_app_client[] = array(strtolower($key->url));

// 							break;

// 						case 'biz_app':

// 								$arr_app_business[] = array(strtolower($key->url));

// 							break;
						
// 						default:
// 							# code...
// 							break;
// 					}

// 				}

// 			}

// 			// HTTP Routing
// 			foreach ($http_routes->result() as $key) {	

// 				// Check if root
// 				if($key->app_route_local_prefix=="root")
// 				{
// 					$route[$key->app_route_keyword] = $key->app_controller;

// 				}
// 				else
// 				{	
// 					// Skip Default keyword
// 					if($key->app_route_keyword=="default_controller")
// 					{
// 						$route[$key->app_route_local_prefix] = $key->app_controller;
// 					}
// 					else
// 					{
// 						// Define prefix for extended controller uri(s)
// 						$route[$key->app_route_local_prefix.'/'.$key->app_route_keyword] = $key->app_controller;

// 					}
				
// 				}

// 			}

			

// 		break;
// 	default:
// 		# code...
// 		break;
// }

// echo '<pre>';
// print_r($route);
// exit();





/* End of file routes.php */
/* Location: ./application/config/routes.php */