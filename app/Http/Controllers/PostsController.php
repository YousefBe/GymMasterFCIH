<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
   public function index() {

    return view ('posts.Home');
   }

   public function Signup() {

      return view ('auth.register');
     }

     public function Login() {

      return view ('posts.login');
     }

public function contact() {

      return view ('posts.contact');
     }
     public function store(Request $request) {

      $this->validate($request,[
         'name'=>'required',
         'email'=>'required|email',
         'message'=>'required'
      ]);
      Mail::send('emails.contact-message',[
         'msg'=>$request->message
      ],function($mail) use($request){
            $mail->from($request->email, $request->name);
            $mail->to('pokerf036@gmail.com')->subject('contact message');
      });

            return redirect()->back()->with('flash_message','Thank you.');

     }

}
