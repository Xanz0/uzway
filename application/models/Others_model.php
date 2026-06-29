<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Others_model extends CI_Model {	

	public function filial(){
		return $this->db->where('lang',LANG_URL)
						->get('filial')
						->result_array();
	}

	public function review(){
		return $this->db->get('review')
						->result_array();
	}
	
	public function slider(){
		return $this->db->order_by('id','DESC')
						->where('lang',LANG_URL)
						->get('slider')
						->result_array();
	}

	public function doctors($limit){
		/*
			3 - Doctors
		*/

		$Q = $this->db->query("SELECT
									a.title, a.text, a.created, a.author,a.id_key,a.alias
								FROM
									articles a
									left join article_settings a_set
										on a.id_key = a_set.key_article
								WHERE
									a_set.id_category = 3 					
									and a.lang = '".LANG_URL."'
									and a.title <> ''
								ORDER BY a.id_key DESC
								LIMIT ".$limit);


		return $Q->result_array();
	} 

	public function turizm($limit){
		/*
			15 - Turizm
		*/

		$Q = $this->db->query("SELECT
									a.title, a.text, a.created, a.author,a.id_key,a.alias
								FROM
									articles a
									left join article_settings a_set
										on a.id_key = a_set.key_article
								WHERE
									a_set.id_category = 15 					
									and a.lang = '".LANG_URL."'
									and a.title <> ''								 
								ORDER BY a_set.tartib
								LIMIT ".$limit);


		return $Q->result_array();
	} 

	public function chief_doctor(){
		/*
			19 - Anvar Namazov
		*/

		return $this->db->where('lang',LANG_URL)
						->where('id_key',19)
						->get('articles')
						->row();
	}


	public function settings($lang){

		return $this->db->where('lang',$lang)
						->get('settings')
						->row();
	}

	public function social(){

		return $this->db->get('social_links')->result_array();
	}

}