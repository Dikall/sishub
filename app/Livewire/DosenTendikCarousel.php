<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Dosen;
use App\Models\Tendik;

class DosenTendikCarousel extends Component
{
    public $dosen;
    public $tendik;

    public function mount()
    {
        // Fetch data when component loads
        $this->dosen = Dosen::where('jurusan_id', 1)->get();
        $this->tendik = Tendik::where('jurusan_id', 1)->get();
    }

    public function render()
    {
        return view('livewire.dosen-tendik-carousel');
    }
}