<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    public function ShowLoginForm()
    {
        return view('admin.AdminLogin');
    }

    public function login(Request $request)
    {
        $this->validate( $request, [
            'email' => 'required|email',
            'password' => 'required|min:3'

        ]);
        if (Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)) {
            return redirect()->intended(route('admin.Dasboard'));
        }

        return redirect()->back()->withInput($request->only('email' , 'remember'));
    }
}
