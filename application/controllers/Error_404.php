<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_404 extends MY_Controller {

	public function index()
	{
		$data = array();
		$name = '404';
		$this->template->error($name,$data);
	}
	
}
