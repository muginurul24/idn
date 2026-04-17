<?php

namespace App\View\Components\Desktop\FixedTop;

use App\Models\Mark;
use App\Models\Ticket;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $unreadMessage = 0;

        if (Auth::check()) {
            $ticketTotal = Ticket::where('category', '=', 'notif')->count();
            $markTotal = Mark::where('user_id', '=', Auth::user()->id)->count();
            $unreadMessage = $ticketTotal - $markTotal;
        }

        return view('components.desktop.fixed-top.header', [
            'unreadMessage' => intval($unreadMessage)
        ]);
    }
}
