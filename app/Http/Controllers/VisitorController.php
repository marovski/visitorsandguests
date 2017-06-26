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
        $this->middleware('auth');
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
    public function create()
    {
        
        return view('externalVisitors.create');


        
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
    public function saveInternalVisitor(Request $request)

    {   $user = User::find($request->internalVisitor);
        $meet = Meeting::find($request->meeting);


        if($user->meetings->contains($meet)){
    
        return redirect()->back()->with('warning','This Visitor could not be assigned. Duplicate entry!');
        }else{

         $save=$user->meetings()->save($meet);

        if($save){

        if($meet->email=='1')
        {
            Mail::to($user->email)->send(new NewMeetingNotification($meet, $user));
        }
            

            Session::flash('success','Visitor was successfully created');
            return view('meetings.show')->withMeeting(($meet->idMeeting));
        } 
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
        //
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
        $meet = Meeting::find($request->meeting);
    

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
        
       
        $visitors->save();
     
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
            

       
         return view('internalVisitors.create', compact('meet'));

        } 


         
           
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
        //
    }


    

}
