<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrmawaContent extends Component
{
    public $ormawa;

    /**
     * Create a new component instance.
     */
    public function __construct($ormawa)
    {
        $this->ormawa = $ormawa;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ormawa-content', [
            'ormawa' => $this->ormawa,
        ]);
    }
}