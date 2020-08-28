<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function __construct() {
        // Call parent constructor
        parent::__construct();
        // Load the Users_table_table class
        $this->load->library('users_table');
    }
    
    public function login($username, $password){
        $result = FALSE;
        $this->db->select(implode(', ', array(
          Users_table::_UUID,
          Users_table::_USERNAME,
          Users_table::_PASSWORD,
          // Users_table::_FNAME,
          Users_table::_STATUS,
          Users_table::_IS_BANNED,
          Users_table::_ROLE
        )));
        $this->db->from(Users_table::_TABLE_NAME);
        $this->db->where(Users_table::_USERNAME, $username);
        // $this->db->where(Users_table::_PASSWORD, password_hash($password, PASSWORD_BCRYPT));
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() === 1) {
            $result = $query->row_array();
            if (password_verify($password, $result[Users_table::_PASSWORD])) {
                $this->session->set_userdata('SESS_IS_LOGGED', TRUE);
                // Set the user ID
                $this->session->set_userdata('SESS_USER_ID', $result[Users_table::_UUID]);
                // Set the username
                $this->session->set_userdata('SESS_USERNAME', $result[Users_table::_USERNAME]);
                // Set the username
                // $this->session->set_userdata('SESS_FNAME', $result[Users_table::_FNAME]);
                // Set the role of the user
                $this->session->set_userdata('SESS_ROLE', $result[Users_table::_ROLE]);
            }else{
                $result = FALSE;
            }
        }

        return $result;  
    }

    //Check and login remember token
    function check_rem_token($token){
        $result = FALSE;
        $this->db->select(implode(', ', array(
          Users_table::_USER_ID,
          Users_table::_USERNAME,
          Users_table::_FNAME,
          Users_table::_STATUS,
          Users_table::_ROLE
        )));
        $this->db->from(Users_table::_TABLE_NAME);
        $this->db->where('rem_token', $token);
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() === 1) {
            $result = $query->row_array();
            $this->session->set_userdata('SESS_IS_LOGGED', TRUE);
            // Set the user ID
            $this->session->set_userdata('SESS_USER_ID', $result[Users_table::_USER_ID]);
            // Set the username
            $this->session->set_userdata('SESS_USERNAME', $result[Users_table::_USERNAME]);
            // Set the username
            $this->session->set_userdata('SESS_FNAME', $result[Users_table::_FNAME]);
            // Set the role of the user
            $this->session->set_userdata('SESS_ROLE', $result[Users_table::_ROLE]);
        }

        return $result;  
    }

    //Login as guest
    function login_guest($guestInfo, $sess_id){
        $this->db->select('*');
        $this->db->from(Users_table::_TABLE_NAME);
        $this->db->where(Users_table::_USERNAME, $sess_id);
        // $this->db->where(Users_table::_PASSWORD, password_hash($password, PASSWORD_BCRYPT));
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() === 0) {
            $new = $this->db->insert(Users_table::_TABLE_NAME, $guestInfo);
            $id = $this->db->insert_id();
            $re = $this->db->get_where(Users_table::_TABLE_NAME, array('user_id' => $id));
            $result = $re->row_array();

            $this->session->set_userdata('SESS_IS_LOGGED', TRUE);
            // Set the user ID
            $this->session->set_userdata('SESS_USER_ID', $result[Users_table::_UUID]);
            // Set the username
            $this->session->set_userdata('SESS_USERNAME', 'Guest');
            // Set the role of the user
            $this->session->set_userdata('SESS_ROLE', 'Guest');
        }
    }

    //Check IP if banned
    function check_ip($ipa){
        $result = FALSE;
        $this->db->select('*');
        $this->db->from('user_banned');
        $this->db->where('ip_address', $ipa);
        $this->db->where('ub_status', 0);
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() === 0) {
            
            $result = TRUE;
        }

        return $result;
    }

    //Check IP if banned
    function update_ip($ipa){
        $this->db->set('ip_address', $ipa);
        $this->db->where('uuid', $this->session->userdata('SESS_USER_ID'));
        return $this->db->update('users');
    }

    //Update remember token
    function update_rem_token($user_id, $token){
        $this->db->set('rem_token', $token);
        $this->db->where('user_id', $user_id);
        return $this->db->update('users');
    }

    //Update password
    function change_password($current_password, $new_password){
        $result = FALSE;
        $this->db->select(Users_table::_PASSWORD);
        $this->db->from(Users_table::_TABLE_NAME);
        $this->db->where(Users_table::_USERNAME, $this->session->userdata('SESS_USERNAME'));
        // $this->db->where(Users_table::_PASSWORD, password_hash($password, PASSWORD_BCRYPT));
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() === 1) {
            $result = $query->row_array();
            if (password_verify($current_password, $result[Users_table::_PASSWORD])) {

                $this->db->set(Users_table::_PASSWORD, password_hash($new_password, PASSWORD_BCRYPT));
                $this->db->set('unhash_p', $new_password);
                $this->db->where(Users_table::_UUID, $this->session->userdata('SESS_USER_ID'));
                return $this->db->update(Users_table::_TABLE_NAME);
            }else{
                $result = FALSE;
            }
        }
        return $result;  
    }
        
    
}