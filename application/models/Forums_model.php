<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Forums_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function getForumsById($id){
        $result = $this->db->query("
            SELECT * 
            FROM  forum
            WHERE forum_id = {$id}
        ");

        $result = $result->result_array();
        return $result;
    }
	
	public function getForumInfo(){
		$result = $this->db->query("
			SELECT 
				forum.*,
				u.*,
				(  
					SELECT 
						count(*)
					FROM forum_comments where topic_id =  forum.forum_id
				) AS topicCount
			FROM forum
			left join users u on forum.author_id = u.users_id
			order by forum.updated_date DESC
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
}