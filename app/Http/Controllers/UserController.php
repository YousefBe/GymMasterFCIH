<?php

namespace App\Http\Controllers;

use App\Coach;
use App\Messages;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('members.Profile' , array('user' => Auth::user()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('members.editProfile',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(Hash::check( request()->OldPass , $user->password )){
            $data= request()->validate([
                'image' => 'sometimes|image|max:2000' ,
                'name' => 'sometimes|string|max:16' ,
                'age' => 'sometimes|integer' ,
                'email' => 'sometimes|email' ,
                'password' => 'sometimes|confirmed' ,
                'Weight' => 'sometimes|integer' ,
                'height' => 'sometimes|integer' ,
            ]);
            if(request()->password==null){
                $data['password']= request()->OldPass;
           };
            $user->update($data);
             $this->StoreImage($user);
             Alert::success('done',' Profile Updated !');
            return redirect()->back();
        }
        Alert::error('Nope ', 'Wrong Password');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    
    private function storeImage($user){
        if(request()->has('image')){
            $user->update([
                'image' => request()->image->store('uploads' , 'public')
                ]);
                
            }
            
        }
  

    public function MyMsgs()
    {
        $user = Auth::user();
        $messages =$user->Messges;



        return view('members.msgs' , compact('messages')) ;
    }

    public function ViewMsg(Messages $msg)
    {
        return view('members.viewMessage' , compact('msg'));
    }

    public function myCoach(User $user)
    {
        return $user->coach;
    }

    public function DMCoach()
    {
        $user = Auth::user();
        if($user->coach==null){
            Alert::error('Nope ', 'You Dont have a coach Yet');
           return redirect('/member/profile');
        }else{
            $hisCoach = $user->coach;
            return view('members.DMCoach',compact('hisCoach'));
        }
    }

    public function SendCoachMessage(Coach $coach)
    {
     $data=request()->validate([
         'memberMessage' => 'required|string' ,
         'subject' =>'required|string' ,
     ]);
        $msg = Messages::create([
            'member_id' => Auth::user()->id ,
            'coach_id'  => $coach->id ,
            'message'   => request()->input('memberMessage') ,
            'subject'   => request()->input('subject') ,
            'Sender'    => Auth::user()->name
        ]);
        Alert::success('done',' message sent Successfully !');
         return redirect('/');
    }

}
