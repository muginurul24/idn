<?php

namespace App\View\Components\Mobile\Partials;

use Closure;
use App\Models\Event;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class DynamicEvents extends Component
{
    public $events;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->events = Event::where('label', '=', 'all')->latest()->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mobile.partials.dynamic-events', [
            'events' => $this->events
        ]);
    }
}
