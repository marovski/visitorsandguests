<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

use App\Models\Deliver;
use App\Models\DeliverType;

class DelivertypeController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
      
        $item= DeliverType::findOrFail($id);

        return view('deliveryType.edit', compact( 'item') ) ;   

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
        $item=DeliverType::findOrFail($id);
        $deliver=Deliver::where('idDeliver', '=',$item->deliver_idDeliver)->firstOrFail();

        $item->quantity=$request->quantity;
        $item->sensitiveLevel=$request->sensitivity;
        $item->dangerousGood=$request->danger;

        $item->materialDetails=$request->cargo;


        if($item->deliver()->associate($deliver)){

            if ($item->save()) {
              
                Session::flash('success', 'Deliver item successfully edited!');

              return redirect()->route('delivers.show', $item->deliver_idDeliver);
            }
            Session::flash('danger', 'Deliver item was not successfully edited!');
            return redirect()->back();
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
        $item=DeliverType::findOrFail($id);


        if ($item->delete()) {
            Session::flash('success', 'The deliver item was successfully deleted!');
            return redirect()->route('delivers.show', $item->deliver_idDeliver);
        }
        else{

              Session::flash('danger', 'Deliver item was not successfully deleted!');
            return redirect()->back();
        }
    }
}
