<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterSetting;
use App\Models\User;
use App\Models\MasterAdmin;
use Illuminate\Support\Facades\Auth;

class ManageMasterSettingController extends Controller
{
    //
     //
    public function showAllDataOfMasterSetting(){
        $masterSettingData = MasterSetting::all();

        return view('master_settings')->with('masterSettingData',$masterSettingData);
    }

    //
    public function showEditDataOfMasterSetting($id){
        $masterSettingData = MasterSetting::where('id', $id)->get();
        // return $masterSettingData;
        return view('edit_master_settings')->with('masterSettingData',$masterSettingData);
    }

    //
      public function updateDataOfMasterSetting(Request $request){
        $target_dir = "images/masterSettingPic/" . $request->pathOfImage;
        if (isset($_FILES["image"]["tmp_name"]) && $_FILES["image"]["tmp_name"] != '' ) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                $files = glob('images/masterSettingPic/*'); // get all file names
                foreach($files as $file){ // iterate files
                    if(is_file($file)) {
                        unlink($file); // delete file
                    }
                }
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir);
            }
        }


        $post = MasterSetting::find($request->id_OfMasterSetting);
        $post->logo = $request->pathOfImage;
        $post->primary_color = $request->primaryColorOfMasterSetting;
        $post->secondary_color = $request->secondaryColorOfMasterSetting;
        $post->tertiary_color = $request->tertiaryColorOfMasterSetting;
        $post->primary_text_color = $request->primaryTextColorOfMasterSetting;
        $post->secondary_text_color = $request->secondaryTextColorOfMasterSetting;
        $post->tertiary_text_color = $request->tertiaryTextColorOfMasterSetting;
        $post->fourth_text_color = $request->fourthTextColorOfMasterSetting;
        $post->is_super_brandnig_on = $request->isSuperBrandingOnOfMasterSetting;
        $post->save();

         return $this->showAllDataOfMasterSetting();
    }


    // ____________________________________________
    public function saveTermsPageData(Request $req){
        $post = MasterSetting::find(1);
        $post->terms_data = $req['newData'];;
        $post->save();

        echo "Saved";
    }

    public function savePrivacyPageData(Request $req){
        $post = MasterSetting::find(1);
        $post->privacy_data = $req['newData'];;
        $post->save();

        echo "Saved";
    }
}