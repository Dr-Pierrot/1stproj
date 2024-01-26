<?php
    class Chat_model extends CI_Model{
        public function __construct() {
            $this->load->database(); // this will open the database
        }

        public function get_chat(){
            $chats = array('userId' => 1 , 'userId' => 6);
            $this->db->where($chats);
            $query = $this->db->get('chats');
            return $query->result_array();
        }

        public function get_user(){
            $query = $this->db->get('users');
            return $query->result_array();
        }
        

        public function insert_chat($data){
            return $this->db->insert('chats', $data);
        }
    }

?>