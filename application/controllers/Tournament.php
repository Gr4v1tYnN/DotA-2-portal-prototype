<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tournament extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->load->library('session');
		$this->load->model('tournament_model', 'tournament_model');

	}

	public function index()
	{
		$id = $_GET['id'];
		$isFav = 0;
		
		$data['tournament'] = $this->tournament_model->getTournamentById($id);
		$data['upcoming'] = $this->tournament_model->getMatchesUp();
		$data['post'] = $this->tournament_model->getMatchesPo();
		
		if ( $this->session->userdata('isLoged')) {
			$result = $this->tournament_model->CheckFavourite($this->session->userdata('user_id'));
			
			foreach($result as $row) {
				if (in_array($id, $row)){
					$isFav = 1; break;
				} else { $isFav = 0;}
			}
			$data['isFav'] = $isFav;
		}
		
		$this->load->view('tournament', $data);
	}
	
	public function addfavouritetournament(){
		$id = $_POST['favId'];
		
		header("Location: http://localhost/diplominis/tournament/index?id=".$id);
		
		$this->tournament_model->AddFavourite($this->session->userdata('user_id'), $id);
	}
	
	public function removefavouritetournament(){
		$id = $_POST['removeId'];
		$this->tournament_model->RemoveFavourite($id, $this->session->userdata('user_id'));
		
		header("Location: http://localhost/diplominis/tournament/index?id=".$id);
	}
}
