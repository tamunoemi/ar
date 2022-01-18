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

$route['default_controller'] = 'main';
//$route['default_controller'] = 'site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



//AUTH
$route['auth/login'] = "auth/login";
$route['auth/auth/login'] = "auth/login";
$route['auth/forgot_password'] = "auth/forgot_password";
$route['auth/reset_password/(:any)'] = "auth/reset_password/$1";
$route['auth/reset_password_form'] = "auth/reset_password_form";
$route['auth/logout'] = "auth/logout";

//SITE
$route['site'] = "site/index";
$route['site/includes/login/main'] = "site/main";
$route['site/new-brand'] = "site/new_brand";
$route['site/create-brand'] = "site/create_brand";
$route['site/edit-brand'] = "site/edit_brand";
$route['site/delete-brand'] = "site/delete_brand";



$route['tools(:any)'] = 'tools';
$route['admin(:any)'] = 'admin';
$route['main(:any)'] = 'main';
$route['portal(:any)'] = 'portal';



$route['search'] = "main/search";

$route['dashboard'] = "main/dashboard";

$route['admin/getPackageServices/(:any)'] = "admin/getPackageServices/$1";
$route['portal/checkout/(:num)/(:num)/(:num)'] = "portal/checkout/$1/$2/$3";
//ADMIN












$route['newProduct'] = "admin/addproduct";
$route['editproduct/(:num)'] = "admin/editproduct/$1";
$route['deleteProduct/(:num)'] = "admin/deleteProduct/$1";
$route['fetchProductDetails/(:num)'] = "admin/fetchProductDetails/$1";
$route['main/updateAgent/(:num)'] = "admin/updateAgent/$1";
$route['agentById/(:num)'] = "admin/agentById/$1";
$route['deleteAgent/(:num)/pid/(:num)'] = "admin/deleteAgent/$1/$2";
$route['addAgent/(:num)'] = "admin/addAgent/$1";
$route['updateProduct/(:num)'] = "admin/updateProduct/$1";
$route['addNewProduct'] = "admin/addNewProduct";
$route['adcreative'] = "main/adcreative";
$route['shopify'] = "shopify/shopify";
$route['shopify/connect'] = "main/shopifyConnect";
$route['shopifyInstall/(:any)'] = "shopify/shopifyInstall/$1";
$route['shopify/add_product'] = "shopify/add_product";
$route['shopify/generate_token'] = "shopify/generate_token";
$route['shopify/delete_product/(:any)'] = "shopify/delete_product/$1";

$route['fetchCreatives'] = "main/fetchCreatives";
$route['deleteCreative/(:num)'] = "admin/deleteCreative/$1";
$route['editCreative/(:num)'] = "admin/editCreative/$1";
$route['newCreative'] = "admin/newCreative";

$route['addCreative'] = "admin/addCreative";
$route['fetchcreativeDetails/(:num)'] = "admin/fetchcreativeDetails/$1";
$route['getAllProducts'] = "admin/getAllProducts";
$route['updateCreative/(:num)'] = "admin/updateCreative/$1";

$route['editAgent/(:num)'] = "admin/editAgent/$1";
$route['users'] = "admin/users";
$route['fetchUsers'] = "admin/fetchUsers";

//IPN
$route['ipn'] = "ipn/index";

$route['addNewUser'] = "admin/addNewUser";
$route['editKeyword/(:num)'] = "admin/editKeyword/$1";
$route['updateKeywords/(:num)'] = "admin/updateKeywords/$1";

$route['downloadAds/(:num)'] = "main/downloadAds/$1";

$route['fetchProductCreative/(:num)'] = "admin/fetchProductCreative/$1";
$route['textEmail'] = "admin/sendM";
$route['htmlmail'] = "admin/htmlmail";


$route['test'] = "main/test";
$route['test/(:num)'] = "main/test/$1"; 
$route['main/fetchProducts/(:num)'] = "main/fetchProducts/$1";
$route['main/fetchProducts/(:num)/(:num)'] = "main/fetchProducts/$1/$2";

$route['deleteUser/(:num)'] = "admin/deleteUser/$1";

$route['editor-pick'] = "main/editorpick";
$route['weeklyTopSellers'] = "main/weeklyTopSellers";

$route['main/profile'] = "main/profile";
$route['main/fetchProductByCat/(:num)'] = "main/fetchProductByCat/$1";
$route['main/fetchProductByEditorPickCat/(:num)'] = "main/fetchProductByEditorPickCat/$1";

$route['admin/resetUserPassword/(:num)'] = "admin/resetUserPassword/$1";
$route['adById/(:any)'] = "admin/adById/$1";
$route['updateAd/(:any)'] = "admin/updateAd/$1";
$route['deleteAd/(:num)/pid/(:num)'] = "admin/deleteAd/$1/$2";
$route['addAd/(:num)'] = "admin/addAd/$1";

$route['editUser/(:num)'] = "admin/editUser/$1";
$route['updateUser/(:num)'] = "admin/updateUser/$1";

$route['changePassword'] = "main/changePassword";

$route['notice'] = "main/notice";

        



