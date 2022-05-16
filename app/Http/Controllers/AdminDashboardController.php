<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    //

    public function changePassword($newPassword){
        $user = Auth::user();
        User::where('email', $user->email)->update(['password' =>  Hash::make($newPassword)]);
        dd('Password Updated Successfully');
    }
}