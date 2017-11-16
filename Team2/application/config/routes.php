<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['Residents_control/update'] = 'Residents_control/update';
$route['Residents_control/create'] = 'Residents_control/create';
$route['Residents_control/(:any)'] = 'Residents_control/view/$1';
$route['Residents_control'] = 'Residents_control/index';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';/* $route['(:any)'] = 'pages/view/$1'; means that anything you type on the url will proceed
                                    * to pages/view/$1 the $1 here is the parameter you would like to pass to a controller/method example*/
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
