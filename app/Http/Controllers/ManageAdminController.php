<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class ManageAdminController extends Controller
{
    public function showAllData(){
        $adminList = Admin::all();
        $userSpecificData = array();
        for ($i=0; $i < count($adminList) ; $i++) {
          $user = User::where('id', $adminList[$i]->user_id)->get();
          array_push($userSpecificData,$user);
        }
        // $arrayOfOutPut = array($adminList,$userSpecificData);
        // return $adminList[0]->name;

        return view('manage_admins')->with('adminData',$adminList)->with('userData',$userSpecificData);
        // return view('manage_admins')->with('adminData',$adminList);
        // return redirect(route('/admin_dashboard/admins'));

    }

    public function showEditData($id){
        $selectAdminData = Admin::where('user_id', $id)->get();
        return view('edit_admin')->with('adminData',$selectAdminData);
    }

    public function updateData(Request $request){
        Admin::where('id',$request->hiddenId)->update(['name' => $request->editName]);
        // redirect(route('/admin_dashboard/admins'));
        return $this->showAllData();
    }
    public function deleteData($id){
        // Admin::where('user_id',$id)->delete();
         return redirect('/admin_dashboard/admins');
    }

    public function createAdmin(Request $request){
         $validated = $request->validate([
        'nameOfAdmin' => 'required|max:100',
        'emailOfAdmin' => 'required|unique:App\Models\User,email|max:100',
        'passwordOfAdmin' => 'required|max:100',
    ]);

    $user = new User;
    $user->email = $request->emailOfAdmin;
    $user->password =  Hash::make($request->passwordOfAdmin);
    $user->save();

      $user_id = User::select('id')->where('email', $request->emailOfAdmin)->get();;

     $admin = new Admin;
    $admin->user_id = $user_id[0]->id;
    $admin->name =  $request->nameOfAdmin;
    $admin->master_admin_id =  "2031";
    $admin->save();

     return $this->showAllData();
    // return  $validated;
        // Admin::where('id',$request->hiddenId)->update(['name' => $request->editName]);
        // redirect(route('/admin_dashboard/admins'));
        // return $this->showAllData();
    }
}