<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Adm_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

// Home and article functions
    public function getArticleImage(){
        $result = $this->db->query("
            SELECT *
            FROM  article
            left join image on article.image_id = image.image_id
        ");

        $result = $result->result_array();
        return $result;
    }
	
	public function getArticleById($id){
        $result = $this->db->query("
            SELECT * 
            FROM  article
			left join article_comments ac on article.article_id = ac.cm_article_id
			left join image on article.image_id = image.image_id
			left join users on ac.comment_author_id = users.users_id
            WHERE article.article_id = {$id}
        ");

        $result = $result->result_array();
        return $result;
    }
	
	public function InsertArticleComment($comment_author_id, $article_comment, $article_id){
        $result = $this->db->query("
            INSERT INTO article_comments 
				(comment_author_id, article_comment, article_id) 
				VALUES ({$comment_author_id}, '{$article_comment}', {$article_id})
        ");
    }
	
	public function InsertArticle($article_author, $title, $header, $body){
		$result = $this->db->query("
			INSERT INTO article
				(article_author, title, header, body)
				VALUES ({$article_author}, '{$title}', '{$header}', '{$body}')
		");
		
		return $this->db->insert_id();
	}
	
	public function EditArticle($article_id, $title, $header, $body){
		$result = $this->db->query("
			UPDATE article
			SET
				title = '{$title}', 
				header = '{$header}', 
				body = '{$body}'
			WHERE
				article_id = {$article_id}
		");
	}
	
	public function DeleteArticle($article_id){
		$result = $this->db->query("
			DELETE FROM article
			WHERE article_id = {$article_id}
		");
	}
	
// Match and matchinfo functions
	public function getAllMatches(){
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
				,tournament_name
				,matchinfo_id
			FROM matchinfo
			left join team a on matchinfo.team1_id = a.team_id
            left join image i on a.image_id = i.image_id
			left join tournamentinfo on matchinfo.tournament_id = tournamentinfo.tournamentinfo_id
            left join team b on matchinfo.team2_id = b.team_id
            left join image j on b.image_id = j.image_id
		");

        $result = $result->result_array();
        return $result;
    }
	
	public function getMatchById($id){
        $result = $this->db->query("
            SELECT 
				matchinfo.matchinfo_id
				,i.link as team1_image  
				,a.team_name as team1_name
				,scoret1
				,scoret2
				,streams
				,match_status
				,match_date
				,match_time
				,tournament_name
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
	
	public function InsertMatch($tournament, $match_date, $team1, $team2, $streams, $match_status, $match_time){
		$result = $this->db->query("
			INSERT INTO matchinfo
				(tournament_id, match_date, team1_id, team2_id, streams, match_status, match_time)
				VALUES ({$tournament[0]['tournamentinfo_id']}, '{$match_date}', {$team1[0]['team_id']}, {$team2[0]['team_id']}, '{$streams}', '{$match_status}', '{$match_time}')
		");
		
		return $this->db->insert_id();
	}
	
	public function EditMatch($matchinfo_id, $tournament, $match_date, $team1, $team2, $match_status, $streams, $match_time){
		$result = $this->db->query("
			UPDATE matchinfo
				SET 
					tournament_id = {$tournament[0]['tournamentinfo_id']}, 
					match_date = '{$match_date}', 
					team1_id = {$team1[0]['team_id']}, 
					team2_id = {$team2[0]['team_id']},  
					streams = '{$streams}', 
					match_status = '{$match_status}', 
					match_time = '{$match_time}'
				WHERE 
					matchinfo_id = {$matchinfo_id}
		");
	}
	
	public function DeleteMatch($matchinfo_id){
		$result = $this->db->query("
			DELETE FROM matchinfo
			WHERE matchinfo_id = {$matchinfo_id}
		");
	}
	
// Tournaments functions
	public function getTournamentsInfo(){
		$result = $this->db->query("
			SELECT * 
            FROM  tournamentinfo
			left join image i on tournamentinfo.image_id = i.image_id
		");

        $result = $result->result_array();
        return $result;
    }
	
	public function getTournamentId($tournament_name){
		 $result = $this->db->query("
            SELECT tournamentinfo_id
            FROM  tournamentinfo
            WHERE tournament_name like '{$tournament_name}'
        ");

        $result = $result->result_array();
        return $result;
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
	
	public function InsertTournament($tournament_name, $date_start, $date_finish, $prizepool, $location, $participants_num, $participants){
		$result = $this->db->query("
			INSERT INTO tournamentinfo
				(tournament_name, date_start, date_finish, prizepool, location, participants_num, participants)
				VALUES ('{$tournament_name}', '{$date_start}', '{$date_finish}', '{$prizepool}', '{$location}', {$participants_num}, '{$participants}')
		");
		
		return $this->db->insert_id();
	}
	
	public function EditTournament($tournamentinfo_id, $tournament_name, $date_start, $date_finish, $prizepool, $location, $participants_num, $participants){
		$result = $this->db->query("
			UPDATE tournamentinfo
				SET
					tournament_name = '{$tournament_name}',
					date_start = '{$date_start}',
					date_finish = '{$date_finish}',
					prizepool = '{$prizepool}',
					location = '{$location}',
					participants_num = {$participants_num},
					participants = '{$participants}'
			WHERE tournamentinfo_id = {$tournamentinfo_id}
		");
	}
	
	public function DeleteTournament($id){
		$result = $this->db->query("
			DELETE FROM tournamentinfo
			WHERE tournamentinfo_id = {$id}
		");
	}
	
// Forum and topic functions
	public function getForumInfo(){
		$result = $this->db->query("
			SELECT *	
			FROM forum
			left join users u on forum.author_id = u.users_id
		");

        $result = $result->result_array();
        return $result;
    }
	
	public function getTopicById($id){
        $result = $this->db->query("
            SELECT 
			topic
			,description
			,created
			,forum_id
			,u.name as author
			,i.name as name
			,fc.forum_comment
			,fc.comment_date
            FROM  forum
			left join users u on forum.author_id = u.users_id
			left join forum_comments fc on forum.forum_id = fc.topic_id
			left join users i on fc.fc_author_id =i.users_id
            WHERE forum.forum_id = {$id}
        ");

        $result = $result->result_array();
        return $result;
    }
	
	public function InsertTopic($author_id, $topic, $description){
        $result = $this->db->query("
            INSERT INTO forum
				(author_id, topic, description) 
				VALUES ({$author_id}, '{$topic}', '{$description}')
        ");
		
		return $this->db->insert_id();
    }
	
	public function InsertTopicComment($fc_author_id, $forum_comment, $topic_id){
        $result = $this->db->query("
            INSERT INTO forum_comments 
				(fc_author_id, forum_comment, topic_id) 
				VALUES ({$fc_author_id}, '{$forum_comment}', {$topic_id})
        ");
    }
	
	public function EditTopic($forum_id, $topic, $description){
		$result = $this->db->query("
			UPDATE article
			SET
				topic = '{$topic}', 
				description = '{$description}'
			WHERE
				article_id = {$forum_id}
		");
	}
	
	public function DeleteTopic($forum_id){
		$result = $this->db->query("
			DELETE FROM forum
			WHERE forum_id = {$forum_id}
		");
	}
	
// Users and profile functions
	 public function getUserById($id){
        $result = $this->db->query("
            SELECT *
            FROM  users
            WHERE users_id = {$id}
        ");

        $result = $result->result_array();
        return $result;
    }
	
	public function getUsers(){
        $result = $this->db->query("
            SELECT *
            FROM  users
        ");

        $result = $result->result_array();
        return $result;
    }
	
	public function ChangePassword($users_id, $password){
        $result = $this->db->query("
            UPDATE users
				SET
					password = '{$password}'
				WHERE
					users_id = {$users_id}
        ");
    }
	
	public function ChangeEmail($users_id, $email){
        $result = $this->db->query("
            UPDATE users
				SET
					email = '{$email}'
				WHERE
					users_id = {$users_id}
        ");
    }
	
	public function BanUser($users_id){
		$result = $this->db->query("
		UPDATE users
				SET
					status = '2'
				WHERE
					users_id = {$users_id}
		");
	}
	
	public function giveAdmin($users_id){
		$result = $this->db->query("
		UPDATE users
				SET
					status = '1'
				WHERE
					users_id = {$users_id}
		");
	}
	
	public function removeAdmin($users_id){
		$result = $this->db->query("
		UPDATE users
				SET
					status = '0'
				WHERE
					users_id = {$users_id}
		");
	}
	
	public function DeleteArticleComment($article_comments_id){
		$result = $this->db->query("
			DELETE FROM article_comments
			WHERE article_comments_id = {$article_comments_id}
		");
	}
	
	public function DeleteMatchComment($match_comments_id){
		$result = $this->db->query("
			DELETE FROM match_comments
			WHERE match_comments_id = {$match_comments_id}
		");
	}
	
	public function deleteForumComment($commentId){
		$result = $this->db->query("
			DELETE FROM forum_comments
			WHERE forum_comments_id = {$commentId}
		");
	}
	
	public function getTeamInfo($team_name){
		 $result = $this->db->query("
            SELECT team_id
            FROM  team
            WHERE team_name = '{$team_name}'
        ");

        $result = $result->result_array();
        return $result;
	}
}