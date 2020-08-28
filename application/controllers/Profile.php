<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('profile_model');
        $this->load->model('posts_model');
        $this->load->model('auth_model');
    }

    // View profile
	public function index($username = NULL)
	{
		if ($username == 'Guest' && $this->session->userdata('SESS_ROLE') == 'Guest') {
            
            $guest['guestInfo'] = $this->profile_model->get_guest_info($this->session->userdata('SESS_USER_ID'));
            $data['profile'] = $this->profile_model->view_profile($guest['guestInfo']['username']);
            $data['supports'] = $this->profile_model->get_support($data['profile']['uuid']);
            $data['title'] = '/ Profile';

            $this->load->view('pages/client/profile', $data);

        } else if($this->profile_model->check_username($username)) {

            $data['profile'] = $this->profile_model->view_profile($username);
            // Check if user is a guest or not
            if ($data['profile']['role'] == 'User') {

                $data['supports'] = $this->profile_model->get_support($data['profile']['uuid']);
                $data['title'] = '/ Profile';
                
                $this->load->view('pages/client/profile', $data);
            // If username is a guest, it will return 404. But moderator can access
            } else {
                if ($this->session->userdata('SESS_ROLE') == 'Moderator') {

                    $data['supports'] = $this->profile_model->get_support($data['profile']['uuid']);
                    $data['title'] = '/ Profile';
                    
                    $this->load->view('pages/client/profile', $data);
                } else {
                    show_404();
                }
                
            }
            
            // $this->output->set_status_header('503');
            // return $this->load->view('pages/alt/show_comingsoon');
        }else{

        	show_404();
        }
	}

    // View profile posts
    public function profile_thoughts()
    {
        if($this->input->is_ajax_request()) {

            $user_id = $this->input->post('id');

            echo json_encode($this->profile_model->get_thoughts($user_id));
        } else {
            redirect('', 'refresh');
        }
    }

    // View account settings
    public function account()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {

            $data['title'] = '/ Account';
            $this->load->view('pages/client/account', $data);
            // $this->output->set_status_header('503');
            // return $this->load->view('pages/alt/show_comingsoon');
        }else{

            show_404();
        }
    }

    // View single post
    public function view($username, $slug = NULL)
    {
        $this->load->model('home_model');

        // Post count and check if post exist
        if (!$this->posts_model->check_post($slug)) {
            // Display 404 not found
            show_404();
        }

        if($this->session->userdata('SESS_IS_LOGGED')) {

            $this->posts_model->add_view_count($slug);
        }
        
        $data['thought'] = $this->profile_model->view_thought($username, $slug);
        $data['most_read'] = $this->home_model->get_feeds_mr();
        $data['is_support'] = $this->profile_model->check_support($this->session->userdata('SESS_USER_ID'), $slug);
        $data['title'] = '/ '.$data['thought']['p_title'];

        $this->load->view('pages/client/thought', $data);
    }

    // View guest post
    public function view_guest($slug = NULL)
    {
        $this->load->model('home_model');

        // Post count and check if post exist
        if (!$this->posts_model->check_post($slug)) {
            // Display 404 not found
            show_404();
        }

        if($this->session->userdata('SESS_IS_LOGGED')) {

            $this->posts_model->add_view_count($slug);
        }
        
        $data['thought'] = $this->profile_model->view_guest_thought($slug);
        $data['most_read'] = $this->home_model->get_feeds_mr();
        $data['is_support'] = $this->profile_model->check_support($this->session->userdata('SESS_USER_ID'), $slug);
        $data['title'] = '/ '.$data['thought']['p_title'];

        $this->load->view('pages/client/thought', $data);
    }

    // Add read count
    public function has_read()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {

            if($this->input->is_ajax_request()) {

                $this->posts_model->add_read_count($this->input->post('p_slug'));

                echo json_encode('success');
            } else {
                redirect('', 'refresh');
            }
        }else{

            redirect('', 'refresh');
        }
    }

    // Add support count
    public function support()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {

            if($this->input->is_ajax_request()) {

                $this->posts_model->add_support_count($this->input->post('p_slug'));

                echo json_encode('success');
            } else {
                redirect('', 'refresh');
            }
        }else{

            redirect('', 'refresh');
        }
    }

    // Make post efface
    public function efface()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {

            if($this->input->is_ajax_request()) {

                $this->posts_model->efface_post($this->input->post('p_slug'));

                echo json_encode('success');
            } else {
                redirect('', 'refresh');
            }
        }else{

            redirect('', 'refresh');
        }
    }

    // Delete post
    public function report_post()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {

            if($this->input->is_ajax_request()) {

                if ($this->session->userdata('SESS_ROLE') == 'User') {

                    $this->posts_model->report($this->input->post('id'));

                    echo json_encode('success');
                } else {

                    echo json_encode('Error: Guest User');
                }
                
            } else {
                redirect('', 'refresh');
            }
        }else{

            redirect('', 'refresh');
        }
    }

    // Delete post
    public function delete_post()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {

            if($this->input->is_ajax_request()) {

                // Check if user owns the post
                if ($this->posts_model->check_user_post($this->input->post('id'))) {

                    $this->posts_model->delete($this->input->post('id'));

                    echo json_encode('success');
                }
            } else {
                redirect('', 'refresh');
            }
        }else{

            redirect('', 'refresh');
        }
    }

    // Change password
    public function change_pass()
    {
        if($this->session->userdata('SESS_IS_LOGGED')) {

            if($this->input->is_ajax_request()) {

                if ($this->auth_model->change_password($this->input->post('cur_password'), $this->input->post('password'))) {
                    $value['success'] = 1;
                    $value['error_message'] = 'Password successfully changed.';
                }else{
                    $value['success'] = 0;
                    $value['error_message'] = 'Current password does not match.';
                }
                echo json_encode($value);
            }else{

                redirect('', 'refresh');
            }
        }else{

            redirect('', 'refresh');
        }
    }
}
