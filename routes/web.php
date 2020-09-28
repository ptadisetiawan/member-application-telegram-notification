<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
Artisan::call('storage:link');
Route::get('/', 'FrontController@index')->name('index');

Auth::routes();
Route::get('logout', function(){
    Auth::logout();
  return redirect('/login');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function(){
        $menu = 'Dashboard';
        $submenu = '';
        $pagename = 'Dashboard';
        return view('dashboard.index', compact('menu', 'submenu', 'pagename'));
    })->name('dashboard');


    Route::get('/dashboard/member', 'MemberController@index')->name('member.index');
    Route::get('/dashboard/member-import', 'MemberController@importPage')->name('member.import');
    Route::post('/dashboard/member-import', 'MemberController@import')->name('member.import.save');
    Route::resource('dashboard/iklan', 'IklanController')->except(['show', 'edit', 'update']);


});

Route::post('/detail-member', 'MemberController@masuk')->name('member.masuk');
Route::get('/daftar', 'MemberController@daftar')->name('member.daftar');
Route::post('/daftar', 'MemberController@handleDaftar')->name('member.handledaftar');
Route::get('/updated-activity', 'TelegramBotController@updatedActivity');

