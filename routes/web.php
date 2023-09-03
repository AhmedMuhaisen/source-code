<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\NavigatorController;
use Illuminate\Support\Facades\View;

Route::get('login', [LoginController::class, 'adminLogin'])->name('adminLogin');

Route::group(['middleware' => ['xss','MaintenanceMode','redirect']], function () {
    Route::get('/', [LoginController::class, 'adminLogin'])->name('adminLogin');


    Route::get('support-24-7',          [NavigatorController::class, 'support'])->name('support');
    Route::get('privacy-policy',        [NavigatorController::class, 'privacyPolicy'])->name('privacyPolicy');
    Route::get('terms-and-conditions',  [NavigatorController::class, 'termsAndConditions'])->name('termsAndConditions');
});

//admin routes here
include_route_files(__DIR__ . '/admin/');

//frontend routes here
include_route_files(__DIR__ . '/frontend/'); 

Route::any('/not_found', function () {
    return view('errors.404');
})->name('errors');
