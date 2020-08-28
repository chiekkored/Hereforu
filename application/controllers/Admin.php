<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('cms_model');
        $this->load->model('logs_model');

        $this->load->library('cms_table');
        
    }

    private function check_admin()
    {
        $isadmin = $this->cms_model->is_admin($this->session->userdata('SESS_USER_ID'));

        return $isadmin;
        
    }

	public function index()
	{
        // Check if user is logged in
		if($this->session->userdata('SESS_IS_LOGGED')) {
            // Check if admin account exist
            if ($this->check_admin()) {

                $this->load->view('pages/cms/dashboard');
            }else{
                // If admin account doesn't exit
                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{
            // If user is not logged in
        	$this->load->view('pages/cms/login');
        }
	}

    // Admin posts page
    public function posts()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {

                $this->load->view('pages/cms/posts');
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Admin reports page
    public function reports()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {

                $this->load->view('pages/cms/reports');
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Admin users page
    public function users()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {

                $this->load->view('pages/cms/users');
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Admin logs page
    public function logs()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {

                $this->load->view('pages/cms/logs');
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Get activity logs
    public function get_logs()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {

                echo json_encode($this->cms_model->get_logs());
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Get users account
    public function get_users()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {

                echo json_encode($this->cms_model->get_users());
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Get admin accounts
    public function get_admin()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {

                echo json_encode($this->cms_model->get_admins());
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Get admin posts
    public function posts_admin()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {

                $postData = $this->cms_model->get_admin_posts();

                echo json_encode($postData);
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Add admin posts
    public function add_post()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $postInfo['sm_title'] = $this->input->post('sm_title');
                    $postInfo['sm_content'] = $this->input->post('sm_content');
                    $postInfo['sm_type'] = $this->input->post('sm_type');
                    $postInfo['sm_created_by'] = $this->session->userdata('SESS_USERNAME');

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' added an admin post: '. $this->input->post('sm_title'));

                    $this->cms_model->add_post($postInfo);

                    echo json_encode('success');

                } else {
                    redirect('', 'refresh');
                }
            } else {

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // View admin posts
    public function view_post()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    echo json_encode($this->cms_model->view_post($this->input->post('sm_id')));

                } else {
                    redirect('', 'refresh');
                }
            } else {

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Edit admin posts
    public function edit_post()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $sm_id = $this->input->post('sm_id');
                    $postInfo['sm_title'] = $this->input->post('sm_title');
                    $postInfo['sm_content'] = $this->input->post('sm_content');
                    $postInfo['sm_type'] = $this->input->post('sm_type');
                    $postInfo['sm_created_by'] = $this->session->userdata('SESS_USERNAME');

                    $this->cms_model->edit_post($postInfo, $sm_id);

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' edited an admin post: '. $this->input->post('sm_title'));

                    echo json_encode('success');

                } else {
                    redirect('', 'refresh');
                }
            } else {

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Delete admin posts
    public function delete_post()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $this->cms_model->delete_post($this->input->post('sm_id'));

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' deleted an admin post (sitemetadata id: '. $this->input->post('sm_id').')');

                    echo json_encode('success');

                } else {
                    redirect('', 'refresh');
                }
            } else {

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Get users posts
    public function posts_users()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $postData = $this->cms_model->get_users_posts();

                    echo json_encode($postData);

                } else {
                    redirect('', 'refresh');
                }

            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Recover users post
    public function recover_post()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $this->cms_model->recover_user_post($this->input->post('post_id'));

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' recovered a post (post id: '. $this->input->post('post_id').')');

                    echo json_encode('success');

                } else {
                    redirect('', 'refresh');
                }
                
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Feature users post
    public function feature_post()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $this->cms_model->feature_user_post($this->input->post('post_id'));

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' featured a post (post id: '. $this->input->post('post_id').')');

                    echo json_encode('success');

                } else {
                    redirect('', 'refresh');
                }
                
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Unfeature users post
    public function unfeature_post()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $this->cms_model->unfeature_user_post($this->input->post('post_id'));

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' unfeatured a post (post id: '. $this->input->post('post_id').')');

                    echo json_encode('success');

                } else {
                    redirect('', 'refresh');
                }
                
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Remove users post
    public function remove_post()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $this->cms_model->remove_user_post($this->input->post('post_id'));

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' removed a post (post id: '. $this->input->post('post_id').')');

                    echo json_encode('success');

                } else {
                    redirect('', 'refresh');
                }
                
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Get reported posts
    public function reported_posts()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {

                $postData = $this->cms_model->get_reported_posts();

                echo json_encode($postData);
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Get reported bugs
    public function reported_bugs()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {

                $postData = $this->cms_model->get_reported_bugs();

                echo json_encode($postData);
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // View reported post
    public function reported_view()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $postData = $this->cms_model->view_reported_post($this->input->post('post_id'));

                    echo json_encode($postData);

                } else {
                    redirect('', 'refresh');
                }

            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Deny reported post
    public function reported_deny()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $this->cms_model->deny_reported_post($this->input->post('report_id'));

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' denied a report (report id: '. $this->input->post('report_bug_id').')');

                    echo json_encode('success');

                } else {
                    redirect('', 'refresh');
                }

            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Remove reported post
    public function reported_remove()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $this->cms_model->update_report($this->input->post('report_id'));
                    $this->cms_model->remove_reported_post($this->input->post('post_id'));

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' removed the reported post (post id: '. $this->input->post('report_bug_id').')');

                    echo json_encode('success');

                } else {
                    redirect('', 'refresh');
                }

            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Update bug report
    public function reported_bug_done()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $this->cms_model->update_bug_done($this->input->post('report_bug_id'));

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' toggled a bug to done (report id: '. $this->input->post('report_bug_id').')');

                    echo json_encode('success');

                } else {
                    redirect('', 'refresh');
                }
                
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Deactivate user
    public function deactivate_user()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $this->cms_model->deactivate_user($this->input->post('user_id'));

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' deactivated the user: '. $this->input->post('user_id'));

                    echo json_encode('success');

                } else {
                    redirect('', 'refresh');
                }
                
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Activate user
    public function activate_user()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $this->cms_model->activate_user($this->input->post('user_id'));

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' activated the user: '. $this->input->post('user_id'));

                    echo json_encode('success');

                } else {
                    redirect('', 'refresh');
                }
                
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Ban user IP
    public function ban_user()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $accountInfo['ip_address'] = $this->input->post('ipa');

                    $this->cms_model->ban_user($accountInfo);
                    $this->cms_model->ban_useraccount($this->input->post('ipa'));

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' banned the ip address: '. $this->input->post('ipa'));

                    echo json_encode('success');

                } else {
                    redirect('', 'refresh');
                }
                
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Unban user IP
    public function unban_user()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $this->cms_model->unban_user($this->input->post('ipa'));
                    $this->cms_model->unban_useraccount($this->input->post('ipa'));

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' unbanned the ip address: '. $this->input->post('ipa'));
                    echo json_encode('success');

                } else {
                    redirect('', 'refresh');
                }
                
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Change pass admin by superadmin
    public function admin_change_pass()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $this->cms_model->admin_change_password($this->input->post('user_id'), $this->input->post('password'));

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' changed the password for admin: '. $this->input->post('user_id'));

                    echo json_encode('success');

                } else {
                    redirect('', 'refresh');
                }
                
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Deactivate user
    public function deactivate_admin()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $this->cms_model->deactivate_admin($this->input->post('user_id'));

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' deactivated the admin: '. $this->input->post('user_id'));

                    echo json_encode('success');

                } else {
                    redirect('', 'refresh');
                }
                
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Activate user
    public function activate_admin()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $this->cms_model->activate_admin($this->input->post('user_id'));

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' deactivated the admin: '. $this->input->post('user_id'));

                    echo json_encode('success');

                } else {
                    redirect('', 'refresh');
                }
                
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }

    // Change pass admin
    public function change_pass()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {
            if ($this->check_admin()) {
                if ($this->input->is_ajax_request()) {

                    $this->cms_model->change_password($this->input->post('cur_password'), $this->input->post('password'));

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' changed its password');

                    echo json_encode('success');

                } else {
                    redirect('', 'refresh');
                }
                
            }else{

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }

        }else{

            redirect('', 'refresh');
        }
    }


	public function login()
	{
        // Check if this is an AJAX request
        if($this->input->is_ajax_request()) {
            $username =  $this->input->post('username');
            $password =  $this->input->post('password');
            
            //call the model for auth
            $userData = $this->cms_model->login($username, $password);

            if($userData){
                //account active
                if ($userData['status'] == 0) {
                    $value['success'] = 1;
                    //update remember token every login
                    // $this->Auth_model->update_rem_token($userData['user_id'], $this->input->post('csrf_token_name'));
                    // //set cookies
                    // $cookie = array(
                    //     'name'   => 'CHIEEEEE',
                    //     'value'  => substr(sha1(time()), 0, 16)
                    // );
                    // $this->input->set_cookie('yesirrrr', substr(sha1(time()), 0, 16));

                    $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' has logged in');
                    
                //account deactivated
                } else if($userData['status'] == 1){
                    $value['success'] = 0;
                    $value['error_message'] = 'You account has been deactivated. Contact super administrator.';
                    // $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    //     $this->session->userdata('SESS_USERNAME') . ' has tried to logged in');
                    $this->session->sess_destroy();
                }
            }
            else{
                $value['success'] = 0;
                $value['error_message'] = 'Invalid username or password!';
            }

            echo json_encode($value);
        }else{
            redirect('', 'refresh');
        }
    }

    public function register() {
        // Check if this is an AJAX request
        if($this->input->is_ajax_request()) {
            if ($this->check_admin()) {
                if ($this->session->userdata('SESS_IS_LOGGED')) {
                    if ($this->session->userdata('SESS_ROLE') == 'Superadmin') {
                        // Insert user
                        $userInfo[Cms_table::_UUID] = md5(uniqid());
                        $userInfo[Cms_table::_USERNAME] = $this->input->post('username');
                        $userInfo[Cms_table::_PASSWORD] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                        // $userInfo['unhash_p'] = $this->input->post('password');
                        $userInfo[Cms_table::_ADMIN_ROLE] = 'Administrator';
                        $userInfo[Cms_table::_CREATED_BY] = $this->session->userdata('SESS_USERNAME');
                        // if ( isset($_FILES['user_image']) ) {
                        //     $userInfo['user_image'] = $this->do_upload('user_image');
                        //     if ($userInfo['user_image'] == "false") {
                        //         $userInfo['user_image'] = "";
                        //     }
                        // }

                        $resultUserInfo['id'] = $this->cms_model->register($userInfo);

                        $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                                $this->session->userdata('SESS_USERNAME') . ' registered the account: '.$this->input->post('username'));
                        // $this->auth_model->login($this->input->post('username'), $this->input->post('password'));
                        echo json_encode ($resultUserInfo);
                    } else {
                        redirect('', 'refresh');
                    }
                        
                } else {
                    redirect('', 'refresh');
                }
            } else {

                $this->session->sess_destroy();
                redirect('', 'refresh');
            }
            
        } else {
            redirect('', 'refresh');
        }
    }

    public function logout(){
        if($this->session->userdata('SESS_IS_LOGGED')) {
            // If there are existing user session,
            // the user session will be destroyed and the user is logged out
            // $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
            // $this->session->userdata('SESS_USERNAME') . ' has logged out');
            // delete_cookie('csrf_token_name');
            $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    $this->session->userdata('SESS_USERNAME') . ' has logged out');
            $this->session->sess_destroy();
        }

        // The user will be redirected to the login page,
        // whether there exists a user session or not
        redirect('', 'refresh');
    }
}
