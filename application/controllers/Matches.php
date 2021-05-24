<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matches extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->load->library('session');
		$this->load->model('matches_model', 'matches_model');

	}

	public function index()
	{
		$page = 1;
		if (!empty($_GET['page'])){
			$page = $_GET['page'];
		}
		$this->matches_model->updateStatus();
		$data['matches'] = $this->matches_model->getMatchInfo();
		$data['matchese'] = $this->matches_model->getMatchInfoEnd();
			
		
		$data['page'] = $page;
		$data['pageFrom'] = $page * 25 - 25;
		$data['pageTo'] =  $page * 25;	
		//var_dump($data);
		$this->load->view('matches', $data);
	}
}
