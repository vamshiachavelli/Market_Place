<?php

namespace App\Http\Livewire\Student;
use App\Models\Club;
use Livewire\Component;

class Clubs extends Component
{
    public $ids;
    public $activityName;
    public $activityDesc;
    public $actvityStartDate;
    public $actvityEndDate;

    public function resetInputFields(){
        $this->activityName ='';
        $this->activityDesc ='';
        $this->actvityStartDate ='';
        $this->actvityEndDate ='';
    }

    public function store(){
        $validatedData = $this->validate([
            'activityName' => 'required',
            'activityDesc' => 'required',
            'actvityStartDate' => 'required',
            'actvityEndDate' => 'required'
        ]);
        Club::create($validatedData);
        session()->flash('message','Club Created Successfully');
        $this->resetInputFields();
        $this->emit('clubAdded');
    }

    public function edit($id){
        $club = Club::where('id',$id)->first();
        $this->ids =  $club->id;
        $this->activityName =  $club->activityName;
        $this->activityDesc =  $club->activityDesc;
        $this->actvityStartDate =  $club->actvityStartDate;
        $this->actvityEndDate =  $club->actvityEndDate;
    }

    public function update(){
        $this->validate([
            'activityName' => 'required',
            'activityDesc' => 'required',
            'actvityStartDate' => 'required',
            'actvityEndDate' => 'required'
        ]);
        if($this->ids){
            $club = Club::find($this->ids);
            $club->update([
                'activityName' => $this->activityName,
                'activityDesc' => $this->activityDesc,
                'actvityStartDate' => $this->actvityStartDate,
                'actvityEndDate' => $this->actvityEndDate,
            ]);
        }
        session()->flash('message','Club Updated Successfully');
        $this->resetInputFields();
        $this->emit('clubUpdated');
    }

    public function delete($id){
        if($id){
            Club::where('id',$id)->delete();
            session()->flash('message','Club Deleted Successfully');
        }
    }
    public function render()
    {
        $clubs = Club::orderBy('id','DESC')->get();
        return view('livewire.student.clubs',['clubs'=>$clubs])->layout('layouts.base');
    }
}
