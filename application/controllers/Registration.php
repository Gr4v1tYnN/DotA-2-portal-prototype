<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('registration_model', 'registration_model');

	}
	
	public function index(){
		$errMess='';
		$name = '';
		$email = '';
		$pass = '';
		
		$data['errm'] = $errMess;
		$data['name'] = $name;
		$data['email'] = $email;
		$data['pass'] = $pass;
		$this->load->view('registration', $data);
	}

	public function indexx(){
		$name = $this->input->post('name');
		$pass = $this->input->post('password');
		$email = $this->input->post('email');
		
		$isValid = $this->registration_model->isValid($name);
		$isValid1 = $this->registration_model->isValid1($email);
		
		$resn = 0;
		$rese = 0;
		
		if(empty ($isValid)){
			$resn = 1;
		}
		
		if(empty ($isValid1)){
			$rese = 1;
		}
		
		if ($resn == 1 && $rese == 1) {
		
		$password = md5($pass);
		
			if (!empty ($name) && !empty($password) && !empty($email)){
				$this->registration_model->InsertUser($name, $password, $email);
				$isLogedRes = $this->registration_model->GetUserById($name, $password);
				
				if (!empty ($isLogedRes)){
					$sessionData = array(
						'isLoged' => true,
						'name' => $name,
						'user_id' => $isLogedRes[0]['users_id']
					);
					$this->session->set_userdata($sessionData);
					
					header("Location: http://localhost/diplominis/home/index");
				}
			}
		} else if ($resn == 0 && $rese == 0) {
			$errMess = 'Username and email is already taken';
			
			$data['errm'] = $errMess;
			$data['name'] = $name;
			$data['email'] = $email;
			$data['pass'] = $pass;
			
			$this->load->view('registration', $data);
		} else if ($resn == 0 && $rese == 1) {
			$errMess = 'Username is already taken';
			
			$data['errm'] = $errMess;
			$data['name'] = $name;
			$data['email'] = $email;
			$data['pass'] = $pass;
			
			$this->load->view('registration', $data);
		} else if ($resn == 1 && $rese == 0) {
			$errMess = 'Email is already taken';
			
			$data['errm'] = $errMess;
			$data['name'] = $name;
			$data['email'] = $email;
			$data['pass'] = $pass;
			
			$this->load->view('registration', $data);
		}
	}
	
	public function validate(){
		$name = $_POST['name'];
		$email = $_POST['email'];
		
		$isValid = $this->registration_model->isValid($name);
		$isValid1 = $this->registration_model->isValid1($email);

		$res = 'ok';
		if(!isset ($isValid)){
			$res = 'Username is taken';
		}
		
		if(!isset ($isValid1)){
			$res = 'Email is taken';
		}
		
		echo $res;
		
	} 
}

