<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuperSetting;
use App\Models\User;
use App\Models\SuperAdmin;
use Illuminate\Support\Facades\Auth;

class ManageSuperSettingController extends Controller
{

    //
    public function showAllDataOfSuperSettings(){
        $superSettingData = SuperSetting::all();

        return view('super_settings')->with('superSettingData',$superSettingData);
    }

    //
    public function showEditDataOfSuperSettings($id){
        $superSettingsData = SuperSetting::where('id', $id)->get();
        return view('edit_super_settings')->with('superSettingsData',$superSettingsData);
    }

    //
      public function updateDataOfSuperSettings(Request $request){
        $target_dir = "images/superSettingPic/" . $request->pathOfImage;
        if (isset($_FILES["image"]["tmp_name"]) && $_FILES["image"]["tmp_name"] != '' ) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                $files = glob('images/superSettingPic/*'); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
                }
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir);
            } else {

            }
        }


        $post = SuperSetting::find($request->id_OfSuperSetting);
        $post->logo = $request->pathOfImage;
        $post->primary_color = $request->primaryColorOfSuperSetting;
        $post->secondary_color = $request->secondaryColorOfSuperSetting;
        $post->tertiary_color = $request->tertiaryColorOfSuperSetting;
        $post->primary_text_color = $request->primaryTextColorOfSuperSetting;
        $post->secondary_text_color = $request->secondaryTextColorOfSuperSetting;
        $post->tertiary_text_color = $request->tertiaryTextColorOfSuperSetting;
        $post->fourth_text_color = $request->fourthTextColorOfSuperSetting;
        $post->save();

         return $this->showAllDataOfSuperSettings();
    }

}
