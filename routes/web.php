<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Models\khoi;
use App\Models\theloai;
use App\Models\nhande;
use App\Models\lop;
use App\Models\hocsinh;
use App\Models\debai;
use App\Models\chuong;
use App\Models\baitap;
use App\Models\bailam;

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

Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');
     
Route::get('/', function () {
    return view('test');
});

Route::get('master', function(){
    return view('HocSinh.profile');
});

Route::get('hocsinh-login', [AuthController::class, 'show'])->name('login')->middleware('logout');
Route::post('postlogin', [AuthController::class, 'index']);
Route::get('registered', function () {
    return view('registered', ['lops'=> lop::all()]);
});
Route::post('postregistered', [AuthController::class, 'create']);

Route::get('admin-login', [AuthController::class, 'adminlogin'])->middleware('logout');
Route::post('postadmin', [AuthController::class, 'postadmin']);

Route::get('logout', [AuthController::class, 'logout']);

Route::group(['prefix'=> 'giao-vien', 'middleware'=>['admin']], function(){
    Route::get('lops', [giaovienController::class, 'lop'])->name('lop');
    Route::get('xoalop/{id}', [giaovienController::class, 'xoalop']);
    Route::get('sualop/{id}', [giaovienController::class, 'sualop']);
    Route::get('themlop', [giaovienController::class, 'themlop']);
    Route::post('pthemlop', [giaovienController::class, 'postThemLop']);
    Route::get('cong1/{id}', [giaovienController::class, 'cong1']);
    
    Route::get('danhsachlop/{id}', [giaovienController::class, 'danhsachlop']);
    Route::get('themhocsinh', [giaovienController::class, 'themhocsinh']);
    Route::post('postthemhocsinh', [giaovienController::class, 'postthemhocsinh']);
    Route::get('suahocsinh/{id}', [giaovienController::class, 'suahocsinh']);
    Route::post('postsuahocsinh', [giaovienController::class, 'postsuahocsinh']);
    Route::get('xoahocsinh/{id}', [giaovienController::class, 'xoahocsinh']);

    Route::get('theloai/{id}', [giaovienController::class, 'theloai']);
    Route::get('themtheloai/{id}', [giaovienController::class, 'themtheloai']);
    Route::post('posttheloai', [giaovienController::class, 'posttheloai']);
    Route::get('themchuong/{id}', [giaovienController::class, 'themchuong']);
    Route::post('pthemchuong', [giaovienController::class, 'pthemchuong']);
    
    Route::get('danhsachbaitap/chuong/{chuong}', [baitapController::class, 'danhsachbaitapchuong']);
    Route::get('danhsachbaitap/theloai/{theloai}', [baitapController::class, 'danhsachbaitaptheloai']);
    Route::get('danhsachbaitap/khoi/{khoi}', [baitapController::class, 'danhsachbaitapkhoi']);

    Route::get('thembaitap/{id}', [baitapController::class, 'thembaitap'])->name('thembaitap');
    Route::get('loadtheloai/{khoi}/{chuong?}', [baitapController::class, 'loadtheloai']);
    Route::get('loadchuong/{id}', [baitapController::class, 'loadchuong']);
    Route::post('postbaitap', [baitapController::class, 'postbaitap']);
    Route::get('xoabaitap/{id}', [baitapController::class, 'xoabaitap']);
    Route::get('suabaitap/{id}', [baitapController::class, 'suabaitap']);
    Route::post('postsuabaitap/{id}', [baitapController::class, 'postsuabaitap']);
    Route::get('loadbaitap/{id}', [baitapController::class, 'loadbaitap']);
    
    Route::get('danhsachde/{khoi}', [debaiController::class, 'danhsachde']);
    Route::get('themdebai', [debaiController::class, 'themdebai']);
    Route::post('postdebai', [debaiController::class, 'postdebai']);
    
    Route::get('debai/{id}/all', [debaiController::class, 'debaiAll']);
    Route::get('debai/{id}/khoi/{khoi}/dai/{dai?}', [debaiController::class, 'debaikhoi']);
    Route::get('debai/{id}/chuong/{chuong}', [debaiController::class, 'debaichuong']);
    Route::get('debai/{id}/theloai/{theloai}', [debaiController::class, 'debaitheloai']);
    Route::get('addquestion/{id}/baitap/{baitap}', [debaiController::class, 'addquestion']);
    Route::get('removequestion/{id}/baitap/{baitap}', [debaiController::class, 'removequestion']);
    Route::post('postlocbaitap/{id}', [debaiController::class, 'postlocbaitap']);

    Route::get('ajaxlockhoi/{khoi}/dai/{dai?}',[debaiController::class, 'ajaxlockhoi']);
    Route::get('ajaxlocchuong/{chuong}',[debaiController::class, 'ajaxlocchuong']);

    Route::get('debai/chitiet/{id}', [debaiController::class, 'viewdebai']);

    Route::get('dedagiao/{lop}', [giaodeController::class, 'show']);
    Route::post('giaobaitap/{lop}', [giaodeController::class, 'create']);
    Route::get('bailam/{id}/lop/{lop}', [bailamController::class, 'show']);
    Route::get('bailam/chitiet/{id}', [bailamController::class, 'details']);
});
Route::group(['prefix'=> 'hoc-sinh', 'middleware'=>['login']], function(){
    Route::get('profile', [hocsinhController::class, 'show']);
    Route::get('baitap', [hocsinhController::class, 'listbaitap']);
    Route::get('lambai/{id}', [hocsinhController::class, 'lambai']);
    Route::post('changecheck/{id}', [hocsinhController::class, 'changecheck']);
    Route::post('submitbaitap', [hocsinhController::class, 'submitbaitap']);
});