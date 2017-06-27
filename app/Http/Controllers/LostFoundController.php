<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LostFound;
use Auth;
use Session;
use Carbon\Carbon;

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

        $lost->lostFoundFinder=$request->finderName;
        $lost->finderPhone=$request->finderPhone;
        $lost->lostFoundItemSize=$request->lostFoundItemSize;
        $lost->lostFoundImportance=$request->lostFoundImportance;
        $lost->lostFoundDescr=$request->lostFoundDescription;
        $lost->lostFoundIdUser=Auth::user()->idUser;

        if($lost->save())
        {
            Session::flash('message','Lost and Found was successfully registed');
            return redirect()->route('losts.index',$lost->idLostFound);

        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        
        $lost->lostFoundReceiver=$request->lostFoundReceiver;
        $lost->receiverPhone=$request->lostFoundReceiver;
        $lost->lostFoundReceivedDate=Carbon::now();
        $lost->save();
        Session::flash('message','Checkout was successfully done');
        

       return redirect()->route('losts.index',$lost->idLostFound);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LostFound  $lostFound
     * @return \Illuminate\Http\Response
     */
    public function destroy(LostFound $lostFound)
    {
        $idLostFound = $id;
        $lost = LostFound::find($idLostFound);
        if (!is_null($lost)) {
             $lost->delete();
        }

        Session::flash('message','Drop was successfully deleted');
        return redirect()->route('losts.index',$lost->idLostFound);
        //
    }
}
