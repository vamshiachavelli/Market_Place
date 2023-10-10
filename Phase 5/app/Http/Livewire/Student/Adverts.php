<?php

namespace App\Http\Livewire\Student;
use App\Models\Advert;
use Livewire\Component;

class Adverts extends Component
{
    public $ids;
    public $advertTitle;
    public $datePosted;
    public $postedBy;

    public function resetInputFields(){
        $this->advertTitle ='';
        $this->datePosted ='';
        $this->postedBy ='';
    }

    public function store(){
        $validatedData = $this->validate([
            'advertTitle' => 'required',
            'datePosted' => 'required',
            'postedBy' => 'required'
        ]);
        Advert::create($validatedData);
        session()->flash('message','Advert Created Successfully');
        $this->resetInputFields();
        $this->emit('advertAdded');
    }

    public function edit($id){
        $advert = Advert::where('id',$id)->first();
        $this->ids =  $advert->id;
        $this->advertTitle =  $advert->advertTitle;
        $this->datePosted =  $advert->datePosted;
        $this->postedBy =  $advert->postedBy;
    }

    public function update(){
        $this->validate([
            'advertTitle' => 'required',
            'datePosted' => 'required',
            'postedBy' => 'required'
        ]);
        if($this->ids){
            $Advert = Advert::find($this->ids);
            $Advert->update([
                'advertTitle' => $this->advertTitle,
                'datePosted' => $this->datePosted,
                'postedBy' => $this->postedBy
            ]);
        }
        session()->flash('message','Advert Updated Successfully');
        $this->resetInputFields();
        $this->emit('advertUpdated');
    }

    public function delete($id){
        if($id){
            Advert::where('id',$id)->delete();
            session()->flash('message','Advert Deleted Successfully');
        }
    }

    public function render()
    {
        $adverts = Advert::orderBy('id','DESC')->get();
        return view('livewire.student.adverts',['adverts'=>$adverts])->layout('layouts.base');
    }
}
