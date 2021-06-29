<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}


<h4 class="mt-4">By using single component</h4>
<hr>
    <h3 class="mt-4">List of Blogs</h3>
    <button wire:click="create" class="btn btn-warning text-capitalize">add blog</button>

    @include('livewire.add-blog-modal')
    <hr>

    @if(session()->has('message'))
        <div class="alert alert-success" id="displayMessage">
            {{ session()->get('message') }}
        </div>
    @endif


@if($isBlogUpdate=='create')
    @include('livewire.add-blog')
    @elseif($isBlogUpdate=='update')
    @include('livewire.edit-blog')
    @else


    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Short Info</th>
      <th scope="col">Description</th>
      <th scope="col">Author</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

@foreach($blog as $key => $blogs)
<tr>
<td>{{ ++$key }}</td>
<td>{{$blogs->title}}</td>
<td>{{$blogs->short_info}}</td>
<td>{{$blogs->description}}</td>
<td>{{$blogs->author}}</td>
<td>
    <button wire:click="edit({{ $blogs->id }})" class="btn btn-primary text-uppercase">edit</button>
    <button wire:click="delete({{ $blogs->id }})" class="btn btn-danger text-uppercase">delete</button>
    
    <button onclick="deleteBlog({{ $blogs->id }})" class="btn btn-warning text-uppercase">delete (with dialog box)</button>
</td>
</tr>
@endforeach
  
  </tbody>
</table>

@endif


<script>
        function deleteBlog(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteBlog',id);
        }
    </script>

</div>
