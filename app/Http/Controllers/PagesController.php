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

		
        
		$meetings = Meeting::orderBy('meetStartDate','asc')->paginate(10);

		$hostMeetings = Meeting::orderBy('meetStartDate','asc')->where('meetIdHost','=',$userId)->paginate(10);
		
		$lostItems = LostFound::orderBy('idLostFound','desc')->where('claimedDate', '=', null)->paginate(6);
	
		return view('pages.welcome', compact('lostItems','meetings','user','hostMeetings'));
	}

	public function getAbout(){
	
		return view('pages.about');
	}


	public function getContact(){
		return view('pages.contact');
	}






}