<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ManageAdminController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ManageAgentController;

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

Route::view('/admin_dashboard/agent', 'agent');


Route::group(['middleware'=> ['forMasterAdmin']], function(){
    Route::view('/admin_dashboard/master', 'master_settings');
    Route::view('/admin_dashboard/users', 'manage_users');
    Route::view('/admin_dashboard/admins/{admin_id}', 'admin_detail');
    Route::view('/admin_dashboard/admins/{admin_id}/agents/{agent_id}', 'admin_agent_detail');
    Route::view('/admin_dashboard/admins/{admin_id}/agents', 'manage_admin_agents');

    // MANAGE USER ROUTES == > ManageUserController
    Route::get('/admin_dashboard/users', [ManageUserController::class , 'showAllData']);
    Route::view('/admin_dashboard/users/create', 'create_user');
    Route::post('/admin_dashboard/users/create', [ManageUserController::class , 'createUser'])->name('createUser');
    Route::get('/admin_dashboard/users/edit/{id}', [ManageUserController::class,'showEditData']);
    Route::post('/admin_dashboard/users', [ManageUserController::class,'updateData'])->name('updateUserData');
    Route::get('/admin_dashboard/users/delete/{id}', [ManageUserController::class,'deleteData'])->name('deleteUserData');

    // MANAGE ADMIN ROUTES == > ManageAdminController
    Route::get('/admin_dashboard/admins', [ManageAdminController::class , 'showAllData']);
    Route::view('/admin_dashboard/create/admin', 'create_admin');
    Route::post('/admin_dashboard/create/admin', [ManageAdminController::class , 'createAdmin'])->name('createAdmin');
    Route::get('/admin_dashboard/admins/edit/{id}', [ManageAdminController::class,'showEditData']);
    Route::post('/admin_dashboard/admins', [ManageAdminController::class,'updateData'])->name('updateAdminData');
    Route::get('/admin_dashboard/admins/delete/{id}', [ManageAdminController::class,'deleteData'])->name('deleteAdminData');
});

Route::group(['middleware'=> ['forAdmin']], function(){
    Route::view('/admin_dashboard/agents', 'manage_agents');
    // Route::view('/admin_dashboard/agents/{agent_id}', 'agent_detail');
    Route::view('/admin_dashboard/admin', 'admin');

    // MANAGE AGENT ROUTES == > ManageUserController
    Route::get('/admin_dashboard/agents', [ManageAgentController::class , 'showAllData']);
    Route::view('/admin_dashboard/agents/create', 'create_agent');
    Route::post('/admin_dashboard/agents/create', [ManageAgentController::class , 'createAgent'])->name('createAgent');
    Route::get('/admin_dashboard/agents/edit/{id}', [ManageAgentController::class,'showEditData']);
    Route::post('/admin_dashboard/agents', [ManageAgentController::class,'updateData'])->name('updateAgentData');
    Route::get('/admin_dashboard/agents/delete/{id}', [ManageAgentController::class,'deleteData'])->name('deleteUserData');
});

// Admin Dashboard Controller
 Route::post('/admindashboard_changePassword', [App\Http\Controllers\AdminDashboardController::class, 'changePassword'])->name('changePasswordOfUser');

 // Manage Admin Controller
//  Route::post('/manageAdmin_getAdminsList', [App\Http\Controllers\ManageAdminController::class, 'getAdminsListFunc'])->name('getAdminList');