<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Coach;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;


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

    public function update(Request $request,Admin $admin)
    {
        if(Hash::check( request()->OldPass , $admin->password )){
                $data= request()->validate([
                    'name' => 'sometimes' ,
                    'email' => 'sometimes' ,
                    'password' => 'sometimes|confirmed' ,
                ]);

                if(request()->password==null){
                    $data['password']= request()->OldPass;
                };

                $admin->update($data);
                $this->StoreImage($admin);
                Alert::success('done',' Profile Updated !');
                return redirect()->back();
                }


        Alert::error('Nope ', 'Wrong Password');
        return redirect()->back();
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
