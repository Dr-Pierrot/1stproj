<?php
    class Chat_model extends CI_Model{
        public function __construct() {
            $this->load->database(); // this will open the database
        }

        public function get_chat($user, $mate){
            $chats = array('userId' => array($user,$mate), 'mateId' => array($user,$mate));
            $this->db->where_in('userId', $chats['userId']);
            $this->db->where_in('mateId', $chats['mateId']);
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