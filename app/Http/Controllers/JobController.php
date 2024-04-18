<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Category;
use App\Models\Job;
use App\Models\Testimony;

class JobController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $activeType = request('active_type', 'full-time');

        $fullTimeJobs = Job::where('type', 'full-time')->paginate(15);
        $internshipJobs = Job::where('type', 'internship')->paginate(15);
        $partTimeJobs = Job::where('type', 'part-time')->paginate(15);
        $freelanceJobs = Job::where('type', 'freelance')->paginate(15);


        $typesJobs = [
            [
                'id' => 'full-time',
                'name' => 'Full Time',
                'jobs' => $fullTimeJobs
            ],
            [
                'id' => 'internship',
                'name' => 'Internship',
                'jobs' => $internshipJobs
            ],
            [
                'id' => 'part-time',
                'name' => 'Part Time',
                'jobs' => $partTimeJobs
            ],
            [
                'id' => 'freelance',
                'name' => 'Freelance',
                'jobs' => $freelanceJobs
            ]
        ];

        return view('pages.job-list', compact(
            'typesJobs',    'activeType'
        ));
    }


    public function categories()
    {
        $categories = Category::all();
        return view('pages.category', compact('categories'));
    }

    public function category( $category )
    {
        $category = Category::where('slug', $category)->firstOrFail();
        $jobs = $category->jobs()->paginate(15);
        return view('pages.jobs.category', compact('category', 'jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //user can only post job if they are an enterprise
        if (auth()->user()->isApplicant()) {
            return redirect()->route('home');
        }
        $categories = Category::all();
        return view('pages.post-job', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request): \Illuminate\Http\RedirectResponse
    {
        if (auth()->user()->isApplicant()) {
            return redirect()->route('home');
        }
        $enterprise_id = auth()->user()->enterprise->id;
        $slug = $request->title . '-' . $enterprise_id;
        $job = Job::create(
            array_merge($request->validated(),
                ['enterprise_id' => $enterprise_id ],
                ['slug' => $slug]
            )
        );
        return redirect()->route('job', $job->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show($job)
    {
        $job = Job::where('slug', $job)->firstOrFail();
        return view('pages.jobs.job-details', compact('job'));
    }


    public function apply(Job $job): \Illuminate\Http\RedirectResponse
    {
        $this->middleware('auth');
        if (auth()->user()->isEnterprise()) {
            return redirect()->route('home');
        }
        $applicant = auth()->user()->applicant;
        $job->applicants()->attach($applicant->id);
        return redirect()->route('jobs', $job->slug);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
