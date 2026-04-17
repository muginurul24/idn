<?php

namespace App\View\Components\Desktop\Partials;

use App\Models\Contact;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HamburgerMenu extends Component
{
    public $contact;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->contact = Contact::first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.desktop.partials.hamburger-menu', [
            'contact' => $this->contact
        ]);
    }
}
