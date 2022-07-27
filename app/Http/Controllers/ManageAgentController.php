<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Agent;
use App\Models\Admin;
use App\Models\MasterAdmin;
use App\Models\SuperAdmin;
use App\Models\Page;
use App\Models\AgentPageStaging;
use App\Models\Widget;
use Illuminate\Support\Facades\Auth;

class ManageAgentController extends Controller{

    public function showAllData(){
        $user = Auth::user();
        $userId =
            User::where('email',$user->email)->get(['id']);
        $masterAdminFound = MasterAdmin::where('user_id',$user->id)->get();
        if (count($masterAdminFound) > 0) {
            $agentsList = Agent::all();
        }else{
            $adminId = Admin::where('user_id',$userId[0]->id)->get(['id']);
            $agentsList = Agent::where('admin_id',$adminId[0]->id)->get();
        }


        // return $agentsList[0]->user_id;
        for ($i=0; $i < count($agentsList); $i++) {
            $userEmail = User::where('id',$agentsList[$i]->user_id)->get(['email']);
            $agentsList[$i]->email = $userEmail[0]->email;
        }

        return view('manage_agents')->with('agentData',$agentsList);
    }


    public function showEditData($id){
        $selectedAgentsData = Agent::where('id', $id)->get();
        $userEmail = User::where('id',$selectedAgentsData[0]->user_id)->get(['email']);
        $selectedAgentsData[0]->email = $userEmail[0]->email;
        return view('edit_agent')->with('agentData',$selectedAgentsData);
    }


