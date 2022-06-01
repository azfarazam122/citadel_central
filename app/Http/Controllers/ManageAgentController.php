<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Agent;
use App\Models\Admin;
use App\Models\MasterAdmin;
use App\Models\SuperAdmin;
use Illuminate\Support\Facades\Auth;

class ManageAgentController extends Controller
{
    public function showAllData(){
        $user = Auth::user();
        $userId =
            User::where('email',$user->email)->get(['id']);

        // return $userId[0]->id;
        $adminId = Admin::where('user_id',$userId[0]->id)->get(['id']);
        $agentsList = Agent::where('admin_id',$adminId[0]->id)->get();
        // return $agentsList;


        return view('manage_agents')->with('agentData',$agentsList);
    }


    public function showEditData($id){
        $selectAgentsData = Agent::where('id', $id)->get();
        return view('edit_agent')->with('agentData',$selectAgentsData);
    }

    public function showDetailsOfAgent($id){
        $selectAgentsData = Agent::where('id', $id)->get();
        return view('agent_detail')->with('agentData',$selectAgentsData);
    }

    public function updateData(Request $request){
        echo $request->pathOfImage;
        $target_dir = "images/profile_pic/" . $request->pathOfImage;
        if (isset($_FILES["image"]["tmp_name"]) && $_FILES["image"]["tmp_name"] != '' ) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir);
            } else {

            }
        }
        $post = Agent::find($request->id_OfAgent);
        $post->full_name = $request->editNameOfAgent;
        $post->license_no = $request->editLicenseNoOfAgent;
        $post->phone = $request->editPhoneOfAgent;
        $post->facebook_link = $request->editFacebookLinkOfAgent;
        $post->linkedin_link = $request->editLinkedinLinkOfAgent;
        $post->instagram_link = $request->editInstagramLinkOfAgent;
        $post->twitter_link = $request->editTwitterLinkOfAgent;
        $post->profile_pic = $request->pathOfImage;
        $post->apply_now_link = $request->editApplyNowLinkOfAgent;
        $post->how_to_collect_your_miles_today_link = $request->editHowToCollectYourMilesTodayLinkOfAgent;
        $post->your_financial_journey_link = $request->editYourFinancialJourneyLinkOfAgent;
        $post->mortgage_prequalification_link = $request->editMortgagePrequalificationLinkOfAgent;
        $post->your_home_journey_link = $request->editYourHomeJourneyLinkOfAgent;
        $post->your_mortgage_calculators_link = $request->editYourMortgageCalculatorsLinkOfAgent;
        $post->calculate_how_you_can_be_mortgagefreesooner_link = $request->editCalculateHowYouCanBeMortgageFreeSoonerLinkOfAgent;
        $post->get_prequalified_now_link = $request->editGetPrequalifiedNowLinkOfAgent;
        $post->bio_apply_now_link = $request->editAboutPageBioLinkOfAgent;
        $post->about_us_apply_now_link = $request->editAboutPageLastApplyNowLinkOfAgent;
        $post->save();

        // return redirect('admin_dashboard/agent');
         return $this->showAllData();
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

    $admin = Auth::user();

    $admin = new Admin;
    $admin->user_id = $user_id[0]->id;
    $admin->name =  $request->nameOfUser;
    $admin->master_admin_id =  $admin->id;
    $admin->save();

     return $this->showAllData();
    // return  $validated;
        // Admin::where('id',$request->hiddenId)->update(['name' => $request->editName]);
        // redirect(route('/admin_dashboard/admins'));
        // return $this->showAllData();
    }


    // _______________________________________________________________________
    // _______________________________________________________________________
    // _______________________________________________________________________
    // WHEN AGENT LOGIN
    public function showAllDataForAgentLogin(){
        $user = Auth::user();
        $userId =
            User::where('email',$user->email)->get(['id']);

        // return $userId[0]->id;
        $agentData = Agent::where('user_id',$userId[0]->id)->get();
        // return $agentData;


        return view('agent')->with('agentData',$agentData);
    }

    public function updateDataForAgentLogin(Request $request){
        $target_dir = "images/profile_pic/" . $request->pathOfImage;
        if (isset($_FILES["image"]["tmp_name"]) && $_FILES["image"]["tmp_name"] != '' ) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir);
            } else {

            }
        }
        $post = Agent::find($request->id_OfAgent);
        $post->full_name = $request->editNameOfAgent;
        $post->license_no = $request->editLicenseNoOfAgent;
        $post->phone = $request->editPhoneOfAgent;
        $post->facebook_link = $request->editFacebookLinkOfAgent;
        $post->linkedin_link = $request->editLinkedinLinkOfAgent;
        $post->instagram_link = $request->editInstagramLinkOfAgent;
        $post->twitter_link = $request->editTwitterLinkOfAgent;
        $post->profile_pic = $request->pathOfImage;
        $post->apply_now_link = $request->editApplyNowLinkOfAgent;
        $post->how_to_collect_your_miles_today_link = $request->editHowToCollectYourMilesTodayLinkOfAgent;
        $post->your_financial_journey_link = $request->editYourFinancialJourneyLinkOfAgent;
        $post->mortgage_prequalification_link = $request->editMortgagePrequalificationLinkOfAgent;
        $post->your_home_journey_link = $request->editYourHomeJourneyLinkOfAgent;
        $post->your_mortgage_calculators_link = $request->editYourMortgageCalculatorsLinkOfAgent;
        $post->calculate_how_you_can_be_mortgagefreesooner_link = $request->editCalculateHowYouCanBeMortgageFreeSoonerLinkOfAgent;
        $post->get_prequalified_now_link = $request->editGetPrequalifiedNowLinkOfAgent;
        $post->bio_apply_now_link = $request->editAboutPageBioLinkOfAgent;
        $post->about_us_apply_now_link = $request->editAboutPageLastApplyNowLinkOfAgent;
        $post->save();

        // return redirect('admin_dashboard/agent');
         return $this->showAllDataForAgentLogin();
    }

    // WHEN AGENT LOGIN
    // _______________________________________________________________________
    // _______________________________________________________________________
    // _______________________________________________________________________
}