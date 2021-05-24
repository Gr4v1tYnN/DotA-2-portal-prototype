<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->library('session');
		$this->load->model('article_model', 'article_model');

	}

	public function index(){
		$id = $_GET['id'];
		$isFav = 0;
		
		$data['articles'] = $this->article_model->getArticleById($id);
		
		if ( $this->session->userdata('isLoged')) {
			$result = $this->article_model->CheckFavourite($this->session->userdata('user_id'));
			
			foreach($result as $row) {
				if (in_array($id, $row)){
					$isFav = 1; break;
				} else { $isFav = 0;}
			}
			
			
			$data['isFav'] = $isFav;
		}
		
		$this->load->view('article', $data);
	}
	
	public function post(){
		$articleId = $_POST['articleId'];
		$comment = $this->input->post('comment');
		
		header("Location: http://localhost/diplominis/article/index?id=".$articleId);
		
		$this->article_model->InsertArticleComment($this->session->userdata('user_id'), $comment, $articleId);
	}
	
	public function addfavouritearticle(){
		$id = $_POST['favId'];
		
		header("Location: http://localhost/diplominis/article/index?id=".$id);
		
		$this->article_model->AddFavourite($this->session->userdata('user_id'), $id);
	}
	
	public function removefavouritearticle(){
		$id = $_POST['removeId'];
		$this->article_model->RemoveFavourite($id, $this->session->userdata('user_id'));
		
		header("Location: http://localhost/diplominis/article/index?id=".$id);
	}
	
	public function deletecomment(){
		$commentId = $_POST['delcomId'];
		$id = $_POST['artId'];
		
		$this->article_model->deleteComment($commentId);
		
		header("Location: http://localhost/diplominis/article/index?id=".$id);
	}
}

