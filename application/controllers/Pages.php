<?php
    class Pages extends CI_Controller{
        public function view($page = 'home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){ //displays the pages
                show_404();
            }

            $data['title'] = ucfirst($page);
            $data['users'] = $this->student_model->get_students();
 
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');  

        }


    }