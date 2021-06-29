<div>

<h3 class="text-capitalize">edit articles</h3>
<hr>

@if(session()->has('message'))
    <div class="alert alert-danger" id="displayMessage">
        {{ session()->get('message') }}
    </div>
@endif

<!-- function name from Livewire class is passed to the form to save data -->
<form wire:submit.prevent="storeArticle">
<!-- submit is function created on the Create Livewire class to save data -->
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" wire:model="email" id="inputEmail4">
      @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>

  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" wire:model="address" placeholder="1234 Main St">
    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" wire:model="address2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" wire:model="city">
      @error('city') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group col-md-4">
      <label for="inputZip">Post Code</label>
      <input type="text" class="form-control" id="inputZip" wire:model="postcode">
      @error('postcode') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">edit Article</button>
</form>


<a href="{{ route('article') }}" class="btn btn-success mt-2">Back</a>
</div>
