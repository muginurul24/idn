<?php

namespace App\View\Components\Desktop\Partials;

use Closure;
use App\Models\Announce;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class RunningText extends Component
{
    public $announcement;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->announcement = Announce::first()->marquee ?? 'Selamat Datang di ' . Str::title(config('app.name')) . ' | Website gaming favorit pilihan terbaik untuk para gamblers mania.';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.desktop.partials.running-text', [
            'marquee' => $this->announcement
        ]);
    }
}
