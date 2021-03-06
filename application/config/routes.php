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
$route['default_controller'] = 'usuario';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route["logar"]                 = "usuario/usuario_login";
$route["logout"]                = "usuario/usuario_logout";
$route["admin"]                 = "admin";
$route["user_insert"]           = "admin/usuario_form";
$route["user_list"]             = "admin/usuario";
$route["user_cad"]              = "usuario/usuario_cadastro";
$route["user_update"]           = "admin/usuario_edicao";
$route["user_edit"]             = "usuario/usuario_atualizar";
$route["user_remove"]           = "usuario/usuario_excluir";
$route["facilitador_insert"]    = "admin/facilitador_form";
$route["facilitador_list"]      = "admin/facilitadores";
$route["facilitador_cad"]       = "facilitador/facilitador_cadastro";
$route["facilitador_update"]    = "admin/facilitador_edicao";
$route["facilitador_edit"]      = "facilitador/facilitador_atualizar";
$route["facilitador_remove"]    = "facilitador/facilitador_excluir";
$route["parceiros_list"]        = "admin/parceiros";
$route["parceiros_insert"]      = "admin/parceiros_form";
$route["parceiros_cad"]         = "parceiro/parceiro_cadastro";
$route["parceiros_update"]      = "admin/parceiros_edicao";
$route["parceiros_edit"]        = "parceiro/parceiro_atualizar";
$route["parceiros_remove"]      = "parceiro/parceiro_excluir";
$route["curso_insert"]          = "admin/curso_form";
$route["imagem/(:num)"]         = "imagem/img/$1";