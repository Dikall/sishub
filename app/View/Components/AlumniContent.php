<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AlumniContent extends Component
{
    public $alumni;

    /**
     * Create a new component instance.
     */
    public function __construct($alumni)
    {
        $this->alumni = $alumni;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alumni-content', [
            'alumni' => $this->alumni,
        ]);
    }
}