<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\Visitor;
use App\Models\User;
use Session;
use Auth;
use Mail;
use Carbon\Carbon;
use App\Mail\NewMeetingNotification;




class MeetingController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function index()
    {

        $userId = Auth::id();
        $userAuth = User::find($userId);

        $meetings = Meeting::orderBy('idMeeting', 'desc')->where('deleteFlag', '=', 0)->paginate(10);

        $meetingsStaff = Meeting::orderBy('meetStartDate', 'desc')->where('meetIdHost', '=', Auth::user()->idUser)->paginate(10);

        $user= User::all()->load('meetingHost');

       
        $visitor=Visitor::all()->load('meeting');
   

        

        if (Auth::user()->role()==true) {
            return view('meetingsSecurityView.index', compact('meetings', 'user', 'visitor'));
        }
        else
        return view('meetings.index', compact('meetingsStaff', 'user', 'visitor', 'userAuth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meetings= Meeting::orderBy('meetStartDate', 'asc')->where('meetIdHost','=', Auth::user()->idUser)->paginate(5);



       return view('meetings.create', compact('meetings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
                
                'meetingTopic'=> 'required|max:50|string',
                'visitReason' => 'required|max:200|string',
            ]);    
        
        //Saving Meeting
        $meeting=new Meeting();

       
        
        $meeting->meetStartDate=$request->meetStartDate;
        $meeting->room=$request->room;
        $meeting->confidentiality=$request->confidentiality;
        $meeting->sensibility=$request->sensibility;
        $meeting->meetStatus=$request->meetStatus;
        $meeting->visitReason=$request->visitReason;
      
        $meeting->meetEndDate=$request->meetEndDate;
        $meeting->meetingName=$request->meetingTopic;
        $meeting->email=$request->sendmail;

        

      Auth::user()->meetingHost()->save($meeting);



        
       if($meeting->save())
        {

            Session::flash('success','Meeting was successfully created');

                return view('externalVisitors.create', compact('meeting'));

        

        }else{

            Session::flash('danger','Meeting was not created successfully');

                return redirect()->route('meetings.create');


        }

            
        
        
         }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meetingData = Meeting::findOrFail($id);

        if(Auth::user()->role()==true){

        return view('meetingsSecurityView.show', compact('meetingData') ) ;

        }
       return view('meetings.show', compact('meetingData') ); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meetingData = Meeting::findOrFail($id);


        $host=User::where('idUser', $meetingData->meetIdHost)->first();

        return view('meetings.edit', compact('meetingData', 'host') ) ;   

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   


         $this->validate($request,[
                
                'meetingTopic'=> 'max:50',
                'visitReason' => 'max:200',
            ]);  
        //Saving Meeting
        $meeting = Meeting::find($id);

        
        $meeting->meetStartDate=$request->meetStartDate;
        $meeting->room=$request->room;
        $meeting->confidentiality=$request->confidentiality;
        $meeting->sensibility=$request->sensibility;
        $meeting->meetStatus=$request->meetStatus;
        $meeting->visitReason=$request->visitReason;
        $meeting->meetIdHost=Auth::user()->idUser;
        $meeting->meetEndDate=$request->meetEndDate;
        $meeting->meetingName=$request->meetingTopic;
        $meeting->email=$request->sendmail;

        
        
       if($meeting->save())
        {

            Session::flash('success','Meeting was successfully edited');

                return redirect()->route('meetings.show', $meeting->idMeeting);

        

        }else{

            Session::flash('danger','Meeting was not edited successfully!');

                return redirect()->route('meetings.index');


        }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
        {
            

        $meeting = Meeting::find($id);
        if ($meeting->deleteFlag==0) {
            $meeting->deleteFlag=1;
            foreach ($meeting->visitor as $visitors) {

                $visitors->deleteFlag=1;
                $visitor->save();
            }
            $meeting->save();
             Session::flash('success','Meeting was successfully deleted!');
        return redirect()->route('meetings.index');
        }
        else{

             Session::flash('danger','Meeting was already erased!');
        return redirect()->route('meetings.index');
        }

       
        //


    }


    public function checkin($id){


        $currentMeeting= Meeting::findOrFail($id);


      
       if (empty($currentMeeting->entryTime)) {
           $currentMeeting->entryTime = Carbon::now('Europe/Lisbon');
            $currentMeeting->meetStatus=2;
        if ($currentMeeting->save()) {


        Session::flash('success','The meeting check-in was successfully done! The visitor as arrived!');
        
        return redirect()->back();
        
        }else{

        Session::flash('danger','The meeting check-in process found an error!');
        
        return redirect()->back();


        }



         }else{

        Session::flash('danger','The meeting check-in is already done! The meeting as already started!');
        
        return redirect()->back();

         }


    }



    public function checkout($id){
        
    

        $currentMeeting= Meeting::findOrFail($id);

         if (empty($currentMeeting->exitTime)) {
           $currentMeeting->exitTime = Carbon::now('Europe/Lisbon');
           $currentMeeting->meetStatus=4;

         
            foreach ($currentMeeting->visitor as $visitor) {
               

                $visitor->signOutFlag=1;

                $visitor->save();
            }
          



        if ($currentMeeting->save()) {


        Session::flash('success','The meeting check-out was successfully done! The meeting is finished!');
        
        return redirect()->back();
        
        }else{

        Session::flash('danger','The meeting check-out process found an error!');
        
        return redirect()->back();


        }



         }else{

        Session::flash('danger','The meeting check-out is already done! The meeting as ended!');
        
        return redirect()->back();

         }

        

    }
}
