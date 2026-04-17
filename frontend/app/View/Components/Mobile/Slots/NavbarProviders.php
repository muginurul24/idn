<?php

namespace App\View\Components\Mobile\Slots;

use App\Models\Provider;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavbarProviders extends Component
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
        return view('components.mobile.slots.navbar-providers', [
            'providers' => $this->providers
        ]);
    }
}
