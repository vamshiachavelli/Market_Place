<main id="main" class="main-site">
<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="panel panel-default" style="margin-top:20px;">
    <div class="panel-heading">
            <h1>
                List of Business Owners
                <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addStudentModal">
                Add New Student
            </button> -->
            </h1>
           
    </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td><a href="#" wire:click.prevent="delete({{$user->id}})"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>