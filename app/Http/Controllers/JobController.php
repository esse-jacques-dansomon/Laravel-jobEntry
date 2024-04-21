<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Category;
use App\Models\Job;
use Inertia\Inertia;
use Illuminate\Http\Request;


class JobController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $jobs = Job::with('enterprise')->orderBy('created_at', 'desc')->paginate(15);
        return inertia('jobs/JobList', compact(
             'categories', 'jobs'
        ));
    }


    public function jobsSearch(Request $request): \Inertia\Response|\Inertia\ResponseFactory
    {
        $categories = Category::all();
        $keyword = $request->keyword;
        $type = $request->type;
        $category_id = $request->category;
        if ($type) {
            $jobs = Job::where('type', $type);
        } else {
            $jobs = Job::query();
        }
        if ($keyword) {
            $jobs = $jobs->where('title', 'like', '%' . $keyword . '%');
        }
        if ($category_id) {
            $jobs = $jobs->where('category_id', $category_id);
        }
        $jobs = $jobs->orderBy('created_at', 'desc');
        $jobs = $jobs->paginate(150);
        $jobs->load('enterprise');

        return inertia('jobs/JobList', compact(
            'categories', 'jobs',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //user can only post job if they are an enterprise
        if (auth()->user() == null ) {
            return redirect()->route('home');
        }elseif (auth()->user()->isApplicant()) {
            return redirect()->route('home') ;
        }
        $categories = Category::all();
        return inertia('jobs/PostJob', compact('categories'));
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
        $job->load('enterprise');
        return Inertia::render('jobs/JobDetails', compact('job'));
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


}
