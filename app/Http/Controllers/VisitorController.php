<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\Visitor;
use App\Models\User;
use App\Http\Requests;
use Auth;
use Session;
use Mail;
use App\Mail\NewMeetingNotification;

class VisitorController extends Controller
{

     public function __construct() {
        $this->middleware('auth',['except' => ['selfcheckIn', 'show','selfSign']]);
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
        $user= User::all()->load('meetingHost');    

        return view('externalVisitors.badge', compact('externalVisitor','user') ) ;  
        
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
         // Validate the data
        $visitor = Visitor::find($id);

        if ($request->input('visitorEmail') == $visitor->visitorEmail) {
            $this->validate($request, array(
                'visitorName' => 'required|min:1|max:50|string',
               'visitorCompanyName' => 'required|min:4',
             
            ));
        } else {
        $this->validate($request, array(
                 'visitorName' => 'required|min:1|max:50|string',
                'visitorEmail' => 'required|email|max:255|unique:visitors,visitorEmail',
                'visitorCompanyName' => 'required|min:4',
            ));
        }

        if (empty($request->visitorCitizenCard)) {
            $visitor->visitorName=$request->visitorName;


        $visitor->visitorCitizenCard=$request->visitorCitizenCard;


        $visitor->visitorCitizenCardType=$request->visitorCitizenCardType;
        $visitor->visitorNPhone=$request->visitorNPhone;
        $visitor->visitorEmail=$request->visitorEmail;
        $visitor->visitorDangerousGood=$request->visitorDangerousGood;
        $visitor->wifiAcess=$request->wifiAccess;
        $visitor->visitorDeclaredGood=$request->visitorDeclaredGood;
        $visitor->escorted=$request->escorted;
        $visitor->visitorCompanyName=$request->visitorCompanyName;
        
       
       if ($visitor->save()) {
            # code...


            return redirect()->back()->with('success', 'This visitor' + $visitor->visitorName + 'information was updated!');

              }   
        else{

             return redirect()->back()->with('danger', 'This Visitor is already assigned! No duplicate entries allowed!');


        }
        }else{

        if (empty(Visitor::where('visitorCitizenCard', "LIKE", "%$request->visitorCitizenCard%")->get())) {

    
        $visitor->visitorName=$request->visitorName;


        $visitor->visitorCitizenCard=$request->visitorCitizenCard;


        $visitor->visitorCitizenCardType=$request->visitorCitizenCardType;
        $visitor->visitorNPhone=$request->visitorNPhone;
        $visitor->visitorEmail=$request->visitorEmail;
        $visitor->visitorDangerousGood=$request->visitorDangerousGood;
        $visitor->wifiAcess=$request->wifiAccess;
        $visitor->visitorDeclaredGood=$request->visitorDeclaredGood;
        $visitor->escorted=$request->escorted;
        $visitor->visitorCompanyName=$request->visitorCompanyName;
        
       
       if ($visitor->save()) {
            # code...


            return redirect()->back()->with('success', 'This visitor' + $visitor->$visitorName + 'information was updated!');

              }   
        else{

             return redirect()->back()->with('danger', 'This Visitor is already assigned! No duplicate entries allowed!');


        }
         } 
        }
    

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
                'visitorName' => 'required|min:1|max:50|string',
                'visitorEmail' => 'required|email|max:255',
            
            ]);  

        if (empty(Visitor::where('visitorCitizenCard', '=', $request->visitorCitizenCard)->where('visitorCitizenCard', '!=', null)->first())) {
            # code...
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
        
       
       if (!($visitors->meeting->contains($meet))) {
            # code...
             $v=$visitors->save();
        if (!$v)
        {

     
        return redirect()->back()->with('danger', 'This Visitor could not be assigned. Duplicate entry!');

        } else {


        $save=$visitors->meeting()->save($meet);

        if($save){

        if($meet->email=='1')
        {
            if(!(Mail::to($visitors->visitorEmail)->send(new NewMeetingNotification($meet, $visitors)))){

            return redirect()->route('meetings.show', $request->idMeeting)->with('success', 'The Visitor was assigned but the email was not sent.');

              

                }
 
               

            

            /*Nexmo::message()->send([
            'to' => '351918064359 ',
            'from' => '351918064359 ',
            'text' => 'Using the instance to send a message.'
]);*/
        }
            

       
         return redirect()->route('visitors.addInternalVisitor', $meet->idMeeting)->with('success','External Visitor was successfully created');
        } 


         
           
             }

              }else{


            return redirect()->back()->with('danger', 'This Visitor could not be assigned.');

              }   
        }else{

             return redirect()->back()->with('danger', 'This Visitor is already assigned! No duplicate entries allowed!');


        }
        

        
        
        }


      public function  selfcheckIn (){

        return view('externalVisitors.selfCheckIn');



      }

       public function  selfSign (Request $request){

  $this->validate($request,[
                'visitorName' => 'required|min:1|max:50|string',
                'visitorEmail' => 'required|email|max:255|unique:visitors,visitorEmail',
                'visitorCompanyName' => 'required|min:4|string',
            
            ]); 


    $searchVisitor= Visitor::where('visitorEmail', '=', $request->visitorEmail)->where('visitorCompanyName','LIKE','%$request->visitorCompany%')->where('visitorName', 'LIKE', '%$request->visitorName%')->get();
  

      if (empty($searchVisitor)) {


       Session::flash('danger','The visitor is invalid');

        return redirect()->back();

      }else{

        
         $visitor=Visitor::where('visitorEmail', '=', $request->visitorEmail)->where('visitorCompanyName', '=', $request->visitorCompany)->first();

        Session::flash('success', 'The visitor is valid!');
        return redirect()->route('visitors.show', $visitor->idVisitor);
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
        
        Visitor::destroy($id);
        return redirect('/meetings');

    }


    

}
