<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ManageAdminController;

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

Route::view('/admin_dashboard', 'admin_dashboard');
Route::view('/admin_dashboard/super', 'super_settings');
Route::view('/admin_dashboard/agents', 'manage_agents');
Route::view('/admin_dashboard/agents/{agent_id}', 'agent_detail');
Route::view('/admin_dashboard/admin', 'admin');
Route::view('/admin_dashboard/agent', 'agent');


Route::group(['middleware'=> ['forMasterAdmin']], function(){
    Route::view('/admin_dashboard/master', 'master_settings');
    // Route::view('/admin_dashboard/admins', 'manage_admins');
    Route::view('/admin_dashboard/admins/{admin_id}', 'admin_detail');
    Route::view('/admin_dashboard/admins/{admin_id}/agents/{agent_id}', 'admin_agent_detail');
    Route::view('/admin_dashboard/admins/{admin_id}/agents', 'manage_admin_agents');
    // Route::resource('manage_admin_resource', ManageAdminController::class);

    // MANAGE ADMIN ROUTES
    Route::post('/admin_dashboard/admins/showAllData', [App\Http\Controllers\ManageAdminController::class, 'showAllData'])->name('showListOfAdmins');
    Route::get('/admin_dashboard/admins', [ManageAdminController::class , 'showAllData']);
    Route::view('/admin_dashboard/create/admin', 'create_admin');
    Route::post('/admin_dashboard/create/admin', [ManageAdminController::class , 'createAdmin'])->name('createAdmin');
    // Route::get('/admin_dashboard/admins/create', [ManageAdminController::class , 'showAllData']);
    Route::get('/admin_dashboard/admins/edit/{id}', [ManageAdminController::class,'showEditData']);
    Route::post('/admin_dashboard/admins', [ManageAdminController::class,'updateData'])->name('updateData');
    Route::get('/admin_dashboard/admins/delete/{id}', [ManageAdminController::class,'deleteData'])->name('deleteData');


});

// Admin Dashboard Controller
 Route::post('/admindashboard_changePassword', [App\Http\Controllers\AdminDashboardController::class, 'changePassword'])->name('changePasswordOfUser');

 // Manage Admin Controller
//  Route::post('/manageAdmin_getAdminsList', [App\Http\Controllers\ManageAdminController::class, 'getAdminsListFunc'])->name('getAdminList');