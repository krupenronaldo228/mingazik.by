<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['cap'] = 'home/cap';

$route['articles/index'] = 'articles/index';
$route['articles/(:num)'] = 'articles/index/$2';
$route['articles/(:any)'] = 'articles/view/$2';

$route['news/index'] = 'news/index';
$route['news/(:num)'] = 'news/index/$3';
$route['news/(:any)'] = 'news/view/$2';

$route['reviews/ajaxSend'] = 'reviews/ajaxSend';
$route['reviews/index'] = 'reviews/index';
$route['reviews/(:num)'] = 'reviews/index/$2';

/* 404 */

$route['404_override'] = IS_ADMIN_PAGE ? 'home/errors':'errors/index';

/* extra */

include(APPPATH.'config/routes_pages.php');