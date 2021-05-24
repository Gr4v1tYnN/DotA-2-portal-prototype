<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('login_model', 'login_model');

	}

	public function index(){
		$name = $this->input->post('name');
		$pass = $this->input->post('password');
		
		$password = md5($pass);
		
		if (!empty ($name) && !empty($password)){
			$isLogedRes = $this->login_model->getUserById($name, $password);

			if (!empty ($isLogedRes)){
				$sessionData = array(
					'isLoged' => true,
					'name' => $name,
					'user_id' => $isLogedRes[0]['users_id'],
					'status' => $isLogedRes[0]['status']
				);
				$this->session->set_userdata($sessionData);

				header("Location: http://localhost/diplominis/home/index");	
			}	
		}
		
		$this->load->view('login');
	}
	
	function logout(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        header("Location: http://localhost/diplominis/home/index");
    }
	
	public function validate(){
		$login = $_POST['login'];
		$pass = $_POST['password'];
		
		$password = md5($pass);
		
		$isValid = $this->login_model->isValid($login, $password);
		if(!empty ($isValid)){
			echo 'ok';
		}else {
			echo 'Incorrect username or password';
		}
		
	} 
}

