<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->load->library('session');
		$this->load->model('home_model', 'home_model');
		
		/*Patikrinimui ar prisilogine esam*/
		//$this->load->library('session');
		
//		if (!($this->session->userdata('isLoged'))) {
		//	redirect(base_url() . 'login/index', 'refresh');
	//	}
		/*-------------------------------------*/

	}
	
	public function index(){
		
		$page = 1;
		if (!empty($_GET['page'])){
			$page = $_GET['page'];
		}
		
		$data['articles'] = $this->home_model->getArticleImage();
			
		$data['page'] = $page;
		$data['pageFrom'] = $page * 10 - 10;
		$data['pageTo'] =  $page * 10;	
		
		$this->load->view('home', $data);
	}
	
}

