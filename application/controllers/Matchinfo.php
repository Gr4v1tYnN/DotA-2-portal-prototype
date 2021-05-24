<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MatchInfo extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->load->library('session');
		$this->load->model('matchinfo_model', 'matchinfo_model');

	}

	public function index()
	{ 	
		$id = $_GET['id'];
		$isFav = 0;
		
		$data['match'] = $this->matchinfo_model->getMatchesById($id);
		$data['team2'] = $this->matchinfo_model->getTeam2Members($id);
		$data['comments'] = $this->matchinfo_model->getCommentsById($id);
		$data['matches'] = $this->matchinfo_model->getTeamMatches();
		
		if ( $this->session->userdata('isLoged')) {
			$result = $this->matchinfo_model->CheckFavourite($this->session->userdata('user_id'));
			
			foreach($result as $row) {
				if (in_array($id, $row)){
					$isFav = 1; break;
				} else { $isFav = 0;}
			}
			$data['isFav'] = $isFav;
		}

		$this->load->view('matchinfo', $data);
	}
	
	public function post()
	{
		$matchId = $_POST['matchId'];
		$comment = $this->input->post('comment');
		
		header("Location: http://localhost/diplominis/matchinfo/index?id=".$matchId);
		
		$this->matchinfo_model->InsertMatchComment($this->session->userdata('user_id'), $comment, $matchId);
	}
	
	public function addfavouritematch(){
		$id = $_POST['favId'];
		
		header("Location: http://localhost/diplominis/matchinfo/index?id=".$id);
		
		$this->matchinfo_model->AddFavourite($this->session->userdata('user_id'), $id);
	}
	
	public function removefavouritematch(){
		$id = $_POST['removeId'];
		$this->matchinfo_model->RemoveFavourite($id, $this->session->userdata('user_id'));
		
		header("Location: http://localhost/diplominis/matchinfo/index?id=".$id);
	}
	
	public function deletecomment(){
		$commentId = $_POST['delcomId'];
		$id = $_POST['matchId'];

		$this->matchinfo_model->deleteComment($commentId);
		
		header("Location: http://localhost/diplominis/matchinfo/index?id=".$id);
	}
}
