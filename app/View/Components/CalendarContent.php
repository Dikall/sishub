<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Kalender;

class CalendarContent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $events = Kalender::all()->map(function ($event) {
            return [
                'title' => $event->judul,
                'start' => $event->tanggal_mulai->toDateString(),
                'end' => $event->tanggal_selesai ? $event->tanggal_selesai->toDateString() : null,
                'description' => $event->keterangan,
            ];
        });


        return view('components.calendar-content', ['events' => $events]);
    }
}
