<?php
class Employee_model extends CI_Model {

    // Insert employee data
    public function insert_employee($data) {
        $this->db->insert('employee', $data);
        return $this->db->insert_id();  // Return the last inserted employee ID
    }

    // Insert address data
    public function insert_address($data) {
        $this->db->insert('address', $data);
    }

    // Fetch employees for pagination and search
    public function fetch_employees($limit, $start, $search_query = null) {
        $this->db->limit($limit, $start);
        if ($search_query) {
            $this->db->like('fname', $search_query);
            $this->db->or_like('lname', $search_query);
            $this->db->or_like('gender', $search_query);
            $this->db->or_like('mobile_no', $search_query);
        }
        $query = $this->db->get('employee');
        return $query->result();
    }

    // Count total records for pagination
    public function record_count($search_query = null) {
        if ($search_query) {
            $this->db->like('fname', $search_query);
            $this->db->or_like('lname', $search_query);
            $this->db->or_like('gender', $search_query);
            $this->db->or_like('mobile_no', $search_query);
        }
        return $this->db->count_all_results('employee');
    }
}
