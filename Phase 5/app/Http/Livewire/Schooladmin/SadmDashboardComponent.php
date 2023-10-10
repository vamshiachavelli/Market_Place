<?php

namespace App\Http\Livewire\Schooladmin;

use Livewire\Component;

class SadmDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.schooladmin.sadm-dashboard-component')->layout('layouts.base');
    }
}
