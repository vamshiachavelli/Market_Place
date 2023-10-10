<div wire:ignore.self class="modal fade" id="updateClubModal" data-backdrop="" tabindex="-1" role="dialog" role="dialog" aria-labelledby="updateClubModal">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Club Activity</h4>
      </div>
      <div class="modal-body">
        <form action="">
            @csrf
            <input type="hidden" name="id" wire:model="ids">
            <div class="form-group">
                <label for="">Club Activity Name</label>
                <input type="text" name="activityName" class="form-control" wire:model="activityName">
                @error('activityName') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="">Club Activity Desc</label>
                <input type="text" name="activityDesc" class="form-control" wire:model="activityDesc">
                @error('activityDesc') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="">Club Actvity Start Date</label>
                <input type="date" name="actvityStartDate" class="form-control" wire:model="actvityStartDate">
                @error('actvityStartDate') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="">Club Actvity End Date</label>
                <input type="date" name="actvityEndDate" class="form-control" wire:model="actvityEndDate">
                @error('actvityEndDate') <span class="text-danger">{{$message}}</span> @enderror
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="update()">Update Club</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->