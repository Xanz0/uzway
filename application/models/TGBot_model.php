<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TGBot_model extends CI_Model {
	
	public function get_restaurant(){
		return $this->db->get('tg_bot_restaurant')->result_array();
	}
	
	public function get_cat($id_r){
		return $this->db->where('id_restaurant',$id_r)
						->get('tg_bot_cat')
						->result_array();
	}
	
	public function get_items($id_cat,$offset=null,$limit=null){
		return $this->db->where('id_cat',$id_cat)
						->get('tg_bot_items')
						->result_array();
	}
}