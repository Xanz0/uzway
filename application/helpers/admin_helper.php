<?php defined('BASEPATH') OR exit('No direct script access allowed');

function lang_tab_selected_active($value)
{
	if($value == 1){
		$selected = 'true';
		$active = 'show active';
	}else{
		$selected = 'false';
		$active = '';
	}

	$R = Array(
		'selected' => $selected,
		'active' => $active
	);

	return $R;
}

function lang_icon($value)
{
	if($value == 'en'){
        $icon = 'gb';
  	}else{
        $icon = $value;
    }

    return $icon;
}

function cat_parent($id,$title){
	$ci =& get_instance();

	if($id == 0){
		return $title;
	}else{

		if($id != 9999){
			$R = $ci->db->where('id_key',$id)
						->where('lang','ru')
						->get('menus');

			return $R->row()->title;
		}
		
	}
}

function switcher($var,$key){
	switch($var){
		case 1:
			$check = 'checked="checked"';
			$val = '1';
		break;
		case 0:
			$check = '';
			$val = '0';
		break;
	}

	$checkbox = '<label class="switch-x">
		          <input name="act_deact[]" class="act_deact" type="checkbox" value="'.@$val.'" data-xkey="'.$key.'" '.@$check.'>
		          <span class="slider-x round"></span>
		        </label>';

    return $checkbox;
}

function alias($str)
{
    $str = str_replace('а', 'a', $str);
	$str = str_replace('б', 'b', $str);
	$str = str_replace('в', 'v', $str);
	$str = str_replace('г', 'g', $str);
	$str = str_replace('д', 'd', $str);
	$str = str_replace('е', 'e', $str);
	$str = str_replace('ё', 'yo', $str);
	$str = str_replace('ж', 'j', $str);
	$str = str_replace('з', 'z', $str);
	$str = str_replace('и', 'i', $str);
	$str = str_replace('й', 'i', $str);
	$str = str_replace('к', 'k', $str);
	$str = str_replace('л', 'l', $str);
	$str = str_replace('м', 'm', $str);
	$str = str_replace('н', 'n', $str);
	$str = str_replace('о', 'o', $str);
	$str = str_replace('п', 'p', $str);
	$str = str_replace('р', 'r', $str);
	$str = str_replace('с', 's', $str);
	$str = str_replace('т', 't', $str);
	$str = str_replace('у', 'u', $str);
	$str = str_replace('ф', 'f', $str);
	$str = str_replace('х', 'x', $str);
	$str = str_replace('ц', 'c', $str);
	$str = str_replace('ч', 'ch', $str);
	$str = str_replace('ш', 'sh', $str);
	$str = str_replace('щ', 'sh', $str);
	$str = str_replace('ъ', "`", $str);
	$str = str_replace('ь', '`', $str);
	$str = str_replace('ы', 'y', $str);
	$str = str_replace('э', 'e', $str);
	$str = str_replace('ю', 'yu', $str);
	$str = str_replace('я', 'ya', $str);
	
	$str = str_replace('А', 'A', $str);
	$str = str_replace('Б', 'B', $str);
	$str = str_replace('В', 'V', $str);
	$str = str_replace('Г', 'G', $str);
	$str = str_replace('Д', 'D', $str);
	$str = str_replace('Е', 'E', $str);
	$str = str_replace('Ё', 'YO', $str);
	$str = str_replace('Ж', 'J', $str);
	$str = str_replace('З', 'Z', $str);
	$str = str_replace('И', 'I', $str);
	$str = str_replace('Й', 'I', $str);
	$str = str_replace('К', 'K', $str);
	$str = str_replace('Л', 'L', $str);
	$str = str_replace('М', 'M', $str);
	$str = str_replace('Н', 'N', $str);
	$str = str_replace('О', 'O', $str);
	$str = str_replace('П', 'P', $str);
	$str = str_replace('Р', 'R', $str);
	$str = str_replace('С', 'S', $str);
	$str = str_replace('Т', 'T', $str);
	$str = str_replace('У', 'U', $str);
	$str = str_replace('Ф', 'F', $str);
	$str = str_replace('Х', 'X', $str);
	$str = str_replace('Ц', 'C', $str);
	$str = str_replace('Ч', 'Ch', $str);
	$str = str_replace('Ш', 'Sh', $str);
	$str = str_replace('Щ', 'Sh', $str);
	$str = str_replace('Ъ', '`', $str);
	$str = str_replace('Ь', '`', $str);
	$str = str_replace('Ы', 'Y', $str);
	$str = str_replace('Э', 'E', $str);
	$str = str_replace('Ю', 'Yu', $str);
	$str = str_replace('Я', 'Ya', $str);


	$str = str_replace('Ҳ', 'H', $str);
	$str = str_replace('ҳ', 'h', $str);
	$str = str_replace('Ғ', 'G', $str);
	$str = str_replace('ғ', 'g', $str);
	$str = str_replace('Қ', 'Q', $str);
	$str = str_replace('қ', 'q', $str);
	$str = str_replace('Ў', 'U', $str);
	$str = str_replace('ў', 'u', $str);
    
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
    $clean = strtolower(trim($clean, '-'));
    $clean = preg_replace("/[\/_|+ -]+/", '-', $clean);
    return $clean;
}  
?>