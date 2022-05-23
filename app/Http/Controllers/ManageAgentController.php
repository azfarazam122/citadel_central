<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Agent;
use App\Models\Admin;
use App\Models\MasterAdmin;
use App\Models\SuperAdmin;

class ManageAgentController extends Controller
{
    public function showAllData(){
        $agentsList = Agent::all();
        // return $agentsList[0];
        return view('manage_agents')->with('agentData',$agentsList);
    }

    public function showEditData($id){
        $selectAgentsData = Agent::where('id', $id)->get();
        return view('edit_agent')->with('agentData',$selectAgentsData);
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

    public function createAgent(Request $request){
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