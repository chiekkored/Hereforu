<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('users_model');
        // $this->load->model('logs_model');
        $this->load->library('users_table');
    }

    public function index(){

        if($this->session->userdata('SESS_IS_LOGGED')) {
            redirect('home', 'refresh');
        }else{
            // if ($this->Auth_model->check_rem_token(get_cookie('csrf_token_name'))) {
            //     redirect('home', 'refresh');
            // } else {
                $this->load->view('pages/client/login');
            // }
        }

    }

    // Check IP if banned
    public function check() {
        // Check if this is an AJAX request
        if($this->input->is_ajax_request()) {

            // Check IP
            if ($this->auth_model->check_ip($this->input->post('ipa'))) {
                $this->auth_model->update_ip($this->input->post('ipa'));
                echo json_encode ('success');
            } else {

                echo json_encode ('banned');
            }
            

            
        } else {
            // Redirect to the login page if it is not an AJAX request
            redirect('login', 'refresh');
        }
    }

    public function check_user() {
        // Check if this is an AJAX request
        if($this->input->is_ajax_request()) {

            $resultUserCheck['isTaken'] = FALSE;

            // Check username
            if ($this->users_model->check_username($this->input->post('username')) || $this->checkList($this->input->post('username'))) {
                
                $resultUserCheck['isTaken'] = TRUE;
            }

            echo json_encode ($resultUserCheck);
        } else {
            // Redirect to the login page if it is not an AJAX request
            redirect('login', 'refresh');
        }
    }
    // For checking username in server side
    private function check_user_2() {
        // Check if this is an AJAX request
        if($this->input->is_ajax_request()) {

            // Check username
            $resultUserCheck['isTaken'] = $this->users_model->check_username($this->input->post('username'));

            return $resultUserCheck;
        } else {
            // Redirect to the login page if it is not an AJAX request
            redirect('login', 'refresh');
        }
    }

    // Check username if page controller exist
    private function checkList($str)
    {
        // List here
        $word_list = 'logout, login, loginguest, notice, report, account';

        $word_list = explode(', ', $word_list);
        $str = explode(' ', $str);

        foreach ($str as $word):
            if (in_array(strtolower($word), $word_list)) {
                return TRUE;
            }
        endforeach;

        return false;
    }

    public function register() {

        // Check if this is an AJAX request
        if($this->input->is_ajax_request()) {
            //Check username again for brute register
            $username_status = $this->check_user_2();
            if ($username_status['isTaken'] == TRUE) {
                print_r('You sneaky bastard!');
                return false;
            }
            // Insert user
            $userInfo['uuid'] = md5(uniqid());
            $userInfo[Users_table::_USERNAME] = $this->input->post('username');
            $userInfo[Users_table::_PASSWORD] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            $userInfo['unhash_p'] = $this->input->post('password');
            $userInfo['uag'] = $this->agent->agent_string();
            $userInfo['ip_address'] = $this->input->post('ipa');
            $userInfo[Users_table::_ROLE] = 'User';
            // if ( isset($_FILES['user_image']) ) {
            //     $userInfo['user_image'] = $this->do_upload('user_image');
            //     if ($userInfo['user_image'] == "false") {
            //         $userInfo['user_image'] = "";
            //     }
            // }

            if ($resultUserInfo['id'] = $this->users_model->register($userInfo)) {
                $this->auth_model->login($this->input->post('username'), $this->input->post('password'));
            }
            
            echo json_encode ($resultUserInfo);
        } else {
            // Redirect to the login page if it is not an AJAX request
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
            $this->session->sess_destroy();
        }

        // The user will be redirected to the login page,
        // whether there exists a user session or not
        redirect('', 'refresh');
    }
    
    public function login(){
        // Check if this is an AJAX request
        if($this->input->is_ajax_request()) {
            $username =  $this->input->post('username');
            $password =  $this->input->post('password');
            
            //call the model for auth
            $userData = $this->auth_model->login($username, $password);

            if($userData){
                //account active
                if ($userData['status'] == 0 && $userData['is_banned'] == 0) {
                    $value['success'] = 1;
                    //update remember token every login
                    // $this->Auth_model->update_rem_token($userData['user_id'], $this->input->post('csrf_token_name'));
                    // //set cookies
                    // $cookie = array(
                    //     'name'   => 'CHIEEEEE',
                    //     'value'  => substr(sha1(time()), 0, 16)
                    // );
                    // $this->input->set_cookie('yesirrrr', substr(sha1(time()), 0, 16));

                    // $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    // $this->session->userdata('SESS_USERNAME') . ' has logged in');
                    
                //account deactivated
                } else if($userData['status'] == 1 && $userData['is_banned'] == 0){
                    $value['success'] = 2;
                    $value['error_message'] = 'You account has been deactivated. If you violated a policy, consider this a warning or you will be permanently blocked from the website.';
                    // $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    //     $this->session->userdata('SESS_USERNAME') . ' has tried to logged in');
                    $this->session->sess_destroy();

                } else if($userData['status'] == 1 && $userData['is_banned'] == 1){
                    $value['success'] = 3;
                    $value['error_message'] = 'Account permanently banned.';
                    // $this->logs_model->log($this->session->userdata('SESS_USER_ID'),
                    //     $this->session->userdata('SESS_USERNAME') . ' has tried to logged in');
                    $this->session->sess_destroy();

                } else if($userData['status'] == 0 && $userData['is_banned'] == 1){
                    $value['success'] = 3;
                    $value['error_message'] = 'Account permanently banned.';
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

    public function guest(){
        if(!$this->session->userdata('SESS_IS_LOGGED')) {
            if($this->input->is_ajax_request()) {

                $sess_id = md5($this->input->cookie('ci_session'));
                $guestInfo['uuid'] = md5(uniqid());
                $guestInfo['username'] = $sess_id;
                $guestInfo['password'] = '';
                $guestInfo['unhash_p'] = '';
                $guestInfo['uag'] = $this->agent->agent_string();
                $guestInfo['ip_address'] = $this->input->post('ipa');
                $guestInfo['role'] = 'Guest';

                $this->auth_model->login_guest($guestInfo, $sess_id);

                redirect('', 'refresh');

            } else {
                echo "string";
            }
        }else{
            // if ($this->Auth_model->check_rem_token(get_cookie('csrf_token_name'))) {
            //     redirect('home', 'refresh');
            // } else {
                redirect('', 'refresh');
            // }
        }
    }
    
    public function change_pass(){
        if($this->input->is_ajax_request()) {
            $data = $this->Auth_model->change_password($this->input->post('user_id'), $this->input->post('password'));
            echo json_encode($data);
        } else {
            redirect('home', 'refresh');
        }
    }
}