<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms_model extends CI_Model {
    //Customer: 0 = active, 1 = hide, 2 = removed
    //Sell: 0 = active, 1 = removed, 2 = paid

    public function __construct() {
        // Call parent constructor
        parent::__construct();
        // Load the Cms_table_table class
        $this->load->library('cms_table');
    }

    public function add_customer($customer) {
        $this->db->insert('customers', $customer);
        return $this->db->insert_id();
    }

    // Add new customer from seller page
    public function add_new_customer($name) {
        $this->db->insert('customers', $name);
        return $this->db->insert_id();
    }

    public function add_sell($sell) {
        $this->db->insert('sell', $sell);
        return $this->db->insert_id();
    }

    public function edit_customer($customer_uuid, $customer_details) {
        $this->db->where('customer_uuid', $customer_uuid);
        return $this->db->update('customers', $customer_details);
    }

    // Get customer
    public function get_daily_sales($date) {
        $this->db->select('SUM(price) as price');
        $this->db->from('sell');
        $this->db->where('date_created', $date);
        $this->db->group_by('date_created');
        $query = $this->db->get();
        return $query->row_array();
    }

    // Get customer
    public function get_customer($uuid) {
        $this->db->select('*');
        $this->db->from('customers');
        $this->db->where('customer_uuid', $uuid);
        $query = $this->db->get();
        return $query->row_array();
    }

    // Get active customers
    public function get_active_customers() {
        $this->db->select('*');
        $this->db->from('customers');
        $this->db->where('status', 0);
        $query = $this->db->get();
        return $query->result_array();
    }

    // Get all customers
    public function get_all_customers() {
        $this->db->select('*');
        $this->db->select('DATE_FORMAT(date_created, "%M %d, %Y") AS date_created', FALSE);
        $this->db->from('customers');
        $this->db->where('status !=', 2);
        $query = $this->db->get();
        return $query->result_array();
    }

    // Get all miners today
    public function get_miners_today() {
        $this->db->select('s.*, c.name');
        $this->db->select('DATE_FORMAT(s.time_created, "%h:%i %p") AS time_created', FALSE);
        $this->db->from('sell s');
        $this->db->join('customers c', 's.customer_uuid = c.customer_uuid');
        $this->db->where('s.date_created', date('Y-m-d'));
        $this->db->where('s.status', 0);
        // $this->db->or_where('s.status', 2);
        $this->db->order_by('s.sell_id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_sales_date() {
        $this->db->select('s.*, c.name, SUM(s.price) as price, COUNT(s.sell_id) as count');
        $this->db->from('sell s');
        $this->db->join('customers c', 's.customer_uuid = c.customer_uuid');
        // $this->db->where('s.date_created', date('Y-m-d'));
        $this->db->where('s.status', 0);
        $this->db->or_where('s.status', 2);
        $this->db->group_by('s.customer_uuid');
        $this->db->group_by('s.date_created');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Get single sell details
    public function get_sell($sell_id) {
        $this->db->select('s.*, c.name');
        $this->db->from('sell s');
        $this->db->join('customers c', 's.customer_uuid = c.customer_uuid');
        $this->db->where('s.sell_id', $sell_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    // Get customer
    public function get_all_logs() {
        $this->db->select('*');
        $this->db->select('DATE_FORMAT(created_on, "%b %d, %Y - %h:%i %p") AS created_on', FALSE);
        $this->db->from('logs');
        $this->db->order_by('log_id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function view_customer_sales($customer_uuid) {
        $this->db->select('s.*, c.name');
        $this->db->select('DATE_FORMAT(s.date_created, "%b %d, %Y") AS date_created', FALSE);
        $this->db->select('DATE_FORMAT(s.time_created, "%h:%i %p") AS time_created', FALSE);
        $this->db->from('sell s');
        $this->db->join('customers c', 's.customer_uuid = c.customer_uuid');
        $this->db->where('s.customer_uuid ', $customer_uuid);
        $this->db->where('s.status !=', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function view_sales_customer($customer_uuid, $date_created) {
        $this->db->select('s.*, c.name');
        $this->db->select('DATE_FORMAT(s.date_created, "%b %d, %Y") AS date_created', FALSE);
        $this->db->from('sell s');
        $this->db->join('customers c', 's.customer_uuid = c.customer_uuid');
        $this->db->where('s.date_created', $date_created);
        $this->db->where('s.customer_uuid', $customer_uuid);
        $this->db->where('s.status !=', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function toggle_sales_paid($customer_uuid, $date_created) {
        $this->db->set('status', 2);
        $this->db->where('customer_uuid', $customer_uuid);
        $this->db->where('date_created', $date_created);
        return $this->db->update('sell');
    }

    public function override_paid($sell_id) {
        $this->db->set('status', 2);
        $this->db->where('sell_id', $sell_id);
        return $this->db->update('sell');
    }

    public function hide_customer($customer_uuid) {
        $this->db->set('status', 1);
        $this->db->where('customer_uuid', $customer_uuid);
        return $this->db->update('customers');
    }

    public function unhide_customer($customer_uuid) {
        $this->db->set('status', 0);
        $this->db->where('customer_uuid', $customer_uuid);
        return $this->db->update('customers');
    }

    public function remove_customer($customer_uuid) {
        $this->db->set('status', 2);
        $this->db->where('customer_uuid', $customer_uuid);
        return $this->db->update('customers');
    }

    public function remove_sell($sell_id) {
        $this->db->set('status', 1);
        $this->db->where('sell_id', $sell_id);
        return $this->db->update('sell');
    }

}