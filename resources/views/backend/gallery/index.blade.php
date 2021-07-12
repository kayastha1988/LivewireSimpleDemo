@extends('backend.master')

@push('css_style')
@endpush
@section('contents')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <livewire:gallery.gallery/>
            </div>
        </div>
    </div>

@endsection
