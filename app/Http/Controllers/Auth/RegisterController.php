<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Customer;
use App\Models\Agent;
use App\Models\Admin;
use App\Models\MasterSetting;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($data['formNumber'] == 1) {
            return Validator::make($data, [
                'firstName' => ['required', 'string', 'max:255'],
                'lastName' => ['required', 'string', 'max:255'],
                'province' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:4', 'confirmed'],
            ]);
        }else if ($data['formNumber'] == 2){
            return Validator::make($data, [
                'firstName' => ['required', 'string', 'max:255'],
                'lastName' => ['required', 'string', 'max:255'],
                'province' => ['required', 'string', 'max:255'],
                'name_of_brokerage' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:4', 'confirmed'],
            ]);
        }else{
             return Validator::make($data, [
                'firstName' => ['required', 'string', 'max:255'],
                'lastName' => ['required', 'string', 'max:255'],
                'province' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:4', 'confirmed'],
            ]);
        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $User =  User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $currentUserId = User::where('email', $data['email'])->get(['id']);
        $adminIdToBeAssigned;
        if ($data['formNumber'] == '1') {
            $customer = new Customer;
            $customer->user_id = $currentUserId[0]->id;
            $customer->first_name =   $data['firstName'];
            $customer->last_name =   $data['lastName'];
            $customer->province =  $data['province'];
            $customer->save();
        }else if ($data['formNumber'] == '2') {

            $registerPageUrl = $data['registerPage_url'];
            $registerPageUrl = explode("/",$registerPageUrl);
            $userEmail = $registerPageUrl[count($registerPageUrl)-1];

            if (strpos($userEmail, '@')) {
                $userId = User::where('email', $userEmail)->get('id');
                $adminData = Admin::where('user_id', $userId[0]->id)->get('id');
                if (count($adminData) > 0) {
                    $adminIdToBeAssigned =  $adminData[0]['id'];
                }else{
                    $masterSettingData = MasterSetting::all();
                    $adminIdToBeAssigned = $masterSettingData[0]->default_admin_id;
                    echo 'Default Admin';
                }
            }else{
                $masterSettingData = MasterSetting::all();
                $adminIdToBeAssigned = $masterSettingData[0]->default_admin_id;
                echo 'Default Admin';
            }

            $agent_RS = new Agent;
            $agent_RS->user_id = $currentUserId[0]->id;
            $agent_RS->admin_id = $adminIdToBeAssigned;
            $agent_RS->full_name = $data['firstName'] . " " .  $data['lastName'];
            $agent_RS->agent_type = 'real_state_agent';
            $agent_RS->save();

        }else if ($data['formNumber'] == '3') {

            $registerPageUrl = $data['registerPage_url'];
            $registerPageUrl = explode("/",$registerPageUrl);
            $userEmail = $registerPageUrl[count($registerPageUrl)-1];

            if (strpos($userEmail, '@')) {
                $userId = User::where('email', $userEmail)->get('id');
                $adminData = Admin::where('user_id', $userId[0]->id)->get('id');
                if (count($adminData) > 0) {
                    $adminIdToBeAssigned =  $adminData[0]['id'];
                }else{
                    $masterSettingData = MasterSetting::all();
                    $adminIdToBeAssigned = $masterSettingData[0]->default_admin_id;
                    echo 'Default Admin';
                }
            }else{
                $masterSettingData = MasterSetting::all();
                $adminIdToBeAssigned = $masterSettingData[0]->default_admin_id;
                echo 'Default Admin';
            }

            $agent_MP = new Agent;
            $agent_MP->user_id = $currentUserId[0]->id;
            $agent_MP->admin_id = $adminIdToBeAssigned;
            $agent_MP->full_name = $data['firstName'] . " " .  $data['lastName'];
            $agent_MP->agent_type = 'mortgage_professional';
            $agent_MP->save();
        }


        return $User;
    }


    public function gettingAdminId(array $data , $adminIdToBeAssigned){

    }
}
