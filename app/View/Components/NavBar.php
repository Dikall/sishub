<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Qr;

class NavBar extends Component
{
    public $qrCodes;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->qrCodes = Qr::all()->map(function ($qr) {
            $qr->qrCode = \SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)->generate($qr->url);
            return $qr;
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav-bar', [
            'qrCodes' => $this->qrCodes,
        ]);
    }
}