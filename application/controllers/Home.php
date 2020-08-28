<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('home_model');
    }

	public function index()
	{
		if($this->session->userdata('SESS_IS_LOGGED')) {
			$data['title'] = '/ Home';
            $this->load->view('pages/client/wall', $data);
        }else{
        	$data['title'] = '';
        	$this->load->view('pages/client/home', $data);
        }
	}

	public function not_found()
	{
		show_404();
	}


	public function banned()
	{
		$this->session->sess_destroy();
		show_error('<i class="fa fa-exclamation-triangle"><i> You have been banned for violating our policies.', 404, 'BANNED');
	}

	public function report()
	{
		if($this->session->userdata('SESS_IS_LOGGED')) {

			$data['title'] = '/ Report';
            $this->load->view('pages/client/report', $data);
        }else{

        	redirect('', 'refresh');
        }
	}

	public function get_notice()
	{
		if($this->input->is_ajax_request()) {

			$feedInfo['notice'] = $this->home_model->get_all_notice();
			// $feedInfo['tags'] = $this->get_tags();

			echo json_encode($feedInfo);
		} else {
            redirect('', 'refresh');
        }
	}

	public function get_feed_a()
	{
		if($this->input->is_ajax_request()) {

			$feedInfo['thoughts'] = $this->home_model->get_feeds_a();
			// $feedInfo['tags'] = $this->get_tags();

			echo json_encode($feedInfo);
		} else {
            redirect('', 'refresh');
        }
	}
	// With pagination
	// public function get_feed_a($record = 0)
	// {
	// 	if($this->input->is_ajax_request()) {

	// 		$recordPerPage = 5;
	// 		if($record != 0){

	// 			$record = ($record-1) * $recordPerPage;
	// 		} 

	// 		$recordCount = $this->home_model->get_count_all();
	// 		$feedRecord = $this->home_model->get_feeds_a($record, $recordPerPage);
	// 		$config['base_url'] = 'get_feed_a';
	//       	$config['use_page_numbers'] = TRUE;
	// 		$config['next_link'] = 'Next';
	// 		$config['prev_link'] = 'Previous';
	// 		$config['last_link'] = FALSE;
	// 		$config['first_link'] = FALSE;
	// 		$config['display_pages'] = FALSE;
	// 		$config['attributes']['rel'] = FALSE;
	// 		$config['attributes'] = array('class' => 'pagination_roll');
	// 		$config['total_rows'] = $recordCount['thoughts_count'];
	// 		$config['per_page'] = $recordPerPage;
	// 		$this->pagination->initialize($config);
	// 		$feedInfo['pagination'] = $this->pagination->create_links();
	// 		$feedInfo['thoughts'] = $feedRecord;

	// 		echo json_encode($feedInfo);
	// 	} else {
 //            redirect('', 'refresh');
 //        }
	// }

	public function get_feed_ng()
	{
		if($this->input->is_ajax_request()) {

			$feedInfo['thoughts'] = $this->home_model->get_feeds_ng();
			// $feedInfo['tags'] = $this->get_tags();

			echo json_encode($feedInfo);
		} else {
            redirect('', 'refresh');
        }
	}

	public function get_tags()
	{
		if($this->input->is_ajax_request()) {
		// echo json_encode(array_values(array_column($this->home_model->get_tags(), 't_name')));
			echo json_encode($this->home_model->get_tags());
		} else {
            redirect('', 'refresh');
        }
	}

	public function get_feed_mr()
	{
		if($this->input->is_ajax_request()) {
		// echo json_encode(array_values(array_column($this->home_model->get_tags(), 't_name')));
			echo json_encode($this->home_model->get_feeds_mr());
		} else {
            redirect('', 'refresh');
        }
	}

	public function post_feed()
	{
		if($this->input->is_ajax_request()) {


            $slug = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($this->input->post('title')))));

			$postInfo['user_id'] = $this->session->userdata('SESS_USER_ID');
			$postInfo['p_title'] = ucfirst($this->input->post('title'));
			$postInfo['guest_name'] = $this->input->post('g_name');
			$postInfo['p_type'] = $this->session->userdata('SESS_ROLE');
			if ($this->input->post('p_tags') != '') {
				$postInfo['p_tags'] = implode(", ", array_map('ucwords', $this->input->post('p_tags')));
			}
			$postInfo['p_slug'] = intval(microtime(true) * 1000).mt_rand();
			$postInfo['p_content'] = ucfirst($this->input->post('content'));


			echo json_encode($this->home_model->post($postInfo));
		} else {
            redirect('', 'refresh');
        }
	}

	public function post_report()
	{
		if($this->input->is_ajax_request()) {
			$postInfo['rb_content'] = $this->input->post('content');
			$postInfo['user_id'] = $this->session->userdata('SESS_USER_ID');

			$this->home_model->post_report($postInfo);

			echo json_encode('success');
		} else {
            redirect('', 'refresh');
        }
	}
}
