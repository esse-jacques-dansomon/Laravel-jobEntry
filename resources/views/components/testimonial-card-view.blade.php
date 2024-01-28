<div class="testimonial-item bg-light rounded p-4">
    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
    <p>{{$testimonial->content}}</p>
    <div class="d-flex align-items-center">
        @switch($testimonial->user->role)
            @case('applicant')
                <i class="fa fa-user fa-2x text-primary"></i>
                @break
            @case('enterprise')
                <i class="fa fa-building fa-2x text-primary"></i>
                @break
        @endswitch
        <div class="ps-3">
            <h5 class="mb-1">{{$testimonial->user->name}}</h5>
            <small>{{$testimonial->user->name}}</small>
        </div>
    </div>
</div>
