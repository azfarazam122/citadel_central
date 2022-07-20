<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ManageAdminController;
use App\Http\Controllers\ManageAgentController;
use App\Http\Controllers\ManageMasterSettingController;
use App\Http\Controllers\ManageSuperSettingController;
use App\Http\Controllers\ManageUserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('default_page');
});

Route::view('/terms_conditions', 'terms');
Route::view('/privacy_policy', 'privacy');

// REGISTER AGENT
Route::view('/register/{agent_email}', 'auth.register');
Route::post('/register_agent', [App\Http\Controllers\Auth\RegisterController::class, 'registerAgent'])->name('registerAgent');

Route::view('/agent/home/{agent_email}', 'welcome');
Route::view('/agent/home/', 'welcome');

Route::view('/agent/rates/{agent_email}', 'rates');
Route::view('/agent/rates/', 'rates');
Route::view('/agent/about/{agent_email}', 'about_us');
Route::view('/agent/about/', 'about_us');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ________________________________________

Route::group(['middleware' => ['forAgentOnly']], function () {
    // Route::view('/admin_dashboard/agent', 'agent');
    Route::view('/admin_dashboard', 'admin_dashboard');
    Route::get('/admin_dashboard/agent', [ManageAgentController::class, 'showAllDataForAgentLogin']);
    Route::post('/admin_dashboard/agent', [ManageAgentController::class, 'updateDataForAgentLogin'])->name('updateDataForAgentLogin');
    Route::post('/admin_dashboard/agent/saveEditorSubPageData', [ManageAgentController::class, 'saveEditorSubPageData'])->name('saveEditorSubPageDataByAgent');
    Route::post('/admin_dashboard/agent/setAsDefaultPageInPagesEditorView', [ManageAgentController::class, 'setAsDefaultPageInPagesEditorView'])->name('setAsDefaultPageInPagesEditorViewByAgent');
    Route::post('/admin_dashboard/agent/submitPagesEditorSubPageForApproval', [ManageAgentController::class, 'submitPagesEditorSubPageForApproval'])->name('submitPagesEditorSubPageForApprovalByAgent');

    // Pages Editor
    Route::view('/admin_dashboard/pages_editor/home_page', 'pages_editor.home_page');
    Route::view('/admin_dashboard/pages_editor/about_page', 'pages_editor.about_page');
    Route::view('/admin_dashboard/pages_editor/rates_page', 'pages_editor.rates_page');
    // View Your(agent) Pages
    Route::get('/admin_dashboard/agent/{page_id}/view/{agent_email}', [ManageAgentController::class, 'viewYourPage']);
});
Route::group(['middleware' => ['forAdmin']], function () {
    Route::get('/admin_dashboard/admin', [ManageAdminController::class, 'showAllDataOfAdminSetting']);
    Route::get('/admin_dashboard/admin/edit/{id}', [ManageAdminController::class, 'showEditDataOfAdminSetting']);
    Route::get('/admin_dashboard/admin/detail/{id}', [ManageAdminController::class, 'showDetailedDataOfAdminSetting']);
    Route::post('/admin_dashboard/admin', [ManageAdminController::class, 'updateDataOfAdminSetting'])->name('updateDataOfAdminSetting');

    // MANAGE AGENT ROUTES == > ManageUserController
    Route::get('/admin_dashboard/agents', [ManageAgentController::class, 'showAllData']);
    Route::view('/admin_dashboard/agents/create', 'create_agent');
    Route::post('/admin_dashboard/agents/create', [ManageAgentController::class, 'createAgent'])->name('createAgent');
    Route::get('/admin_dashboard/agents/edit/{id}', [ManageAgentController::class, 'showEditData']);
    Route::get('/admin_dashboard/agents/details/{id}', [ManageAgentController::class, 'showDetailsOfAgent']);
    Route::post('/admin_dashboard/agents', [ManageAgentController::class, 'updateData'])->name('updateAgentData');
    Route::get('/admin_dashboard/agents/delete/{id}', [ManageAgentController::class, 'deleteData'])->name('deleteUserData');

    Route::post('/agent_set_as_default', [ManageAdminController::class, 'setAgentAsDefaultFunc'])->name('setAgentAsDefault');
    Route::post('/agent_set_as_approved', [ManageAdminController::class, 'setAgentAsApprovedFunc'])->name('setAgentAsApproved');
    Route::post('/agent_set_as_unapproved', [ManageAdminController::class, 'setAgentAsUnApprovedFunc'])->name('setAgentAsUnApproved');

    // Agents Pages
    Route::view('/admin_dashboard/agents/pages', 'agent_pages');
    Route::get('/admin_dashboard/agent/{agent_id}/pages', [ManageAdminController::class, 'agentEachPageData'])->name('agentEachPageDataForAdmin');
    Route::post('/agent_page_set_as_approved_or_disapproved', [ManageAdminController::class, 'setAgentPageAsApprovedOrDisapprovedFunc'])->name('setAgentPageAsApprovedOrDisapproved');

    // View Agent Pages
    Route::get('/admin_dashboard/agent/{page_id}/preview/{agent_email}', [ManageAdminController::class, 'viewAgentPage']);

});

