<?php

namespace App\View\Components\Desktop;

use Closure;
use App\Models\Seo;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

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
        return view('components.desktop.layout', [
            'g_tag' => $this->seo?->g_tag,
            'g_analytic' => $this->seo?->g_analytic,
        ]);
    }
}
