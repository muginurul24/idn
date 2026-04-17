<?php

namespace App\View\Components\Mobile\Modals;

use App\Models\Carousel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BannerHome extends Component
{
    public $banner;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->banner = Carousel::inRandomOrder()->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mobile.modals.banner-home', [
            'banner' => $this->banner
        ]);
    }
}
