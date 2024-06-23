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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'C_Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// authorization
$route["login"] = "C_Auth/login";
$route["logout"] = "C_Auth/logout";
$route["register"] = "C_Auth/register";

// client
$route["client"] = "C_Client/dashboard";
$route["client/dashboard"] = "C_Client/dashboard";
$route["client/my-collection"] = "C_Client/my_collection";
$route["client/my-collection/return-book/(:any)"] = "C_Client/return_book/$1";
$route["client/my-collection/upload-evidence/(:any)"] = "C_Client/upload_evidence/$1";
$route["client/profile"] = "C_Client/profile";
$route["client/profile/update/(:any)"] = "C_Client/profile/$1";
$route["client/search/(:any)"] = "C_Client/search/$1";
$route["client/book-detail/(:any)"] = "C_Client/book_detail/$1";
$route["client/create-transaction/(:any)"] = "C_Client/create_transaction/$1";

// admin
$route["admin"] = "C_AdminDashboard/dashboard";
$route["admin/dashboard"] = "C_AdminDashboard/dashboard";
$route["admin/get-transaction-activity"] = "C_AdminDashboard/get_transaction_activity";
$route["admin/show-book-rate-calculation"] = "C_AdminDashboard/show_book_rate_calculation";

$route["admin/user-management/monitoring"] = "C_UserManagement/user_monitoring";
$route["admin/user-management/create"] = "C_UserManagement/user_create";
$route["admin/user-management/view/(:any)"] = "C_UserManagement/user_create/$1";
$route["admin/user-management/update/(:any)"] = "C_UserManagement/user_create/$1";
$route["admin/user-management/delete/(:any)"] = "C_UserManagement/user_delete/$1";

$route["admin/book-management/monitoring"] = "C_BookManagement/book_monitoring";
$route["admin/book-management/create"] = "C_BookManagement/book_create";
$route["admin/book-management/update/(:any)"] = "C_BookManagement/book_create/$1";
$route["admin/book-management/view/(:any)"] = "C_BookManagement/book_create/$1";
$route["admin/book-management/delete/(:any)"] = "C_BookManagement/book_delete/$1";

$route["admin/book-type-management/create"] = "C_BookTypeManagement/book_type_create";
$route["admin/book-type-management/update/(:any)"] = "C_BookTypeManagement/book_type_create/$1";
$route["admin/book-type-management/delete/(:any)"] = "C_BookTypeManagement/book_type_delete/$1";

$route["admin/penalty-management/monitoring"] = "C_PenaltyManagement/penalty_monitoring";
$route["admin/penalty-management/create"] = "C_PenaltyManagement/penalty_create";
$route["admin/penalty-management/approve-request/(:any)"] = "C_PenaltyManagement/approve_request/$1";
$route["admin/penalty-management/delete/(:any)"] = "C_PenaltyManagement/delete_penalty/$1";
$route["admin/penalty-management/update/(:any)"] = "C_PenaltyManagement/penalty_create/$1";

$route["admin/trx-management/monitoring"] = "C_TrxManagement/trx_monitoring";
$route["admin/trx-management/need-approval"] = "C_TrxManagement/need_approval";
$route["admin/trx-management/approve-transaction/(:any)"] = "C_TrxManagement/transaction_approve/$1";
$route["admin/trx-management/assign-penalty/(:any)"] = "C_TrxManagement/assign_penalty/$1";
$route["admin/trx-management/get-transaction/(:any)"] = "C_TrxManagement/get_transaction_for_datatable/$1";