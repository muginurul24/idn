<?php

namespace App\View\Components\Mobile;

use App\Models\Seo;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    public $seo;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->seo = Seo::first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mobile.layout', [
            'g_tag' => $this->seo?->g_tag,
            'g_analytic' => $this->seo?->g_analytic,
        ]);
    }
}
