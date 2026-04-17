<?php

namespace App\View\Components\Desktop\FixedTop;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class LoginPanel extends Component
{
    public $point;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->point = Auth::user()->point;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if ($this->point->level == 'copper') {
            $valueMax = 1000000;
        } elseif ($this->point->level == 'bronze') {
            $valueMax = 2000000;
        } elseif ($this->point->level == 'silver') {
            $valueMax = 4000000;
        } elseif ($this->point->level == 'gold') {
            $valueMax = 8000000;
        } elseif ($this->point->level == 'diamond') {
            $valueMax = 16000000;
        } elseif ($this->point->level == 'platinum') {
            $valueMax = 32000000;
        } elseif ($this->point->level == 'vip') {
            $valueMax = 64000000;
        }

        return view('components.desktop.fixed-top.login-panel', [
            'point' => $this->point,
            'valueMax' => $valueMax
        ]);
    }
}
