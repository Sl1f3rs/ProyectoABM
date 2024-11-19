<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        $user = Auth::user();

        $estado = $user->state;

        if($estado == 1){
            $users = User::all();
            return view('users.index', compact('users'));
        }else{
            Auth::logout();
            return back()->withErrors(['email' => 'You Acount is Blocked.']);
        }
    }
}