<main id="main" class="main-site">
<div class="container">
@if(session()->has('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="panel panel-default" style="margin-top:20px;">
        <div class="panel-heading">
            <h1>List of Return Orders
            <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addClubModal">
                Add New Advert
            </button> -->
            </h1>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Posted By</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$order->product_id}}</td>
                    <td>{{$order->user_id}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td><a href="#" wire:click.prevent="delete({{$order->id}})"><i class="fa fa-trash"></i></a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>