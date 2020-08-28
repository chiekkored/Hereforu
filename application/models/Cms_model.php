<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms_model extends CI_Model {

    public function __construct() {
        // Call parent constructor
        parent::__construct();
        // Load the Cms_table_table class
        $this->load->library('cms_table');
    }

    // Check if account is admin
    public function is_admin($uuid){
        $result = FALSE;
        $this->db->select(Cms_table::_UUID);
        $this->db->from(Cms_table::_TABLE_NAME);
        $this->db->where(Cms_table::_UUID, $uuid);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() === 1) {
            $result = TRUE;
            return $result;
        } else {
            $result;
        }
        
    }

    // Get all admin posts
    public function get_admin_posts(){
        $this->db->select(implode(', ', array(
          Metadata_table::_SM_ID,
          Metadata_table::_SM_TITLE,
          Metadata_table::_SM_TYPE,
          Metadata_table::_CREATED_BY
        )));
        $this->db->select('DATE_FORMAT(sm_created_on, "%M %d, %Y") AS c_sm_created_on', FALSE);
        $this->db->from(Metadata_table::_TABLE_NAME);
        $this->db->order_by(Metadata_table::_SM_ID, "asc");
        $this->db->where(Metadata_table::_STATUS, 0);
        $query = $this->db->get();
        return $query->result_array();
    }

    // Get all users posts
    public function get_users_posts(){
        $query = $this->db->query(
      "SELECT p.post_id,
        p.guest_name,
        p.p_title,
        p.p_slug,
        p.p_type,
        p.p_is_featured,
        DATE_FORMAT(p.p_date_created, '%b %e, %Y %l:%i %p') AS p_date_created,
        p.p_status,
        u.username,
        count(DISTINCT(pr.post_read_id)) AS pric,
        count(DISTINCT(pv.post_views_id)) AS pvic,
        count(DISTINCT(ps.post_support_id)) AS psic
      FROM posts p
      LEFT JOIN users u ON p.user_id = u.uuid
      LEFT JOIN post_read pr ON p.p_slug = pr.p_slug
      LEFT JOIN post_views pv ON p.p_slug = pv.p_slug
      LEFT JOIN post_supports ps ON p.p_slug = ps.p_slug
      GROUP BY p.post_id
      ORDER BY p.post_id desc");
    return $query->result_array();
    }

    // Get all reported posts
    public function get_reported_posts(){
        $this->db->select('p.p_title, p.p_status, u.username, r.*');
        $this->db->select('DATE_FORMAT(r.r_created_on, "%b %e, %Y %l:%i %p") AS r_created_on', FALSE);
        $this->db->from(Reports_table::_TABLE_NAME.' r');
        $this->db->join('posts p', 'r.post_id = p.post_id');
        $this->db->join('users u', 'r.user_id = u.user_id');
        $this->db->order_by(Reports_table::_REPORT_ID, "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    // Get all reported bugs
    public function get_reported_bugs(){
        $this->db->select('rb.*, u.username');
        $this->db->select('DATE_FORMAT(rb.rb_created_on, "%b %e, %Y %l:%i %p") AS rb_created_on', FALSE);
        $this->db->from('report_bugs rb');
        $this->db->join('users u', 'rb.user_id = u.user_id');
        $this->db->order_by('rb.report_bug_id', "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    // Get user accounts
    public function get_users() {
        $query = $this->db->query(
          "SELECT
            u.username,
            u.ip_address,
            u.user_id,
            u.role,
            u.is_banned,
            u.status,
            DATE_FORMAT(u.u_created_on, '%b %e, %Y %l:%i %p') AS u_created_on,
          COUNT(ps.post_support_id) AS psic
        FROM
          users u
        LEFT JOIN posts p ON p.user_id = u.uuid
        LEFT JOIN post_supports ps ON p.p_slug = ps.p_slug
        GROUP BY u.user_id,u.username
        ORDER BY u.user_id desc");
        return $query->result_array();
    }

    // Get admin accounts
    public function get_admins() {
        $this->db->select('*');
        $this->db->select('DATE_FORMAT(created_on, "%b %e, %Y %l:%i %p") AS created_on', FALSE);
        $this->db->from('user_admins');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Get logs
    public function get_logs() {
        $this->db->select('*');
        $this->db->select('DATE_FORMAT(created_on, "%b %e, %Y %l:%i %p") AS created_on', FALSE);
        $this->db->from('logs');
        $this->db->order_by('log_id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }


    // Add admin post
    public function add_post($postInfo) {
        $this->db->insert(Metadata_table::_TABLE_NAME, $postInfo);
        return $this->db->insert_id();
    }

    // View admin post
    public function view_post($sm_id) {
        $this->db->select('*');
        $this->db->select('DATE_FORMAT(sm_created_on, "%M %d, %Y") AS sm_created_on', FALSE);
        $this->db->from(Metadata_table::_TABLE_NAME);
        $this->db->where(Metadata_table::_SM_ID, $sm_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //Update admin post
    function edit_post($postInfo, $sm_id){
        $this->db->where(Metadata_table::_SM_ID, $sm_id);
        return $this->db->update(Metadata_table::_TABLE_NAME, $postInfo);
    }

    // Delete admin post
    function delete_post($sm_id){
        $this->db->set(Metadata_table::_STATUS, 2);
        $this->db->where(Metadata_table::_SM_ID, $sm_id);
        return $this->db->update(Metadata_table::_TABLE_NAME);
    }

    // Recover user post
    function recover_user_post($post_id){
        $this->db->set(Posts_table::_STATUS, 0);
        $this->db->where(Posts_table::_POST_ID, $post_id);
        return $this->db->update(Posts_table::_TABLE_NAME);
    }

    // Remove user post
    function remove_user_post($post_id){
        $this->db->set(Posts_table::_STATUS, 1);
        $this->db->where(Posts_table::_POST_ID, $post_id);
        return $this->db->update(Posts_table::_TABLE_NAME);
    }

    // Feature user post
    function feature_user_post($post_id){
        $this->db->set(Posts_table::_P_FEATURED, 1);
        $this->db->where(Posts_table::_POST_ID, $post_id);
        return $this->db->update(Posts_table::_TABLE_NAME);
    }

    // Uneature user post
    function unfeature_user_post($post_id){
        $this->db->set(Posts_table::_P_FEATURED, 0);
        $this->db->where(Posts_table::_POST_ID, $post_id);
        return $this->db->update(Posts_table::_TABLE_NAME);
    }

    // Get reported users post
    public function view_reported_post($post_id){
        $query = $this->db->query(
      "SELECT p.*,
        DATE_FORMAT(p.p_date_created, '%b %e, %Y %l:%i %p') AS p_date_created,
        u.username,
        count(DISTINCT(pr.post_read_id)) AS pric,
        count(DISTINCT(pv.post_views_id)) AS pvic,
        count(DISTINCT(ps.post_support_id)) AS psic
      FROM posts p
      LEFT JOIN users u ON p.user_id = u.uuid
      LEFT JOIN post_read pr ON p.p_slug = pr.p_slug
      LEFT JOIN post_views pv ON p.p_slug = pv.p_slug
      LEFT JOIN post_supports ps ON p.p_slug = ps.p_slug
      WHERE post_id = '$post_id'
      GROUP BY p.post_id
      ORDER BY p.post_id desc");
    return $query->row_array();
    }

    // Deny reported post
    function deny_reported_post($report_id){
        $this->db->set(Reports_table::_STATUS, 1);
        $this->db->where(Reports_table::_REPORT_ID, $report_id);
        return $this->db->update(Reports_table::_TABLE_NAME);
    }

    // Update reported
    function update_report($report_id){
        $this->db->set(Reports_table::_STATUS, 2);
        $this->db->where(Reports_table::_REPORT_ID, $report_id);
        return $this->db->update(Reports_table::_TABLE_NAME);
    }

    // Remove reported post
    function remove_reported_post($post_id){
        $this->db->set(Posts_table::_STATUS, 2);
        $this->db->where(Posts_table::_POST_ID, $post_id);
        return $this->db->update(Posts_table::_TABLE_NAME);
    }

    // Update bug report
    function update_bug_done($report_bug_id){
        $this->db->set('rb_status', 1);
        $this->db->where('report_bug_id', $report_bug_id);
        return $this->db->update('report_bugs');
    }

    // Update deactivate user
    function deactivate_user($user_id){
        $this->db->set('status', 1);
        $this->db->where('user_id', $user_id);
        return $this->db->update('users');
    }

    // Update activate user
    function activate_user($user_id){
        $this->db->set('status', 0);
        $this->db->where('user_id', $user_id);
        return $this->db->update('users');
    }

    // Update ban user
    function ban_user($acntInfo){
        $this->db->insert('user_banned', $acntInfo);
        return $this->db->insert_id();
    }

    // Update ban user table
    function ban_useraccount($ipa){
        $this->db->set('is_banned', 1);
        $this->db->where('ip_address', $ipa);
        return $this->db->update('users');
    }

    // Update ban user
    function unban_user($ipa){
        $this->db->set('ub_status', 1);
        $this->db->where('ip_address', $ipa);
        return $this->db->update('user_banned');
    }

    // Update unban user table
    function unban_useraccount($ipa){
        $this->db->set('is_banned', 0);
        $this->db->where('ip_address', $ipa);
        return $this->db->update('users');
    }
    
    // Login admin
    public function login($username, $password){
        $result = FALSE;
        $this->db->select(implode(', ', array(
          Cms_table::_UUID,
          Cms_table::_USERNAME,
          Cms_table::_PASSWORD,
          // Cms_table::_FNAME,
          Cms_table::_STATUS,
          Cms_table::_ADMIN_ROLE
        )));
        $this->db->from(Cms_table::_TABLE_NAME);
        $this->db->where(Cms_table::_USERNAME, $username);
        // $this->db->where(Cms_table::_PASSWORD, password_hash($password, PASSWORD_BCRYPT));
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() === 1) {
            $result = $query->row_array();
            if (password_verify($password, $result[Cms_table::_PASSWORD])) {
                $this->session->set_userdata('SESS_IS_LOGGED', TRUE);
                // Set the user ID
                $this->session->set_userdata('SESS_USER_ID', $result[Cms_table::_UUID]);
                // Set the username
                $this->session->set_userdata('SESS_USERNAME', $result[Cms_table::_USERNAME]);
                // Set the username
                // $this->session->set_userdata('SESS_FNAME', $result[Cms_table::_FNAME]);
                // Set the role of the user
                $this->session->set_userdata('SESS_ROLE', $result[Cms_table::_ADMIN_ROLE]);
            }else{
                $result = FALSE;
            }
        }

        return $result;  
    }

    public function register($user) {
        $this->db->insert(Cms_table::_TABLE_NAME, $user);
        return $this->db->insert_id();
    }

    // Update activate admin
    function activate_admin($user_id){
        $this->db->set('status', 0);
        $this->db->where(Cms_table::_USER_ID, $user_id);
        return $this->db->update(Cms_table::_TABLE_NAME);
    }

    // Update deactivate admin
    function deactivate_admin($user_id){
        $this->db->set('status', 1);
        $this->db->where(Cms_table::_USER_ID, $user_id);
        return $this->db->update(Cms_table::_TABLE_NAME);
    }

    //Update admin password by superadmin
    function admin_change_password($user_admin_id, $password){
        $this->db->set(Cms_table::_PASSWORD, password_hash($password, PASSWORD_BCRYPT));
        $this->db->where(Cms_table::_USER_ID, $user_admin_id);
        return $this->db->update(Cms_table::_TABLE_NAME);
    }

    //Update password useradmin
    function change_password($current_password, $new_password){
        $result = FALSE;
        $this->db->select(Cms_table::_PASSWORD);
        $this->db->from(Cms_table::_TABLE_NAME);
        $this->db->where(Cms_table::_USERNAME, $this->session->userdata('SESS_USERNAME'));
        // $this->db->where(Cms_table::_PASSWORD, password_hash($password, PASSWORD_BCRYPT));
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() === 1) {
            $result = $query->row_array();
            if (password_verify($current_password, $result[Cms_table::_PASSWORD])) {

                $this->db->set(Cms_table::_PASSWORD, password_hash($new_password, PASSWORD_BCRYPT));
                $this->db->where(Cms_table::_UUID, $this->session->userdata('SESS_USER_ID'));
                return $this->db->update(Cms_table::_TABLE_NAME);
            }else{
                $result = FALSE;
            }
        }
        return $result;  
    }
    
}