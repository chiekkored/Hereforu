<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts_model extends CI_Model {
  /**
  * Public constructor.
  */
  public function __construct() {
  	// Call parent constructor
    parent::__construct();
    // Load the Users_table class
    $this->load->library('posts_table');
  }

  public function check_post($slug) {
    $this->db->select('*');
    $this->db->from('posts');
    $this->db->where(Posts_table::_P_SLUG, $slug);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function check_user_post($slug) {
    $this->db->select('*');
    $this->db->from('posts');
    $this->db->where(Posts_table::_P_SLUG, $slug);
    $this->db->where(Posts_table::_USER_ID, $this->session->userdata('SESS_USER_ID'));
    $query = $this->db->get();
    return $query->row_array();
  }

  public function add_view_count($slug) {
    $this->db->select(Posts_table::_USER_ID);
    $this->db->from(Posts_table::_PV_TABLE_NAME);
    $this->db->where(Posts_table::_USER_ID, $this->session->userdata('SESS_USER_ID'));
    $this->db->where(Posts_table::_P_SLUG, $slug);
    $query = $this->db->get();
    if($query->num_rows() === 0) {
      $data = array(
        'p_slug' => $slug,
        'user_id' => $this->session->userdata('SESS_USER_ID')
      );
      $this->db->insert(Posts_table::_PV_TABLE_NAME, $data);
    }
  }

  public function add_read_count($slug) {
    $this->db->select(Posts_table::_USER_ID);
    $this->db->from(Posts_table::_PR_TABLE_NAME);
    $this->db->where(Posts_table::_USER_ID, $this->session->userdata('SESS_USER_ID'));
    $this->db->where(Posts_table::_P_SLUG, $slug);
    $query = $this->db->get();
    if($query->num_rows() === 0) {
      $data = array(
        'p_slug' => $slug,
        'user_id' => $this->session->userdata('SESS_USER_ID')
      );
      $this->db->insert(Posts_table::_PR_TABLE_NAME, $data);
    }
  }

  public function add_support_count($slug) {
    $this->db->select(Posts_table::_USER_ID);
    $this->db->from(Posts_table::_PS_TABLE_NAME);
    $this->db->where(Posts_table::_USER_ID, $this->session->userdata('SESS_USER_ID'));
    $this->db->where(Posts_table::_P_SLUG, $slug);
    $query = $this->db->get();
    if($query->num_rows() === 0) {
      $data = array(
        'p_slug' => $slug,
        'user_id' => $this->session->userdata('SESS_USER_ID')
      );
      $this->db->insert(Posts_table::_PS_TABLE_NAME, $data);
    }
  }

  public function efface_post($slug) {
    $this->db->set(Posts_table::_P_EFFACE, 1);
    $this->db->where(Posts_table::_P_SLUG, $slug);
    return $this->db->update(Posts_table::_P_TABLE_NAME);
  }

  // Report a post
  public function report($post_id) {
    $data = array(
      'post_id' => $post_id,
      'user_id' => $this->session->userdata('SESS_USER_ID')
    );
    $this->db->insert('reports', $data);
  }

  // Delete post
  public function delete($post_id) {
    $this->db->set(Posts_table::_P_STATUS, 1);
    $this->db->where(Posts_table::_P_SLUG, $post_id);
    return $this->db->update(Posts_table::_P_TABLE_NAME);
  }

}
