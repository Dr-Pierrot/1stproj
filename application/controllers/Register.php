<?php
    class Register extends CI_Controller{
        public function index(){
            //Form Validation
            $this->form_validation->set_rules('fullname','name','required');
            $this->form_validation->set_rules('emailid','email','required|valid_email|is_unique[users.Email]');
            $this->form_validation->set_rules('username','username','required');
            $this->form_validation->set_rules('password','password','required|min_length[6]');
            $this->form_validation->set_rules('confirmpassword','Confirm Password','required|min_length[6]|matches[password]');
            $this->form_validation->set_message('is_unique', 'This email is already exists.');
            if($this->form_validation->run()){
                //Getting Post Values
                $fname=$this->input->post('fullname');
                $emailid=$this->input->post('emailid');
                $uname=$this->input->post('username');
                $password=$this->input->post('password');
                $this->load->model('Register_model');
                $this->Register_model->index($fname,$emailid,$uname,$password);
            }
            else{
                $data['title'] = 'Registration';
                $this->load->view('log/register', $data);    // this will load the registration page
            }
        }
    }