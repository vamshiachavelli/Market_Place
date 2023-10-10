<div wire:ignore.self class="modal fade" id="addClubModal" data-backdrop="" tabindex="-1" role="dialog" role="dialog" aria-labelledby="addClubModal">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add New Club</h4>
      </div>
      <div class="modal-body">
        <form action="">
            <div class="form-group">
                <label for="">Club Activity Name</label>
                <input type="text" name="activityName" class="form-control" wire:model.defer="activityName">
                @error('activityName') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="">Club Activity Description</label>
                <input type="text" name="activityDesc" class="form-control" wire:model.defer="activityDesc">
                @error('activityDesc') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="">Club Actvity Start Date</label>
                <input type="date" name="actvityStartDate" class="form-control" wire:model.defer="actvityStartDate">
                @error('actvityStartDate') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="">Club Actvity End Date</label>
                <input type="date" name="actvityEndDate" class="form-control" wire:model.defer="actvityEndDate">
                @error('actvityEndDate') <span class="text-danger">{{$message}}</span> @enderror
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="store()">Add Club</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->