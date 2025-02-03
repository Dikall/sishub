<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Alumni extends Component
{
    use WithPagination;
    
    public $search = '';
    protected $queryString = ['search'];
    
    public function updatedSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $alumni = \App\Models\Alumni::query()
            ->when($this->search, function($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->paginate(7);
            
        return view('livewire.alumni', [
            'alumni' => $alumni
        ]);
    }
}