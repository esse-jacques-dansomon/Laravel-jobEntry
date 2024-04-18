@extends('layouts.master')

@section('title', 'Post Job')

@section('content')
    <!-- BreadCrumb Start -->
    <x-breadcrumb title="Post a job "/>
    <!-- BreadCrumb End -->


    <div class="card-body">
        <form method="POST" action="{{ route('post-job') }}" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>
                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                <div class="col-md-6">
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="requirements" class="col-md-4 col-form-label text-md-end">{{ __('Requirements') }}</label>
                <div class="col-md-6">
                    <textarea id="requirements" class="form-control @error('requirements') is-invalid @enderror" name="requirements" required autocomplete="requirements">{{ old('requirements') }}</textarea>
                    @error('requirements')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="responsibilities" class="col-md-4 col-form-label text-md-end">{{ __('Responsibilities') }}</label>
                <div class="col-md-6">
                    <textarea id="responsibilities" class="form-control @error('responsibilities') is-invalid @enderror" name="responsibilities" required autocomplete="responsibilities">{{ old('responsibilities') }}</textarea>
                    @error('responsibilities')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('Type') }}</label>
                <div class="col-md-6">
                    <select id="type" class="form-select @error('type') is-invalid @enderror" name="type" required autocomplete="type">
                        <option value="full-time" {{ old('type') == 'full-time' ? 'selected' : '' }}>Full-time</option>
                        <option value="part-time" {{ old('type') == 'part-time' ? 'selected' : '' }}>Part-time</option>
                        <option value="freelance" {{ old('type') == 'freelance' ? 'selected' : '' }}>Freelance</option>
                        <option value="internship" {{ old('type') == 'internship' ? 'selected' : '' }}>Internship</option>
                    </select>
                    @error('type')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                <div class="col-md-6">
                    <select id="status" class="form-select @error('status') is-invalid @enderror" name="status" required autocomplete="status">
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Location') }}</label>
                <div class="col-md-6">
                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="location">
                    @error('location')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="salary" class="col-md-4 col-form-label text-md-end">{{ __('Salary') }}</label>
                <div class="col-md-6">
                    <input id="salary" type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}" required autocomplete="salary">
                    @error('salary')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="limit_date" class="col-md-4 col-form-label text-md-end">{{ __('Limit Date') }}</label>
                <div class="col-md-6">
                    <input id="limit_date" type="date" class="form-control @error('limit_date') is-invalid @enderror" name="limit_date" value="{{ old('limit_date') }}" autocomplete="limit_date">
                    @error('limit_date')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="category_id" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>
                <div class="col-md-6">
                    <select id="category_id" class="form-select @error('category_id') is-invalid @enderror" name="category_id" required autocomplete="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>



                    @error('category_id')
                     <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>




            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <!-- Submit Button -->

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary w-100">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
        </form>

    </div>

@stop
