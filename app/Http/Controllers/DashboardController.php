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


    $currentMonth = date('m');

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

     
    $currentMonth = date('m');

    $lostItems = LostFound::orderBy('idLostFound','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();

    $meetings = Meeting::orderBy('idMeeting','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();
    
    $visitors = Visitor::orderBy('idVisitor','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();
    
    $deliveries = Deliver::orderBy('idDeliver','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();
    
    $drops = Drop::orderBy('idDrop','desc')->whereRaw('MONTH(created_at) = ?',[$currentMonth]);
    
    $users = User::orderBy('idUser','desc');

    return view('charts.bar', compact('drops','visitors','deliveries','meetings','lostItems', 'users'));

    }
}
