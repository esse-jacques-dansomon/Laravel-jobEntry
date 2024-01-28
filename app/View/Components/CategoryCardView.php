<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryCardView extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $slug,
        public string $icon,
        public int    $jobsCount,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-card-view');
    }
}
