<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification
{
	public function send($nrc,$to,$cc,$attach)
	{
		$ci =& get_instance ();

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = '172.16.0.21';
		$config['smtp_port'] = '25';

		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['newline'] = "\r\n";
		$config['wrapchars'] = 200;
		$config['priority'] = 1;

		$ci->email->initialize($config);


		$message = "<p>{$nrc}</p>";

		$subject = "Выдача архивных справок";
		$title = $this->_mail_encode('Выдача архивных справок','utf-8');

		$ci->email->from('info@ngmk.uz',$title);
		$ci->email->to($to);
		$ci->email->cc($cc);
		$ci->email->subject($subject);
		$ci->email->attach($attach);
		$ci->email->message($message);
		$ci->email->send();


	}

	public function _mail_encode($text, $encoding) {
		$result = "=?".$encoding."?b?".base64_encode($text)."?=";
		return $result;
	}

}
?>
