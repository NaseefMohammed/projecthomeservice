<?php

use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\http\Livewire\Admin\AdminDashboardComponent;
use App\http\livewire\Sprovider\SproviderDashboardComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\AuthSprovider;

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

Route::get('/', HomeComponent::class)->name('home');


//admin dash
Route::middleware([
    'auth:sanctum',config('jetstream.auth_session'),'verified','authadmin'])->group(function () {
    Route::get('admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
});

//service dash
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'authsprovider'
])->group(function () {
    Route::get('/sprovider/dashboard',SproviderDashboardComponent::class)->name('sprovider.dashboard');
});

//user dash
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/customer/dashboard',CustomerDashboardComponent::class)->name('customer.dashboard');
});
