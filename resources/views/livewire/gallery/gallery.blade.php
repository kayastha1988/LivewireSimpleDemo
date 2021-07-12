<div>
    <button data-toggle="modal" data-target="#modalUploadGallery" type="button" class="btn btn-primary">Upload Image
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
            <th>Title</th>
            <th>Image</th>
            @can('isAdmin')
                <th>Action</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach($data as $key =>$valData)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $valData->title }}</td>
                <td>
                    <img src="{{ asset('storage/'.$valData->image) }}" alt="{{ $valData->title }}" width="220"
                         height="120">
                </td>
                <td>
                    @canany(['isAdmin','isUser'])
                        <span wire:click="delete({{ $valData->id }})" data-toggle="modal"
                              data-target="#modalDeleteGallery" style="cursor: pointer">
                        <i data-toggle="tooltip" data-placement="top" title="Delete"
                           class="fa fa-minus-square fa-2x text-danger"></i>
                    </span>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Add Gallery Modal -->
    <div class="modal fade" wire:ignore.self id="modalUploadGallery" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Add Reviews</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="store" id="frmStore" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Titlte</label>
                            <input type="text" wire:model="title" class="form-control">
                            @error('title') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" wire:model="image" class="form-control">
                            @error('image') <span class="error">{{ $message }}</span> @enderror
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

    <!-- Delete Gallery Modal -->
    <div class="modal fade" wire:ignore.self id="modalDeleteGallery" tabindex="-1" aria-labelledby="exampleModalLabel"
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
        window.livewire.on('galleryStore', () => {
            $('#modalUploadGallery').modal('hide');
        });
        window.livewire.on('galleryDelete', () => {
            $('#modalDeleteGallery').modal('hide');
            $("#frmDelete").trigger("reset");
        });

        /* clearing all previous data from form... */
        $('#modalUploadGallery').on('hidden.bs.modal', function (e) {
            $('#frmStore')[0].reset();
        })
        $('#modalDeleteGallery').on('hidden.bs.modal', function (e) {
            $('#frmStore')[0].reset();
            $('#frmDelete')[0].reset();
        })
    </script>
@endpush
