<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
   public function index() {

    return view ('posts.Home');
   }

   public function Signup() {

      return view ('posts.Signup');
     }

     public function Login() {

      return view ('posts.login');
     }



}
