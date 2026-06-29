<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

	public function get()
	{
		$R = $this->db->where('lang',LANG_URL)
					  ->get('menus');
		return $R->result_array();
	}

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
		$R = $this->db->query("SELECT
									*
								FROM
									menus a
									left join menu_settings ms
										on a.id_key = ms.key_menu
								WHERE
									a.lang = '".$lang."'
									and a.id_parent = 0
									and a.visibility = 1
								ORDER BY prior");
		return $R->result_array();
	}

	public function get_menu_child($lang,$parent)
	{
		$R = $this->db->query("SELECT
									*
								FROM
									menus a
									left join menu_settings ms
										on a.id_key = ms.key_menu
								WHERE
									a.lang = '".$lang."'
									and a.id_parent = ".$parent."
									and a.visibility = 1
								ORDER BY IFNULL(ms.prior,9999)");
		return $R->result_array();
	}

	public function cat_menu_list(){
		$uri = $this->uri->segment_array();
		$last_url = end($uri);

		$R = $this->db->query("SELECT
									a.title,
									a.text,
									a.alias,
									a.type,
									a.id_key,
									COALESCE(
										ms.bg_image,(SELECT bg_image FROM menu_settings WHERE key_menu = x_key.id_key)
									) bg_image
								FROM
									(SELECT id_key FROM menus WHERE alias = '".$last_url."'  group by id_key) x_key,
									menus a
									left join menu_settings ms
										on a.id_key = ms.key_menu
								WHERE
									a.id_parent = (SELECT id_key FROM menus WHERE alias = '".$last_url."' group by id_key)
									and a.lang = '".LANG_URL."'
									and a.visibility = 1 order by IFNULL(ms.prior,9999)
									 ");
		return $R->result_array();
	}


	public function settings(){
		$uri = $this->uri->segment_array();
		$end = end($uri);
		$cnt = count($uri)-1;

		$last_url = strpos($end,'.html');

		if($last_url === false){
			$last_url = $end;
		}
		else{
			$last_url = $this->uri->segment($cnt);
		}

		switch ($last_url) {
			case 'produktsiya-yuvelirnogo-zavoda':
				$last_url= 'mahsulotlar';
				break;
			case 'zargarlik-zavodi-mahsulotlari':
					$last_url= 'mahsulotlar';
					break;
			case 'production-of-jewellery-plant':
						$last_url= 'mahsulotlar';
						break;
			default:
				// code...
				break;
		}
		
		$R = $this->db->query("SELECT
									a.title,
									a.alias,
									COALESCE(
										ms.bg_image,(SELECT bg_image FROM menu_settings WHERE key_menu = x_key.id_parent)
									) bg_image
								FROM
									(SELECT id_parent FROM menus WHERE alias = '".$last_url."'  group by id_parent) x_key,
									menus a
									left join menu_settings ms
										on a.id_key = ms.key_menu
								WHERE
									a.lang = '".LANG_URL."'
									and a.id_key = (SELECT id_key FROM menus WHERE alias = '".$last_url."' group by id_key)
									and a.visibility = 1
									 ");
		return $R->row();
	}


	public function for_btf_url($key){
		return $this->db->where('id_key',$key)
						->where('lang',LANG_URL)
						->get('menus')
						->row();
	}

}
