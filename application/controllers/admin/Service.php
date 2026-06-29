<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends Admin_Controller {

	public function index()
	{
		$data = array(
			'result' => $this->admin_model->art_list(7)
		);
		$name = 'pages/service';
		$this->template->admin($name,$data);
	}
	
	public function page_order(){
		$page_id = $this->input->post('page_id_array');
		
		for($i=0; $i<count($page_id); $i++)
		{
			$this->db->query("UPDATE article_settings SET tartib = '".$i."' WHERE id_category = 7 and key_article = '".$page_id[$i]."' ");
		}
		echo 'Page Order has been updated'; 
	}

}