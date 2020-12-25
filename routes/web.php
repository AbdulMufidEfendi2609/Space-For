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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('otentikasi.login');
// });

use App\Event;

Route::get('/', function () {
  $date = date('Y-m-d');
  // dd($date);
  $event = Event::where('status', 'publish')->where('end_date', "<", $date)->get();
  // dd($event);
  return view('front.landing', compact('event'));
})->name('/');

Route::get('detail-event/{id}', 'EventController@detail')->middleware('auth');
Route::post('daftar-event/{id}', 'EventController@daftar')->middleware('auth');
Route::get('download-sertif/{id}', 'EventController@download')->middleware('auth');
Route::get('event-index', 'EventController@showAll')->middleware('auth');
Route::get('presence/{id}', 'EventController@presence')->middleware('auth');
Route::get('ajax-get-event/{id}', 'EventController@ajaxGetEvent')->middleware('auth', 'ceklevel:penyedia');
Route::post('events-update/{id}', 'EventController@update')->middleware('auth', 'ceklevel:penyedia');


Route::post('submit-presence/{id}', 'EventController@submitPresence')->middleware('auth');
Route::get('participant-event/{id}', 'EventController@participant_event')->middleware('auth');
Route::post('delete-participant/{id}', 'EventController@deleteParticipant')->middleware(['auth', 'ceklevel:admin,penyedia']);
Route::post('verifikasi-participant/{id}', 'EventController@verifikasiParticipant')->middleware(['auth', 'ceklevel:admin,penyedia']);
Route::get('organization', 'OrganizationController@index')->middleware(['auth', 'ceklevel:penyedia']);
Route::post('organization', 'OrganizationController@store')->middleware(['auth', 'ceklevel:penyedia']);
Route::post('organization/{id}', 'OrganizationController@update')->middleware(['auth', 'ceklevel:penyedia']);
Route::get('get-organization', 'OrganizationController@getOrganization')->middleware(['auth', 'ceklevel:penyedia']);
Route::get('get-organization/{id}', 'OrganizationController@getOrganizationId')->middleware(['auth', 'ceklevel:user']);
Route::get('get-admin', 'OrganizationController@getAdmin')->middleware(['auth', 'ceklevel:penyedia']);

Route::post('post-sertif/{id}', 'EventController@postSertif')->middleware(['auth', 'ceklevel:penyedia']);

Route::post('post-data-admin', 'PembayaranController@data_admin')->middleware(['auth', 'ceklevel:admin']);
Route::post('verifikasi-pembayaran-admin/{id}', 'PembayaranController@verifikasiPembayaranAdmin')->middleware(['auth', 'ceklevel:admin']);


Route::post('bayar/{event_id}/{organization_id}', 'PembayaranController@bayar')->middleware(['auth', 'ceklevel:user']);
Route::post('bayar-event/{id}', 'PembayaranController@bayarEvent')->middleware(['auth', 'ceklevel:penyedia']);
// Auth::routes();

Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/login', 'LoginController@login')->name('login');
Route::get('/register', 'LoginController@register')->name('register');
Route::post('/postregister', 'LoginController@postregister')->name('postregister');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth', 'ceklevel:admin,penyedia,user']], function () {
  Route::get('/home', 'BerandaController@index')->name('homes');
  Route::get('/profile', 'BerandaController@profile')->name('profile');
  Route::put('/profile', 'BerandaController@updateProfile')->name('updateprofile');
});

// Hanya admin
Route::group(['middleware' => ['auth', 'ceklevel:admin'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
  Route::resource('users', 'UserController');
  Route::resource('events', 'EventController');
  Route::get('events.pembayaran', 'EventController@bayarEvent')->name('events.pembayaran');
});

// Hanya penyedia
Route::group(['middleware' => ['auth', 'ceklevel:penyedia'], 'prefix' => 'penyedia'], function () {
  Route::get('/events/{event}/edit', 'EventController@edit')->name('penyedia.edit_event');
  Route::put('id
  /events/{event}', 'EventController@update')->name('penyedia.update_event');
  Route::get('/events/{event}/delete', 'EventController@destroy')->name('penyedia.delete_event');
});

Route::group(['middleware' => ['auth', 'ceklevel:admin,penyedia']], function () {
  Route::get('/create/event', 'EventController@create')->name('createvent');
  Route::post('/create/event', 'EventController@store')->name('storeevent');
});
