<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Jurusan;

class InfoJurusanContent extends Component
{
    public $showCarousel = false;
    public $jurusan;

    public function mount()
    {
        $this->jurusan = Jurusan::first(); // Adjust query as needed
    }

    public function render()
    {
        return view('livewire.info-jurusan-content');
    }
}