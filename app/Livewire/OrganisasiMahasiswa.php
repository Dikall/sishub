<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ormawa;

class OrganisasiMahasiswa extends Component
{
    public $currentIndex = 0;
    public $itemCount;
    
    public function mount()
    {
        $this->itemCount = Ormawa::count();
    }

    public function nextSlide()
    {
        if ($this->currentIndex < $this->itemCount - 1) {
            $this->currentIndex++;
        }
    }

    public function previousSlide()
    {
        if ($this->currentIndex > 0) {
            $this->currentIndex--;
        }
    }

    public function render()
    {
        return view('livewire.organisasi-mahasiswa', [
            'ormawa' => Ormawa::all()
        ]);
    }
}