<div wire:ignore.self class="modal fade" id="addStudentModal" data-backdrop="" tabindex="-1" role="dialog" role="dialog" aria-labelledby="addStudentModal">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add New Student</h4>
      </div>
      <div class="modal-body">
        <form action="">
            <div class="form-group">
                <label for="">Firstname</label>
                <input type="text" name="firstname" class="form-control" wire:model="firstname">
                @error('firstname') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="">Lastname</label>
                <input type="text" name="lastname" class="form-control" wire:model="lastname">
                @error('lastname') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" wire:model="email">
                @error('email') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" class="form-control" wire:model="phone">
                @error('phone') <span class="text-danger">{{$message}}</span> @enderror
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="store()">Add Student</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->