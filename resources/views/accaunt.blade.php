@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            @foreach ($data as $array)
                @foreach ($array as $key => $value)
                    <code>{{ $key }} = {{ $value }}</code>
                    <br>
                @endforeach
                <hr>
            @endforeach
        </div>
    </div>
@endsection
