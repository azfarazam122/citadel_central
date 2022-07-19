<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Agent;
use App\Models\AgentPageStaging;
use App\Models\MasterSetting;
use App\Models\User;
use App\Models\Widget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManageAdminController extends Controller
{
    public function showAllData()
    {

        $adminList = Admin::all();
        for ($i = 0; $i < count($adminList); $i++) {
            $user = User::where('id', $adminList[$i]->user_id)->get();
            $adminList[$i]->email = $user[0]->email;
        }

        return view('manage_admins')->with('adminData', $adminList);
    }

    public function showEditData($id)
    {
        $selectedAdminData = Admin::where('user_id', $id)->get();
        $user = User::where('id', $id)->get();
        $selectedAdminData[0]->email = $user[0]->email;
        $agentsAssignToThatAdmin = Agent::where('admin_id', $selectedAdminData[0]->id)->get();
        if (count($agentsAssignToThatAdmin) > 0) {
            for ($i = 0; $i < count($agentsAssignToThatAdmin); $i++) {
                $user = User::where('id', $agentsAssignToThatAdmin[$i]->user_id)->get();
                $agentsAssignToThatAdmin[$i]->email = $user[0]->email;

            }
            return view('edit_admin')->with('adminData', $selectedAdminData)->with('agentData', $agentsAssignToThatAdmin);
        } else {
            return view('edit_admin')->with('adminData', $selectedAdminData);
        }
        return count($agentsAssignToThatAdmin);
    }

    public function showDetailedData($id)
    {
        $selectedAdminData = Admin::where('user_id', $id)->get();
        $user = User::where('id', $id)->get();
        $selectedAdminData[0]->email = $user[0]->email;
        return view('detail_admin')->with('adminData', $selectedAdminData);
    }

    public function updateData(Request $request)
    {
        $createEmailDirPath = "images/adminSettingPic/" . $request->email_OfAdminSetting;
        if (!file_exists($createEmailDirPath)) {
            mkdir($createEmailDirPath, 0777, true);
        }
        $target_dir = "images/adminSettingPic/" . $request->email_OfAdminSetting . "/" . $request->pathOfImage;
        // return  $target_dir;
        if (isset($_FILES["image"]["tmp_name"]) && $_FILES["image"]["tmp_name"] != '') {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                $files = glob('images/adminSettingPic/' . $request->email_OfAdminSetting . '/*'); // get all file names
                foreach ($files as $file) { // iterate files
                    if (is_file($file)) {
                        unlink($file); // delete file
                    }
                }
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir);
            }
        }

        $post = Admin::find($request->id_OfAdminSetting);
        $post->name = $request->name_OfAdminSetting;
        $post->logo = $request->pathOfImage;
        $post->primary_color = $request->primaryColorOfAdminSetting;
        $post->secondary_color = $request->secondaryColorOfAdminSetting;
        $post->tertiary_color = $request->tertiaryColorOfAdminSetting;
        $post->primary_text_color = $request->primaryTextColorOfAdminSetting;
        $post->secondary_text_color = $request->secondaryTextColorOfAdminSetting;
        $post->tertiary_text_color = $request->tertiaryTextColorOfAdminSetting;
        $post->fourth_text_color = $request->fourthTextColorOfAdminSetting;
        $post->save();

        return $this->showAllData();

        // Admin::where('id',$request->hiddenId)->update(['name' => $request->editName]);
        // redirect(route('/admin_dashboard/admins'));

    }

    public function createAdmin(Request $request)
    {
        $validated = $request->validate([
            'nameOfAdmin' => 'required|max:100',
            'emailOfAdmin' => 'required|unique:App\Models\User,email|max:100',
            'passwordOfAdmin' => 'required|max:100',
        ]);
        $user = new User;
        $user->email = $request->emailOfAdmin;
        $user->password = Hash::make($request->passwordOfAdmin);
        $user->save();

        $user_id = User::select('id')->where('email', $request->emailOfAdmin)->get();

        $admin = new Admin;
        $admin->user_id = $user_id[0]->id;
        $admin->name = $request->nameOfAdmin;
        $admin->master_admin_id = "2031";
        $admin->save();

        return $this->showAllData();
    }

    public function deleteAllRoles(Request $req)
    {
        return $req['id'];
        // return response()->json($req['id']);
        // User::where('id',$req['id'])->delete();
        // Admin::where('user_id',$req['id'])->delete();
        // Customer::where('user_id',$req['id'])->delete();
        // Agent::where('user_id',$req['id'])->delete();
        // MasterAdmin::where('user_id',$req['id'])->delete();
        // SuperAdmin::where('user_id',$req['id'])->delete();

    }
    public function deleteAdminRoleOnly(Request $req)
    {
        // return $req['id'];

        $adminData = Admin::where('user_id', $req['id'])->get();
        $agentAssignToThatAdmin = Agent::where('admin_id', $adminData[0]->id)->get();
        if (count($agentAssignToThatAdmin) > 0) {
            return 'Contains Agents';
        } else {
            // Admin::where('user_id',$req['id'])->delete();
            return 'Successfully Deleted';
        }
    }

    public function setAdminAsDefaultFunc(Request $req)
    {
        // return $req['id'];

        $post = MasterSetting::find('1');
        $post->default_admin_id = $req['id'];
        $post->save();

    }

    public function setAgentAsDefaultFunc(Request $req)
    {
        // return $req['id'];

        $post = MasterSetting::find('1');
        $post->default_agent_id = $req['id'];
        $post->save();

    }

    public function setAgentAsApprovedFunc(Request $req)
    {
        // return $req['id'];
        $post = Agent::find($req['id']);
        $post->is_approved = 'true';
        $post->save();

    }

    public function setAgentAsUnApprovedFunc(Request $req)
    {
        // return $req['id'];
        $post = Agent::find($req['id']);
        $post->is_approved = 'false';
        $post->save();

    }

    // ___________________________________________________________
    // ___________________________________________________________
    // ___________________________________________________________
    // ADMIN SETTINGS
    //
    public function showAllDataOfAdminSetting()
    {
        $user = Auth::user();
        $adminSettingData = Admin::where('user_id', $user->id)->get();
        $adminSettingData[0]->email = $user->email;
        // return $adminSettingData;
        return view('admin')->with('adminSettingData', $adminSettingData);
    }

    //
    public function showEditDataOfAdminSetting($id)
    {
        $user = Auth::user();
        $adminSettingData = Admin::where('user_id', $id)->get();
        $adminSettingData[0]->email = $user->email;
        // return $masterSettingData;
        return view('admin_edit')->with('adminSettingData', $adminSettingData);
    }

    public function showDetailedDataOfAdminSetting($id)
    {
        $user = Auth::user();
        $adminSettingData = Admin::where('user_id', $id)->get();
        $adminSettingData[0]->email = $user->email;
        // return $masterSettingData;
        return view('admin_detail')->with('adminSettingData', $adminSettingData);
    }

    public function agentEachPageData($id)
    {
        $agentEachPageData = AgentPageStaging::where('agent_id', $id)->get();
        $agentData = Agent::where('id', $id)->get();
        $agentEmail = User::where('id', $agentData[0]->user_id)->get('email');
        $agentData[0]['email'] = $agentEmail[0]->email;
        $agentData = $agentData[0];
        return view('agent_page')->with('agentPagesList', $agentEachPageData)->with('agentData', $agentData);
    }

    public function setAgentPageAsApprovedOrDisapprovedFunc(Request $req)
    {
        // echo '123123';

        // echo $req['adminRequest'];
        // echo $req['pageId'];
        // echo $req['agentId'];

        $post = AgentPageStaging::where("agent_id", $req['agentId'])->where('page_id', $req['pageId'])->first();
        $post->is_submitted_for_approval = 0;
        if ($req['adminRequest'] == "Approve") {
            $post->is_approved = 1;
        } else {
            $post->is_approved = 0;
            $post->reason_for_disapproval = $req['reasonForDisapproval'];
        }
        $post->save();

        echo "successfull";

    }

    // View Agent Pages
    public function viewAgentPage($page_id, $email)
    {
        $user_id = User::where('email', $email)->get('id');
        $agent_id = Agent::where('user_id', $user_id[0]->id)->get('id');

        $agentEachPageData = AgentPageStaging::where('agent_id', $agent_id[0]->id)->where('page_id', $page_id)->first();
        // dd($agentEachPageData->data);

        $widgetData = Widget::all();

        // dd($widgetData[0]->data);
        $agentEachPageData->data = str_replace("[[How_to_Collect_Your_Miles_Today]]", $widgetData[0]->data ,$agentEachPageData->data);
        return view('agent_page_preview.home_page_view')->with('agentHomePageData', $agentEachPageData->data)->render();
    }

    //
    public function updateDataOfAdminSetting(Request $request)
    {
        $createEmailDirPath = "images/adminSettingPic/" . $request->email_OfAdminSetting;
        if (!file_exists($createEmailDirPath)) {
            mkdir($createEmailDirPath, 0777, true);
        }
        $target_dir = "images/adminSettingPic/" . $request->email_OfAdminSetting . "/" . $request->pathOfImage;
        // return  $target_dir;
        if (isset($_FILES["image"]["tmp_name"]) && $_FILES["image"]["tmp_name"] != '') {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                $files = glob('images/adminSettingPic/' . $request->email_OfAdminSetting . '/*'); // get all file names
                foreach ($files as $file) { // iterate files
                    if (is_file($file)) {
                        unlink($file); // delete file
                    }
                }
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir);
            }
        }

        $post = Admin::find($request->id_OfAdminSetting);
        $post->name = $request->name_OfAdminSetting;
        $post->company_name = $request->companyName_OfAdminSetting;
        $post->logo = $request->pathOfImage;
        $post->primary_color = $request->primaryColorOfAdminSetting;
        $post->secondary_color = $request->secondaryColorOfAdminSetting;
        $post->tertiary_color = $request->tertiaryColorOfAdminSetting;
        $post->primary_text_color = $request->primaryTextColorOfAdminSetting;
        $post->secondary_text_color = $request->secondaryTextColorOfAdminSetting;
        $post->tertiary_text_color = $request->tertiaryTextColorOfAdminSetting;
        $post->fourth_text_color = $request->fourthTextColorOfAdminSetting;
        $post->save();

        return $this->showAllDataOfAdminSetting();
    }
    // ___________________________________________________________
    // ___________________________________________________________
    // ___________________________________________________________

}