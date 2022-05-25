<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Agent;
use App\Models\Admin;
use App\Models\MasterAdmin;
use App\Models\SuperAdmin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function redirectTo() {

        $user = Auth::user();
        //  $user->email;
        // $checkUser = Customer::where('email', "azfar@gmail.com");
        // $checkUser = Customer::where('user_id',$user->id)->get(['id']);
        $userId =
            User::where('email',$user->email)->get(['id']);
        $checkIfUserIdFoundInAgentTable =
            Agent::where('user_id', $userId[0]->id)->get(['id']);
        $checkIfUserIdFoundInAdminTable =
            Admin::where('user_id', $userId[0]->id)->get(['id']);
        $checkIfUserIdFoundInMasterAdmin =
            MasterAdmin::where('user_id', $userId[0]->id)->get(['id']);
        $checkIfUserIdFoundInSuperAdmin =
            SuperAdmin::where('user_id', $userId[0]->id)->get(['id']);

            // $data = MasterAdmin::all();
            //  dd($data);
        if (count($checkIfUserIdFoundInAgentTable) > 0) {
            //  dd('Agent Found');
            return 'admin_dashboard/agent';
        }else if(count($checkIfUserIdFoundInAdminTable) > 0){
            return 'admin_dashboard/agents';
        }else if(count($checkIfUserIdFoundInMasterAdmin) > 0){
            // dd('Master Admin Found');
            return 'admin_dashboard/master';
        }else if(count($checkIfUserIdFoundInSuperAdmin) > 0){
             dd('Super Admin Found');
            return 'admin_dashboard/super';
        }else{
            return 'admin_dashboard';
        }
        // dd(count($checkIfUserIdFoundInAgentTable));
    }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}