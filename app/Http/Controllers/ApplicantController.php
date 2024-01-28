<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicantRequest;
use App\Http\Requests\UpdateApplicantRequest;
use App\Models\Applicant;
use App\Models\Category;
use App\Models\Job;
use App\Models\Testimony;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        $fullTimeJobs = Job::where('type', 'full-time')->paginate(5);
        $internshipJobs = Job::where('type', 'internship')->paginate(5);
        $partTimeJobs = Job::where('type', 'part-time')->paginate(5);
        $freelanceJobs = Job::where('type', 'freelance')->paginate(5);

        $testimonies = Testimony::all();


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

        return view('pages.home', compact(
            'categories',
            'typesJobs',
            'testimonies'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicantRequest $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
