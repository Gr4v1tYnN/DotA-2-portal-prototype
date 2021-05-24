<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tournament_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function getTournamentById($id){
        $result = $this->db->query("
            SELECT *
            FROM  tournamentinfo
			left join image i on tournamentinfo.image_id = i.image_id
            WHERE tournamentinfo_id = {$id}
        ");

        $result = $result->result_array();
        return $result;
    }
	
	public function getMatchesUp(){
        $result = $this->db->query("
            SELECT 
			t.team_name as t1name
			,t2.team_name as t2name
			,i.link as team1_image
			,i2.link as team2_image
			,tournament_id
            FROM  matchinfo m
			left join team t on m.team1_id = t.team_id
			left join image i on t.image_id = i.image_id
			left join team t2 on m.team2_id = t2.team_id
			left join image i2 on t2.image_id = i2.image_id
            WHERE match_status = 'Upcoming'
			ORDER BY match_date ASC, match_time ASC
        ");

        $result = $result->result_array();
        return $result;
    }
	
	public function getMatchesPo(){
        $result = $this->db->query("
            SELECT 
			t.team_name as t1name
			,t2.team_name as t2name
			,i.link as team1_image
			,i2.link as team2_image
			,scoret1
			,scoret2
			,tournament_id
            FROM  matchinfo m
			left join team t on m.team1_id = t.team_id
			left join image i on t.image_id = i.image_id
			left join team t2 on m.team2_id = t2.team_id
			left join image i2 on t2.image_id = i2.image_id
			WHERE match_status = 'Finished'
			ORDER BY match_date DESC, match_time DESC  
        ");

        $result = $result->result_array();
        return $result;
    }
	
	public function AddFavourite($ft_user_id, $ft_tournament_id){
		$result = $this->db->query("
            INSERT INTO favourite_tournament 
				(ft_user_id, ft_tournament_id) 
				VALUES ({$ft_user_id}, {$ft_tournament_id})
        ");
	}
	
	public function RemoveFavourite($id, $user_id){
		$result = $this->db->query("
			DELETE FROM favourite_tournament
			WHERE ft_tournament_id = {$id}
			AND ft_user_id = {$user_id}
		");
	}
	
	public function CheckFavourite($ft_user_id) {
		$result = $this->db->query("
            SELECT ft_tournament_id
			FROM favourite_tournament 
			WHERE ft_user_id = {$ft_user_id}
        ");
		
		$result = $result->result_array();
        return $result;
	}
}