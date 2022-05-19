<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
         return $this->showAllData();
    }
}