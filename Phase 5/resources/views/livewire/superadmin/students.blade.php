
<main id="main" class="main-site">
@include('livewire.businessowner.stdcreate')
@include('livewire.businessowner.stdupdate')
<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="panel panel-default" style="margin-top:20px;">
    <div class="panel-heading">
            <h1>
                List of Students
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addStudentModal">
                Add New Student
            </button>
            </h1>
           
    </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$student->firstname}}</td>
                        <td>{{$student->lastname}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->phone}}</td>
                        <td><a href="#" data-toggle="modal" data-target="#updateStudentModal" wire:click.prevent="edit({{$student->id}})"><i class="fa fa-edit"></i></a> | <a href="#" wire:click.prevent="delete({{$student->id}})"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>