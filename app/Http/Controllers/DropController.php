<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drop;
use App\Models\DropItem;
use Auth;
use Session;
use Carbon\Carbon;


class DropController extends Controller
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
        $drops = Drop::orderBy('idDrop', 'desc')->paginate(6);
        return view('drops.index')->withDrops($drops);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('drops.create');
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
                'dropperCompany' => 'required|min:5|max:50|string',
                'dropperName' => 'required|min:5|max:50|string',
                'ReceiverName' => 'required|min:5|max:50|string',
                'dropItem' => 'required',
                'dropImportance' => 'required',
                'dropDescription' => 'required|min:2|max:255'
            ]);    
        $drop = new Drop();
        //$item = new DropItem();

        //$item->dropDescr=$request->dropDescription;
        //$save=$item->save();
       // if($save){

        $drop->dropperCompanyName=$request->dropperCompany;
        $drop->dropperName=$request->dropperName;
        $drop->droppedWhen=Carbon::now();
        $drop->dropReceiver=$request->ReceiverName;
        $drop->dropItem=$request->dropItem;
        $drop->dropImportance=$request->dropImportance;
        $drop->dropDescr=$request->dropDescription;
        $drop->dropidUser=Auth::user()->idUser;

        if($drop->save())
        {
            Session::flash('message','Drop was successfully created');
            return redirect()->route('drops.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkout($id)
    {
        
        $drop = Drop::find($id);
        return view('drops.checkOut')->withDrop($drop);
    }
       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idDrop=$id;
        $drop = Drop::find($idDrop);
        return view('drops.edit')->withDrop($drop);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idDrop=$id;
        $drop = Drop::find($idDrop);
        return view('drops.view')->withDrop($drop);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEdit(Request $request, $id)
    {
        $idDrop=$id;
        $drop = Drop::find($idDrop);
        
        $drop->dropperCompanyName=$request->dropperCompany;
        $drop->dropperName=$request->dropperName;
        $drop->dropReceiver=$request->ReceiverName;
        $drop->dropItem=$request->dropItem;
        $drop->dropImportance=$request->dropImportance;
        $drop->dropDescr=$request->dropDescription;
        $drop->dropidUser=Auth::user()->idUser;

        if($drop->save())
        {
            Session::flash('message','Drop was successfully edited');
            return redirect()->route('drops.index',$drop->idDrop);
            

        }
        
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
        $idDrop=$id;
        $drop = Drop::find($idDrop);
        
        $drop->dropReceivedDate=Carbon::now();
        $drop->save();
        Session::flash('message','Checkout was successfully done');
        

       return redirect()->route('drops.index',$drop->idDrop);
        
    }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /*public function updateCheckout(Request $request, $id)
    {
        $idDrop=$id;
        $drop = Drop::find($idDrop);

        $drop->dropReceivedDate=$request->receivedDate;
        $drop->save();
        Session::flash('message','Checkout was successfully done');
        

       return redirect()->route('drops.index',$drop->idDrop);
    }*/
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idDrop = $id;

        $drop = Drop::find($idDrop);
        if (!is_null($drop)) {
             $drop->delete();
        }

        Session::flash('message','Drop was successfully deleted');
        return redirect()->route('drops.index',$drop->idDrop);
        //
    }
/*
    public function delete($id)
    {
        $drop = Drop::find($idDrop);
        return view('drop.delete')->withDeliver($drop);
    }
*/
}
