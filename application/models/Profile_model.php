<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {
  /**
  * Public constructor.
  */
  public function __construct() {
  	// Call parent constructor
    parent::__construct();
    // Load the Users_table class
    $this->load->library('home_table');
  }

  // View public post
  public function view_thought($username, $slug){
    $query = $this->db->query(
      "SELECT p.*,
        u.username,
        DATE_FORMAT(p.p_date_created, '%M %e, %Y') AS p_date_created,
        count(DISTINCT(pr.post_read_id)) AS pric,
        count(DISTINCT(pv.post_views_id)) AS pvic,
        count(DISTINCT(ps.post_support_id)) AS psic
      FROM posts p
      LEFT JOIN users u ON p.user_id = u.uuid
      LEFT JOIN post_read pr ON p.p_slug = pr.p_slug
      LEFT JOIN post_views pv ON p.p_slug = pv.p_slug
      LEFT JOIN post_supports ps ON p.p_slug = ps.p_slug
      WHERE NOT p.p_status = 1 AND
        u.username = '$username' AND
        p.p_slug = $slug
      GROUP BY p.post_id");
    return $query->row_array();
  }

  // View guest post
  public function view_guest_thought($slug){
    $query = $this->db->query(
      "SELECT p.*,
        u.username,
        DATE_FORMAT(p.p_date_created, '%M %e, %Y') AS p_date_created,
        count(DISTINCT(pr.post_read_id)) AS pric,
        count(DISTINCT(pv.post_views_id)) AS pvic,
        count(DISTINCT(ps.post_support_id)) AS psic
      FROM posts p
      LEFT JOIN users u ON p.user_id = u.uuid
      LEFT JOIN post_read pr ON p.p_slug = pr.p_slug
      LEFT JOIN post_views pv ON p.p_slug = pv.p_slug
      LEFT JOIN post_supports ps ON p.p_slug = ps.p_slug
      WHERE NOT p.p_status = 1 AND
        p.p_slug = $slug
      GROUP BY p.post_id");
    return $query->row_array();
  }

  public function get_guest_info($user_id){
    $this->db->select("username");
    $this->db->from('users');
    $this->db->where('uuid', $user_id);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function view_profile($username){
    $this->db->select("username, role, uuid, DATE_FORMAT(u_created_on, '%M %e, %Y') AS u_created_on");
    $this->db->from('users');
    $this->db->where('username', $username);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function get_thoughts($user_id){
    $query = $this->db->query(
      "SELECT p.user_id,
        p.p_content,
        p.p_date_created,
        p.p_is_featured,
        p.p_slug,
        p.p_tags,
        p.p_title,
        p.p_type,
        u.username,
        p.guest_name,
        count(DISTINCT(pr.post_read_id)) AS pric,
        count(DISTINCT(pv.post_views_id)) AS pvic,
        count(DISTINCT(ps.post_support_id)) AS psic
      FROM posts p
      LEFT JOIN users u ON p.user_id = u.uuid
      LEFT JOIN post_read pr ON p.p_slug = pr.p_slug
      LEFT JOIN post_views pv ON p.p_slug = pv.p_slug
      LEFT JOIN post_supports ps ON p.p_slug = ps.p_slug
      WHERE NOT p.p_status = 1 AND
        p.user_id = '$user_id'
      GROUP BY p.post_id
      ORDER BY p.post_id DESC");
    return $query->result_array();
  }

  public function get_support($user_id){
    $query = $this->db->query(
      "SELECT count(DISTINCT(ps.post_support_id)) AS psic
      FROM posts p
      LEFT JOIN users u ON p.user_id = u.uuid
      LEFT JOIN post_supports ps ON p.p_slug = ps.p_slug
      WHERE NOT p.p_status = 1 AND
        p.user_id = '$user_id' ");
    return $query->row_array();
  }

  public function check_username($username){
    $result = FALSE;
    $this->db->select('username');
    $this->db->from('users');
    $this->db->where('username', $username);
    $query = $this->db->get();
    
    if($query->num_rows() > 0) {
      $result = TRUE;
    }

    return $result;
  }

  public function check_support($user_id, $slug){
    $result = 0;
    $this->db->select('p_slug');
    $this->db->from('post_supports');
    $this->db->where('user_id', $user_id);
    $this->db->where('p_slug', $slug);
    $query = $this->db->get();
    
    if($query->num_rows() > 0) {
      $result = 1;
    }

    return $result;
  }

  public function post($postInfo) {
    $this->db->insert(Home_table::_TABLE_NAME, $postInfo);
    return $this->db->insert_id();
  }

}
