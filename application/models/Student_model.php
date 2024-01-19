<?php
    class Student_model extends CI_Model{
        public function __construct() {
            $this->load->database(); // this will open the database
        }
        // data retreival
        public function get_students(){
            $this->db->join('students', 'students.user_id = users.id');
            $query = $this->db->get('users');
            return $query->result_array();
        }
    }