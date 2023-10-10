<?php

namespace App\Http\Livewire\Student;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $ids;
    public $productTitle;
    public $productDesc;
    public $productPrice;
    public $productImage;

    public function resetInputFields(){
        $this->productTitle ='';
        $this->productDesc ='';
        $this->productPrice ='';
        $this->productImage ='';
    }

    public function store(){
        $validatedData = $this->validate([
            'productTitle' => 'required',
            'productDesc' => 'required',
            'productPrice' => 'required',
            'productImage' => 'required'
        ]);
        Product::create($validatedData);
        session()->flash('message','Product Created Successfully');
        $this->resetInputFields();
        $this->emit('productAdded');
    }

    public function edit($id){
        $product = Product::where('id',$id)->first();
        $this->ids =  $product->id;
        $this->productTitle =  $product->productTitle;
        $this->productDesc =  $product->productDesc;
        $this->productPrice =  $product->productPrice;
        $this->productImage =  $product->productImage;
    }

    public function update(){
        $this->validate([
            'productTitle' => 'required',
            'productDesc' => 'required',
            'productPrice' => 'required',
            'productImage' => 'required'
        ]);
        if($this->ids){
            $product = Product::find($this->ids);
            $product->update([
                'firstname' => $this->productTitle,
                'lastname' => $this->productDesc,
                'email' => $this->productPrice,
                'phone' => $this->productImage,
            ]);
        }
        session()->flash('message','Product Updated Successfully');
        $this->resetInputFields();
        $this->emit('productUpdated');
    }

    public function delete($id){
        if($id){
            Product::where('id',$id)->delete();
            session()->flash('message','Product Deleted Successfully');
        }
    }

    public function render()
    {   
        $products = Product::orderBy('id','DESC')->get();
        return view('livewire.student.products',['products'=>$products])->layout('layouts.base');
    }
}
