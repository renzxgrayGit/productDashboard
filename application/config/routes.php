<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'users';
$route['login'] = 'users';
$route['register'] = 'users/register';
$route['user/edit'] = 'users/edit';
/* $route['admin/edit'] = 'users/edit'; */    /* admin edit profile */ 

$route['dashboard/admin'] = 'products';
$route['dashboard/user'] = 'products/user';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
