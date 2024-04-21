<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
     * @return \Inertia\Response
     */
    public function index()
    {

        $this->middleware('auth');
        $jobs = [];
        if (auth()->user()->isEnterprise()){
            $enterprise = auth()->user()->enterprise;
            $jobs = Job::where('enterprise_id', $enterprise->id)->get();
        }

        if (auth()->user()->isApplicant()){
            $jobs = auth()->user()->applicant->jobs;
        }
        $jobs->load('enterprise');
        $jobs->load('applicants');
        $jobs->load('category');

        return Inertia::render('dashboard/Dashboard', [
            'jobs' => $jobs
        ]);
    }

    public function show(Job $job)
    {
        //only enterprise can see the job details
        if (auth()->user()->isApplicant()) {
            return redirect()->route('home');
        }

        $job->load('enterprise');
        $job->load('applicants');
        $job->load('category');
        return Inertia::render('dashboard/JobSeekers', compact('job'));
    }

    public function edit(Job $job): \Inertia\Response
    {
        return Inertia::render('dashboard/EditJob', compact('job'));
    }

    public function update(Request $request, Job $job): \Illuminate\Http\RedirectResponse
    {
        $job->update($request->all());
        return redirect()->route('dashboard-job', $job->slug);
    }

    public function destroy(Job $job): \Illuminate\Http\RedirectResponse
    {
        $job->delete();
        return redirect()->route('dashboard');
    }

    public function applicants(Job $job): \Inertia\Response
    {
        $job->load('applicants');
        //load user for each applicant
        $job->applicants->load('user');
        $job->load('category');
        $job->load('enterprise');
        return Inertia::render('dashboard/Applicants', compact('job'));
    }

    public function applicant(Job $job, $applicant): \Inertia\Response
    {
        $applicant = $job->applicants()->where('applicant_id', $applicant)->first();
        return Inertia::render('dashboard/Applicant', compact('applicant'));
    }
}
