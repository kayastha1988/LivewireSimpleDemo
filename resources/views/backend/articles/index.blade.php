@extends('backend.master')

@section('contents')

<div class="container">
    <div class="row">
        <div class="col-md-12">

        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

        <h3 class="text-capitalize">view articles</h3>

<a class="btn btn-primary" href="{{ route('article.add') }}">Add Article</a>

<hr>

<p>Here, all the articles will be displayed via livewire article Component</p>


@livewire('article.show-article')


        </div>
    </div>
</div>

@endsection
