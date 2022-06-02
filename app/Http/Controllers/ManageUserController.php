<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Agent;
use App\Models\Admin;
use App\Models\MasterAdmin;
use App\Models\SuperAdmin;

class ManageUserController extends Controller
{
       public function showAllData(){
        $userList = User::all();

        for ($i=0; $i < count($userList); $i++) {
            $checkIfUserIdFoundInCustomerTable =
            Customer::where('user_id', $userList[$i]->id)->get(['id']);
            $checkIfUserIdFoundInAgentTable =
            Agent::where('user_id', $userList[$i]->id)->get(['id']);
            $checkIfUserIdFoundInAdminTable =
            Admin::where('user_id', $userList[$i]->id)->get(['id']);
            $checkIfUserIdFoundInMasterAdmin =
            MasterAdmin::where('user_id', $userList[$i]->id)->get(['id']);
            $checkIfUserIdFoundInSuperAdmin =
            SuperAdmin::where('user_id', $userList[$i]->id)->get(['id']);
            $userList[$i]['role'] = '';
            if (count($checkIfUserIdFoundInCustomerTable) > 0) {
                $userList[$i]['role'] = 'Customer';
            }
            if (count($checkIfUserIdFoundInAgentTable) > 0) {
                if ($userList[$i]['role'] == '') {
                $userList[$i]['role'] = 'Agent';
                }else{
                    $userList[$i]['role'] .= ', Agent';
                }
            }
            if (count($checkIfUserIdFoundInAdminTable) > 0) {
                 if ($userList[$i]['role'] == '') {
                     $userList[$i]['role'] = 'Admin';
                 }else{
                     $userList[$i]['role'] .= ', Admin';
                 }
            }
            if (count($checkIfUserIdFoundInMasterAdmin) > 0) {
                  if ($userList[$i]['role'] == '') {
                      $userList[$i]['role'] = 'Master Admin';
                  }else{
                      $userList[$i]['role'] .= ', Master Admin';
                  }
            }
            if (count($checkIfUserIdFoundInSuperAdmin) > 0) {
                if ($userList[$i]['role'] == '') {
                    $userList[$i]['role'] = 'Super Admin';
                }else{
                    $userList[$i]['role'] .= ', Super Admin';
                }
            }
        }
        // return $userList;
        return view('manage_users')->with('userData',$userList);
    }

    public function showEditData($id){
        $selectUserData = User::where('id', $id)->get();
        return view('edit_user')->with('userData',$selectUserData);
    }

    public function updateData(Request $request){
        // Admin::where('id',$request->hiddenId)->update(['name' => $request->editName]);
        // // redirect(route('/admin_dashboard/admins'));
        // return $this->showAllData();
    }
    public function deleteData($id){
        // User::where('id',$id)->delete();
         return redirect('/admin_dashboard/users');
    }

    public function createUser(Request $request){
         $validated = $request->validate([
        'nameOfUser' => 'required|max:100',
        'emailOfUser' => 'required|unique:App\Models\User,email|max:100',
        'passwordOfUser' => 'required|max:100',
    ]);

    $user = new User;
    $user->email = $request->emailOfUser;
    $user->password =  Hash::make($request->passwordOfUser);
    $user->save();

    $user_id = User::select('id')->where('email', $request->emailOfUser)->get();;

    $admin = new Admin;
    $admin->user_id = $user_id[0]->id;
    $admin->name =  $request->nameOfUser;
    $admin->master_admin_id =  "2031";
    $admin->save();

     return $this->showAllData();
    // return  $validated;
        // Admin::where('id',$request->hiddenId)->update(['name' => $request->editName]);
        // redirect(route('/admin_dashboard/admins'));
        // return $this->showAllData();
    }
}
