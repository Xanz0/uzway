<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$data = array(
			'news' => $this->news_model->LastNews(4),
			'turizm' => $this->menu_model->get_menu_child(LANG_URL,15),
		);
		$this->template->intro($data);
	}

	public function blog()
	{
		$R = $this->article_model->article();

		$data = array(
			'result' => $R['result'],
			'cat_list' => $this->menu_model->cat_menu_list(),
			'news' => $this->news_model->getNews(60),
			'lastNews' => $this->news_model->LastNews(10),
		);

		$name = get_tpl($R['template']);
		$this->template->frontend($name,$data);
	}
 

	public function pressa(){

		$data = array(
			'result' => $this->news_model->read(), 		
			'lastNews' => $this->news_model->LastNews(5),
		);
		$name = get_tpl('material');
		$this->template->frontend($name,$data);
	}


	public function search(){
		$q = $this->input->get('q');

		if(strlen($q) > 3){
			$data['result'] = $this->article_model->search($q);
			$name = get_tpl('search');
			$this->template->frontend($name,$data);
		}else{
			$data['result'] = 'false';
			$name = get_tpl('search');
			$this->template->frontend($name,$data);
		}
	}
	
	public function send(){
		$this->load->library('email');
		$config = array();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'webmail.nur-ota.uz';
		$config['smtp_user'] = 'yehjnf@nur-ota.uz';
		$config['smtp_pass'] = 'Yehjnf@2022';
		$config['smtp_port'] = 25;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');
		
		if($this->input->post('send')){
			$this->email->from($email, $name);
			$this->email->to('nurota@nv.uz');

			$this->email->subject($subject);
			$this->email->message("Murojaatchi: $name<br> Telefon: $phone<br><br> $message");

			if($this->email->send()){
				$this->session->set_flashdata("email_msg","Xabar yuborildi.");
				redirect($_SERVER['HTTP_REFERER']);
			}
			else{
				$this->session->set_flashdata("email_msg","Xabar yuborilmadi.");
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
		
	}
 

}
