<?php

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');


Route::resource('posts','PostsController');
//Route::get('/index','ManagementsController@index');

Auth::routes();

Route::get('/home','HomeController@index');

// Route::get('/admin', function(){
//     return view('admin');
// })->name('adminpage');

// Route::get('admin-login','Auth\AdminLoginController@showLoginForm');
// Route::post('admin-login', ['as' => 'admin-login', 'uses' => 'Auth\AdminLoginController@login']);

//Route::get('admin-register','Auth\AdminLoginController@showRegisterPage');
//Route::post('admin-register', 'Auth\AdminLoginController@register')->name('admin.register');

// Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'],function (){
//     Route::get('/login','Auth\LoginController@showLoginForm')->name('admin.login');
//     Route::post('login','Auth\LoginController@adminLogin')->name('admin.login.submit');
//     Route::get('/','AdminController@index')->name('admin.dashboard');
// });




Route::get('/dashboard', 'DashboardController@index');

Route::get('admin-login', 'Auth\AdminLoginController@showLoginForm');
// Route::post('admin-login', 'Auth\AdminLoginController@login');
Route::post('admin-login', ['as'=>'admin-login','uses'=>'Auth\AdminLoginController@login']);

Route::get('admin-register', 'Auth\AdminRegisterController@showRegisterForm');
Route::post('admin-register', ['as'=>'admin-register','uses'=>'Auth\AdminRegisterController@register']);

// -----------------------------------------------------------------------------------------------//

Route::get('/sendemail', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');
// Route::get('send','mailController@send');

//------------------------------------------------------------------------------------------------//
//Route::get('/reservation', 'ReservationController@index');
//Route::view('/', 'home'); 
Route::get('/houses', 'HouseController@index'); 
// Route::get('/auth0/callback', '\Auth0\Login\Auth0Controller@callback' )->name('auth0-callback');
// Route::get('/login', 'Auth\Auth0IndexController@login')->name('login');
// Route::get('/logout', 'Auth\Auth0IndexController@logout')->name('logout')->middleware('auth');


Route::get('reservations','ReservationController@dashboard')->name('reservations.dashboard');
Route::post('reservations','ReservationController@addReservation')->name('reservations.add');

Route::get('dashboard/reservations/{reservation}/uploadReceipt','ReservationController@uploadReceipt')->name('reservations.uploadReceipt');
Route::put('dashboard/reservations/{reservation}','ReservationController@upload')->name('reservations.upload');

Route::get('dashboard/reservations/{reservation}/status','ReservationController@status')->name('reservations.status');
// Route:: Confirm...

Route::get('calendar','ReservationController@calendar')->name('reservations.calendar');

Route::group(['prefix' => 'dashboard'], function() {   //They're wrapped in a group with the prefix dashboard. This will prepend dashboard/ to all those routes so that you don't have to keep rewriting it.
    //Route::get('/dashboard', 'ReservationController@index');
    Route::resource('reservations', 'ReservationController');
    //Route::view('/', 'dashboard/dashboard');
    // Route::view('/', 'dashboard/reservations');
    Route::get('reservations/create/{id}', 'ReservationController@create');
    // Route::get('reservations/{id}/upload', 'ReservationController@upload');
    Route::resource('reservations', 'ReservationController')->except('create');
});

//------------------------------------------------------------------------------------------------//


////////////////////////////////////
// Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
// Route::post('/login/admin', [ 'as' => '/login/admin', 'uses' => 'LoginController@showAdminLoginForm']);
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/register/admin', [ 'as' => '/register/admin', 'uses' => 'LoginController@showAdminRegisterForm']);
//
// Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
//
Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin');
////////////////////////////////////
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
?>

