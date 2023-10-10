<?php

namespace App\Http\Livewire\Superadmin;

use Livewire\Component;

class SaDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.superadmin.sa-dashboard-component')->layout('layouts.base');
    }
}
