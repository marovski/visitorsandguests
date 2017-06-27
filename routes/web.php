<?php

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




	//Model Controllers 






Route::get('visitors/internalVisitor/{id}',array('as' => 'visitors.addInternalVisitor', 'uses' => 'VisitorController@addInternalVisitor'));

Route::post('visitors/storeInternalVisitor', array('as' => 'visitors.storeInternalVisitor', 'uses' => 'VisitorController@storeInternalVisitor'));


Route::get('visitors/createExternalVisitor/{id}',array('as' => 'visitors.createExternalVisitor', 'uses' => 'VisitorController@createExternalVisitor'));

Route::post('meetings/checkin/{id}', 'MeetingController@checkin');

Route::get('/meetings/{idMeeting}/checkin/', ['as' => 'meetings.checkin',
                                                        'uses' => 'MeetingController@checkin'
                                                        ]); 
Route::get('/meetings/{idMeeting}/checkout/', ['as' => 'meetings.checkout',
                                                        'uses' => 'MeetingController@checkout'
                                                        ]); 






Route::get('delivers/show/{id}', array('as' => 'delivers.showDeliver', 'uses' => 'DeliverController@showDeliver'));


Route::get('delivers/indexJ', 'DeliverController@indexJSON');

Route::put('delivers/checkOut/{id}', 'DeliverController@checkOut');
Route::put('delivers/checkOut/weight/{id}/{x}', 'DeliverController@exitWeight');



//Resources From The Controllers
Route::resource('visitors','VisitorController');
Route::resource('delivers','DeliverController');
Route::resource('deliveryType','DelivertypeController');


Route::get('/drops/{idDrop}/checkOut/', ['as' => 'drops.checkOut',
                                                        'uses' => 'DropController@checkout'
                                                        ]); 

Route::post('/drops/{idDrop}', ['as' => 'drops.updateEdit',
                                                        'uses' => 'DropController@updateEdit'
                                                        ]);
Route::get('/drops/edit/', ['as' => 'drops.edit',
                                                        'uses' => 'DropController@edit'
                                                        ]);
Route::get('/drops/{idDrop}/show/', ['as' => 'drops.show',
                                                        'uses' => 'DropController@show'
                                                        ]); 
Route::resource('drops','DropController');


Route::resource('meetings','MeetingController');

Route::resource('losts', 'LostFoundController');


//Initial Pages
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






