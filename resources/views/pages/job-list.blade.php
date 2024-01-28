@extends('layouts.master')

@section('title', 'Job List')

@section('content')
    <!-- BreadCrumb Start -->
    <x-breadcrumb title="Jobs" />
    <!-- BreadCrumb End -->
    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    @foreach($typesJobs as $typeJob)
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 {{ $activeType == $typeJob['id'] ? 'active' : '' }}" data-bs-toggle="pill" href="#tab-{{ $typeJob['id'] }}">
                                <h6 class="mt-n1 mb-0">{{$typeJob['name']}}</h6>
                            </a>
                        </li>
                    @endforeach

                </ul>
                <div class="tab-content">
                    @foreach($typesJobs as $typeJob)
                        <div id="tab-{{$typeJob['id']}}" class="tab-pane fade show p-0 {{ $loop->first ? 'active' : '' }}">

                            @foreach($typeJob['jobs'] as $job)
                                <x-job-card-view :job="$job" />
                            @endforeach

                            <div class=" d-inline-flex justify-content-center">
                                {{ $typeJob['jobs']->links() }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->
@stop
