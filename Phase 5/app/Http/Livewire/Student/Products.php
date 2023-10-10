<?php

namespace App\Http\Livewire\Student;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Auth;

class Products extends Component
{
    use WithFileUploads;
    public $ids;
    public $productTitle;
    public $productDesc;
    public $productPrice;
    public $productOwner;
    public $productImage;
    
    public $product_id;
    public $quantity;
    public $price;
    public $pid;
    


    public function addProduct(){
        $product = new Product();
        $product->productTItle = $this->productTitle;
        $product->productDesc = $this->productDesc;
        $product->productPrice = $this->productPrice;
        $product->productOwner = Auth::user()->id;
        $imageName = Carbon::now()->timestamp. '.' . $this->productImage->extension();
        $this->productImage->storeAs('products', $imageName);
        $product->productImage = $imageName;
        $product->save();
        session()->flash('message','Product Created Successfully');
        //$this->resetInputFields();
        $this->emit('productAdded');
        
    }
    //adding product to cart
    public function addProductToCart($pid, $type){
        $cart = Cart::create([
            'product_id' => $pid,
            'user_id' => Auth::user()->id,
            'quantity' => $this->quantity,
            'price' => $type,
          ]);
        session()->flash('message','Product added to cart');
        //$this->resetInputFields();
        $this->emit('productAdded');
        
    }

    public function addProductToOrder($pid, $type){
        $order = Order::create([
            'product_id' => $pid,
            'user_id' => Auth::user()->id,
            'quantity' => $this->quantity,
            'price' => $type,
          ]);
        session()->flash('message','Product added to order');
        //$this->resetInputFields();
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

    public function deleteCart($id){
        if($id){
            Cart::where('id',$id)->delete();
            session()->flash('message','Product Deleted from Cart');
        }
    }

    public function render()
    {  
        $products = Product::orderBy('id','DESC')->get();
        $uproducts = Product::where('productOwner', Auth::user()->id)->get();
        $orders = Order::where('user_id', Auth::user()->id)->get();
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('livewire.student.products',['products'=>$products,'uproducts'=>$uproducts,'carts'=>$carts,'orders'=>$orders])->layout('layouts.base');
    }
}
