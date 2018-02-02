<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Mail;
use App\includes\emailsender;

class ContactController extends Controller
{	 

	public function send_email(Request $request){ 

		$user_info = array( 
			'name'		=>	$request->input('name'), 
			'email'		=>	$request->input('email'),
			'subject'	=>	$request->input('subject'),
			'message'	=>	$request->input('message'), 
		);

		$contact_us = new emailsender();

		$contact_us->send_email_message($user_info); 

		return response()->json(['status'=>'Hello World']); 
	}

}