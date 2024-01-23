<?php
    class Login extends CI_Controller{
        public function index(){


            if($this->session->userdata('user')){
                redirect("home");
            }else{
                $this->load->view('pages/login');    // this will load the login page
            }
            
        }
        
        // public function process(){
        //     // declaring variables
        //     $user = $this->input->post('user');
        //     $pass = $this->input->post('pass');
        //     $data['title'] = 'Home';

        //     $data2['username'] = $this->login_model->get_password($user);
            
        //     if($pass==$data2){ // setting up the validation of the credentials
        //         $this->session->set_userdata(array('user'=>$user)); // declaring the session
        //         $this->load->view('templates/header');
        //         $this->load->view('pages/home', $data);  // display the home page
        //         $this->load->view('templates/footer');
        //     }else{
        //         $data['error'] = 'Your Account is Invalid!'; // credential error
        //         $this->load->view('pages/login', $data);  // load the login page agian
        //     }
        // }

        public function login1(){
            //declaring the variables
            $username = $_POST['username'];
            $password = $_POST['password'];

            $data = $this->login_model->login($username, $password); //checker for username and password

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
            $this->session->unset_userdata('user');  // kill session
            redirect("");  
        } 
        
        
        
    }