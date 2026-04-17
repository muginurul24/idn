<?php

namespace App\View\Components\Mobile\Arcade;

use App\Models\Provider;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProviderNav extends Component
{
    public $providers;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->providers = Provider::where('type', '=', 'slot')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mobile.arcade.provider-nav', [
            'providers' => $this->providers
        ]);
    }
}
