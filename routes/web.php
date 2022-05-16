<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ________________________________________

Route::view('admin_dashboard', 'admin_dashboard');
Route::view('/admin_dashboard/super', 'super_settings');
Route::view('/admin_dashboard/agents', 'manage_agents');
Route::view('/admin_dashboard/agents/{agent_id}', 'agent_detail');
Route::view('/admin_dashboard/admin', 'admin');
Route::view('/admin_dashboard/agent', 'agent');


Route::group(['middleware'=> ['forMasterAdmin']], function(){
    Route::view('/admin_dashboard/master', 'master_settings');
    Route::view('/admin_dashboard/admins', 'manage_admins');
    Route::view('/admin_dashboard/admins/{admin_id}', 'admin_detail');
    Route::view('/admin_dashboard/admins/{admin_id}/agents/{agent_id}', 'admin_agent_detail');
    Route::view('/admin_dashboard/admins/{admin_id}/agents', 'manage_admin_agents');

});

// Admin Dashboard Controller
 Route::get('/admindashboard/changePassword', [App\Http\Controllers\AdminDashboardController::class, 'changePassword'])->name('changePassword');