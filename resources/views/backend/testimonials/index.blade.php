@extends('backend.master')

@push('css_style')
    <style>
        .alert {
            padding: 8px 15px;
            bottom: -3px !important;
        }
    </style>
@endpush
@section('contents')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <livewire:testimonials.reviews></livewire:testimonials.reviews>

            </div>
        </div>
    </div>

@endsection
