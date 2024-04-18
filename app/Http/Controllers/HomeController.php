<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (auth()->user()->isEnterprise()){
            $enterprise = auth()->user()->enterprise;
            $jobs = Job::where('enterprise_id', $enterprise->id)->get();
            return view('pages.dashboard', compact('jobs'));
        }

        if (auth()->user()->isApplicant()){
            $jobs = auth()->user()->applicant->jobs;
            return view('pages.dashboard', compact('jobs'));
        }



        $jobs = Job::all();
        return view('pages.dashboard', compact('jobs'));
    }
}
