<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\SuperAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class forSuperAdminOnly
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
        if(!auth()->check()){
            return  redirect(route('login'));
        }else{
            $user = Auth::user();
            $userId =
                User::where('email',$user->email)->get(['id']);
            $checkIfUserIdFoundInSuperAdmin =
                SuperAdmin::where('user_id', $userId[0]->id)->get(['id']);

            // dd(count($checkIfUserIdFoundInSuperAdmin));
            if (count($checkIfUserIdFoundInSuperAdmin) > 0) {
                return $next($request);
            }else{
                // dd('You Cannot Access That Page');
                return  redirect('admin_dashboard');
            }
        }
    }
}
