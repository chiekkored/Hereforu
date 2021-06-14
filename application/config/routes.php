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
$route['default_controller'] = "admin";
$route['dashboard'] = 'admin/index';
$route['dashboard/get_daily_sales'] = 'admin/get_daily_sales';

$route['customers'] = 'admin/customers';
$route['customers/get'] = 'admin/get_customer';
$route['customers/get_all'] = 'admin/get_all_customers';
$route['customers/add'] = 'admin/add_customer';
$route['customers/edit'] = 'admin/edit_customer';
$route['customers/hide'] = 'admin/hide_customer';
$route['customers/show'] = 'admin/unhide_customer';
$route['customers/remove'] = 'admin/remove_customer';
$route['customers/view_customer_sales'] = 'admin/view_customer_sales';
$route['customers/override_paid'] = 'admin/override_paid';

$route['sell'] = 'admin/sell';
$route['sell/get_customers'] = 'admin/get_active_customers';
$route['sell/get_today'] = 'admin/get_miners_today';
$route['sell/add_sell'] = 'admin/add_sell';
$route['sell/remove'] = 'admin/remove_sell';

$route['sales'] = 'admin/sales';
$route['sales/get'] = 'admin/get_sales_date';
$route['sales/paid'] = 'admin/toggle_sales_paid';
$route['sales/view_sales_customer'] = 'admin/view_sales_customer';
$route['sales/generate_invoice'] = 'admin/generate_invoice';

$route['logs'] = 'admin/logs';
$route['logs/get_all'] = 'admin/get_all_logs';

// $route['login'] = 'admin/login';
// $route['logout'] = 'admin/logout';
// $route['dashboard'] = 'admin/index';
// $route['sell'] = 'admin/posts';
// $route['reports'] = 'admin/reports';
// $route['customers'] = 'admin/customers';
// $route['logs'] = 'admin/logs';
// $route['posts/admin'] = 'admin/posts_admin';
// $route['posts/users'] = 'admin/posts_users';
// //Admin posts
// $route['posts/get_customers'] = 'admin/get_customers';
// $route['posts/add_post'] = 'admin/add_post';
// $route['posts/view_post'] = 'admin/view_post';
// $route['posts/edit_post'] = 'admin/edit_post';
// $route['posts/delete_post'] = 'admin/delete_post';
// //User posts
// $route['posts/recover_post'] = 'admin/recover_post';
// $route['posts/feature_post'] = 'admin/feature_post';
// $route['posts/unfeature_post'] = 'admin/unfeature_post';
// $route['posts/remove_post'] = 'admin/remove_post';
// //Reports
// $route['reports/posts'] = 'admin/reported_posts';
// $route['reports/bugs'] = 'admin/reported_bugs';
// $route['reports/view_post'] = 'admin/reported_view';
// $route['reports/deny_report'] = 'admin/reported_deny';
// $route['reports/remove_report'] = 'admin/reported_remove';
// $route['reports/bug_done'] = 'admin/reported_bug_done';
// //Users
// $route['users/users'] = 'admin/get_users';
// $route['users/admin'] = 'admin/get_admin';
// $route['users/register'] = 'admin/register';
// $route['users/deactivate_user'] = 'admin/deactivate_user';
// $route['users/activate_user'] = 'admin/activate_user';
// $route['users/ban_user'] = 'admin/ban_user';
// $route['users/unban_user'] = 'admin/unban_user';
// $route['users/admin_pass'] = 'admin/admin_change_pass';
// $route['users/deactivate_admin'] = 'admin/deactivate_admin';
// $route['users/activate_admin'] = 'admin/activate_admin';

$route['logs/get'] = 'admin/get_logs';

$route['change_pass'] = 'admin/change_pass';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

