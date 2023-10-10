<main id="main" class="main-site">
<div class="container">
@if(session()->has('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="panel panel-default" style="margin-top:20px;">
        <div class="panel-heading">
            <h1>List of Return Order
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addClubModal">
                Add New Advert
            </button>
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
                @foreach($adverts as $advert)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$advert->advertTitle}}</td>
                    <td>{{$advert->datePosted}}</td>
                    <td>{{$advert->postedBy}}</td>
                    <td><a href="#" data-toggle="modal" data-target="#updateAdvertModal" wire:click.prevent="edit({{$advert->id}})"><i class="fa fa-edit"></i></a> | <a href="#" wire:click.prevent="delete({{$advert->id}})"><i class="fa fa-trash"></i></a></td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>