<?php

namespace App\Http\Controllers;
use App\Coach;
use Illuminate\Http\Request;

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

    public function myMembers(Coach $coach)
    {
        return $coach->users[0]->name;
    }

}
