<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template
{ 

	public function intro($data)
	{		
		$CI =& get_instance();

		$CI->load->view('public/_parts/preheader', $data);
		$CI->load->view('public/_parts/header');
		$CI->load->view('public/_parts/slider');
        $CI->load->view('public/_parts/news');
        $CI->load->view('public/_parts/video');
        $CI->load->view('public/_parts/footer-page');
		$CI->load->view('public/_parts/footer-script');        
	} 

	public function frontend($name,$data)
	{
		$CI =& get_instance ();

		$CI->load->view('public/_parts/preheader', $data);
		$CI->load->view('public/_parts/header');
        $CI->load->view('public/'.$name);
        $CI->load->view('public/_parts/footer-page');
		$CI->load->view('public/_parts/footer-script');         
	}     

	public function error($name,$data = NULL){
		$CI =& get_instance ();

		$CI->load->view('public/preheader', $data);
		$CI->load->view('public/header');
        $CI->load->view('public/error/'.$name);		
		$CI->load->view('public/footer-page');	
		$CI->load->view('public/footer-script');  
	}

	public function login($data)
	{		
		$CI =& get_instance ();

		$CI->load->view('admin/preheader', $data);
        $CI->load->view('admin/login');	
		$CI->load->view('admin/footer');        
	}

	public function admin($name,$data)
	{
		$CI =& get_instance ();

		$CI->load->view('admin/preheader', $data);
		$CI->load->view('admin/header');
		$CI->load->view('admin/r_sidebar');
		$CI->load->view('admin/l_sidebar');
        $CI->load->view('admin/'.$name);	
		$CI->load->view('admin/footer');        
	}
}
?>