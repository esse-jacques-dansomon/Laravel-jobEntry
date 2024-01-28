<?php

namespace App\View\Components;

use App\Models\Testimony;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TestimonialCardView extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Testimony $testimonial,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.testimonial-card-view');
    }
}
