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
$route['Auth/login'] = "Auth/login";
$route['auth/auth/login'] = "auth/login";
$route['auth/two-factor'] = "auth/two_factor";
$route['auth/forgot_password'] = "auth/forgot_password";
$route['auth/reset_password/(:any)'] = "auth/reset_password/$1";
$route['auth/reset_password_form'] = "auth/reset_password_form";
$route['auth/logout'] = "auth/logout";

//SITE
$route['Site'] = "Site/index";

$route['site/app'] = "site/app_view";
$route['site/app/edit'] = "site/app_edit";
$route['site/app/progress'] = "site/app_progress";
$route['site/app/check-email-verification'] = "site/app_check_email_verification";
$route['site/app/verify-email'] = "site/app_verify_email";
$route['site/app/delete-logo'] = "site/app_delete_logo";
$route['site/app/generate-password'] = "site/app_generate_password";
$route['site/app/verify-login-email'] = "site/app_verify_login_email";

$route['site/new-brand'] = "site/new_brand";
$route['site/create-brand'] = "site/create_brand";
$route['site/edit-brand'] = "site/edit_brand";
$route['site/modify-brand'] = "site/modify_brand";
$route['site/delete-brand'] = "site/delete_brand";

$route['site/templates'] = "site/templates";
$route['site/template-preview'] = "site/template_preview";
$route['site/templates/use-template'] = "site/template_use_template";
$route['site/create-template'] = "site/create_template";
$route['site/templates/save-template'] = "site/save_template";
$route['site/templates/delete'] = "site/templates_delete";
$route['site/edit-template'] = "site/edit_template";

$route['site/includes/create/calculate-totals'] = "site/calculate_totals";
$route['site/send-to'] = "site/send_to";
$route['site/create/send-now'] = "site/send_now";
$route['site/create/send-later'] = "site/send_later";
$route['site/create/test-send'] = "site/test_send";
$route['site/app/duplicate'] = "site/app_duplicate";
$route['site/app/delete'] = "site/app_delete";
$route['site/app/download-errors-csv'] = "site/app_download_errors_csv";
$route['site/reconsent-success'] = "site/reconsent_success";
$route['site/l/(:any)'] = "site/l/$1";
$route['site/r/(:any)/(:any)/(:any)'] = "site/r/$1/$2/$3";
$route['site/subscribe/(:any)/(:any)/(:any)'] = "site/subscribe/$1/$2/$3";
$route['site/t/(:any)/(:any)/(:any)'] = "site/t/$1/$2/$3";
$route['site/unsubscribe/(:any)/(:any)/(:any)'] = "site/unsubscribe/$1/$2/$3";
$route['site/w/(:any)/(:any)'] = "site/w/$1/$2";

$route['site/create'] = "site/create_campaign";
$route['site/create/save-campaign'] = "site/create_save_campaign";
$route['site/create/delete-attachment'] = "site/create_delete_attachment";
$route['site/create/toggle-wysiwyg'] = "site/create_toggle_wysiwyg";
$route['site/edit'] = "site/edit_campaign";
$route['site/campaigns/delete'] = "site/campaigns_delete";
$route['site/campaigns/bounces'] = "site/campaigns_bounces";
$route['site/campaigns/complaints'] = "site/campaigns_complaints";

$route['site/list'] = "site/list";
$route['site/edit-list'] = "site/edit_list";
$route['site/list/edit'] = "site/list_edit";
$route['site/delete-from-list'] = "site/delete_from_list";
$route['site/list/dismiss'] = "site/list_dismiss";
$route['site/list/progress'] = "site/list_progress";
$route['site/list/export-skipped-emails'] = "site/list_export_skipped_emails";
$route['site/search-all-lists'] = "site/search_all_lists";
$route['site/search-all-brands'] = "site/search_all_brands";

$route['site/segment'] = "site/segment";
$route['site/segments-list'] = "site/segments_list";
$route['site/segments/segmentate'] = "site/segments_segmentate";
$route['site/segments/export-csv'] = "site/segments_export_csv";
$route['site/segments/delete'] = "site/segments_delete";

$route['site/housekeeping-unconfirmed'] = "site/housekeeping_unconfirmed";
$route['site/housekeeping-inactive'] = "site/housekeeping_inactive";

$route['site/report'] = "site/report";
$route['site/reports'] = "site/reports";
$route['site/reports/update-campaign-title'] = "site/reports_update_campaign_title";
$route['site/reports/export-csv'] = "site/reports_export_csv";
$route['site/update-list'] = "site/update_list";
$route['site/unsubscribe-from-list'] = "site/unsubscribe_from_list";
$route['site/unsubscribe-success'] = "site/unsubscribe_success";

