<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function getUserById($name, $password){
        $result = $this->db->query("
            select *
            from  users
			where name = '{$name}'
			AND password = '{$password}'
        ");

        $result = $result->result_array();
        return $result;
    }
	
	public function isValid($login, $password){
        $result = $this->db->query("
            select *
            from  users
			where name = '{$login}'
			AND password = '{$password}'
        ");

        $result = $result->result_array();
        return $result;
    }
}