<?php

namespace App\View\Components;

use App\Models\Galeri;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeContent extends Component
{
    public $photos;
    public $videos;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Fetch latest 6 photos
        $this->photos = Galeri::ofType('Foto')
            ->latest()
            ->take(6)
            ->get();

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home-content', [
            'photos' => $this->photos,
            'videos' => $this->videos,
            'activeIndex' => 0 // Start with the first image as active
        ]);
    }
}