<?php

namespace App\Http\Controllers;
use App\Models\Meeting;

class PagesController extends Controller{

	public function getIndex() {
		$meetings = Meeting::all();
		
		return view('pages.welcome')->withMeetings($meetings);
	}

	public function getAbout(){
		$first = 'Mário';
		$second = 'Cardoso';
		$full= $first . " ". $second;
		$email='ada@g';
		return view('pages.about')->withFullname($full)->withEmail($email);
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