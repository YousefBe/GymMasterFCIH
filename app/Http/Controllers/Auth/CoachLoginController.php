<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CoachLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:coach');
    }
    public function ShowLoginForm()
    {
        return view('coach.CoachLogin');
    }

    public function login(Request $request)
    {
        $this->validate( $request, [
            'email' => 'required|email',
            'password' => 'required|min:3'

        ]);
        if (Auth::guard('coach')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)) {
            return redirect()->intended(route('Coach.Dasboard'));
        }

        return redirect()->back()->withInput($request->only('email' , 'remember'));
    }
}
