<?php

use App\Http\Middleware\CheckAuth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['middleware' => ['web']], function () {

 
Route::get('search',array('as'=>'search','uses'=>'SearchController@search'));
Route::get('autocomplete/{id}',array('as'=>'autocomplete','uses'=>'SearchController@autocomplete'));


 Route::get('denied', array('as' => 'denied', function()
{
    return View::make('errors.401');
}) );


 Route::get('/dashboard/barcharts', array('as' => 'dashboard.barcharts', 'uses'=>'DashboardController@getBarChart'));
Route::get('/dashboard/tables', array('as' => 'dashboard.tables', 'uses'=>'DashboardController@getTables'));
Route::get('/dashboard/tables/drops', array('as' => 'dashboard.drops', 'uses'=>'DashboardController@getDropsTable'));
Route::get('/dashboard/tables/delivers', array('as' => 'dashboard.delivers', 'uses'=>'DashboardController@getDeliversTable'));
Route::get('/dashboard/tables/lostItems', array('as' => 'dashboard.lostItems', 'uses'=>'DashboardController@getLostItemsTable'));
Route::get('/dashboard/tables/meetings', array('as' => 'dashboard.meetings', 'uses'=>'DashboardController@getMeetingsTable'));

Route::get('/dashboard/barcharts/show', array('as' => 'barChart.show', 'uses'=>'DashboardController@barChartShow'));

//Extra methods beyond CRUD for Visitor Functionalities

Route::post('/visitors/selfSign', array('as' => 'visitors.selfSign','uses'=>'VisitorController@selfSign' ));

Route::get('/visitors/internalVisitor/{id}',array('as' => 'visitors.addInternalVisitor', 'uses' => 'VisitorController@addInternalVisitor'))->middleware('CheckAuth');

Route::post('/visitors/storeInternalVisitor', array('as' => 'visitors.storeInternalVisitor', 'uses' => 'VisitorController@storeInternalVisitor'));


Route::get('/visitors/createExternalVisitor/{id}',array('as' => 'visitors.createExternalVisitor', 'uses' => 'VisitorController@createExternalVisitor'))->middleware('CheckAuth');

Route::get('/visitors/selfcheckIn',array('as' => 'visitors.selfcheckIn', 'uses' => 'VisitorController@selfcheckIn'));




//Extra methods beyond CRUD for Meeting Functionalities



Route::post('/meetings/checkin/{id}', ['as' => 'meetings.checkin',
                                                        'uses' => 'MeetingController@checkin'
                                                        ]); 
Route::post('/meetings/checkout/{id}', ['as' => 'meetings.checkout',
                                                        'uses' => 'MeetingController@checkout'
                                                        ]); 




//Extra methods beyond CRUD for Delivery Functionalities




Route::get('/delivers/checkOut/{id}', ['as' => 'delivers.checkout',
                                                        'uses' => 'DeliverController@showCheckOut'
                                                        ]);

Route::post('/delivers/checkOut/update/{id}', ['as' => 'delivers.checkoutUpdate',
                                                        'uses' => 'DeliverController@checkoutUpdate'
                                                        ]);



//Extra methods beyond CRUD for Drop Functionalities

Route::get('/drops/{idDrop}/checkOut/', ['as' => 'drops.checkOut',
                                                        'uses' => 'DropController@checkout'
                                                        ]); 

Route::put('/drops/{idDrop}', ['as' => 'drops.updateEdit',
                                                        'uses' => 'DropController@updateEdit'
                                                        ]);

Route::put('/drops/Checkout/Update/{idDrop}', ['as' => 'drops.updateCheckOut',
                                                        'uses' => 'DropController@updateCheckOut'
                                                        ]);


Route::get('/drops/{idDrop}/show/', ['as' => 'drops.show',
                                                        'uses' => 'DropController@show'
                                                        ]); 
Route::resource('drops','DropController');


//Extra methods beyond CRUD for Lost and Found Functionalities

Route::get('/losts/{id}/checkOut/', ['as' => 'losts.checkout',
                                                        'uses' => 'LostFoundController@checkout'
                                                        ]); 



Route::get('meetings/create',['as' => 'meetings.create', 'uses' =>'MeetingController@create'])->middleware('CheckAuth');
//Resources From The Controllers
Route::resource('visitors','VisitorController');
Route::resource('delivers','DeliverController');
Route::resource('deliveryType','DelivertypeController');
Route::resource('losts', 'LostFoundController');
Route::resource('meetings','MeetingController');

//Initial Pages
Route::get('dashboard', 'DashboardController@getDashboard');
Route::get('contact', 'PagesController@getContact');
Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');



//Send Mail Route
Route::get('/email','mailController@send')->name('sendEmail');




//Authentication Routes
Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);


});






