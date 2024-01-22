<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function getposts()
	{
		$query = $this->post_model->get_posts_api();
        echo json_encode($query);

	}
}


//
// ajax
// method: get/post
// url: controller/function
// async -> wait true/false

// setInvertal(3000)