<?php

namespace App\Filament\Widgets;

use App\Models\Jurusan;
use Filament\Widgets\Widget;

class Sishub extends Widget
{
    protected static string $view = 'filament.widgets.sishub';

    protected function getViewData(): array
    {
        return [
            'jurusans' => Jurusan::all(),
        ];
    }
}