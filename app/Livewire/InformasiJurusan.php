<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Jurusan;
use App\Models\Dosen;
use App\Models\Tendik;

class InformasiJurusan extends Component
{
    public $jurusan;
    public $dosen;
    public $tendik;
    public $showInformasiJurusan = false;

    public function mount()
    {
        $this->jurusan = Jurusan::first();
        $this->dosen = Dosen::all();
        $this->tendik = Tendik::all();
    }

    public function toggleSection($section)
    {
        $this->showInformasiJurusan = $section === 'informasi';
    }

    public function render()
    {
        return view('livewire.informasi-jurusan');
    }
}