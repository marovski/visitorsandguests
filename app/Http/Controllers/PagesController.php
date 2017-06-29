<?php

namespace App\Http\Controllers;
use App\Models\LostFound;
use App\Models\Visitor;
use App\Models\Meeting;
use App\Models\Drop;
use App\Models\Deliver;
use App\Models\User;

use Session;
use Mail;

class PagesController extends Controller{

	public function getIndex() {


		$lostItems = LostFound::orderBy('idLostFound','desc')->where('claimedDate', '=', null)->paginate(6);
	
		return view('pages.welcome', compact('lostItems'));
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
			$message->to('cardozo27cv@gmail.com');
			$message->subject($data['subject']);
		})){


			Session::flash('sucess', 'Email successfully sended!');
			return redirect('/');
		}
		else{

			Session::flash('danger', 'Email was not sent! Try again!');
		}

		

		
	}


	public function getDashboard(){
	$currentMonth = date('m');
	$lostItems = LostFound::orderBy('idLostFound','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();
	$meetings = Meeting::orderBy('idMeeting','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();
	$visitors = Visitor::orderBy('idVisitor','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();
	$deliveries = Deliver::orderBy('idDeliver','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();
	$drops = Drop::orderBy('idDrop','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth]);
	$users = User::orderBy('idUser','desc');

		return view('pages.dashboard', compact('drops','visitors','deliveries','meetings','lostItems', 'users'));
	}

}