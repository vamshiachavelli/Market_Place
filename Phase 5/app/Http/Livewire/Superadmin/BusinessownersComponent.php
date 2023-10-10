<?php

namespace App\Http\Livewire\Superadmin;
use App\Models\User;
use Livewire\Component;

class BusinessownersComponent extends Component
{
    public function delete($id){
        if($id){
            User::where('id',$id)->delete();
            session()->flash('message','Business Owner Deleted Successfully');
        }
    }
    public function render()
    {
        $users = User::where('utype','BOW')->get();
        return view('livewire.superadmin.businessowners-component',['users'=>$users])->layout('layouts.base');
    }
}
