<!-- @extends('')
<livewire:article.create :$article='article' /> -->


@extends('backend.master')

@section('contents')

<div class="container">
<div class="row justify-content-center">
    <div class="col-6">
    @livewire('article.edit-article')
    </div>
</div>
</div>

@endsection
