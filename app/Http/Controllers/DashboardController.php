<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LostFound;
use App\Models\Visitor;
use App\Models\Meeting;
use App\Models\Drop;
use App\Models\Deliver;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDashboard(){


    $currentMonth = date('F');

    $lostItems = LostFound::orderBy('idLostFound','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();

    $meetings = Meeting::orderBy('idMeeting','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();
    
    $visitors = Visitor::orderBy('idVisitor','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();
    
    $deliveries = Deliver::orderBy('idDeliver','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();
    
    $drops = Drop::orderBy('idDrop','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth]);
    
    $users = User::orderBy('idUser','desc')->groupBy(function($item) {
    return $item->created_at->month;});

    
    return view('pages.dashboard', compact('drops','visitors','deliveries','meetings','lostItems', 'users'));
    }
 


    public function getBarChart(){

     
  

    return view('charts.bar');

    }

    public function barChartShow(Request $request){


    $input=$request->month;
    $date = "$request->month";
    $currentMonth=date("m", strtotime($date));


    $lostItems = LostFound::orderBy('idLostFound','desc')->whereRaw('MONTH(created_at)= ?',  [$currentMonth])->get();


    $meetings = Meeting::orderBy('idMeeting','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();
    
    $visitors = Visitor::orderBy('idVisitor','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();
    
    $deliveries = Deliver::orderBy('idDeliver','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();
    
    $drops = Drop::orderBy('idDrop','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth]);
    
    $users = User::orderBy('idUser','desc');

    return view('charts.bar', compact('drops','visitors','deliveries','meetings','lostItems', 'users', 'input'));

    }

    public function getTables(){
    
    $drops = Drop::orderBy('idDrop','desc')->paginate(10);
    $delivers = Deliver::orderBy('idDeliver','desc')->paginate(10);
    $lostItems = LostFound::orderBy('idLostFound','desc')->paginate();
    $meetings = Meeting::orderBy('idMeeting','desc')->paginate();

    return view('tables.table', compact('drops','visitors','delivers','meetings','lostItems'));

    }

    public function getDropsTable(){
    
    $drops = Drop::orderBy('idDrop','desc')->paginate(10);

    return view('tables.drops', compact('drops'));

    }

    public function getDeliversTable(){
    
    $delivers = Deliver::orderBy('idDeliver','desc')->paginate(10);
    
    return view('tables.delivers', compact('delivers'));

    }

    public function getLostItemsTable(){
    
    $losts = LostFound::orderBy('idLostFound','desc')->paginate();
    
    return view('tables.lostItems', compact('losts'));

    }

     public function getMeetingsTable(){
     $user= User::all()->load('meetingHost');
     $meetings = Meeting::orderBy('idMeeting','desc')->paginate();
    
    return view('tables.meetings', compact('meetings', 'user'));

    }
}

