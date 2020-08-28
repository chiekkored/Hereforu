<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
		$data['title'] = '/ About';
    	$this->load->view('pages/about/about', $data);
	}

	public function cookies()
	{
		$data['title'] = '/ Cookies';
    	$this->load->view('pages/about/cookies', $data);
	}

	public function privacy()
	{
		$data['title'] = '/ Privacy';
    	$this->load->view('pages/about/privacy', $data);
	}

	public function policy()
	{
		$data['title'] = '/ Policy';
    	$this->load->view('pages/about/policy', $data);
	}

	public function terms()
	{
		$data['title'] = '/ Terms';
    	$this->load->view('pages/about/terms', $data);
	}

	public function developer()
	{
		$data['title'] = '/ Developer';
    	$this->load->view('pages/about/developer', $data);
	}
}
