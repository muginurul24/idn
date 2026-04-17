<?php

namespace App\View\Components\Mobile\Partials;

use App\Models\Carousel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Carousels extends Component
{
    public $carousels;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->carousels = Carousel::where('sequence', '=', 1)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mobile.partials.carousels', [
            'carousels' => $this->carousels
        ]);
    }
}
