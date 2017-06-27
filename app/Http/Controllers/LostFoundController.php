<?php

namespace App\Http\Controllers;

use App\Models\LostsFound;
use Illuminate\Http\Request;

class LostFoundController extends Controller
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
        $losts = LostsFound::orderBy('id', 'asc')->paginate(6);
        return view('losts.index')->withDelivers($losts);
    }
     /**
     * Save a lost/found item.
     *
     * @return \Illuminate\Http\Response
     */
      public function store()
    {
  
    }
     /**
     * Display an lost/found item
     *
     * @return \Illuminate\Http\Response
     */
      public function show()
    {
 
    }
     /**
     * Updating an lost/found item
     *
     * @return \Illuminate\Http\Response
     */
      public function udpate()
    {
      
    }

    /**
     * Editing an lost/found item
     *
     * @return \Illuminate\Http\Response
     */
      public function edit()
    {
      
    }

}
