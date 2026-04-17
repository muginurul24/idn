<?php

namespace App\View\Components\Desktop\Partials;

use App\Models\Carousel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Carousels extends Component
{
    public $firstSequences;
    public $secondSequences;
    public $thirdSequences;
    public $latestBanners;
    public $modal;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->firstSequences = Carousel::where('sequence', '=', 1)->get();
        $this->secondSequences = Carousel::where('sequence', '=', 2)->get();
        $this->thirdSequences = Carousel::where('sequence', '=', 3)->get();
        $this->latestBanners = Carousel::latest()->take(3)->get();
        $this->modal = Carousel::inRandomOrder()->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.desktop.partials.carousels', [
            'firstSequences' => $this->firstSequences,
            'secondSequences' => $this->secondSequences,
            'thirdSequences' => $this->thirdSequences,
            'latestBanners' => $this->latestBanners,
            'modal' => $this->modal
        ]);
    }
}
