<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Topic_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function getTopicById($id){
        $result = $this->db->query("
            SELECT 
			topic
			,description
			,created
			,forum_id
			,u.name as author
			,i.users_id as user_id
			,i.name as name
			,fc.forum_comment
			,fc.forum_comments_id
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
	
	public function getTopicAuthor($topicId){
		$result = $this->db->query("
			SELECT users.users_id 
			FROM forum
			left join users on forum.author_id = users.users_id
			WHERE forum_id = {$topicId}
		");
		
		$result = $result->result_array();
        return $result;
	}	
	
	public function InsertTopicComment($fc_author_id, $forum_comment, $topic_id){
        $result = $this->db->query("
            INSERT INTO forum_comments 
				(fc_author_id, forum_comment, topic_id) 
				VALUES ({$fc_author_id}, '{$forum_comment}', {$topic_id})
        ");
		
		$result = $this->db->query("
            UPDATE forum
				SET
					updated_date = CURRENT_TIMESTAMP
				WHERE
					forum_id = {$topic_id}
        ");
    }
	
	public function AddFavourite($ff_user_id, $ff_topic_id){
		$result = $this->db->query("
            INSERT INTO favourite_forum 
				(ff_user_id, ff_topic_id) 
				VALUES ({$ff_user_id}, {$ff_topic_id})
        ");
	}
	
	public function RemoveFavourite($id, $user_id){
		$result = $this->db->query("
			DELETE FROM favourite_forum
			WHERE ff_topic_id = {$id}
			AND ff_user_id = {$user_id}
		");
	}
	
	public function CheckFavourite($ff_user_id) {
		$result = $this->db->query("
            SELECT ff_topic_id
			FROM favourite_forum 
			WHERE ff_user_id = {$ff_user_id}
        ");
		
		$result = $result->result_array();
        return $result;
	}
	
	public function deleteComment($commentId){
		$result = $this->db->query("
			DELETE FROM forum_comments
			WHERE forum_comments_id = {$commentId}
		");
	}
	
	public function deleteMyTopic($topicId){
		$result = $this->db->query("
			DELETE FROM forum
			WHERE forum_id = {$topicId}
		");
	}
}