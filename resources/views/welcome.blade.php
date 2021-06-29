
@extends('master')

@section('contents')

<div class="container">
    <div class="row">
        <div class="col-md-12">
        
<p>this is very main page</p>
    
    <br>
    
<a href="{{ route('article') }}">Article</a>
<br> <br>
      
<h6>BELOW ARE THE COMPONENT FROM LIVEWIRE COMPONENT PART</h6>

    
    <!-- calling blade name from livewire folder in views -->
    <!-- <livewire:show-posts />  -->
    <!-- @livewire('show-posts') -->

    <!-- <livewire:counter />  -->

    <!-- @livewire('counter') -->

        </div>
    </div>
</div>

@endsection