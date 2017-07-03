<?php

namespace App\Http\Controllers;
use App\Models\LostFound;
use App\Models\Visitor;
use App\Models\Meeting;
use App\Models\Drop;
use App\Models\Deliver;
use App\Models\User;
use Auth;

use Session;
use Mail;

class PagesController extends Controller{

	public function getIndex() {
		$userId = Auth::id();
        $user = User::find($userId);
        
		$meetings = Meeting::orderBy('meetStartDate','asc')->where('deleteFlag', '=', 0)->paginate(10);
		$meetingWithoutCheckin = Visitor::where('entryTime','=',null);

		$lostItems = LostFound::orderBy('idLostFound','desc')->where('claimedDate', '=', null)->paginate(6);
	
		return view('pages.welcome', compact('lostItems','meetings','user','meetingWithoutCheckin'));
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
			'message' => 'min:10',
			'g-recaptcha-response'=>'required|captcha']);

		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
			);

		if (Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('luismendes535@gmail.com');
			$message->subject($data['subject']);
		})){


			Session::flash('sucess', 'Email successfully sended!');
			return redirect('/');
		}
		else{

			Session::flash('danger', 'Email was not sent! Try again!');
		}

		

		
	}




}