<?php

namespace App\Filament\Resources\SishubResource\Widgets;

use App\Models\Jurusan;
use Filament\Widgets\Widget;

class Sishub extends Widget
{
    protected static string $view = 'filament.resources.sishub-resource.widgets.sishub';

    public function getData(): array
    {
        return [
            'jurusans' => Jurusan::all(),
        ];
    }
}