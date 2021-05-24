<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->load->library('session');
		$this->load->model('user_model', 'user_model');
	}

	 public function index(){
		
		 $data['user'] = $this->user_model->getUserById($this->session->userdata('user_id'));
		 $data['news'] = $this->user_model->getFavouriteArticles($this->session->userdata('user_id'));
		 $data['matches'] = $this->user_model->getFavouriteMatches($this->session->userdata('user_id'));
		 $data['tournaments'] = $this->user_model->getFavouriteTournaments($this->session->userdata('user_id'));
		 $data['forums'] = $this->user_model->getFavouriteForums($this->session->userdata('user_id'));

		 $this->load->view('user', $data);
	 }
}