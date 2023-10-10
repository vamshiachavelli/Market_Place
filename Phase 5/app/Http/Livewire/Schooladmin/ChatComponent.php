<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;

class ChatComponent extends Component
{
    public function render()
    {
        return view('livewire.student.chat-component')->layout('layouts.base');
    }
}
