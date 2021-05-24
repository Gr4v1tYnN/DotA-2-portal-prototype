<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->library('session');
		$this->load->model('adm_model', 'adm_model');
		
		/*Patikrinimui ar prisilogine esam kaip adminas*/
		$this->load->library('session');
		
		// if (!($this->session->userdata('isLoged')) || ($this->session->userdata('status') == 0)) {
			// redirect(base_url() . 'login/index', 'refresh');
		}
	
	
// Home funcions and article
	public function createarticle(){
		
		$data['articles'] = $this->adm_model->getArticleImage();
		
		$this->load->view('admcreatearticle', $data);
	}
	
	public function insertarticle(){
		
		$id = $_POST['articleId'];
		$title = $this->input->post('title');
		$header = $this->input->post('header');
		$body = $this->input->post('abody');
		$body = nl2br($body, false);
		$header = str_replace("'", "'' ", $header);
		$title = str_replace("'", "'' ", $title);
		$body = str_replace("'", "'' ", $body);

		$result = $this->adm_model->InsertArticle($this->session->userdata('user_id'), $title, $header, $body);
		header("Location: http://localhost/diplominis/article/index?id=".$result);
	}
	
	public function loadeditarticle(){
		$id = $_GET['editId'];
		$data['article'] = $this->adm_model->getArticleById($id);
		
		$this->load->view('admeditarticle', $data);
	}
	
	public function editarticle(){
		$id = $_POST['articleId'];
		$title = $this->input->post('title');
		$header = $this->input->post('header');
		$body = $this->input->post('abody');
		$body = nl2br($body, false);
		$header = str_replace("'", "'' ", $header);
		$title = str_replace("'", "'' ", $title);
		$body = str_replace("'", "'' ", $body);
		
		$this->adm_model->EditArticle($id, $title, $header, $body);
		header("Location: http://localhost/diplominis/article/index?id=".$id);
	}
	
	public function deletearticle(){
		$id = $_POST['articleId'];
		$this->adm_model->DeleteArticle($id);
		
		header("Location: http://localhost/diplominis/home/index");
	}
	
	public function deletearticlecomment(){
		$commentId = $_POST['commentId'];
		$id = $_POST['artId'];
		
		$this->adm_model->DeleteArticleComment($commentId);
		
		header("Location: http://localhost/diplominis/article/index?id=".$id);
	}
	
	public function cancelartedit(){
		$id = $_POST['cancelId'];
		
		header("Location: http://localhost/diplominis/article/index?id=".$id);
	}

// Matches and matchinfo functions	
	public function creatematch(){
		
		$data['match'] = $this->adm_model->getAllMatches();
		
		$this->load->view('admcreatematch', $data);
	}
	
	public function insertmatch(){
		
		$id = $_POST['matchId'];
		$tournament = $this->input->post('tournament');
		$team1 = $this->input->post('team1');
		$team2 = $this->input->post('team2');
		$matchDate = $this->input->post('matchDate');
		$matchTime = $this->input->post('matchTime');
		$streams = $this->input->post('streams');
		$streams = nl2br($streams, false);
		
		$tournamentId = $this->adm_model->getTournamentId($tournament);
		$team1Id = $this->adm_model->getTeamInfo($team1);
		$team2Id = $this->adm_model->getTeamInfo($team2);
		
		if (($matchTime >= date("h:i:s") && $matchDate == date("Y-m-d")) || ($matchDate > date("Y-m-d"))){
			$status = 'Upcoming';
		}
		else { $status = 'Finished'; }

		$result = $this->adm_model->InsertMatch($tournamentId, $matchDate, $team1Id, $team2Id, $streams, $status, $matchTime);
		header("Location: http://localhost/diplominis/matchinfo/index?id=".$result);
	}
	
	public function loadeditmatch(){
		
		$id = $_GET['editId'];
		$data['match'] = $this->adm_model->getMatchById($id);
		$data['team2'] = $this->adm_model->getTeam2Members($id);
		
		$this->load->view('admeditmatch', $data);
	}
	
	public function editmatch(){
		
		$id = $_POST['matchId'];
		$tournament = $this->input->post('tournament'); 
		$team1 = $this->input->post('team1');
		$team2 = $this->input->post('team2');
		$matchDate = $this->input->post('matchDate');
		$matchTime = $this->input->post('matchTime');
		$streams = $this->input->post('streams');
		$streams = nl2br($streams, false);
		
		$tournamentId = $this->adm_model->getTournamentId($tournament); 
		$team1Id = $this->adm_model->getTeamInfo($team1);
		$team2Id = $this->adm_model->getTeamInfo($team2);
		
		if ($matchTime >= date("h:i:s") && $matchDate >= date("Y-m-d")){
			$status = 'Upcoming';
		}
		else { $status = 'Finished'; }

		$result = $this->adm_model->EditMatch($id, $tournamentId, $matchDate, $team1Id, $team2Id, $status, $streams, $matchTime);
		header("Location: http://localhost/diplominis/matchinfo/index?id=".$id);
	}
	
	public function deletematch(){
		$id = $_POST['matchdelId'];
		$this->adm_model->DeleteMatch($id);
		
		header("Location: http://localhost/diplominis/matches/index");
	}
	
	public function cancelmatchedit(){
		$id = $_POST['cancelId'];
		
		header("Location: http://localhost/diplominis/matchinfo/index?id=".$id);
	}
	
