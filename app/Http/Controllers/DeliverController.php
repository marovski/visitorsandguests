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
        $delivers = Deliver::orderBy('idDeliver', 'asc')->paginate(6);
        return view('delivers.index')->withDelivers($delivers);
    }

    public function indexJSON()
    {
        return response()->json(Deliver::get());
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

 Session::flash('warning', 'The Deliver was not created successfully!');

     return redirect()->route('delivers.create');

}

 
}

  /**
     * Update the specified resource in storage.
     *
  
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkOut($id) 
    {
        
        $deliver = Deliver::findOrFail($id);

  
        $time=Carbon::now('Europe/Lisbon');

        $exitweight=$deliver->exitWeight;

        $exittime=$deliver->deExitTime;

        if (empty($exittime)) {

        $deliver->deExitTime=$time;

        $save=$deliver->save();
        
        if ($save) {
            return response()->json(array('success'=>true));
        }
        else
            { 

                return response()->json(['success'=>false]);
            }
        
                                                    }

        else{

             return response()->json(['success'=>false]);
        }
                
            
               
             



        }

 /**
     * Update the exit weight value of the delivery.
     *
  
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function exitWeight($id, $x) 
    {
        
        $deliver = Deliver::findOrFail($id);

        $exitweight=$deliver->exitWeight;
    
        if (empty($exitweight)){

         $deliver->exitWeight=$x;


        $save=$deliver->save();
        if ($save) {

        return response()->json(array('success'=>true));
         }
        }
        else{


          return response()->json(['success'=>false]);

        }
    

     

        
        
   

}


    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
 
    public function showDeliver($id)
    {
    

        

        $response = ['status' =>'success', 'url' => '/delivers/'. $id];

        return response()->json($response);

       
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
