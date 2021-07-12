<div class="mt-5">
    <button data-toggle="modal" data-target="#modalAddReview" type="button" class="btn btn-primary">Add Reviews
    </button>

    @if(session()->has('message'))
        <span class="alert alert-success" id="displayMessage">
            {{ session()->get('message') }}
        </span>
    @endif
    <hr>
    <table class="table">
        <thead class="table-light">
        <tr>
            <th></th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $key => $valData)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $valData->name }}</td>
                <td>{{ $valData->review }}</td>
                <td>
                    {{--                    to work multiple user role--}}
                    @canany(['isManager', 'isUser'])
                        <span wire:click="edit({{ $valData->id }})" data-toggle="tooltip" data-placement="top"
                              title="Edit"
                              style="cursor: pointer">
                        <i data-toggle="modal" data-target="#modalUpdateReview"
                           class="fa fa-pencil-square fa-2x text-success"></i>
                    </span>
                    @endcanany
                    @can('isAdmin')
                        <span wire:click="delete({{ $valData->id }})" data-toggle="modal"
                              data-target="#modalDeleteReview"
                              style="cursor: pointer">
                        <i data-toggle="tooltip" data-placement="top" title="Delete"
                           class="fa fa-minus-square fa-2x text-danger"></i>
                    </span>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <!-- Add Review Modal -->
    <div class="modal fade" wire:ignore.self id="modalAddReview" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Add Reviews</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="store" id="frmStore">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" wire:model="name" class="form-control">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Review</label>
                            <input type="text" wire:model="review" class="form-control">
                            @error('review') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Review Modal -->
    <div class="modal fade" wire:ignore.self id="modalUpdateReview" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Update Reviews</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="update" id="frmUpdate">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" wire:model="name" class="form-control">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Review</label>
                            <input type="text" wire:model="review" class="form-control">
                            @error('review') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Review Modal -->
    <div class="modal fade" wire:ignore.self id="modalDeleteReview" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Delete Reviews</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="destroy" id="frmDelete">
                    <div class="modal-body">
                        <p>Are you sure to delete this record?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes, I confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@push('js_scripts')
    <script>
        /* declaring event to close the modal box which need to be emit in livewire controller...*/
        window.livewire.on('reviewStore', () => {
            $('#modalAddReview').modal('hide');
        });
        window.livewire.on('reviewUpdate', () => {
            $('#modalUpdateReview').modal('hide');
            $("#frmUpdate").trigger("reset");
        });
        window.livewire.on('reviewDelete', () => {
            $('#modalDeleteReview').modal('hide');
            $("#frmDelete").trigger("reset");
        });

        /* clearing all previous data from form... */
        $('#modalAddReview').on('hidden.bs.modal', function (e) {
            $('#frmStore')[0].reset();
        })
        $('#modalUpdateReview').on('hidden.bs.modal', function (e) {
            $('#frmStore')[0].reset();
            $('#frmUpdate')[0].reset();
            $('#frmDelete')[0].reset();
        })
        $('#modalDeleteReview').on('hidden.bs.modal', function (e) {
            $('#frmStore')[0].reset();
            $('#frmUpdate')[0].reset();
            $('#frmDelete')[0].reset();
        })

        /*
        function to delete data...
        => this function need to be define as listener in livewire controller on which we need to declare with delete function from controller...
        */
        // function deleteReview(id) {
        //     if (confirm("Are you sure to delete this record?"))
        //         window.livewire.emit('deleteReview', id);
        // }


    </script>
@endpush
