<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kalender;

class KalenderKegiatan extends Component
{
    public $events = [];

    public function mount()
    {
        // Load events from your data source
        $this->loadEvents();
    }

    protected function loadEvents()
    {
        // Example implementation with Eloquent
        $dbEvents = Kalender::all();

        $formattedEvents = [];
        foreach ($dbEvents as $event) {
            $formattedEvents[] = [
                'title' => $event->judul,
                'start' => $event->tanggal_mulai->toDateString(),
                'end' => $event->tanggal_selesai ? $event->tanggal_selesai->toDateString() : null,
                'description' => $event->keterangan,
            ];
        }

        $this->events = $formattedEvents;
    }

    public function render()
    {
        return view('livewire.kalender-kegiatan');
    }
}
