<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('SESS_IS_LOGGED')) {

            redirect('', 'refresh');
        }else{
        	$data['title'] = '/ Login';
        	$this->load->view('pages/client/login', $data);
        }
	}
}
