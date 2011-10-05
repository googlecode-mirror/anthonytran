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

$route['default_controller']                    =  "client_2/articles";
$route['404_override']                          =  '';


$route['user']                                  =  "client/tony";
$route['user/([a-z0-9\-]+)']                    =  "client/tony/kingfish";

/* Danh cho trang hatran.
 * --------------------------------------------------------
$route['tony_admin'] = "admin/hatran";
$route['tony_admin/home'] = "admin/hatran/home";
$route['tony_admin/logout'] = "admin/hatran/logout";
$route['tony_admin/login'] = "admin/hatran/login";
$route['tony_admin/([a-z0-9\-]+)'] = "admin/hatran/discovery";

--------------------------------------------------------*/

$route['tony_admin']                            =  "admin_2/home";
$route['tony_admin/articles_management']        =  "admin_2/articles_manage";
$route['tony_admin/album_management']           =  "admin_2/images_manage";
$route['home\.html']                            =  "client_2/articles";
$route['([a-z0-9\-]+)\.html']                   =  "client_2/articles/contents";
$route['categories/([a-z0-9\-]+)\.html']        =  "client_2/articles/categories_list/$1";


/* End of file routes.php */
/* Location: ./application/config/routes.php */