<?php

namespace App\View\Components\Desktop\Partials;

use App\Models\Event;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

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
        return view('components.desktop.partials.dynamic-events', [
            'events' => $this->events
        ]);
    }
}
