<?php


namespace App\Http\Controllers;
use App\Coach;
use App\messages;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use RealRashid\SweetAlert\Facades\Alert;

class CoachController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:coach');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('coach.CoachDashboard');
    }

    

    public function edit(Coach $coach)
    {
        return view('coach.UpdateProfile' , compact('coach'));
    }



    public function update(Request $request,Coach $coach)
    {
        if(Hash::check( request()->OldPass , $coach->password )){
                $data= request()->validate([
                    'name' => 'sometimes' ,
                    'email' => 'sometimes' ,
                    'password' => 'sometimes' ,
                    'age' => 'sometimes' ,
                ]);

                if(request()->password==null){
                    $data['password']= request()->OldPass;
                };

                $coach->update($data);
                $this->StoreImage($coach);
                Alert::success('done',' Profile Updated !');
                return redirect()->back();
                }

                
        Alert::error('Nope ', 'Wrong Password');
        return redirect()->back();
    }



    public function myMembers()
    {
        $coach=Auth::user();
        $mems= $coach->users()->paginate(5);
        return view('coach.myMembers' , compact('mems'));
    }

    public function DM(User $user)
    {
        return view('coach.sendM' , compact('user'));
    }

    public function DirectMessage(User $user)
    {
        $data=request()->validate([
            'CoachMassege' => 'required' ,
            'subject' => 'required'
        ]);
        //$user->update($data);
        
        messages::create([
            'coach_id' => Auth::user()->id ,
            'member_id' => $user->id ,
            'message' => request()->CoachMassege ,
            'Sender' => Auth::user()->name ,
            'subject' => request()->subject
        ]);

        Alert::success('Done!','Message Sent');
        return redirect('/coach/members');
    }


    public function MyMessages()
    {
        $user = Auth::user();
        $messages = $user->Messges ;
        
        return view('coach.myInbox', compact('messages'));
    }

    public function ViewMsg(messages $msg)   
    {
        $from = User::find($msg->member_id);
       return view('coach.viewMessage' , compact('msg' , 'from'));
    }


    public function SetMemPlan(User $user)
    {
        return view('coach.setP' , compact('user'));
    }

    public function StorePlan(User $user)
    {

        $data = request()->validate([
            'CoachPlan' => 'required'
        ]);

        $user->update($data);
        Alert::success('Done!','Plan Set');
        return redirect('/coach/members');
    }
    
    public function storeImage($coach){
        if(request()->has('image')){
            $coach->update([
                'image' => request()->image->store('uploads' , 'public')
            ]);
        
        
        }
        
    }
}


