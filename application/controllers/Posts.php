<?php
    class Posts extends CI_Controller{
        public function index(){
            $data['title'] = 'Latest Posts'; // title at the top of the blogs

            $data['posts'] = $this->post_model->get_posts(); // retrieve data from model

            $this->load->view('templates/header'); 
            $this->load->view('posts/index', $data); // load the blogs page and then send the data
            $this->load->view('templates/footer');  

        }
        // this function will display the post when clicked read more
        public function view($slug = NULL){
            $data['post'] = $this->post_model->get_posts($slug);

            if(empty($data['post'])){
                show_404();
            }

            $data['title'] = $data['post']['title'];

            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');  
        }

        public function create(){
            $data['title'] = 'Create Post';

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');


            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            }else{
                $this->post_model->create_post();
                redirect('posts');
            }
        }

        public function edit($slug){
            $data['post'] = $this->post_model->get_posts($slug);

            if(empty($data['post'])){
                show_404();
            }

            $data['title'] = 'Edit Post';

            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');

            
        }

        public function update(){
            $this->post_model->update_post();
            redirect('posts');
        }

        public function delete($id){
            $this->post_model->delete_post($id);
            redirect('posts');  
        }
    }