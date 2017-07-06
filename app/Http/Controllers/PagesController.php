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

		$userPhoto = User::all();
        
		$meetings = Meeting::orderBy('meetStartDate','asc')->paginate(10);

		$hostMeetings = Meeting::orderBy('meetStartDate','asc')->where('meetIdHost','=',$userId)->paginate(5);

		$delivers = Deliver::orderBy('deEntryTime','asc')->paginate(5);
		
		$lostItems = LostFound::orderBy('idLostFound','desc')->where('claimedDate', '=', null)->paginate(5);
	
		return view('pages.welcome', compact('lostItems','meetings','user','hostMeetings','userPhoto','delivers'));
	}

	public function getAbout(){
	
		return view('pages.about');
	}


	public function getContact(){
		return view('pages.contact');
	}






}