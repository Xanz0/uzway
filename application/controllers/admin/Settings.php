<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Admin_Controller {

	public function index()
	{
		$data = array();
		$name = 'pages/settings';
		$this->template->admin($name,$data);
	}

	public function settings_update(){
		if($this->input->post('update'))
		{
			foreach ($this->lang as $value) {
				$data = array(
					'title' =>$this->input->post('title-'.$value['slug']),
					'address' => $this->input->post('address-'.$value['slug']),
					'footer_about' => $this->input->post('footer_about-'.$value['slug']),
					'about_text' => $this->input->post('about_text-'.$value['slug']),
					'phone' => $this->input->post('phone'),
					'phone2' => $this->input->post('phone2')
				);
				

				$this->db->where('lang',$value['slug']);
				$this->db->update('settings',$data);
			}

			redirect('admin/settings');
		}
	}
}