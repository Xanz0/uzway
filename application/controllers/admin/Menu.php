<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends Admin_Controller {

	public function index()
	{
		$data = array(
			'cat_list' => $this->admin_model->get_menu_list()
		);
		$name = 'pages/menu';
		$this->template->admin($name,$data);
	}

	public function add_menu()
	{
		$data = array(
			'cats' => $this->admin_model->get_menu('uz')
		);
		$name = 'control/menu';
		$this->template->admin($name,$data);
	}

	public function insert_menu(){
		if($this->input->post('insert')){
			$lastId['id'] = '';
			$this->db->insert('id_key',$lastId);
			$key = $this->db->insert_id();
			$checkbox = $this->input->post('visibility') ? 1 : 0;

			$data = array();
			foreach ($this->lang as $value) {
				$data[] = array(
					'id_parent' => $this->input->post('id_category'),
					'id_key' => $key,
					'lang' => $value['slug'],
					'alias' => strtolower($this->input->post('alias-'.$value['slug'])),
					'title' => $this->input->post('title-'.$value['slug']),
					'text' => $this->input->post('text-'.$value['slug']),
					'type' => $this->input->post('type'),
					'created' => date('Y-m-d H:i'),
					'visibility' => $checkbox,
				);
				
			}
			$this->db->insert_batch('menus',$data);


			redirect('admin/menu/add_menu');
		}
	}

	public function edit($id)
	{
		$data = array(
			'cats' => $this->admin_model->get_menu('uz'),			
		);
		$name = 'control/edit/menu';
		$this->template->admin($name,$data);
	}

	public function update_menu(){
		if($this->input->post('update')){
			
			$checkbox = $this->input->post('visibility') ? 1 : 0;

			//$data = array();
			foreach ($this->lang as $value) {
				$check_lang = $this->db->where('lang',$value['slug'])
									   ->where('id_key',$this->input->post('id_key'))
									   ->get('menus');
				
				if($check_lang->num_rows() > 0){
					$data = array(
						'id_parent' => $this->input->post('id_category'),
						'alias' => strtolower($this->input->post('alias-'.$value['slug'])),
						'title' => $this->input->post('title-'.$value['slug']),
						'text' => $this->input->post('text-'.$value['slug']),
						'type' => $this->input->post('type'),
						'visibility' => $checkbox,
					);

					$this->db->where('lang',$value['slug']);
					$this->db->where('id_key',$this->input->post('id_key'));
					$this->db->update('menus',$data);
				}
				else{
					$key = $this->input->post('id_key');
					
					$data_ins = array(
						'id_parent' => $this->input->post('id_category'),
						'id_key' => $key,
						'lang' => $value['slug'],
						'alias' => strtolower($this->input->post('alias-'.$value['slug'])),
						'title' => $this->input->post('title-'.$value['slug']),
						'text' => $this->input->post('text-'.$value['slug']),
						'type' => $this->input->post('type'),
						'created' => date('Y-m-d H:i'),
						'visibility' => $checkbox,
					);
					echo '<pre>';
					var_dump($data_ins);
					$this->db->insert('menus',$data_ins);
				}
				//echo $value['slug'];
			}


			redirect('admin/menu');
		}
	}

	public function add_type()
	{
		$data = array();
		$name = 'control/menu_type';
		$this->template->admin($name,$data);
	}

	public function active_deactive(){
		if($this->input->post('xkey')){

			$checkbox = $this->input->post('visibility') ? 1 : 0;

			$data['visibility'] = $checkbox;

			$X = $this->db->where('id_key',$this->input->post('xkey'))
					 	  ->update('menus',$data);


			if(!$X){
				echo '<div class="modal-body">
						'.$this->db->error().'
					</div>';
			}else{
				echo $checkbox;
			}

		}
	}
	
}
