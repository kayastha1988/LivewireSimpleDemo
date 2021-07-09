@extends('master')

@section('contents')

    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <h3>User Details</h3>

                <a href="{{ route('export.excel.users') }}" class="btn btn-primary">Export Excel</a>
                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dataUser as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


                <br>

                <a href="{{ route('article') }}">Article</a>

                <a href="{{ route('testimonials') }}">Testimonials</a>
                <br> <br>

                <h4>UI Chart section</h4>

                <div style="width: 50%">
                    {!! $usersChart->container() !!}
                </div>


            </div>
        </div>
    </div>

@endsection

@push('js_scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {{-- ChartScript --}}
    @if($usersChart)
        {!! $usersChart->script() !!}
    @endif
@endpush
