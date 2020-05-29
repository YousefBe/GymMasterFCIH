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
    //mange members

    public function MangeMembers()
    {
        $mems =User::paginate(6);

        return view('admin.ViewMembers' , compact('mems'));
    }
//mange Coaches


    public function MangeCoaches()
    {
        $cocs =Coach::paginate(6);

        return view('admin.Mycoaches' , compact('cocs'));
    }
    //destroy Members And Coaches

    public function DestroyMembers(User $user)
    {
        $user->delete();  
        Alert::success('done','Deleted a poor member');
        return redirect('admin/MangeMembers');

    }
    public function DestroyCoach(Coach $coach)
    {
        $coach->delete();
        Alert::success('done','Deleted a poor coach');

        return redirect('/admin/MangeCoaches');
    }


// assign coach to membe
    public function AssignCoach(User $user)
    {

        $coaches=Coach::all();

        return view('admin.AssignCoach',compact('coaches','user'));
    }

    public function AssignConfirm(User $user)
    {
        request()->validate([
            'SetCoach' => 'required'
        ]);
            $a = request()->SetCoach;

            $user->update([
                'coach_id' => $a
            ]) ;

            Alert::success('done','Coach Successfully Assigned');

            return redirect('/admin/MangeMembers');
    }
//create coach

    public function addNewCoach()
    {
        return view('admin.NewCoach');
    }

    public function createCoach()
    {
       $date=request()->validate([
           'name'=> 'required',
           'email' => 'required|email',
           'password' => 'required|min:3',
           'age' => 'required|integer',
           'salary' => 'required|integer'
       ]);

        $a =Coach::create($date);
        Alert::success('done','Coach Successfully Created !');
        return redirect('/admin/MangeCoaches');
    }



//create admin 

    public function AddaNewAdmin()
    {
        return view('admin.AddAdmin');
    }


    public function createAdmin()
    {
        $data=request()->validate([
            'name' => 'required' ,
            'email' => 'required|email' ,
            'password' => 'required|min:3'
        ]);

        $admin = Admin::create($data);
        Alert::success('done','Admin Successfully Created !');
        return redirect('/admin/AllAdmins');
    }



//view admins

    public function myAdmins()
    {
        $admins = Admin::paginate(6);

        return view('admin.myadmins', compact('admins'));
    }



}
