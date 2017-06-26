<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;
use App\Mail\NewMeetingNotification;
use Auth;
use App\Models\Meeting;

class mailController extends Controller
{
    public function send()
    {   
/*
        $meetingData=Meeting::where('meetStatus', '=', 1)->orderBy('idMeeting', 'desc')->get();


        Mail::to(Auth::user()->email)->send(new NewMeetingNotification($meetingData));
        return redirect('/meetings');*/
    }
}
