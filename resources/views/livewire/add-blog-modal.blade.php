<div>

<button class="btn btn-primary"  data-toggle="modal" data-target="#addBlogModal">Add Blog</button>


<!-- Modal -->
<!-- wire:ignore.self : must include in order to ignore the hiding modal form. -->
<div class="modal fade" wire:ignore.self id="addBlogModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
<!-- function name from Livewire class can be passed to the form to save data or we can passed it into the button click event too. -->
<form wire:submit.prevent="store">
      <div class="modal-body">
        
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Title</label>
      <input type="text" class="form-control" wire:model="title" id="inputEmail4">
      @error('title') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>

  <div class="form-group">
    <label for="inputAddress">Short Info</label>
    <textarea type="text" class="form-control" id="inputAddress" wire:model="short_info" rows="2"></textarea>
    @error('short_info') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label for="inputAddress2">Description</label>
    <textarea type="text" class="form-control" id="inputAddress2" wire:model="desc" rows="4"></textarea>
    @error('author') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputCity">Author</label>
      <input type="text" class="form-control" id="inputCity" wire:model="author">
      @error('author') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

  </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
  <button type="submit" class="btn btn-primary" >Add Blog</button>
      </div>
      
</form>
    </div>
  </div>
</div>
</div> 