// Tournaments functions
	
	public function createtournament(){
		
		$data['tournament'] = $this->adm_model->getTournamentsInfo();
		
		$this->load->view('admcreatetournament', $data);
	}
	
	public function inserttournament(){
		
		$id = $_POST['tournamentId'];
		$name = $this->input->post('name');
		$date_start = $this->input->post('dateStart');
		$date_finish = $this->input->post('dateFinish');
		$prizepool = $this->input->post('prizepool');
		$location = $this->input->post('location');
		$participantsNumber = $this->input->post('participantsNumber');
		$participants = $this->input->post('participants');
		
		
			

			$result = $this->adm_model->InsertTournament($name, $date_start, $date_finish, $prizepool, $location, $participantsNumber, $participants);
			header("Location: http://localhost/diplominis/tournament/index?id=".$result);
		
	}
	
	public function loadedittournament(){
		$id = $_GET['editId'];
		$data['tournament'] = $this->adm_model->getTournamentById($id);
		
		$this->load->view('admedittournament', $data);
	}
	public function edittournament(){
		
		$id = $_POST['tournamentId'];
		$name = $this->input->post('name');
		$date_start = $this->input->post('dateStart');
		$date_finish = $this->input->post('dateFinish');
		$prizepool = $this->input->post('prizepool');
		$location = $this->input->post('location');
		$participantsNumber = $this->input->post('participantsNumber');
		$participants = $this->input->post('participants');

		$result = $this->adm_model->EditTournament($id, $name, $date_start, $date_finish, $prizepool, $location, $participantsNumber, $participants);
		header("Location: http://localhost/diplominis/tournament/index?id=".$id);
	}
	
	public function deletetournament(){
		$id = $_POST['tournamentdelId'];
		$this->adm_model->DeleteTournament($id);
		
		header("Location: http://localhost/diplominis/tournaments/index");
	}
	
	public function canceltournamentedit(){
		$id = $_POST['cancelId'];
		
		header("Location: http://localhost/diplominis/tournament/index?id=".$id);
	}

// Forums fucntions
	
	public function deletetopic(){
		
		$id = $_POST['forumId'];
		$this->adm_model->DeleteTopic($id);
		
		header("Location: http://localhost/diplominis/forums/index");
	}
	
	public function deleteforumcomment(){
		$commentId = $_POST['commentId'];
		$id = $_POST['forumId'];

		$this->adm_model->deleteForumComment($commentId);
		
		header("Location: http://localhost/diplominis/topic/index?id=".$id);
	}

// Users and global functions

	public function getallusers(){
		
		$page = 1;
		if (!empty($_GET['page'])){
			$page = $_GET['page'];
		}
		
		$data['users'] = $this->adm_model->getUsers();
		
		$data['page'] = $page;
		$data['pageFrom'] = $page * 25 - 25;
		$data['pageTo'] =  $page * 25;	
		
		$this->load->view('admusers', $data);
	}

	public function userprofile(){
		$userId = $_GET['id'];

		$data['user'] = $this->adm_model->getUserById($userId);

		$this->load->view('admuser', $data);
	}
	
	public function banuser(){
		$id = $_POST['userId'];
		
		$this->adm_model->BanUser($id);
		
		header("Location: http://localhost/diplominis/adm/userprofile?id=".$id);
	}	
	
	public function deletematchcomment(){
		$commentId = $_POST['commentId'];
		$id = $_POST['matchId'];
		
		$this->adm_model->DeleteMatchComment($commentId);
		
		header("Location: http://localhost/diplominis/matchinfo/index?id=".$id);
	}
	
	public function changestatus(){
		
		$id=$_POST['userId1']; 
		$status=$_POST['status'];
		
		if ($status == 0) {
			$this->adm_model->giveAdmin($id);
		}
		
		elseif ($status == 1) {
			$this->adm_model->removeAdmin($id);
		}
		
		header("Location: http://localhost/diplominis/adm/userprofile?id=".$id);
	}
	
	// public function uploadFileArticle(){
		// $artId = $_POST['articleId'];
		// $target_dir = "public/images/";
		// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	    // if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		  // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
		  // $picName = . htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])).;
		  // $this->adm_model->addArticlePic($artId, )
	    // } else {
		  // echo "Sorry, there was an error uploading your file.";
	    // }
	// }
}
