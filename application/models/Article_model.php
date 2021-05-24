<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Article_model extends CI_Model{
    public function __construct(){
        $this->load->database();
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
				(comment_author_id, article_comment, cm_article_id) 
				VALUES ({$comment_author_id}, '{$article_comment}', {$article_id})
        ");
    }
	
	public function AddFavourite($fa_user_id, $fa_article_id){
		$result = $this->db->query("
            INSERT INTO favourite_article 
				(fa_user_id, fa_article_id) 
				VALUES ({$fa_user_id}, {$fa_article_id})
        ");
	}
	
	public function RemoveFavourite($id, $user_id){
		$result = $this->db->query("
			DELETE FROM favourite_article
			WHERE fa_article_id = {$id}
			AND fa_user_id = {$user_id}
		");
	}
	
	public function CheckFavourite($fa_user_id) {
		$result = $this->db->query("
            SELECT fa_article_id
			FROM favourite_article 
			WHERE fa_user_id = {$fa_user_id}
        ");
		
		$result = $result->result_array();
        return $result;
	}
	
	public function deleteComment($commentId){
		$result = $this->db->query("
			DELETE FROM article_comments
			WHERE article_comments_id = {$commentId}
		");
	}
}