<?php defined('BASEPATH') OR exit('No direct script access allowed');

function get_tpl($tpl){

	$file = APPPATH."/views/public/tpl/$tpl.php";

	if( file_exists($file) ){
		return 'tpl/'.$tpl;
	}else{
		redirect(LANG_URL.'/error_404');
	}


}

function get_leaders_image($img){
	preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $img, $image);
	if(isset($image['src'])){
		return base_url($image['src']);
	}
}

function get_thumb($img){

	preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $img, $image);
	if(isset($image['src'])){
    	return base_url(str_replace('photo/','thumbs/',$image['src']));
	}else{
		return base_url('assets/no-image.png');
	}

}

function get_photo($img, $cat=null){

	preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $img, $image);
	if(isset($image['src'])){
		return base_url($image['src']);
	}else{
		return base_url('assets/no-image.png');
	}

}

function get_photo_news($img){

	preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $img, $image);
	if(isset($image['src'])){

		if(LANG_URL == 'en'){
            return $image['src'];
        }else{
            return 'http://pressangmk.uz/'.$image['src'];
        }

	}else{
		return base_url('assets/no-image.png');
	}

}


function gallery($img){

	preg_match_all( '@src="([^"]+)"@' , $img, $image);

	$src = array_pop($image);

	for ($i=0; $i <= count($src); $i++) {
		return $src;
	}

}

function photo_settings($src){

	$name = pathinfo($src);
	$dirname = explode('/',$src);

	$set = array(
		'thumb' => str_replace('/photo/','/thumbs/',$src),
		'name' => $name['filename'],
		'alias' => $dirname[5]
	);
	return $set;
}

function video_settings($src){

	$name = pathinfo($src);

	$set = array(
		'name' => $name['filename']
	);
	return $set;
}

function remove_first_image($string){
	return preg_replace('/<img(.*)>/i','',$string,1);
}

function settings(){
	$ci =& get_instance();

	return $ci->db->where('lang','uz')
			  ->get('settings')
			  ->row();
}
 
function dashboard_cnt($table){
	$ci =& get_instance();

	return $ci->db->group_by('id_key')
				  ->count_all_results($table);
}

function dashboard_views(){
	$ci =& get_instance();

	$q = $ci->db->query("SELECT sum(views) as cnt from article_settings");

	return $q->row()->cnt;
}
