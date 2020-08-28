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
switch ($_SERVER['HTTP_HOST']) {
    case 'admin.hereforu.com':
        $route['default_controller'] = "admin";
		$route['login'] = 'admin/login';
		$route['logout'] = 'admin/logout';
		$route['dashboard'] = 'admin/index';
		$route['posts'] = 'admin/posts';
		$route['reports'] = 'admin/reports';
		$route['users'] = 'admin/users';
		$route['logs'] = 'admin/logs';
		$route['posts/admin'] = 'admin/posts_admin';
		$route['posts/users'] = 'admin/posts_users';
		//Admin posts
		$route['posts/add_post'] = 'admin/add_post';
		$route['posts/view_post'] = 'admin/view_post';
		$route['posts/edit_post'] = 'admin/edit_post';
		$route['posts/delete_post'] = 'admin/delete_post';
		//User posts
		$route['posts/recover_post'] = 'admin/recover_post';
		$route['posts/feature_post'] = 'admin/feature_post';
		$route['posts/unfeature_post'] = 'admin/unfeature_post';
		$route['posts/remove_post'] = 'admin/remove_post';
		//Reports
		$route['reports/posts'] = 'admin/reported_posts';
		$route['reports/bugs'] = 'admin/reported_bugs';
		$route['reports/view_post'] = 'admin/reported_view';
		$route['reports/deny_report'] = 'admin/reported_deny';
		$route['reports/remove_report'] = 'admin/reported_remove';
		$route['reports/bug_done'] = 'admin/reported_bug_done';
		//Users
		$route['users/users'] = 'admin/get_users';
		$route['users/admin'] = 'admin/get_admin';
		$route['users/register'] = 'admin/register';
		$route['users/deactivate_user'] = 'admin/deactivate_user';
		$route['users/activate_user'] = 'admin/activate_user';
		$route['users/ban_user'] = 'admin/ban_user';
		$route['users/unban_user'] = 'admin/unban_user';
		$route['users/admin_pass'] = 'admin/admin_change_pass';
		$route['users/deactivate_admin'] = 'admin/deactivate_admin';
		$route['users/activate_admin'] = 'admin/activate_admin';

		$route['logs/get'] = 'admin/get_logs';

		$route['change_pass'] = 'admin/change_pass';

		$route['404_override'] = '';
		$route['translate_uri_dashes'] = FALSE;
        break;
    case 'about.hereforu.com':
    	$route['default_controller'] = "about";
		$route['cookies'] = 'about/cookies';
		$route['privacy'] = 'about/privacy';
		$route['policy'] = 'about/policy';
		$route['terms'] = 'about/terms';
		$route['developer'] = 'about/developer';

    	$route['404_override'] = '';
		$route['translate_uri_dashes'] = FALSE;
    	break;
    default:
        $route['default_controller'] = 'home';
		$route['home'] = 'home/index';
		$route['ban'] = 'home/banned';
		$route['auth/register'] = 'auth/register';
		$route['logout'] = 'auth/logout';
		$route['login'] = 'login/index';
		$route['loginguest'] = 'auth/guest';
		$route['notice'] = 'home/get_notice';
		$route['get_feed_a'] = 'home/get_feed_a';
		$route['get_feed_mr'] = 'home/get_feed_mr';
		// $route['get_feed_a/(:num)'] = 'home/get_feed_a/$1';
		$route['get_feed_ng'] = 'home/get_feed_ng';
		$route['post_feed'] = 'home/post_feed';
		$route['get_tags'] = 'home/get_tags';
		$route['report'] = 'home/report';
		$route['report/post'] = 'home/post_report';
		$route['post/delete'] = 'profile/delete_post';
		$route['post/report'] = 'profile/report_post';
		$route['(:any)/(:num)/has_read'] = 'profile/has_read';
		$route['(:any)/(:num)/support'] = 'profile/support';
		$route['(:any)/(:num)/efface'] = 'profile/efface';
		$route['account'] = 'profile/account';
		$route['account/change_password'] = 'profile/change_pass';
		$route['(:any)'] = 'profile/index/$1';
		$route['guest/(:num)'] = 'profile/view_guest/$1';
		$route['(:any)/profile_thoughts'] = 'profile/profile_thoughts';
		$route['(:any)/(:num)'] = 'profile/view/$1/$2';

		$route['404_override'] = 'home/not_found';
		$route['translate_uri_dashes'] = FALSE;
        break;
}

