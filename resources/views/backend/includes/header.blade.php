<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css">

@stack('css_styles')
<!-- Styles -->
    <livewire:styles/>

    <style>
        .error {
            color: red
        }
    </style>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ route('dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ route('testimonials') }}">testimonials</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ route('article') }}">article</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ route('gallery') }}">gallery</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="">Logout</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">

            <div class="jumbotron">
                <h1 class="display-4">Hello,
                    @can('isAdmin') Admin @elsecan('isManager') Manager @else User @endcan!</h1>
            </div>
        </div>
    </div>
</div>


