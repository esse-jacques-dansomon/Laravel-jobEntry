@extends('layouts.master')

@section('title', 'Job List')

@section('content')
    <!-- BreadCrumb Start -->
    <x-breadcrumb :title="$category->name" />
    <!-- BreadCrumb End -->
    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing : {{$category->name}}</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <div class="tab-content">
                            @foreach($jobs as $job)
                                <x-job-card-view :job="$job" />
                            @endforeach

                            <div class=" d-inline-flex justify-content-center">
                                {{ $jobs->links() }}
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->
@stop
