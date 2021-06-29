<div>

<form>
        
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Title</label>
      <input type="email" class="form-control" wire:model="title" id="inputEmail4">
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
    @error('desc') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputCity">Author</label>
      <input type="text" class="form-control" id="inputCity" wire:model="author">
      @error('author') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

  </div>
  
      <div class="form-group">
        <button wire:click="closeForm" type="button" class="btn btn-secondary">Close</button>        
  <button wire:click.prevent="store()" type="submit" class="btn btn-primary float-right">Add Blog</button>
      </div>
      
</form>

</div>