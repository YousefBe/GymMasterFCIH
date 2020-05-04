<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.AdminDashboard', array('user' => Auth::user()));
    }

    public function show(Admin $admin){
        
        return view('admin.profile' , compact('admin'));
    }

  

    public function edit(Admin $admin)
    {
    return view('admin.update',array('user' => Auth::user()));    }

    public function update(Admin $admin)
    {
        $data= $this->validateReq();
        $admin->update($data);
        $this->storeImage($admin);
    }



    public function validateReq()
    {
      return  request()->validate([
            'name' => 'required',
            'email'=>'required|email',
            'password'=>'required',
            'image'=>'sometimes|image|max:5000'
        ]);
    }




    public function storeImage($admin){
        if(request()->has('image')){
            $admin->update([
                'image' => request()->image->store('uploads' , 'public')
            ]);
          
        }
        
    }
}
