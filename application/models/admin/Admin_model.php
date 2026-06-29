<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function get_all($table)
	{
		$R = $this->db->get($table);
		return $R->result_array();
	}
	
	public function get_lang()
	{
		$R = $this->db->order_by('default','DESC')
					  ->get('languages');
		return $R->result_array();
	}

	public function get_one($table,$column,$value)
	{
		$R = $this->db->where($column,$value)
					  ->get($table);
		return $R->row();
	}

/**M*M*M*M*M*M*M*M*M*M*M*M* Menu *W*W*W*W*W*W*W*W*W*W*W*W***/

	public function get_menu_type(){
		$R = $this->db->query('SELECT 
									a.title as main_title,
									b.title,
									b.description,
									b.alias,
									b.template
								FROM 
									menu_types a
									left join  
										menu_type_items b
										on a.id = b.id_parent
									');

		return $R->result_array();
	}

	public function get_menu($lang)
	{
		$R = $this->db->where('lang',$lang)
					  ->where('id_parent',0)
					  ->get('menus');
		return $R->result_array();
	}

	public function get_menu_one($id,$lang)
	{
		$R = $this->db->where('lang',$lang)
					  ->where('id_key',$id)
					  ->get('menus');
		return $R->row();
	}

	public function get_menu_child($lang,$parent)
	{
		$R = $this->db->where('lang',$lang)
					  ->where('id_parent',$parent)
					  ->get('menus');
		return $R->result_array();
	}

	public function get_menu_list(){
		

		$R = $this->db->query("SELECT
							    a.id_key, 
							    a.id_parent,
							    a.lang,
							    MAX(if(a.lang='ru', a.title, '')) AS ru,
							    MAX(if(a.lang='uz', a.title, '')) AS uz,
							    MAX(if(a.lang='en', a.title, '')) AS en,
							    a.visibility,
							    b.title,
							    b.description
							  FROM
							    menus a 
							    right join menu_type_items b 
							    	on a.type = b.alias
							  WHERE a.id_key is not null
							  group by id_key");

		return $R->result_array();
	}

	public function _by_menu_lang($id,$lang){
		$Q = $this->db->query("SELECT 
									* 
								FROM
									articles a
									left join article_settings a_set
										on a.id_key = a_set.key_article
									left join menus m
										on a_set.id_category = m.id_key
										and m.lang = '".$lang."'
								WHERE 
									a.lang = '".$lang."'
									and a.id_key = ".$id);

		return $Q->result_array();
	}


/**M*M*M*M*M*M*M*M*M*M*M*M* Article *W*W*W*W*W*W*W*W*W*W*W*W***/

	public function art_list($cat_id = null){
		
		if(isset($cat_id)){
			$where_cat = 'where b.id_category = '.$cat_id;
			$order = 'order by b.tartib';
		}else{
			$where_cat = '';
			$order = 'order by a.id_key DESC';
		}
		$Q = $this->db->query("SELECT
							    a.id_key, 
							    a.title,
							    a.lang,
								b.tartib,
							    MAX(if(a.lang='ru', a.title, '')) AS ru,
							    MAX(if(a.lang='uz', a.title, '')) AS uz,
							    MAX(if(a.lang='en', a.title, '')) AS en,
							    a.text,
							    m.title as cat_name
							  FROM
							    articles a 
							    left join article_settings b 
							    	on a.id_key = b.key_article
							    left join menus m
							    	on b.id_category = m.id_key
								".$where_cat."
							  group by a.id_key
							  ".$order."
							  ");

		return $Q->result_array();
	}

/**M*M*M*M*M*M*M*M*M*M*M*M* Menu_order*W*W*W*W*W*W*W*W*W*W*W*W***/

	public function menu_order(){
		$Q = $this->db->query("SELECT
							    a.key_menu, 
							    a.bg_image,
							    a.prior,
							    b.title as cat_name,
							    b.id_parent
							  FROM
							    menu_settings a 
							    left join menus b 
							    	on a.key_menu = b.id_key and b.lang='uz'							
							  	order by b.id_parent");

		return $Q->result_array();
	}

	public function filial($lang){

		return $this->db->where('lang',$lang)
						->get('filial')
						->result_array();
	}


}
