<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'otentikasi\OtentikasiController@index')->name('login');
// Route::get('/', function () {
//     return view('otentikasi.maintenance');
// });

Route::post('/login', 'otentikasi\OtentikasiController@login')->name('logins');
Route::get('refreshcaptcha', 'otentikasi\OtentikasiController@refreshCaptcha');

Route::group(['middleware' => 'login'], function() {
    // dashboard
    Route::get('/dashboard', 'DetailsController@index')->name('dashboard');
    Route::post('/dashboard', 'DetailsController@index')->name('dashboard');

   
    Route::get('change-password', 'ChangePasswordController@changePassword')->name('change-password');
    Route::post('update-password', 'ChangePasswordController@updatePassword');

    Route::get('summary', 'SummaryController@index')->name('summary.index');
    Route::post('summary/detil', 'SummaryController@detil')->name('summary.detil');
    Route::post('summary/getSto', 'SummaryController@getSto')->name('summary.getSto');
    
    Route::get('/info', 'DetailsController@info')->name('info');
    // akhir dashboard

    Route::get('logout', 'otentikasi\OtentikasiController@logout')->name('logout');

     // analitik
     Route::get('analitik', 'AnalitikController@index')->name('analitik');
     Route::get('alert', 'AnalitikController@alert')->name('alert');
     Route::get('details', 'AnalitikController@details')->name('details');
     // akhir analitik

     // sales
    Route::get('sales/index', 'SalesController@index')->name('qosbulan');
    
    // akhir sales

 
     // alert report
     Route::get('alert-report', 'ReportController@age')->name('alert.report');
     Route::get('alert-view/witel', 'ReportController@witel')->name('alert.witel');
     Route::get('alert', 'ReportController@index')->name('alert.index');
     
     Route::post('alert/detil', 'ReportController@alert')->name('alert.detil');
     Route::post('alert/getSto', 'ReportController@getSto')->name('alert.getSto');
     Route::get('alert/detils', 'ReportController@alert');
     Route::get('alert/detil/{NOTEL}', 'ReportController@detil')->name('alert2');
     Route::get('alert/detil/{WITEL}/{STO}/{ATRIBUT}', 'ReportController@detil');
     Route::get('alert/edit/{NOTEL}/{ATRIBUT}', 'ReportController@edit')->name('alert.edit');
     Route::post('alert/update/{NOTEL}', 'ReportController@update')->name('alert.update');

    

    // profil
    Route::get('profil', 'ProfilController@profil')->name('profil');
    Route::get('profilleveraging', 'ProfilController@leveraging')->name('profilleveraging');
    Route::get('profilretention', 'ProfilController@retention')->name('profilretention');
    Route::get('profilkw', 'ProfilController@kw')->name('profilkw');
    Route::get('profilchurn', 'ProfilController@churn')->name('profilchurn');
    Route::get('profilLoss', 'ProfilingLossController@index')->name('profilLoss');
    Route::post('profilLoss', 'ProfilingLossController@index')->name('profilLoss');
    Route::get('profilcust', 'ProfilCustController@index')->name('profilCust');
    Route::post('profilcust', 'ProfilCustController@index')->name('profilCust');

    Route::get('profilkwg', 'ProfilController@kwg')->name('profilkwg');
    Route::get('profilkwg/ajax/{WITEL}', 'ProfilController@kwgAjax');
    
    
    //

    
    Route::get('qostr2witel', function () {
        return view('sales.qoswitel');
    })->name('qostr2witel');

    Route::get('qostr2bulan', 'SalesController@index')->name('qostr2bulan');
   
   Route::get('qostr6bulan', function () {
        return view('qostr6.qostr6bybulan');
    })->name('qostr6bulan');

    Route::get('qostr6witel', function () {
        return view('qostr6.qostr6bywitel');
    })->name('qostr6witel');  
  

    Route::get('/home', 'HomeController@index')->name('home');

});
