@extends('layouts.master')

@section('title', 'Job Details')

@section('content')
    <!-- BreadCrumb Start -->
    <x-breadcrumb :title="$job->title"/>
    <!-- BreadCrumb End -->


    <!-- Job Detail Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid border rounded" src="{{$job->enterprise->logo}}" alt=""
                             style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h3 class="mb-3">{{$job->title}}</h3>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$job->location}}</span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$job->type}}</span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{$job->salary}}</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-3">Job description</h4>
                        <p>{{$job->description}}</p>
                        <h4 class="mb-3">Responsibility</h4>
                        <p>{{$job->responsibilities}}</p>
                        <h4 class="mb-3">Qualifications</h4>
                        <p>{{$job->requirements}}</p>
                    </div>


                    <div class="">
                        <h4 class="mb-4">Apply For The Job</h4>
{{--                        <form method="POST" action="{{ route('post-job') }}" enctype="multipart/form-data">--}}
{{--                            <div class="row g-3">--}}
{{--                                <div class="col-12 col-sm-6">--}}
{{--                                    <label for="name"></label>--}}
{{--                                    <input id="name" type="text"--}}
{{--                                           placeholder="Name"--}}
{{--                                           class="form-control @error('name') is-invalid @enderror"--}}
{{--                                           name="title" value="{{ old('name') }}" required--}}
{{--                                           autocomplete="name" autofocus>--}}
{{--                                    @error('title')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                    @enderror--}}

{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-6">--}}
{{--                                    <label for="email"></label>--}}
{{--                                    <input id="email" type="email"--}}
{{--                                           placeholder="Email"--}}
{{--                                           class="form-control @error('email') is-invalid @enderror"--}}
{{--                                           name="email" value="{{ old('email') }}" required--}}
{{--                                           autocomplete="email" autofocus>--}}
{{--                                    @error('email')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                    @enderror--}}

{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-6">--}}


{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-6">--}}
{{--                                    <input type="file" class="form-control bg-white">--}}
{{--                                </div>--}}
{{--                                <div class="col-12">--}}
{{--                                    <textarea class="form-control" rows="5" placeholder="Coverletter"></textarea>--}}
{{--                                </div>--}}
{{--                                <div class="col-12">--}}
{{--                                    <button class="btn btn-primary w-100" type="submit">Apply Now</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
                        <div class="col-12">
                            <a href="{{ route('apply', $job->id) }}"

                                class="btn btn-primary w-100" type="submit">Apply Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{$job->createAt}}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>{{$job->title}}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{$job->type}}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: {{$job->salary}}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Location: {{$job->location}}</p>
                        <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date
                            Line: {{$job->limit_date}}</p>
                    </div>
                    <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Company Detail</h4>
                        <p class="m-0">{{$job->enterprise->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail End -->

@stop
