<div>
    {{-- The whole world belongs to you. --}}

    @if(session()->has('message'))
    <div class="alert alert-success" id="displayMessage">
        {{ session()->get('message') }}
    </div>
@endif


    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Address 2</th>
      <th scope="col">City | Post Code</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  @foreach($articles as $key => $data)
    <tr>
      <td scope="row">{{ ++$key }}</td>
      <td>{{ $data->email }}</td>
      <td>{{ $data->address }}</td>
      <td>{{ $data->address2 }}</td>
      <td>{{ $data->city.', '. $data->postcode }}</td>
      <td>
      <button wire:click="edit({{ $data->id }})" class="btn btn-primary text-uppercase">edit</button>
      <button wire:click="delete({{ $data->id }})" class="btn btn-danger text-uppercase">delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


</div>
