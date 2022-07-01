<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Customer;
use App\Models\Agent;
use App\Models\Admin;
use App\Models\MasterSetting;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
        // if ($data['formNumber'] == 2){
        //     return Validator::make($data, [
        //         'firstName' => ['required', 'string', 'max:255'],
        //         'lastName' => ['required', 'string', 'max:255'],
        //         'province' => ['required', 'string', 'max:255'],
        //         'company_name_custom_RS' => ['required', 'string', 'max:255'],
        //         'broker_house' => ['required', 'string', 'max:255'],
        //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //         'password' => ['required', 'string', 'min:4', 'confirmed'],
        //     ]);
        // }else{
        //      return Validator::make($data, [
        //         'firstName' => ['required', 'string', 'max:255'],
        //         'lastName' => ['required', 'string', 'max:255'],
        //         'province' => ['required', 'string', 'max:255'],
        //         'company_name' => ['required', 'string', 'max:255'],
        //         'broker_house' => ['required', 'string', 'max:255'],
        //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //         'password' => ['required', 'string', 'min:4', 'confirmed'],
        //     ]);
        // }

    }


    public function registerAgent(Request $req){
        $validatedData = $req->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'brokerHouse' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8',
            // 'regex:/[a-z]/',      // must contain at least one lowercase letter
            // 'regex:/[A-Z]/',      // must contain at least one uppercase letter
            // 'regex:/[0-9]/',      // must contain at least one digit
            // 'regex:/[@$!%*#?&]/', // must contain a special character
        ],
            'confirmPassword' => ['required', 'string', 'min:4', 'same:password'],
        ]);

        $User =  User::create([
            'email' => $req['email'],
            'password' => Hash::make($req['password']),
        ]);

        $currentUserId = User::where('email', $req['email'])->get(['id']);
        $adminIdToBeAssigned;
        if ($req->formNumber == '2') {
            $registerPageUrl = $req['registerPageUrl'];
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
                }
            }else{
                $masterSettingData = MasterSetting::all();
                $adminIdToBeAssigned = $masterSettingData[0]->default_admin_id;
            }


            $agent_RS = new Agent;
            $agent_RS->user_id = $currentUserId[0]->id;
            $agent_RS->admin_id = $adminIdToBeAssigned;
            $agent_RS->full_name = $req['firstName'] . " " .  $req['lastName'];
            $agent_RS->company_name = $req['companyName'];
            $agent_RS->broker_house = $req['brokerHouse'];
            $agent_RS->agent_type = 'real_state_agent';
            $agent_RS->save();

            Auth::login($User);
            echo "/admin_dashboard";
        }else if ($req->formNumber == '3') {

            $registerPageUrl = $req['registerPageUrl'];
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
                }
            }else{
                $masterSettingData = MasterSetting::all();
                $adminIdToBeAssigned = $masterSettingData[0]->default_admin_id;
            }

            $agent_MP = new Agent;
            $agent_MP->user_id = $currentUserId[0]->id;
            $agent_MP->admin_id = $adminIdToBeAssigned;
            $agent_MP->full_name = $req['firstName'] . " " .  $req['lastName'];
            $agent_MP->company_name = $req['companyName'];
            $agent_MP->broker_house = $req['brokerHouse'];
            $agent_MP->agent_type = 'mortgage_professional';
            $agent_MP->save();

            Auth::login($User);
            echo "/admin_dashboard";
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
        // $User =  User::create([
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);

        // $currentUserId = User::where('email', $data['email'])->get(['id']);
        // $adminIdToBeAssigned;
        // if ($data['formNumber'] == '1') {
        //     $customer = new Customer;
        //     $customer->user_id = $currentUserId[0]->id;
        //     $customer->first_name =   $data['firstName'];
        //     $customer->last_name =   $data['lastName'];
        //     $customer->province =  $data['province'];
        //     $customer->save();
        // }else if ($data['formNumber'] == '2') {

        //     $registerPageUrl = $data['registerPage_url'];
        //     $registerPageUrl = explode("/",$registerPageUrl);
        //     $userEmail = $registerPageUrl[count($registerPageUrl)-1];

        //     if (strpos($userEmail, '@')) {
        //         $userId = User::where('email', $userEmail)->get('id');
        //         $adminData = Admin::where('user_id', $userId[0]->id)->get('id');
        //         if (count($adminData) > 0) {
        //             $adminIdToBeAssigned =  $adminData[0]['id'];
        //         }else{
        //             $masterSettingData = MasterSetting::all();
        //             $adminIdToBeAssigned = $masterSettingData[0]->default_admin_id;
        //             echo 'Default Admin';
        //         }
        //     }else{
        //         $masterSettingData = MasterSetting::all();
        //         $adminIdToBeAssigned = $masterSettingData[0]->default_admin_id;
        //         echo 'Default Admin';
        //     }

        //     return $data['firstName'];

        //     $agent_RS = new Agent;
        //     $agent_RS->user_id = $currentUserId[0]->id;
        //     $agent_RS->admin_id = $adminIdToBeAssigned;
        //     $agent_RS->full_name = $data['firstName'] . " " .  $data['lastName'];
        //     $agent_RS->company_name = $data['company_name'];
        //     $agent_RS->broker_house = $data['broker_house'];
        //     $agent_RS->agent_type = 'real_state_agent';
        //     $agent_RS->save();

        // }else if ($data['formNumber'] == '3') {

        //     $registerPageUrl = $data['registerPage_url'];
        //     $registerPageUrl = explode("/",$registerPageUrl);
        //     $userEmail = $registerPageUrl[count($registerPageUrl)-1];

        //     if (strpos($userEmail, '@')) {
        //         $userId = User::where('email', $userEmail)->get('id');
        //         $adminData = Admin::where('user_id', $userId[0]->id)->get('id');
        //         if (count($adminData) > 0) {
        //             $adminIdToBeAssigned =  $adminData[0]['id'];
        //         }else{
        //             $masterSettingData = MasterSetting::all();
        //             $adminIdToBeAssigned = $masterSettingData[0]->default_admin_id;
        //             echo 'Default Admin';
        //         }
        //     }else{
        //         $masterSettingData = MasterSetting::all();
        //         $adminIdToBeAssigned = $masterSettingData[0]->default_admin_id;
        //         echo 'Default Admin';
        //     }

        //     $agent_MP = new Agent;
        //     $agent_MP->user_id = $currentUserId[0]->id;
        //     $agent_MP->admin_id = $adminIdToBeAssigned;
        //     $agent_MP->full_name = $data['firstName'] . " " .  $data['lastName'];
        //      $agent_RS->company_name = $data['company_name'];
        //     $agent_RS->broker_house = $data['broker_house'];
        //     $agent_MP->agent_type = 'mortgage_professional';
        //     $agent_MP->save();
        // }


        // return $User;
    }


    public function gettingAdminId(array $data , $adminIdToBeAssigned){

    }
}



// echo $req->validate([
//     'first_name_RS' => 'required|max:191',
// ]);

// echo $validatedData;