<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Mail;
use App\includes\emailsender;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class ContactController extends Controller
{	 

	public function send_email(Request $request){   

			if($request->input('captcha') != '')
				$captcha = $request->input('captcha');
			else
				return response()->json(['status'=>'robot']);  

			if (emailsender::captcha_response($captcha) != false) { 

				$user_info = array( 
					'name'		=>	$request->input('name'), 
					'email'		=>	$request->input('email'),
					'subject'	=>	$request->input('subject'),
					'message'	=>	$request->input('message'), 
					'captcha'	=> 	$captcha
				);  

				$contact_us = new emailsender();

				$contact_us->send_email_message($user_info); 

			}
			else{
				return response()->json(['status'=>'robot']);  
			}

			return response()->json(['status'=>'not robot']); 
	} 

}