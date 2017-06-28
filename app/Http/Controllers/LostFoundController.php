<?php

namespace App\Http\Controllers;

//Requiring the Needed Services
use Illuminate\Http\Request;
use Auth;
use Session;
use Image;
use Carbon\Carbon;


use App\Models\LostFound;

class LostFoundController extends Controller
{

    public $timestamps = false; 
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
        $losts = LostFound::orderBy('idLostFound', 'desc')->paginate(10);
        return view('losts.index')->withLosts($losts);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('losts.create');
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
        $lost = new LostFound();

        $lost->finderName=$request->finderName;
        $lost->finderPhone=$request->finderPhone;
        $lost->itemSize=$request->lostFoundItemSize;
        $lost->itemImportance=$request->lostFoundImportance;
        $lost->itemDescription=$request->lostFoundDescription;
        

        //Save Photos
     if ($request->hasFile('image')) {
      $image = $request->file('image');
      $filename = time() . '.' . $image->getClientOriginalExtension();
      $location = public_path('images/' . $filename);

      Image::make($image)->resize(800, 400)->save($location);

      $lost->photo = $filename;
  }
       
        
        //Associate relationship to insert the foreign key of the user that create the new entity.
         Auth::user()->losts()->save($lost);

        if($lost->save())
        {   
            
            Session::flash('success','Lost and Found report was successfully registed!');
            return redirect()->route('losts.index');

        }
        else{
         
             Session::flash('danger', 'The registration failed!');
            return redirect()->route('losts.index');
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkout($id)
    {
        $idLostFound=$id;
        $lost = LostFound::find($idLostFound);
        return view('losts.checkout')->withLost($lost);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LostFound  $lostFound
     * @return \Illuminate\Http\Response
     */
    public function edit(LostFound $lostFound)
    {
        //
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
        $idLostFound=$id;
        $lost = LostFound::find($idLostFound);     
        
         $lost->receiverName=$request->ReceiverName;
        $lost->receiverPhone=$request->finderPhone;
        $lost->claimedDate=Carbon::now();
        
        if ($lost->save()) {

            
            Session::flash('success','Lost item was successfully claimed!');
            return redirect()->route('losts.index');
        }else{


          
             Session::flash('danger', 'The claiming process failed!');
            return redirect()->route('losts.index');
        }


           
        

       return redirect()->route('losts.index',$lost->idLostFound);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LostFound  $lostFound
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idLostFound = $id;
        $lost = LostFound::find($idLostFound);
        if (!is_null($lost)) {
             $lost->delete();
        }

        Session::flash('success','Report was successfully deleted');

        
        return redirect()->route('losts.index');
        //
    }
}
