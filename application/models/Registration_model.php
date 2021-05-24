<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Registration_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function InsertUser($name, $password, $email){
        $result = $this->db->query("
            INSERT INTO users 
				(name, password, email) 
				VALUES ('{$name}', '{$password}', '{$email}')
        ");
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
	
	public function isValid($login){
        $result = $this->db->query("
            select *
            from  users
			where name = '{$login}'
        ");

        $result = $result->result_array();
        return $result;
    }
	
	public function isValid1( $email){
        $result = $this->db->query("
            select *
            from  users
			where email = '{$email}'
        ");

        $result = $result->result_array();
        return $result;
    }
}