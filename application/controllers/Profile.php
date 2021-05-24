<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->load->library('session');
		$this->load->model('profile_model', 'profile_model');

	}

	public function changee(){
		
		$errMess = '';
		$email = '';
		$pass = '';
		$index = 1;
		
		 $data['email'] = $email;
		 $data['index'] = $index;
		 $data['errm'] = $errMess;
		 $data['pass'] = $pass;

		 $this->load->view('profile', $data);
	}
	
	public function changee1(){
		
		$email = $this->input->post('email');
		$pass = $this->input->post('password');
		$index = 1;
		
		$password = md5($pass);
		
		$isValid = $this->profile_model->isValid($password);
		
		$res = 0;
		
		if(!empty ($isValid)){
			$res = 1;
		}
		
		if($res == 1){
			$this->profile_model->ChangeEmail($this->session->userdata('user_id'), $email);
			
			header("Location: http://localhost/diplominis/user/index");
		} else if ($res == 0){
			$errMess = 'Password is incorrect';
			
			$data['email'] = $email;
			 $data['index'] = $index;
			 $data['errm'] = $errMess;
			 $data['pass'] = $pass;
			 
			 $this->load->view('profile', $data);
		}
		
	}
	 
	public function changep() {
		
		$errMess = '';
		$pass = '';
		$newpass = '';
		$cnewpass = '';
		$index = 2;

		 $data['index'] = $index;
		 $data['errm'] = $errMess;
		 $data['pass'] = $pass;
		 $data['newpass'] = $newpass;
		 $data['cnewpass'] = $cnewpass;

		 $this->load->view('profile', $data);
	}
	
	public function changep1(){
		
		$pass = $this->input->post('password');
		$newpass = $this->input->post('newpassword');
		$cnewpass = $this->input->post('cnewpassword');
		$index = 2;
		
		$password = md5($pass);
		
		$conf = 0;
		
		$isValid = $this->profile_model->isValid($password);
		if ($newpass == $cnewpass){
			$conf = 1;
		}
		
		$res = 0;
		
		if(!empty ($isValid)){
			$res = 1;
		}
		
		if($res == 1 && $conf == 1){
			$newpassword = md5($newpass);
			$this->profile_model->ChangePassword($this->session->userdata('user_id'), $newpassword);
			
			header("Location: http://localhost/diplominis/user/index");
		} else if ($res == 0){
			$errMess = 'Password is incorrect';
			
			 $data['index'] = $index;
			 $data['errm'] = $errMess;
			 $data['pass'] = $pass;
			 $data['newpass'] = $newpass;
			 $data['cnewpass'] = $cnewpass;
			 
			 $this->load->view('profile', $data);
		} else if ($conf == 0){
			$errMess = 'Passwords do not match';
			
			 $data['index'] = $index;
			 $data['errm'] = $errMess;
			 $data['pass'] = $pass;
			 $data['newpass'] = $newpass;
			 $data['cnewpass'] = $cnewpass;
			 
			 $this->load->view('profile', $data);
		}
		
	}
	
	public function poste()
	{
		$email = $_POST['email'];
		
		header("Location: http://localhost/diplominis/user/index");
		
		$this->profile_model->ChangeEmail($this->session->userdata('user_id'), $email);
	}
	
	public function postp()
	{ 
		$pass = $_POST['newpassword'];
		
		$password = md5($pass);
		
		header("Location: http://localhost/diplominis/user/index");
		
		$this->profile_model->ChangePassword($this->session->userdata('user_id'), $password);
	}
	
	public function validatep(){
		$pass = $_POST['password'];
	
		$password = md5($pass);
		
		$isValid = $this->profile_model->isValid($password);
		if(!empty ($isValid)){
			echo 'ok';
		}else {
			echo 'Password is incorrect';
		}
		
	} 
}

