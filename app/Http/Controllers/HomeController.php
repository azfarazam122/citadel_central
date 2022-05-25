<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    // public function checkAgent(Request $request)
    // {
    //     return '123123';
    //     // agent_email
    //     // return $request->route()->parameter('agent_email');
    //     // return view('home');
    // }
}