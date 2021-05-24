<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile_model extends CI_Model{
    public function __construct(){

        $this->load->database();
    }

    public function getUserById($id){
        $result = $this->db->query("
            SELECT *
            FROM  users
            WHERE users.users_id = {$id}
        ");

        $result = $result->result_array();
        return $result;
    }
	
	public function ChangePassword($users_id, $password){
        $result = $this->db->query("
            UPDATE users
				SET
					password = '{$password}'
				where
					users_id = {$users_id}
        ");
    }
	
	public function ChangeEmail($users_id, $email){
        $result = $this->db->query("
            UPDATE users
				SET
					email = '{$email}'
				where
					users_id = {$users_id}
        ");
    }
	
	public function isValid($password){
        $result = $this->db->query("
            select *
            from  users
			where password = '{$password}'
        ");

        $result = $result->result_array();
        return $result;
    }
}