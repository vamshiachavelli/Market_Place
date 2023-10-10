
<main id="main" class="main-site">
<div class="container">
@if(session()->has('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="panel panel-default" style="margin-top:20px;">
    <div class="panel-heading">
            <h1>
                List of Clubs
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addClubModal">
                Add New Club
            </button>
            </h1>
           
    </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Activity Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clubs as $club)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$club->activityName}}</td>
                        <td>{{$club->activityDesc}}</td>
                        <td>{{$club->actvityStartDate}}</td>
                        <td>{{$club->actvityEndDate}}</td>
                        <td><a href="#" data-toggle="modal" data-target="#updateClubModal" wire:click.prevent="edit({{$club->id}})"><i class="fa fa-edit"></i></a> | <a href="#" wire:click.prevent="delete({{$club->id}})"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>