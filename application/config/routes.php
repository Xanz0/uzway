<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/


$route['([a-z]{2})/view/(:any)'] = 'home/pressa/(:any)';
$route['([a-z]{2})/news'] = 'home/blog/news';


$route['([a-z]{2})/aloqalar'] = 'home/blog/aloqalar';
$route['([a-z]{2})/kontakti'] = 'home/blog/kontakti';
$route['([a-z]{2})/contacts'] = 'home/blog/contacts';

$route['([a-z]{2})/shifokorlar'] = 'home/blog/shifokorlar';
$route['([a-z]{2})/vrachi'] = 'home/blog/vrachi';
$route['([a-z]{2})/doctors'] = 'home/blog/doctors';

$route['([a-z]{2})/services'] = 'home/services';
$route['([a-z]{2})/uslugi'] = 'home/services';
$route['([a-z]{2})/xizmatlar'] = 'home/services';

$route['([a-z]{2})/news'] = 'home/blog/news';
$route['([a-z]{2})/novosti'] = 'home/blog/novosti';
$route['([a-z]{2})/yangiliklar'] = 'home/blog/yangiliklar';


$route['([a-z]{2})/before-after'] = 'home/before_after';

$route['default_controller'] = 'home';
$route['^(en|uz|ru)/(.+)$']        = "$2";
$route['^(en|uz|ru)$'] = $route['default_controller'];


$route['admin'] = 'admin/dashboard';
$route['login'] = 'admin/auth/login';
$route['logout'] = 'admin/auth/logout';

$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;
