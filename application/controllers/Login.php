<?php
    class Login extends CI_Controller{
        public function index(){


            if($this->session->userdata('user')){
                redirect("home");
            }else{
                $this->load->view('pages/login');    // this will load the login page
            }
            
        }

        public function login1(){
            //declaring the variables
            $username = $_POST['username'];
            $password = $_POST['password'];

            $data = $this->login_model->login($username, $password); //checker for username and password
            $this->login_model->statusOnline($username, $password);

            if($data){
                $this->session->set_userdata('user', $data);
                redirect('home');
            }else{
                $data['error'] = 'Your Account is Invalid!'; //credentials error
                $this->session->set_flashdata('error','Invalid login. Email or Password is incorrect.');
                $this->load->view('pages/login', $data);
            }
        }

        public function logout()  // log out function
        {
            //declaring the variables
            $username = $_SESSION['user']['username'];
            $password = $_SESSION['user']['password'];
            $this->session->unset_userdata('user');  // kill session
            $this->login_model->statusOffline($username, $password);
            redirect("");  
        } 
        
        
        
    }