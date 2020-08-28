<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
  /**
  * Public constructor.
  */
  public function __construct() {
  	// Call parent constructor
    parent::__construct();
    // Load the Users_table class
    $this->load->library('home_table');
    
  }

  public function get_all_notice(){
    $this->db->select('sm_title, sm_content, sm_type');
    $this->db->from(Site_metadata_table::_TABLE_NAME);
    $this->db->where(Site_metadata_table::_SM_STATUS, 0);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_feeds_a(){
    $query = $this->db->query(
      "SELECT p.guest_name,
        p.user_id,
        p.p_content,
        p.p_date_created,
        p.p_is_featured,
        p.p_slug,
        p.p_tags,
        p.p_title,
        p.p_type,
        p.p_is_efface,
        u.username,
        count(DISTINCT(pr.post_read_id)) AS pric,
        count(DISTINCT(pv.post_views_id)) AS pvic,
        count(DISTINCT(ps.post_support_id)) AS psic
      FROM posts p
      LEFT JOIN users u ON p.user_id = u.uuid
      LEFT JOIN post_read pr ON p.p_slug = pr.p_slug
      LEFT JOIN post_views pv ON p.p_slug = pv.p_slug
      LEFT JOIN post_supports ps ON p.p_slug = ps.p_slug
      WHERE p.p_status = 0
      GROUP BY p.post_id
      ORDER BY p.post_id desc
      LIMIT 50");
    return $query->result_array();
  }
  // With pagination
  // public function get_feeds_a($rowperpage, $rowno){
  //   $this->db->select('p.*, u.username');
  //   $this->db->from(Home_table::_TABLE_NAME . ' p');
  //   $this->db->join('users u', 'p.user_id = u.user_id');
  //   $this->db->where(Home_table::_POST_STATUS, 0);
  //   $this->db->limit($rowno, $rowperpage);
  //   $this->db->order_by("p.post_id", "desc");
  //   $query = $this->db->get();
  //   return $query->result_array();
  // }

  // public function get_count_all(){
  //   $this->db->select('count(*) as thoughts_count');
  //   $this->db->from(Home_table::_TABLE_NAME);
  //   $this->db->where(Home_table::_POST_STATUS, 0);
  //   $query = $this->db->get();
  //   return $query->row_array();
  // }

  public function get_feeds_ng(){
    $query = $this->db->query(
      "SELECT p.guest_name,
        p.user_id,
        p.p_content,
        p.p_date_created,
        p.p_is_featured,
        p.p_slug,
        p.p_tags,
        p.p_title,
        p.p_is_efface,
        p.p_type,
        u.username,
        count(DISTINCT(pr.post_read_id)) AS pric,
        count(DISTINCT(pv.post_views_id)) AS pvic,
        count(DISTINCT(ps.post_support_id)) AS psic
      FROM posts p
      LEFT JOIN users u ON p.user_id = u.uuid
      LEFT JOIN post_read pr ON p.p_slug = pr.p_slug
      LEFT JOIN post_views pv ON p.p_slug = pv.p_slug
      LEFT JOIN post_supports ps ON p.p_slug = ps.p_slug
      WHERE p.p_status = 0 AND p.p_type = 'User'
      GROUP BY p.post_id
      ORDER BY p.post_id desc
      LIMIT 50");
    return $query->result_array();
  }

  public function get_tags(){
    $this->db->select('t_name');
    $this->db->from('tags');
    $this->db->where('t_status', 0);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_feeds_mr(){
    $query = $this->db->query(
      "SELECT p.p_title,
        p.p_slug,
        p.p_date_created,
        p.p_type,
        u.username,
        count(DISTINCT(pv.post_views_id)) AS pvic
      FROM posts p
      LEFT JOIN users u ON p.user_id = u.uuid
      LEFT JOIN post_views pv ON p.p_slug = pv.p_slug
      WHERE p.p_status = 0
      GROUP BY p.post_id
      ORDER BY pvic desc
      LIMIT 5");
    return $query->result_array();
  }

  public function post($postInfo) {
    $this->db->insert(Home_table::_TABLE_NAME, $postInfo);
    return $this->db->insert_id();
  }

  public function post_report($postInfo) {
    $this->db->insert('report_bugs', $postInfo);
    return $this->db->insert_id();
  }

}
