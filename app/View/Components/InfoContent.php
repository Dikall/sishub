<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Jurusan;
use App\Models\Dosen;
use App\Models\Tendik;

class InfoContent extends Component
{
    public $jurusan;
    public $dosen;
    public $tendik;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Fetch the first Jurusan record
        $this->jurusan = Jurusan::first();

        // Fetch all Dosen records or apply filters as needed
        $this->dosen = Dosen::all();

        $this->tendik = Tendik::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.info-content', [
            'jurusan' => $this->jurusan,
            'dosen' => $this->dosen,
            'tendik' => $this->tendik,
        ]);
    }
}
