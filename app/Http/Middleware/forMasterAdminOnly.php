<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\MasterAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class forMasterAdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
         $userId =
            User::where('email',$user->email)->get(['id']);
        $checkIfUserIdFoundInMasterAdmin =
            MasterAdmin::where('user_id', $userId[0]->id)->get(['id']);

        // dd(count($checkIfUserIdFoundInMasterAdmin));
        if (count($checkIfUserIdFoundInMasterAdmin) > 0) {
            return $next($request);
        }else{
            dd('You Cannot Access That Page');
            return  redirect('admin_dashboard');
        }
        // return $next($request);
    }
}