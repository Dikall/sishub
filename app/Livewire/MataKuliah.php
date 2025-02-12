<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Matkul;

class MataKuliah extends Component
{
    public $jenis = 'wajib';
    public $matkuls = [];

    public function mount()
    {
        $this->loadMatkul();
    }

    public function loadMatkul()
    {
        $this->matkuls = Matkul::where('jenis', $this->jenis)->get();
    }

    public function changeCategory($category)
    {
        $this->jenis = $category;
        $this->loadMatkul();
    }

    public function render()
    {
        return view('livewire.mata-kuliah');
    }
}

