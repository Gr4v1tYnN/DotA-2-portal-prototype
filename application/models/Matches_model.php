<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Matches_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function getMatchesById($id){
        $result = $this->db->query("
            SELECT * 
            FROM  matchinfo
            WHERE matchinfo_id = {$id}
        ");

        $result = $result->result_array();
        return $result;
    }
	
	public function getMatchInfo(){
		$result = $this->db->query("
			SELECT 
				i.link as team1_image 
				,j.link as team2_image 
				,a.team_name as team1_name
				,b.team_name as team2_name
				,scoret1
				,scoret2
				,match_status
				,match_date
				,match_time
				,tournament_name
				,matchinfo_id
			FROM matchinfo
			left join team a on matchinfo.team1_id = a.team_id
            left join image i on a.image_id = i.image_id
			left join tournamentinfo on matchinfo.tournament_id = tournamentinfo.tournamentinfo_id
            left join team b on matchinfo.team2_id = b.team_id
            left join image j on b.image_id = j.image_id
			ORDER BY match_date ASC, match_time DESC
		");

        $result = $result->result_array();
        return $result;
    }
	
	public function getMatchInfoEnd(){
		$result = $this->db->query("
			SELECT 
				i.link as team1_image 
				,j.link as team2_image 
				,a.team_name as team1_name
				,b.team_name as team2_name
				,scoret1
				,scoret2
				,match_status
				,match_date
				,match_time
				,tournament_name
				,matchinfo_id
			FROM matchinfo
			left join team a on matchinfo.team1_id = a.team_id
            left join image i on a.image_id = i.image_id
			left join tournamentinfo on matchinfo.tournament_id = tournamentinfo.tournamentinfo_id
            left join team b on matchinfo.team2_id = b.team_id
            left join image j on b.image_id = j.image_id
			ORDER BY match_date DESC, match_time ASC
		");

        $result = $result->result_array();
        return $result;
    }
	
	public function updateStatus(){
		$result = $this->db->query("
		UPDATE matchinfo
				SET
					match_status = 'Finished'
				WHERE
					match_date < CURRENT_DATE 
                OR
                	match_date = CURRENT_DATE AND match_time < CURRENT_TIME
		");
	}
}