$route['site/subscribers'] = "site/subscribers";
$route['site/subscribe'] = "site/subscribe";
$route['site/unsubscribe'] = "site/unsubscribe";
$route['site/subscribe/import-unsubscribe'] = "site/subscribers_import_unsubscribe";
$route['site/subscribe/line-unsubscribe'] = "site/subscribers_line_unsubscribe";
$route['site/subscribers/import-add'] = "site/subscribers_import_add";
$route['site/subscribers/import-delete'] = "site/subscribers_import_delete";
$route['site/subscribers/import-update'] = "site/subscribers_import_update";
$route['site/subscribers/import-blocked-domain-list'] = "site/subscribers_import_blocked_domain_list";
$route['site/subscribers/import-blocked-domain-list2'] = "site/subscribers_import_blocked_domain_list2";
$route['site/subscribers/import-suppression-list'] = "site/subscribers_import_suppression_list";
$route['site/subscribers/import-suppression-list2'] = "site/subscribers_import_suppression_list2";
$route['site/subscribers/delete-suppressed-email'] = "site/subscribers_delete_suppressed_email";
$route['site/subscribers/delete-blocked-domain'] = "site/subscribers_delete_blocked_domain";
$route['site/subscribers/delete-unconfirmed'] = "site/subscribers_delete_unconfirmed";
$route['site/subscribers/edit'] = "site/subscribers_edit";
$route['site/subscribers/line-update'] = "site/subscribers_line_update";
$route['site/subscribers/line-delete'] = "site/subscribers_line_delete";
$route['site/subscribers/subscribe-form'] = "site/subscribers_subscribe_form";
$route['site/subscribers/subscribe-info'] = "site/subscribers_subscribe_info";
$route['site/subscribers/unsubscribe'] = "site/subscribers_unsubscribe";
$route['site/subscribers/delete'] = "site/subscribers_delete";
$route['site/subscribers/save-gdpr'] = "site/subscribers_save_gdpr";
$route['site/subscribers/housekeeping-no-opens'] = "site/subscribers_housekeeping_no_opens";
$route['site/subscribers/delete-inactive'] = "site/subscribers_delete_inactive";
$route['site/subscribers/housekeeping-no-clicks'] = "site/subscribers_housekeeping_no_clicks";
$route['site/subscribers/export-csv'] = "site/subscribers_export_csv";
$route['site/subscribers/subscriber-info'] = "site/subscribers_subscriber_info";
$route['site/subscription'] = "site/subscription";

$route['site/autoresponders-list'] = "site/autoresponders_list";
$route['site/autoresponders-create'] = "site/autoresponders_create";
$route['site/autoresponders-edit'] = "site/autoresponders_edit";
$route['site/autoresponders-emails'] = "site/autoresponders_emails";
$route['site/autoresponders-report'] = "site/autoresponders_report";
$route['site/ares/add-autoresponder'] = "site/ares_add_autoresponder";
$route['site/ares/save-autoresponder-email'] = "site/ares_save_autoresponder_email";
$route['site/ares/delete-attachment'] = "site/ares_delete_attachment";
$route['site/ares/toggle-wysiwyg'] = "site/ares_toggle_wysiwyg";
$route['site/ares/delete-email'] = "site/ares_delete_email";
$route['site/ares/delete-ares'] = "site/ares_delete_ares";
$route['site/ares/toggle-autoresponder'] = "site/ares_toggle_autoresponder";
$route['site/ares-reports/export-csv'] = "site/ares_reports_export_csv";

$route['site/custom-fields'] = "site/custom_fields";
$route['site/list/add-custom-field'] = "site/list_add_custom_field";
$route['site/list/edit-custom-field'] = "site/list_edit_custom_field";
$route['site/list/delete-custom-field'] = "site/list_delete_custom_field";
$route['site/list/delete'] = "site/list_delete";

$route['site/blacklist-blocked-domains'] = "site/blacklist_blocked_domains";
$route['site/blacklist-suppression'] = "site/blacklist_suppression";

$route['site/clear-queue'] = "site/clear_queue";
$route['site/sending'] = "site/sending";
$route['site/confirm'] = "site/confirm";
$route['site/payment'] = "site/payment";
$route['site/detect-table-conflicts'] = "site/detect_table_conflicts";
$route['site/settings'] = "site/settings";
$route['site/settings/save'] = "site/settings_save";
$route['site/settings/two-factor'] = "site/settings_two_factor";
$route['site/remove-duplicates'] = "site/remove_duplicates";
$route['site/reset-cron'] = "site/reset_cron";
$route['site/import-csv'] = "site/import_csv";


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

        



