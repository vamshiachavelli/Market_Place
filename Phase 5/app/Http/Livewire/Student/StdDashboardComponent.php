<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;

class StdDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.student.std-dashboard-component')->layout('layouts.base');
    }
}
