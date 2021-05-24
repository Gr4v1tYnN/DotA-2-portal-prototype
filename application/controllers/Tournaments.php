<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tournaments extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->load->library('session');
		$this->load->model('tournaments_model', 'tournaments_model');

	}

	public function index()
	{
		$page = 1;
		if (!empty($_GET['page'])){
			$page = $_GET['page'];
		}
		$this->tournaments_model->updateStatus1();
		$this->tournaments_model->updateStatus2();
		
		$data['tournaments'] = $this->tournaments_model->getTournamentsInfo();
		$data['page'] = $page;
		$data['pageFrom'] = $page * 15 - 15;
		$data['pageTo'] =  $page * 15;	
		//var_dump($data);
		$this->load->view('tournaments', $data);
	}
}
