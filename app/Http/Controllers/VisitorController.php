<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\Visitor;
use App\Models\User;
use Auth;
use Session;
use Mail;
use App\Mail\NewMeetingNotification;

class VisitorController extends Controller
{

     public function __construct() {
        $this->middleware('auth',['except' => ['selfcheckIn']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index()
    {
        // $visitors = Visitor::orderBy('idVisitor', 'desc')->paginate(10);
        // return view('visitors.create')->withVisitors($visitors);
    }

      /**
     * Show the form for creating a new externalvisitor.
     *
     * @return \Illuminate\Http\Response
     */
    public function createExternalVisitor($id)
    {
        $meeting = Meeting::findOrFail($id);
        
        return view('externalVisitors.create', compact('meeting'));


        
        }       
       /**
     * Show the form for creating to add a new internal visitor.
     *
     * @return \Illuminate\Http\Response
     */
    public function addInternalVisitor($i)
    {    
        $id=Auth::user()->idUser;

        $users= User::where('idUser', '!=', $id)->get();

        $meetingRestricted=Meeting::findOrFail($i);


        //Variable $meetings for the view to add internal visitors for any meeting
        $meetings=Meeting::where('meetStatus', '=', 1)->get();
        
        return view('internalVisitors.create', compact('meetings', 'users', 'meetingRestricted'));
        
        

        
        }  

        /**
     * Add the internal visitor to the meeting.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeInternalVisitor(Request $request)

    {   $user = User::find($request->internalVisitor);

        $meetingData = Meeting::find($request->meeting);


        if($user->meetings->contains($meetingData)){
    
        Session::flash('danger','This visitor could not be assigned. Duplicate entry!');
        return redirect()->back();


        }
        else{

         $save=$meetingData->user()->save($user);

        if($save){

        if($meetingData->email=='1')
        {
           if(Mail::to($user->email)->send(new NewMeetingNotification($meetingData, $user))){
            Session::flash('success','The email was sent!');

           } else{
            Session::flash('danger','The email was not sent!');
           }
        }
            

           
            
        }
        Session::flash('success','The internal visitor was assigned to the meeting, with success!');

        return view('meetings.show', compact('meetingData'));
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
        $externalVisitor = Visitor::findOrFail($id);
    

        return view('externalVisitors.badge', compact('externalVisitor') ) ;  
        
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function badge($id)
    {
        $externalVisitor = Visitor::findOrFail($id);
        
    

        return view('externalVisitors.badge', compact('externalVisitor') ) ;  
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        
        $externalVisitor = Visitor::findOrFail($id);

    

        return view('externalVisitors.edit', compact('externalVisitor') ) ;   


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
        //
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $visitors = new Visitor();
        $meet = Meeting::find($request->idMeeting);
    

        $visitors->visitorName=$request->visitorName;
        $visitors->visitorCitizenCard=$request->visitorCitizenCard;
        $visitors->visitorCitizenCardType=$request->visitorCitizenCardType;
        $visitors->visitorNPhone=$request->visitorNPhone;
        $visitors->visitorEmail=$request->visitorEmail;
        $visitors->visitorDangerousGood=$request->visitorDangerousGood;
        $visitors->wifiAcess=$request->wifiAccess;
        $visitors->visitorDeclaredGood=$request->visitorDeclaredGood;
        $visitors->escorted=$request->escorted;
        $visitors->visitorCompanyName=$request->visitorCompanyName;
        
       
       if ($visitors->save()) {
            # code...
             
        if ($visitors->meeting->contains($meet))
        {

     
        return redirect()->back()->with('warning', 'This Visitor could not be assigned. Duplicate entry!');

        } else {


        $save=$visitors->meeting()->save($meet);

        if($save){

        if($meet->email=='1')
        {
            Mail::to($visitors->visitorEmail)->send(new NewMeetingNotification($meet, $visitors));
        }
            

       
         return redirect()->route('visitors.addInternalVisitor', $meet->idMeeting)->with('success','External Visitor was successfully created');
        } 


         
           
             }

              }else{


            return redirect()->back()->with('warning', 'This Visitor could not be assigned.');

              }   

        
        
        }


      public function  selfcheckIn (){

        return view('externalVisitors.selfCheckIn');



      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    

}
