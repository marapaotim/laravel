<?php
namespace App\Includes;
use Mail;
class emailsender{
	public function send_email_message($userinfo = array()){

		\Config::set('mail.from.address', 'cmtest@igentechnologies.com');
                    \Config::set('mail.from.name', 'Test Sender');
                    \Config::set('mail.host', 'mail.igentechnologies.com');
                    \Config::set('mail.port', '587');
                    \Config::set('mail.username', 'cmtest@igentechnologies.com');
                    \Config::set('mail.password', '!p@ssw0rd1!');

        $this::user_message($userinfo);

        $this::auto_reply($userinfo);

	}

	public static function captcha_response($captcha = ''){

		$secret_key = '6LdXVEQUAAAAALDu5WlZhy0_D5WYcMakg8gE8KoG';

		return json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$captcha."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);

	}

	static function user_message($user_info = array()){

		$htmlBody = '';

		$htmlBody .= '<div class="container">';

		$htmlBody .= '<div class="page-title"> <h3>User Message</h3> </div>'; 

		$htmlBody .= '<p>' . 'Name: ' . $user_info['name'].'</p>';

		$htmlBody .= '<p>' . 'Email: ' . $user_info['email'].'</p>';

		$htmlBody .= '<p>' . 'Subject: ' . $user_info['subject'].'</p>';

		$htmlBody .= '<p>' . 'Message: ' . $user_info['message'].'</p>'; 

		$htmlBody .= '</div>'; 

		Mail::send([], [], function($message) use ($htmlBody){
                     $message->to('tipakshort123@gmail.com')->subject('User Message')
                     ->setBody($htmlBody, 'text/html');
                 }); 

	}

	static function auto_reply($user_info = array()){

		$useremail = $user_info['email'];

        $welcomeMessage = 'Thank you for contacting us, we will get back to you as soon as possible';

        Mail::send([], [], function($message) use ($welcomeMessage, $useremail){
                     $message->to($useremail)->subject('Auto Reply')
                     ->setBody($welcomeMessage, 'text/html');
                 });
	}
}