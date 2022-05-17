<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    //

    public function changePassword(Request $request){
        $newPassword = $request->newPassword;
        if(!auth()->check()){
            return  redirect(route('login'));
        }else{
           $user = Auth::user();
           User::where('email', $user->email)->update(['password' =>  Hash::make($newPassword)]);
           return 'Password Updated Successfully';
        }

    //  return $request->newPassword;

   //  return dd($request->newPassword);

    }
}