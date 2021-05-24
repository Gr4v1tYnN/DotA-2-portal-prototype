<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forums extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->load->library('session');
		$this->load->model('forums_model', 'forums_model');

	}

	public function index()
	{
		$page = 1;
		if (!empty($_GET['page'])){
			$page = $_GET['page'];
		}
		
		$data['forums'] = $this->forums_model->getForumInfo();
		
		$data['page'] = $page;
		$data['pageFrom'] = $page * 40 - 40;
		$data['pageTo'] =  $page * 40;	
		//var_dump($data);
		$this->load->view('forums', $data);
	}
	
	public function post()
	{
		$topicId = $_POST['topicId'];
		$description = $this->input->post('description');
		$topic = $this->input->post('topic');
		$description = nl2br($description, false);
		$description = str_replace("'", "'' ", $description);
		$topic = str_replace("'", "'' ", $topic);
		
		$result = $this->forums_model->InsertTopic($this->session->userdata('user_id'), $topic, $description);
		header("Location: http://localhost/diplominis/topic/index?id=".$result);
	}
}