    public function showDetailsOfAgent($id){
        $selectedAgentsData = Agent::where('id', $id)->get();
        $userEmail = User::where('id',$selectedAgentsData[0]->user_id)->get(['email']);
        $selectedAgentsData[0]->email = $userEmail[0]->email;
        return view('agent_detail')->with('agentData',$selectedAgentsData);
    }
    public function updateData(Request $request){

        $file_path = "images/profile_pic/" . $request->emailOfAgent;
        if (!file_exists($file_path)) {
            mkdir($file_path, 0777, true);
        }

        $target_dir = "images/profile_pic/" . $request->emailOfAgent . "/" . $request->pathOfImage;
        if (isset($_FILES["image"]["tmp_name"]) && $_FILES["image"]["tmp_name"] != '' ) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                $files = glob("images/profile_pic/" . $request->emailOfAgent ."/*" ); // get all file names
                foreach($files as $file){ // iterate files
                    if(is_file($file)) {
                        unlink($file); // delete file
                    }
                }
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



        $file_path = "images/profile_pic/" . $request->emailOfAgent;
        if (!file_exists($file_path)) {
            mkdir($file_path, 0777, true);
        }

        $target_dir = "images/profile_pic/" . $request->emailOfAgent . "/" . $request->pathOfImage;
        if (isset($_FILES["image"]["tmp_name"]) && $_FILES["image"]["tmp_name"] != '' ) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                $files = glob("images/profile_pic/" . $request->emailOfAgent ."/*" ); // get all file names
                foreach($files as $file){ // iterate files
                    if(is_file($file)) {
                        unlink($file); // delete file
                    }
                }
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir);
            }
        }

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
    }


    // _______________________________________________________________________
    // WHEN AGENT LOGIN
    public function showAllDataForAgentLogin(){
        $user = Auth::user();
        $userId =
            User::where('email',$user->email)->get(['id']);

        $agentData = Agent::where('user_id',$userId[0]->id)->get();
        $agentData[0]->email = $user->email;
        // return $agentData[0];


        return view('agent')->with('agentData',$agentData);
    }

    public function updateDataForAgentLogin(Request $request){
        $file_path = "images/profile_pic/" . $request->emailOfAgent;
        if (!file_exists($file_path)) {
            mkdir($file_path, 0777, true);
        }

        $target_dir = "images/profile_pic/" . $request->emailOfAgent . "/" . $request->pathOfImage;
        if (isset($_FILES["image"]["tmp_name"]) && $_FILES["image"]["tmp_name"] != '' ) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                $files = glob("images/profile_pic/" . $request->emailOfAgent ."/*" ); // get all file names
                foreach($files as $file){ // iterate files
                    if(is_file($file)) {
                        unlink($file); // delete file
                    }
                }
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
    // PAGES EDITOR BY AGENT
    public function saveEditorSubPageData(Request $req){
        $agentLoggedIn = Auth::user();
        $agentData = Agent::where('user_id',$agentLoggedIn->id)->get();
        $post = AgentPageStaging::where("agent_id", $agentData[0]->id)->where('page_id',$req->current_page_id)->first();
        // echo $post;
        // $post->data = '123123123';
        $post->data = $req['newData'];
        $post->save();

        echo "Saved";
    }
    public function submitPagesEditorSubPageForApproval(Request $req){
        $agentLoggedIn = Auth::user();
        $agentData = Agent::where('user_id',$agentLoggedIn->id)->get();
        $post = AgentPageStaging::where("agent_id", $agentData[0]->id)->where('page_id',$req->current_page_id)->first();
        // echo $post;
        // $post->data = '123123123';
        $post->is_submitted_for_approval = 1;
        $post->is_approved = 0;
        $post->save();

        echo "Submitted For Approval";
    }

    public function setAsDefaultPageInPagesEditorView(Request $req){
        if ($req->current_page_id == '1') {
            $homePageDefaultData = Page::find(1);
            $data =  $homePageDefaultData->default_data;
            echo $data;
        }else if($req->current_page_id == '2') {
            $homePageDefaultData = Page::find(2);
            $data =  $homePageDefaultData->default_data;
            echo $data;
        }else if($req->current_page_id == '3') {
            $homePageDefaultData = Page::find(3);
            $data =  $homePageDefaultData->default_data;
            echo $data;
        }
    }

    // VIEW YOUR PAGE FOR AGENT
     public function viewYourPage($page_id, $email)
    {
        $user_id = User::where('email', $email)->get('id');
        $agent = Agent::where('user_id', $user_id[0]->id)->get();
        // dd($agent[0]->how_to_collect_your_miles_today_link);

        $agentEachPageData = AgentPageStaging::where('agent_id', $agent[0]->id)->where('page_id', $page_id)->first();
        // dd($agentEachPageData->data);

        $widgetData = Widget::all();

        if ($page_id == "1") {
            # code...
            // Replacing Variables With Sub Templated
            if (str_contains($agentEachPageData->data, "[[How_to_Collect_Your_Miles_Today]]")){
                $agentEachPageData->data = str_replace("[[How_to_Collect_Your_Miles_Today]]", view('widgets.How_to_Collect_Your_Miles_Today')->with('agentData',$agent) ,$agentEachPageData->data);
            }
            if (str_contains($agentEachPageData->data, "[[Your_Financial_Journey_Link]]")){
                $agentEachPageData->data = str_replace("[[Your_Financial_Journey_Link]]", view('widgets.Your_Financial_Journey_Link')->with('agentData',$agent) ,$agentEachPageData->data);
            }
            if (str_contains($agentEachPageData->data, "[[Mortgage_Prequalification_Link]]")){
                $agentEachPageData->data = str_replace("[[Mortgage_Prequalification_Link]]", view('widgets.Mortgage_Prequalification_Link')->with('agentData',$agent) ,$agentEachPageData->data);
            }
            if (str_contains($agentEachPageData->data, "[[Your_Home_Journey_Link]]")){
                $agentEachPageData->data = str_replace("[[Your_Home_Journey_Link]]", view('widgets.Your_Home_Journey_Link')->with('agentData',$agent) ,$agentEachPageData->data);
            }
            if (str_contains($agentEachPageData->data, "[[Your_Mortgage_Calculators_Link]]")){
                $agentEachPageData->data = str_replace("[[Your_Mortgage_Calculators_Link]]", view('widgets.Your_Mortgage_Calculators_Link')->with('agentData',$agent) ,$agentEachPageData->data);
            }
            if (str_contains($agentEachPageData->data, "[[Get_Prequalified_Now_Link]]")){
                $agentEachPageData->data = str_replace("[[Get_Prequalified_Now_Link]]", view('widgets.Get_Prequalified_Now_Link')->with('agentData',$agent) ,$agentEachPageData->data);
            }
            if (str_contains($agentEachPageData->data, "[[Calculate_How_You_Can_Be_MortgageFreeSooner_Link]]")){
                $agentEachPageData->data = str_replace("[[Calculate_How_You_Can_Be_MortgageFreeSooner_Link]]", view('widgets.Calculate_How_You_Can_Be_MortgageFreeSooner_Link')->with('agentData',$agent) ,$agentEachPageData->data);
            }
            return view('agent_page_preview.home_page_view')->with('agentHomePageData', $agentEachPageData->data);
        }

    }
    // _______________________________________________________________________


}