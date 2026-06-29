<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Admin_Controller {

	public function index()
	{
		$data = array(
			'result' => $this->admin_model->art_list()
		);
		$name = 'pages/article';
		$this->template->admin($name,$data);
	}

	public function article_add()
	{
		$data = array(
			'cats' => $this->admin_model->get_menu('ru')
		);
		$name = 'control/article';
		$this->template->admin($name,$data);
	}
	public function article_vm()
	{
		$data = array(
			'cats' => $this->admin_model->get_menu('uz')
		);
		$name = 'control/videomaterial';
		$this->template->admin($name,$data);
	}

	public function insert(){
		if($this->input->post('insert')){
			$lastId['id'] = '';
			$this->db->insert('id_key',$lastId);
			$key = $this->db->insert_id();

			$created = $this->input->post('created');

			$data = array();
			foreach ($this->lang as $value) {
				$data[] = array(
					'id_key' => $key,
					'lang' => $value['slug'],
					'alias' => alias($this->input->post('title-'.$value['slug'])),
					'title' => $this->input->post('title-'.$value['slug']),
					'text' => $this->input->post('text-'.$value['slug']),
					'author' => $this->ion_auth->user()->row()->username,
					'created' => $created,
					'source' =>  $this->input->post('source-'.$value['slug'])
				);
			}
			$this->db->insert_batch('articles',$data);

			##################################################################
			$checkbox = $this->input->post('visibility') ? 1 : 0;
			$categories = $this->input->post('id_category');

			$data_set = array();
			foreach ($categories as $cat) {
				$data_set[] = array(
					'key_article' => $key,
					'id_category' => $cat,
					'visibility' => $checkbox
				);
			}
			$this->db->insert_batch('article_settings',$data_set);
			##################################################################

			if($this->input->post('position')){
				$data_man = array(
					'key_article' => $key,
					'position' => $this->input->post('position'),
					'phone' => $this->input->post('phone'),
					'mail' => $this->input->post('mail')
				);

				$this->db->insert('managment_data',$data_man);
			}
			##################################################################


			redirect('admin/article/article_add');

		}
	}

	public function edit(){
		$data = array(
			'cats' => $this->admin_model->get_menu('uz')
		);
		$name = 'control/edit/article';
		$this->template->admin($name,$data);
	}

	public function update(){
		if($this->input->post('update')){

			$key = $this->input->post('key_article');
			
			foreach ($this->lang as $value) {
				
				$check_lang = $this->db->where('lang',$value['slug'])
									   ->where('id_key',$key)
									   ->get('articles');
				echo $check_lang->num_rows().'<br>';
				
				if($check_lang->num_rows() > 0){
					$data = array(
						'alias' => alias($this->input->post('title-'.$value['slug'])),
						'title' => $this->input->post('title-'.$value['slug']),
						'text' => $this->input->post('text-'.$value['slug']),
						'author' => $this->ion_auth->user()->row()->username,
						'updated' => $this->input->post('updated'),
						'source' =>  $this->input->post('source-'.$value['slug'])
					);
					//echo '<pre>';
					//var_dump($data);
					
					$this->db->where('id',$this->input->post('id-'.$value['slug']))
							 ->update('articles',$data);
				}
				else{
					$data_ins = array(
						'id_key' => $key,
						'lang' => $value['slug'],
						'alias' => alias($this->input->post('title-'.$value['slug'])),
						'title' => $this->input->post('title-'.$value['slug']),
						'text' => $this->input->post('text-'.$value['slug']),
						'author' => $this->ion_auth->user()->row()->username,
						'source' =>  $this->input->post('source-'.$value['slug'])
					);
					
					
					$this->db->insert('articles',$data_ins);
				}
			}
			
			
			##################################################################
			$this->db->where('key_article', $this->input->post('key_article'));
			$this->db->delete('article_settings');

			$checkbox = $this->input->post('visibility') ? 1 : 0;
			$categories = $this->input->post('id_category');

			$data_set = array();
			foreach ($categories as $cat) {
				$data_set[] = array(
					'key_article' => $this->input->post('key_article'),
					'id_category' => $cat,
					'visibility' => $checkbox
				);
			}
			$this->db->insert_batch('article_settings',$data_set);
			##################################################################

			if($this->input->post('position')){
				$data_man = array(
					'key_article' => $this->input->post('key_article'),
					'position' => $this->input->post('position'),
					'phone' => $this->input->post('phone'),
					'mail' => $this->input->post('mail')
				);

				$this->db->update('managment_data',$data_man,'key_article');
			}
			##################################################################


			redirect('admin/article');

		}
	}


	public function delete(){
		$key = $this->input->post('xkey');

		if($key){
			echo form_open();
				echo '<div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel"></h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        Siz bu ma\'lumotni o\'chirmoqchimisiz?
				      </div>
				      <div class="modal-footer">
				      	<input type="hidden" name="id_key" value="'.$key.'" />
				        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
				        <button type="submit" class="btn btn-danger">Да! Удалить.</button>
				      </div>';
			echo form_close();
		}
		
		if($this->input->post('id_key')){
			$id_key = $this->input->post('id_key');

			$this->db->where('id_key',$id_key)
					 ->delete('articles');

			$this->session->set_flashdata('msg',"Ma'lumot o'chirildi");
			
			redirect('admin/article');
		}
	}

	public function insert_vm(){
		if($this->input->post('insert')){
			$data = array(
				'lang' => $this->input->post('lang'),
				'title' => $this->input->post('title'),
				'alias' => $this->input->post('alias'),
				'url_download' => $this->input->post('url_download'),
				'size' => $this->input->post('size'),
				'type' => $this->input->post('type')
			);

			$this->db->insert('media_gallery',$data);

			redirect('admin/article/article_vm');
		}
	}

}
