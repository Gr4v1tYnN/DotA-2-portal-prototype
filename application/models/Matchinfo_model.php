<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Matchinfo_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function getMatchesById($id){
        $result = $this->db->query("
            SELECT 
				matchinfo.matchinfo_id
				,i.link as team1_image  
				,a.team_name as team1_name
				,team1_id
				,scoret1
				,scoret2
				,winner_id
				,match_type
				,match_status
				,match_date
				,match_time
				,tournament_name
				,streams
				,p.nickname as nickname
				,pi.link as player_image
			FROM matchinfo 
			left join team a on matchinfo.team1_id = a.team_id
            left join image i on a.image_id = i.image_id
			left join player p on a.team_id = p.team_id
			left join image pi on p.image_id = pi.image_id
			left join tournamentinfo on matchinfo.tournament_id = tournamentinfo.tournamentinfo_id
            WHERE matchinfo_id = {$id}
        ");

        $result = $result->result_array();
        return $result;
    }
	
	public function getTeam2Members($id) {
		$result = $this->db->query("
            SELECT
			j.link as team2_image
			,team2_id
			,b.team_name as team2_name
			,r.nickname as nickname2
			,ri.link as player_image2
			FROM matchinfo 
			left join team b on matchinfo.team2_id = b.team_id
            left join image j on b.image_id = j.image_id
			left join player r on b.team_id = r.team_id
			left join image ri on r.image_id = ri.image_id
            WHERE matchinfo_id = {$id}
        ");
		
		$result = $result->result_array();
        return $result;
	}
	
	public function getTeamMatches(){
		$result = $this->db->query("
			SELECT 
			t1.team_id as team1_id
			,t2.team_id as team2_id
			,t1.team_name as t1name
			,t2.team_name as t2name
			,scoret1
			,scoret2
			,match_date
			,match_time
			,match_status
			FROM matchinfo
			join team t1 on matchinfo.team1_id = t1.team_id
			join team t2 on matchinfo.team2_id = t2.team_id
			WHERE match_status = 'Finished'
			ORDER BY match_date DESC, match_time DESC
		");
		
		$result = $result->result_array();
        return $result;
	}
	
	public function getCommentsById($id){
        $result = $this->db->query("
            SELECT *
			FROM matchinfo 
			left join match_comments mc on matchinfo.matchinfo_id = mc.match_id
			left join users on mc.mc_author_id = users.users_id
            WHERE matchinfo_id = {$id}
        ");
		
		$result = $result->result_array();
        return $result;
	}
	
	public function InsertMatchComment($mc_author_id, $match_comment, $match_id){
        $result = $this->db->query("
            INSERT INTO match_comments 
				(mc_author_id, match_comment, match_id) 
				VALUES ({$mc_author_id}, '{$match_comment}', {$match_id})
        ");
    }
	
	public function AddFavourite($fm_user_id, $fm_match_id){
		$result = $this->db->query("
            INSERT INTO favourite_match 
				(fm_user_id, fm_match_id) 
				VALUES ({$fm_user_id}, {$fm_match_id})
        ");
	}
	
	public function RemoveFavourite($id, $user_id){
		$result = $this->db->query("
			DELETE FROM favourite_match
			WHERE fm_match_id = {$id}
			AND fm_user_id = {$user_id}
		");
	}
	
	public function CheckFavourite($fm_user_id) {
		$result = $this->db->query("
            SELECT fm_match_id
			FROM favourite_match
			WHERE fm_user_id = {$fm_user_id}
        ");
		
		$result = $result->result_array();
        return $result;
	}
	
	public function deleteComment($commentId){
		$result = $this->db->query("
			DELETE FROM match_comments
			WHERE match_comments_id = {$commentId}
		");
	}
}