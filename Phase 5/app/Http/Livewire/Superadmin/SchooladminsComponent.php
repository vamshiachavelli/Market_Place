<?php

namespace App\Http\Livewire\Superadmin;

use Livewire\Component;
use App\Models\User;
class SchooladminsComponent extends Component
{
   
    public function delete($id){
        if($id){
            User::where('id',$id)->delete();
            session()->flash('message','School Admin Deleted Successfully');
        }
    }
    public function render()
    {
        $users = User::where('utype','SADM')->get();
        return view('livewire.superadmin.schooladmins-component',['users'=>$users])->layout('layouts.base');
    }
}
