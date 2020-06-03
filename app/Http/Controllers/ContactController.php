<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;


class ContactController extends Controller
{
   public function create()
   {
       return view('posts.BetterContact');
   }

   public function store()
   {
       $data = request()->validate([
           'subject' =>'required|min:5' ,
           'email'=> 'required' ,
           'Massege'=>'required|min:10'
       ]);
        Mail::to('test@test.com')->send(new ContactMail($data));
        Alert::success('done',' message sent !');
        return redirect('/');
   }

}
