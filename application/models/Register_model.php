<?php
class Register_model extends CI_Model{
    public function index($fname,$emailid,$uname,$password){
        $data=array(
        'name'=>$fname,
        'email'=>$emailid,
        'username'=>$uname,
        'password'=>$password);
        $query=$this->db->insert('users',$data);
        $data2 = array(
            'studentID' => ($query+2),
            'user_id' => $query,
            'enrol_stat' => 1);
        $query2 = $this->db->insert('students', $data2);
        if($query){
            $this->session->set_flashdata('success','Registration successfull, Now you can login.');	
            redirect('register');
        } else {
            $this->session->set_flashdata('error','Something went wrong. Please try again.');	
            redirect('register');	
        }
    }
}