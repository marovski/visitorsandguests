<?php

namespace App\Http\Controllers;

//Requiring the Needed Services
use Illuminate\Http\Request;
use Auth;
use Session;
use Image;
use Carbon\Carbon;

//Requiring the Needed Models
use App\Http\Requests;
use App\Models\Deliver;
use App\Models\DeliverType;




class DeliverController extends Controller
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
        $delivers = Deliver::orderBy('idDeliver', 'desc')->paginate(10);
        return view('delivers.index')->withDelivers($delivers);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('delivers.create');
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //validate data
       $this->validate($request,[
                'driverName' => 'required|min:1|max:50|string',
                'driverID' => 'required|min:1|max:20|string',
                'vehicleLicensePlate' => 'required|min:1|max:30|string',
                
            ]);    
        

    
        //creating the models
      $deliver=new Deliver;

      $type=new DeliverType;

      $type->dangerousGood=$request->danger;
      $type->quantitity=$request->quantity;
      $type->sensitiveLevel=$request->sensitivity;
      $type->materialDetails=$request->cargo;

 
     $deliver->deDriverName=$request->driverName;
     $deliver->deDriverID=$request->driverID;
     
     $deliver->vehicleRegistry=$request->vehicleLicensePlate;
   
     $deliver->entryWeight=$request->weight;
     $deliver->deFirmSupplier=$request->firm;

     $deliver->deEntryTime=Carbon::now('Europe/Lisbon');
     
   
     $deliver->deIdUser=Auth::user()->idUser;


//Save Photos
     if ($request->hasFile('image')) {
      $image = $request->file('image');
      $filename = time() . '.' . $image->getClientOriginalExtension();
      $location = public_path('images/' . $filename);

      Image::make($image)->resize(800, 400)->save($location);

      $deliver->image = $filename;
  }
   
    //store data to delivers table and deliver type table

    $saveDeliver= $deliver->save();
    $saveDeliverType=$deliver->type()->save($type);

    if ($saveDeliver && $saveDeliverType) {

     Session::flash('success', 'The Deliver was created successfully!');
     return redirect()->route('delivers.show',$deliver->idDeliver);

}else{

 Session::flash('danger', 'The Deliver was not created successfully!');

     return redirect()->route('delivers.create');

}

 
}



   
  
/**
     * Return the specified resource using JSON
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $deliver = Deliver::findOrFail($id);

        return view('delivers.show')->withDeliver($deliver);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $deliveryData = Deliver::findOrFail($id);
      

        return view('delivers.edit', compact('deliveryData') ) ;   


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
        
        $deliver = Deliver::findOrFail($id);
        
     $deliver->deDriverName=$request->driverName;
     
     $deliver->vehicleRegistry=$request->vehicleLicensePlate;
   
     $deliver->entryWeight=$request->weight;
     $deliver->exitWeight=$request->exitweight;
     $deliver->deFirmSupplier=$request->firm;

     // $deliver->deEntryTime=$request->deEntryTime;
     
     $deliver->deExitTime=$request->deExitTime;
     

     if ($request->hasFile('image')) {
      $image = $request->file('image');
      $filename = time() . '.' . $image->getClientOriginalExtension();
      $location = public_path('images/' . $filename);
      Image::make($image)->resize(600, 300)->save($location);

      $deliver->image = $filename;
  }
   
    //store data to delivers table and deliver type table

    $saveDeliver= $deliver->save();

    if ($saveDeliver) {

     
        // set flash data with success message
        Session::flash('success', 'This delivery was successfully saved.');

        // redirect with flash data to delivers.show
         return view('delivers.show')->withDeliver($deliver);

    }
    else{
        // set flash data with success message
        Session::flash('warning', 'This delivery was not successfully saved.');

        // redirect with flash data to delivers.show
        return redirect()->route('delivers.edit',$deliver->idDeliver);

    }

 
      
    }

  /**
     * Display the specified resource.
     *
  
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCheckOut($id) 
    {
        
        
             $deliver= Deliver::findOrFail($id);

             return view('delivers.checkout', compact('deliver'));



        }



        public function checkoutUpdate(Request $request, $id){



        $deliver = Deliver::findOrFail($id);

        //GEt local Time
        $time=Carbon::now('Europe/Lisbon');

        $exittime=$deliver->deExitTime;

        //Get value from the database and check if it's empty or not
        $exitweight=$deliver->exitWeight;

//CHeck if the field is empty or not
        if (empty($exittime)) {

            $deliver->exitWeight=$request->exitweight;
//Save it to the model/database
        $deliver->deExitTime=$time;

        $save=$deliver->save();
        
        if ($save) {
              // set flash data with success message
        Session::flash('success', 'The Check-out process was successfully done.');
           // redirect with flash data to delivers.show
         return view('delivers.show')->withDeliver($deliver);
        }
        else
            { 

             // set flash data with success message
        Session::flash('danger', 'The Check-out process not successfully saved.');
           // redirect with flash data to delivers.show
         return redirect()->route('delivers.index');
            }
        
                                                    }

                                                    else{
         // set flash data with success message
        Session::flash('danger', 'The Check-out process was already done!');
           // redirect with flash data to delivers.show
         return redirect()->route('delivers.index');

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

      public function delete($id)
    {
        $deliver = Deliver::find($idDeliver);
        return view('deliver.delete')->withDeliver($deliver);
    }
}