Route::group(['middleware' => ['forSuperAdmin']], function () {
    // Route::view('/admin_dashboard/super', 'super_settings');
    Route::get('/admin_dashboard/super', [ManageSuperSettingController::class, 'showAllDataOfSuperSettings']);
    Route::post('/admin_dashboard/super/saveTermsPageData', [ManageSuperSettingController::class, 'saveTermsPageData'])->name('saveTermsPageDataBySuper');
    Route::post('/admin_dashboard/super/savePrivacyPageData', [ManageSuperSettingController::class, 'savePrivacyPageData'])->name('savePrivacyPageDataBySuper');
    Route::get('/admin_dashboard/super/edit/{id}', [ManageSuperSettingController::class, 'showEditDataOfSuperSettings']);
    Route::post('/admin_dashboard/super', [ManageSuperSettingController::class, 'updateDataOfSuperSettings'])->name('updateDataOfSuperSettings');
});

Route::group(['middleware' => ['forMasterAdmin']], function () {
    // Route::view('/admin_dashboard/master', 'master_settings');
    Route::get('/admin_dashboard/master', [ManageMasterSettingController::class, 'showAllDataOfMasterSetting']);
    Route::post('/admin_dashboard/master/saveTermsPageData', [ManageMasterSettingController::class, 'saveTermsPageData'])->name('saveTermsPageDataByMaster');
    Route::post('/admin_dashboard/master/savePrivacyPageData', [ManageMasterSettingController::class, 'savePrivacyPageData'])->name('savePrivacyPageDataByMaster');
    Route::get('/admin_dashboard/master/edit/{id}', [ManageMasterSettingController::class, 'showEditDataOfMasterSetting']);
    Route::post('/admin_dashboard/master', [ManageMasterSettingController::class, 'updateDataOfMasterSetting'])->name('updateDataOfMasterSetting');

    Route::view('/admin_dashboard/users', 'manage_users');
    Route::view('/admin_dashboard/admins/{admin_id}', 'admin_detail');
    Route::view('/admin_dashboard/admins/{admin_id}/agents/{agent_id}', 'admin_agent_detail');
    Route::view('/admin_dashboard/admins/{admin_id}/agents', 'manage_admin_agents');

    // MANAGE USER ROUTES == > ManageUserController
    Route::get('/admin_dashboard/users', [ManageUserController::class, 'showAllData']);
    Route::view('/admin_dashboard/users/create', 'create_user');
    Route::post('/admin_dashboard/users/create', [ManageUserController::class, 'createUser'])->name('createUser');
    Route::get('/admin_dashboard/users/edit/{id}', [ManageUserController::class, 'showEditData']);
    Route::post('/admin_dashboard/users', [ManageUserController::class, 'updateData'])->name('updateUserData');
    Route::get('/admin_dashboard/users/delete/{id}', [ManageUserController::class, 'deleteData'])->name('deleteUserData');

    // MANAGE ADMIN ROUTES == > ManageAdminController
    Route::get('/admin_dashboard/admins', [ManageAdminController::class, 'showAllData']);
    Route::view('/admin_dashboard/create/admin', 'create_admin');
    Route::post('/admin_dashboard/create/admin', [ManageAdminController::class, 'createAdmin'])->name('createAdmin');
    Route::get('/admin_dashboard/admins/edit/{id}', [ManageAdminController::class, 'showEditData']);
    Route::get('/admin_dashboard/admins/detail/{id}', [ManageAdminController::class, 'showDetailedData']);
    Route::post('/admin_dashboard/admins', [ManageAdminController::class, 'updateData'])->name('updateAdminData');
    Route::post('/admin_dashboard/admins/deleteAllRoles', [ManageAdminController::class, 'deleteAllRoles'])->name('deleteAllRoles');
    Route::post('/admin_dashboard/admins/deleteAdminOnly', [ManageAdminController::class, 'deleteAdminRoleOnly'])->name('deleteAdminRoleOnly');

    Route::post('/admin_set_as_default', [ManageAdminController::class, 'setAdminAsDefaultFunc'])->name('setAdminAsDefault');
});

// Admin Dashboard Controller
Route::post('/admindashboard_changePassword', [App\Http\Controllers\AdminDashboardController::class, 'changePassword'])->name('changePasswordOfUser');

// Manage Admin Controller
//  Route::post('/manageAdmin_getAdminsList', [App\Http\Controllers\ManageAdminController::class, 'getAdminsListFunc'])->name('getAdminList');
