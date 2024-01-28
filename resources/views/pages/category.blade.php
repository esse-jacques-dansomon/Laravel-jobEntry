@extends('layouts.master')

@section('title', 'Category')

@section('content')
    <!-- BreadCrumb Start -->
    <x-breadcrumb title="Category" />
    <!-- BreadCrumb End -->


    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
            <div class="row g-4">
                @foreach($categories as $category)
                    <x-category-card-view :title="$category->name" :slug="$category->slug" :icon="$category->icon" :jobs-count="$category->jobsCount()" />
                @endforeach
            </div>
        </div>
    </div>
    <!-- Category End -->
@stop
