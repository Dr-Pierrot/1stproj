<?php
    class Post_model extends CI_Model{
        public function __construct() {
            $this->load->database(); // this will open the database
        }
        // data retreival
        public function get_posts($slug = FALSE){
            if($slug === FALSE){
                $query = $this->db->get('posts');
                return $query->result_array();
            }
            $query = $this->db->get_where('posts', array('slug' => $slug));
            return $query->row_array();
        }
        
        public function get_posts_api(){

            $query = $this->db->get('posts');
            return $query->result_array();
        }


        public function create_post($data){
            return $this->db->insert('posts', $data);
        }

        public function update_post(){
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body')
            );

            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('posts', $data);
        

        }

        public function delete_post($id){
            $this->db->where('id', $id);
            $this->db->delete('posts');
            return true;
        }
    }