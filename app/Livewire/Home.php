<?php

namespace App\Livewire;

use App\Models\Galeri;
use Livewire\Component;
use Livewire\Attributes\On;

class Home extends Component
{
    public $photos;
    public $activeIndex = 0;
    public $totalImages;

    public function mount()
    {
        $this->photos = Galeri::ofType('Foto')->get();
        $this->totalImages = $this->photos->count();
    }

    public function next()
    {
        if ($this->totalImages > 0) {
            $this->activeIndex = ($this->activeIndex + 1) % $this->totalImages;
        }
    }

    public function prev()
    {
        if ($this->totalImages > 0) {
            $this->activeIndex = ($this->activeIndex - 1 + $this->totalImages) % $this->totalImages;
        }
    }

    public function setActive($index)
    {
        if ($index >= 0 && $index < $this->totalImages) {
            $this->activeIndex = $index;
        }
    }

    public function render()
    {
        return view('livewire.home', [
            'photos' => $this->photos,
            'activeIndex' => $this->activeIndex,
        ]);
    }
}