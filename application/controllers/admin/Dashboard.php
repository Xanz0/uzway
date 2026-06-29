<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function index()
	{
		$data = array();
		$name = 'pages/dashboard';
		$this->template->admin($name,$data);
	}

	
}
