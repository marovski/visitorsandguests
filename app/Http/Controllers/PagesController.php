<?php

namespace App\Http\Controllers;
use App\Models\LostFound;

class PagesController extends Controller{

	public function getIndex() {
		$meetings = LostFound::all();
		
		return view('pages.welcome')->withMeetings($meetings);
	}

	public function getAbout(){
	
		return view('pages.about');
	}


	public function getContact(){
		return view('pages.contact');
	}

public function postContact(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10']);

		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
			);

		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('cardozo27cv@gmail.com');
			$message->subject($data['subject']);
		});

		

		return redirect('/');
	}


	public function getDashboard(){
		return view('pages.dashboard');
	}

}