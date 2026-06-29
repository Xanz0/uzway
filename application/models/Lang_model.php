<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lang_model extends CI_Model {

	public function get()
	{
		$R = $this->db->order_by('default','DESC')
					  ->get('languages');
		return $R->result_array();
	}

}
