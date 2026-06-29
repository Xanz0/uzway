<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {

	public function getLimit($limit){

		$Q = $this->db->limit($limit)
					  ->order_by('id','DESC')
					  ->where('lang',LANG_URL )
					  ->where('title != "" ')
					  ->get('articles');


		return $Q->result_array();
	}

	public function read(){
		$uri = $this->uri->segment_array();
		$last_url = end($uri);

		$id_key = explode("-", $last_url);

		$q = $this->db->where('id_key',$id_key[0])
				  	  ->where('lang',LANG_URL )
				  	  ->get('articles');

		return $q->row();

	}

	public function getNews($limit){

		$uri = $this->uri->segment_array();
		$last_url = end($uri);

		$Q = $this->db->query("SELECT
									a.title, a.text, a.created, a.author,a.id_key,a.alias,a.source,
									a_set.id_category
								FROM
									articles a
									left join article_settings a_set
										on a.id_key = a_set.key_article
									left join menus m
										on a_set.id_category = m.id_key
								WHERE
									m.alias = '{$last_url}'
									and a.lang = '".LANG_URL."'
									and a.title <> ''
								ORDER BY a_set.tartib ASC, a.id_key DESC
								LIMIT ".$limit);


		return $Q->result_array();
	}

	public function LastNews($limit){

		/*
			5 - yangiliklar
		*/

		$Q = $this->db->query("SELECT
									a.title, a.text, a.created, a.author,a.id_key,a.alias
								FROM
									articles a
									left join article_settings a_set
										on a.id_key = a_set.key_article
								WHERE
									a_set.id_category in (5) 					
									and a.lang = '".LANG_URL."'
									and a.title <> ''
								ORDER BY a.id_key DESC
								LIMIT ".$limit);


		return $Q->result_array();
	}





}
