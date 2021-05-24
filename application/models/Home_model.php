<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function getArticlesById($id){
        $result = $this->db->query("
            SELECT *
            FROM  article
			left join image on article.image_id = image.image_id
            WHERE article.article_id = {$id}
        ");

        $result = $result->result_array();
        return $result;
    }
	
	public function getArticleImage(){
        $result = $this->db->query("
            SELECT *
            FROM  article
            left join image on article.image_id = image.image_id
			ORDER BY insert_date DESC
        ");

        $result = $result->result_array();
        return $result;
    }
}