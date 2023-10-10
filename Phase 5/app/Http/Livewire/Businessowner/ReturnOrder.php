<?php

namespace App\Http\Livewire\Businessowner;
use App\Models\Order;
use Livewire\Component;

class ReturnOrder extends Component
{
    public $ids;
    public $product_id;
    public $user_id;
    public $quantity;
    public $price;

    public function resetInputFields(){
        $this->product_id ='';
        $this->user_id ='';
        $this->quantity ='';
        $this->price ='';
    }

    public function store(){
        $validatedData = $this->validate([
            'product_id' => 'required',
            'user_id' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);
        Order::create($validatedData);
        session()->flash('message','Order Created Successfully');
        $this->resetInputFields();
        $this->emit('orderAdded');
    }

    public function edit($id){
        $order = Order::where('id',$id)->first();
        $this->ids =  $order->id;
        $this->product_id =  $order->product_id;
        $this->user_id =  $order->user_id;
        $this->quantity =  $order->quantity;
        $this->price =  $order->price;
    }

    public function update(){
        $this->validate([
            'product_id' => 'required',
            'user_id' => 'user_id',
            'quantity' => 'quantity',
            'price' => 'price'
        ]);
        if($this->ids){
            $Order = Order::find($this->ids);
            $Order->update([
                'product_id' => $this->product_id,
                'user_id' => $this->datePosted,
                'quantity' => $this->postedBy,
                'price' => $this->price
            ]);
        }
        session()->flash('message','Order Updated Successfully');
        $this->resetInputFields();
        $this->emit('orderUpdated');
    }

    public function delete($id){
        if($id){
            Order::where('id',$id)->delete();
            session()->flash('message','Order Deleted Successfully');
        }
    }

    public function render()
    {
        $orders = Order::orderBy('id','DESC')->get();
        return view('livewire.businessowner.returnorder',['orders'=>$orders])->layout('layouts.base');
    }
}
