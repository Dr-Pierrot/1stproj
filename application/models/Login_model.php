<?php
    class Login_model extends CI_Model{
        public function __construct() {
            $this->load->database(); // this will open the database
        }
        // data retreival
        public function get_users($username = FALSE){
            if($username === FALSE){
                $query = $this->db->get('users');
                return $query->result_array();
            }
            $query = $this->db->get_where('users', array('username' => $username));
            return $query->row_array();
        }
        
        public function login($username, $password){
            $query = $this->db->get_where('users', array('username'=>$username, 'password' => $password));
            return $query->row_array();
        }

        public function statusOnline($id){
            $data = array(
                'status' => 1,
                'login_at' => date("Y-m-d H:i:s"),
            );
            $this->db->where('id', $id);
            return $this->db->update('users', $data);
        }

        public function statusOffline($id){
            $data = array(
                'status' => 0,
                'logout_at' => date("Y-m-d H:i:s"),
            );
            $this->db->where('id', $id);
            return $this->db->update('users', $data);
        }
        
    }