<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tournaments_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function getTournamentsById($id){
        $result = $this->db->query("
            SELECT * 
            FROM  tournamentinfo
            WHERE tournamentinfo_id = {$id}
        ");

        $result = $result->result_array();
        return $result;
    }
	
	public function getTournamentsInfo(){
		$result = $this->db->query("
			SELECT * 
            FROM  tournamentinfo
			left join image i on tournamentinfo.image_id = i.image_id
		");

        $result = $result->result_array();
        return $result;
    }
	
	public function updateStatus1(){
		$result = $this->db->query("
		UPDATE tournamentinfo
				SET
					tournament_status = 'Finished'
				WHERE
					date_finish < CURRENT_DATE
		");
	}
	
	public function updateStatus2(){
		$result = $this->db->query("
		UPDATE tournamentinfo
				SET
					tournament_status = 'Ongoing'
				WHERE
					date_start = CURRENT_DATE
				OR
					date_start < CURRENT_DATE AND date_finish >= CURRENT_DATE
		");
	}
}