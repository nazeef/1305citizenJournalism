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
$route['test'] = 'test/index';
$route['login'] = 'login/index';
$route['login/logout'] = 'login/logout';
$route['news/uploadAdvertise'] = 'news/uploadAdvertise';

$route['news/showProfile'] = 'news/showProfile'; //-----profile
$route['upload/do_upload'] = 'upload/do_upload';
$route['upload/do_upload_advertise'] = 'upload/do_upload_advertise';

$route['news/upload'] = 'news/upload';
$route['news/archives'] = 'news/archives';
$route['news/category'] = 'news/category';
$route['news/archives/(:any)'] = 'news/archives/$1';
$route['news/selectAd/(:any)'] = 'news/selectAd/$1';
$route['news/do_upload'] = 'news/do_upload';
$route['news/moderate'] = 'news/moderate';
$route['news/viewVideo'] = 'news/viewVideo';
$route['news/managePosts/(:any)'] = 'news/managePosts/$1';

$route['news/approve/(:any)'] = 'news/approve/$1';
$route['news/delete/(:any)'] = 'news/delete/$1';
$route['news/deleteMedia/(:num)/(:any)'] = 'news/deleteMedia/$1/$2';
$route['news/edit/(:any)'] = 'news/edit/$1';
$route['news/report/(:any)'] = 'news/report/$1';
$route['news/showReasons/(:any)'] = 'news/showReasons/$1';
$route['news/redirectt/(:any)'] = 'news/redirectt/$1';
$route['news/advertise'] = 'news/advertise';

$route['upload_1/do_upload'] = 'upload_1/do_upload';

$route['news/search'] = 'news/search';
$route['news/manageAds'] = 'news/manageAds';
$route['news/manageReported'] = 'news/manageReported';
$route['news/tests'] = 'news/tests';
$route['news/headlines'] = 'news/headlines';
$route['login/aboutus'] = 'login/aboutus';

$route['news'] = 'news/index';
$route['news/(:any)'] = 'news/view/$1';

$route['forum/index'] = 'forum/index';
$route['forum/index/(:any)'] = 'forum/index/$1';
$route['forum/tests'] = 'forum/tests';
$route['forum'] = 'forum/index';
$route['forum/upload'] = 'forum/upload'; 
$route['forum/(:any)'] = 'forum/view/$1';

$route['forum/commentPost'] = 'forum/commentPost';


$route['default_controller'] = "welcome";
$route['404_override'] = '';



/* End of file routes.php */
/* Location: ./application/config/routes.php */