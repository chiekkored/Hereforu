<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logs_model extends CI_Model {

    public function __construct() {
        // Call parent constructor
        parent::__construct();
        // Load the Users_table class
        $this->load->library('users_table');
      }

    public function log($message) {
        $log = array(
          'content' => $message
        );
    return $this->db->insert('logs', $log);
  }

    public function get_all() {
        $this->db->select('*');
        $this->db->from('logs');
        $this->db->order_by("log_id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_limit() {
        $this->db->select('*');
        // $this->db->select('DATE_FORMAT(date, "%W, %b %D %h:%i %p") AS date', FALSE);
        $this->db->from('logs');
        $this->db->order_by("log_id", "desc");
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }
    
}