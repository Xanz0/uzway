<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $_lang;
	public $uri_lang;
	public $cat;
	public $settings;
	public $social;
	public $ip;
	public $filial;

	public function __construct(){
		parent::__construct();		
		$this->uri_lang = $this->uri->segment(1);

        define('LANG_URL', $this->uri_lang );

        $this->_lang = $this->lang_model->get();	
		$this->cat = $this->menu_model->get_menu($this->uri_lang);
		
		$this->lastNews = $this->news_model->LastNews(5);
		$this->footerNews = $this->news_model->LastNews(2);
		
		$this->ip = $this->local_ip();
		
		$this->settings = $this->settings();
		$this->social = $this->social();


		$this->filial = $this->others_model->filial();


		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
	}
	
	function local_ip() {
	    $client  = @$_SERVER['HTTP_CLIENT_IP'];
	    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	    $remote  = $_SERVER['REMOTE_ADDR'];

	    if(filter_var($client, FILTER_VALIDATE_IP)) {
	      $ip = $client;
	    }
	    elseif(filter_var($forward, FILTER_VALIDATE_IP)) {
	      $ip = $forward;
	    }
	    else {
	      $ip = $remote;
	    }

	    return $ip;
	}


	function settings(){
		return $this->db->where('lang',LANG_URL)
										->get('settings')
										->row();
	}

	function social(){
		return $this->db->get('social_links')
										->result_array();
	}
	
}

class Admin_Controller extends CI_Controller {

	public $lang;
	public $cat;
	public $menu_type;

	public function __construct(){
		parent::__construct();		

		if (!$this->ion_auth->logged_in()){redirect('login', 'refresh');}

		$this->load->model('admin/admin_model');
		$this->load->helper('admin_helper');

		$this->lang = $this->admin_model->get_lang();		
		$this->cat = $this->admin_model->get_all('menus');			
		$this->menu_type = $this->admin_model->get_menu_type();

		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
	}
	

	public function do_upload($dir,$post_data) {


    	$config['upload_path'] 		= 	'uploads/'.$dir.'/';
    	$config['allowed_types'] 	= 	'*'; 

    	$this->load->library('upload', $config);
    	$this->upload->initialize($config);

    	if (!is_dir('uploads/'.$dir )) {
    		$oldmask = umask(0);
			mkdir('uploads/'.$dir, 0777); 
			umask($oldmask);           
		}

		if ($this->upload->do_upload($post_data))
		{
            $data = array('upload_data' => $this->upload->data());
            $get = array(
            	'file' => $data['upload_data']['file_name'],
            	'size' => $data['upload_data']['file_size']
            );
            //$this->resizeImage($dir,$data['upload_data']['file_name']);
            return $get;			
		}else{
			echo $this->upload->display_errors();
		}
	}

	public function resizeImage($dir,$filename)
   	{
      $source_path = 'uploads/'.$dir.'/'.$filename;
      $target_path = 'uploads/'.$dir.'/thumbnail/';
      $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'create_thumb' => TRUE,
          'thumb_marker' => '_thumb',
          'width' => 150,
          'height' => 150
      );


      $this->load->library('image_lib', $config_manip);
      if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
      }


      $this->image_lib->clear();
   	}
	
}

