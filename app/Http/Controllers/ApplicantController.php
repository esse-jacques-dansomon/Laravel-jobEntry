<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicantRequest;
use App\Http\Requests\UpdateApplicantRequest;
use App\Models\Applicant;
use App\Models\Category;
use App\Models\Job;
use App\Models\Testimony;
use App\Models\User;
use Inertia\Inertia;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        $categories = Category::with('jobs')->get();

        $fullTimeJobs = Job::where('type', 'full-time')->with('enterprise')->paginate(15);;
        $internshipJobs = Job::where('type', 'internship')->with('enterprise')->paginate(15);;
        $partTimeJobs = Job::where('type', 'part-time')->with('enterprise')->paginate(15);;
        $freelanceJobs = Job::where('type', 'freelance')->with('enterprise')->paginate(15);;

        $testimonies = Testimony::with('user')->get();


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

        return Inertia::render('other/Home', compact(
            'categories',
            'typesJobs',
            'testimonies'
        ))->with([
            'flash' => [
                'type' => 'success',
                'message' => 'Welcome to our platform'
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response|\Inertia\ResponseFactory
    {
        return Inertia::render('auth/RegisterApplicant');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicantRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'applicant'
        ]);

        $applicant = Applicant::create([
            'user_id' => $user->id,
            'cv' => $request->cv->store('cv'),
            'photo' => $request->photo->store('photo'), // 'photo' => 'photo
            'portfolio' => $request->portfolio,
            'coverLetter' => $request->coverLetter
        ]);

        return redirect()->route('login', compact('user'))
            ->with([
               'flash' => [
                   'type' => 'success',
                   'message' => 'Your account has been created successfully. Please login to continue.'
               ]
           ]);
    }


}
