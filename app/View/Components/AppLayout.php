<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use App\Models\Event\Event;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $events = Event::query()->orderBy('id', 'desc')->get();
        return view('layouts.app', compact('events'));
    }
}
