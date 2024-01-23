<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function getposts()
	{
		$query = $this->post_model->get_posts_api();
        echo json_encode($query);

	}

	public function insertposts()
	{	
		$title = $this->input->post('title');
		$slug = url_title($this->input->post('title'));
		$body = $this->input->post('body');
		
		$data = array(
			'title' => $title,
			'slug' => $slug,
			'body' => $body,
		);

		// $this->load->model('post_model');
		$query = $this->post_model->create_post($data);
		echo json_encode($query);
	
	}

	public function deleteposts()
	{	
		$id = $this->input->post('id');
		
		$query = $this->post_model->delete_post($id);
		echo json_encode($query);
	
	}
}



//
// ajax
// method: get/post
// url: controller/function
// async -> wait true/false

// setInvertal(3000)

