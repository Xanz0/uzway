<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model {

	public function article(){

		$uri = $this->uri->segment_array();
		$last_url = end($uri);

		$tpl = $this->db->query("SELECT
										b.template
									FROM
										menus a,
										menu_type_items b
									WHERE
										a.type = b.alias
										and a.alias = '{$last_url}'");


		$Q = $this->db->query("SELECT
									a.title, a.text, a.created, a.updated, a.author,a.alias,a.id_key,
									m_ti.template,
									m_data.position, m_data.phone, m_data.mail,
									a_mod.type,a_mod.id_module
								FROM
									articles a
									left join article_settings a_set
										on a.id_key = a_set.key_article
									left join article_modules a_mod
										on a.id_key = a_mod.key_article
									left join managment_data m_data
										on a.id_key = m_data.key_article
									left join menus m
										on a_set.id_category = m.id_key
										and m.alias = '{$last_url}'
									left join menu_type_items m_ti
										on m_ti.alias = m.type
								WHERE
									a.lang = '".LANG_URL."'
									and m.alias = '{$last_url}' ");


		if($tpl->row()->template != 'material'){
			$result = $Q->result_array();
		}else{
			$result = $Q->row();
		}

		$get = array(
			'template' => $tpl->row()->template,
			'result' => $result
		);

		return $get;
	}


	public function read(){

		$uri = $this->uri->segment_array();
		$last_url = end($uri);

		$id_key = explode("-", $last_url);

		$Q = $this->db->query("SELECT
									a.title, a.text, a.created, a.author,
									m_ti.template,
									m_data.position, m_data.phone, m_data.mail
								FROM
									articles a
									left join article_settings a_set
										on a.id_key = a_set.key_article
									left join article_modules a_mod
										on a.id_key = a_mod.key_article
									left join managment_data m_data
										on a.id_key = m_data.key_article
									left join menus m
										on a_set.id_category = m.id_key
										and a.id_key = '{$id_key[0]}'
                                        and m.lang = '".LANG_URL."'
									left join menu_type_items m_ti
										on m_ti.alias = m.type
								WHERE
									a.lang = '".LANG_URL."'
									and a.id_key = '{$id_key[0]}'");


		$get = array(
			'template' => 'material',
			'result' => $Q->row()
		);

		return $get;

	}

	public function _by_id_lang($id,$lang){
		$Q = $this->db->query("SELECT
									a.title, a.text, a.created, a.author,a.alias,a.id_key,a.id,a.source,
									a_set.visibility,a_set.id_category,
									m_data.position, m_data.phone, m_data.mail
								FROM
									articles a
									left join article_settings a_set
										on a.id_key = a_set.key_article
									left join article_modules a_mod
										on a.id_key = a_mod.key_article
									left join managment_data m_data
										on a.id_key = m_data.key_article
								WHERE
									a.lang = '".$lang."'
									and a.id_key = ".$id);

		return $Q->row();
	}

	
	public function search($arg){
		//$Q= $this->db->query("SELECT * FROM `articles` WHERE `title` LIKE '%".$arg."%' and lang = '".LANG_URL."' ");


		if(strlen($arg) > 3){

			$s = $this->db->escape_str($arg);
			$Q = $this->db->limit(25)
					  ->like('title',$s)
					  ->where('lang',LANG_URL)
				 	  ->get('articles');

			return $Q->result_array();
		}

	}
	
	public function breadcrumb(){
		$uri = $this->uri->segment_array();
		$last_url = end($uri);
		$id_key = explode("-", $last_url);
		
		$Q = $this->db->query("SELECT
									c.title AS menu,
									c.alias AS alias,
									a.title AS title
								FROM
									articles a,
									article_settings b,
									menus c
								WHERE
									a.id_key = b.key_article AND b.id_category = c.id_key AND a.id_key = ".$id_key[0]." AND c.lang = '".LANG_URL."' AND a.lang = '".LANG_URL."'
								GROUP BY
									c.title");
		
		return $Q->row();
	}
 
}
