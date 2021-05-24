<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->load->library('session');
		$this->load->model('topic_model', 'topic_model');

	}

	public function index()
	{	
		$id = $_GET['id'];
		$page = 1;
		$isFav = 0;
		if (!empty($_GET['page'])){
			$page = $_GET['page'];
		}
		
		
		$data['topic'] = $this->topic_model->getTopicById($id);
		$data['author'] = $this->topic_model->getTopicAuthor($id);
		$data['page'] = $page;
		$data['pageFrom'] = $page * 12 - 12;
		$data['pageTo'] =  $page * 12;
		
		if ( $this->session->userdata('isLoged')) {
			$result = $this->topic_model->CheckFavourite($this->session->userdata('user_id'));
			
			foreach($result as $row) {
				if (in_array($id, $row)){
					$isFav = 1; break;
				} else { $isFav = 0;}
			}
			$data['isFav'] = $isFav;
		}
		
		$this->load->view('topic', $data);
	}
	
	public function post()
	{
		$topicId = $_POST['topicId'];
		$comment = $this->input->post('comment');
		
		header("Location: http://localhost/diplominis/topic/index?id=".$topicId);
		
		$this->topic_model->InsertTopicComment($this->session->userdata('user_id'), $comment, $topicId);
	}
	
	public function addfavouritetopic(){
		$id = $_POST['favId'];
		
		header("Location: http://localhost/diplominis/topic/index?id=".$id);
		
		$this->topic_model->AddFavourite($this->session->userdata('user_id'), $id);
	}
	
	public function removefavouritetopic(){
		$id = $_POST['removeId'];
		$this->topic_model->RemoveFavourite($id, $this->session->userdata('user_id'));
		
		header("Location: http://localhost/diplominis/topic/index?id=".$id);
	}
	
	public function deletecomment(){
		$commentId = $_POST['delcomId'];
		$id = $_POST['forumId'];

		$this->topic_model->deleteComment($commentId);
		
		header("Location: http://localhost/diplominis/topic/index?id=".$id);
	}
	
	public function deletemytopic(){
		$topicId = $_POST['forumsId'];
		var_dump($_POST);

		$this->topic_model->deleteMyTopic($topicId);
		
		header("Location: http://localhost/diplominis/forums/index");
	}
}