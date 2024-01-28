<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
    <a class="cat-item rounded p-4" href="
          {{ route('job-category', $slug) }}
    ">
        <i class="fa fa-3x ${{$icon}} text-primary mb-4"></i>
        <h6 class="mb-3">{{ $title }}</h6>
        <p class="mb-0">{{$jobsCount}}</p>
    </a>
</div>
