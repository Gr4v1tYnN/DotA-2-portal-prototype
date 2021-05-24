<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model{
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
	
	public function getFavouriteArticles($id){
		$result = $this->db->query("
            SELECT *
            FROM  favourite_article fa
			left join article a on fa.fa_article_id = a.article_id
            WHERE fa_user_id = {$id}
        ");

        $result = $result->result_array();
        return $result;
	}
	
	public function getFavouriteMatches($id){
		$result = $this->db->query("
            SELECT 
				m.matchinfo_id as matchinfo_id
				,i.link as team1_image  
				,a.team_name as team1_name
				,match_date
				,match_time
				,tournament_name
				,j.link as team2_image
				,b.team_name as team2_name
            FROM  favourite_match fm
			left join matchinfo m on fm.fm_match_id = m.matchinfo_id
			left join team a on m.team1_id = a.team_id
            left join image i on a.image_id = i.image_id
			left join tournamentinfo on m.tournament_id = tournamentinfo.tournamentinfo_id
			left join team b on m.team2_id = b.team_id
            left join image j on b.image_id = j.image_id
            WHERE fm_user_id = {$id}
        ");

        $result = $result->result_array();
        return $result;
	}
	
	public function getFavouriteTournaments($id){
		$result = $this->db->query("
            SELECT *
            FROM  favourite_tournament ft
			left join tournamentinfo t on ft.ft_tournament_id = t.tournamentinfo_id
			left join image i on t.image_id = i.image_id
            WHERE ft_user_id = {$id}
        ");

        $result = $result->result_array();
        return $result;
	}
	
	public function getFavouriteForums($id){
		$result = $this->db->query("
            SELECT 
				forum.*,
				u.*,
				(  
					SELECT 
						count(*)
					FROM forum_comments where topic_id =  forum.forum_id
				) AS topicCount,
				
				 (  
					SELECT 
						max(comment_date)
					FROM forum_comments where topic_id =  forum.forum_id
				) AS lastComentDate
            FROM  favourite_forum fr
			left join forum  on fr.ff_topic_id = forum.forum_id
			left join users u on forum.author_id = u.users_id
            WHERE ff_user_id = {$id}
        ");

        $result = $result->result_array();
        return $result;
	}
}