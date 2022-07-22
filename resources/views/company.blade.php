@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('company.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>client_id</label>
                    <input type="text" class="form-control col-5" name="client_id" value="@isset($data) {{ $data['client_id'] }} @endisset">
                </div>
                <div class="form-group">
                    <label>account_id</label>
                    <input type="text" class="form-control col-5" name="account_id" value="@isset($data) {{ $data['account_id'] }} @endisset">
                </div>
                <button type="submit" class="btn btn-primary">Показать</button>
            </form>
        </div>
    </div>

    @if (isset($company))
        <div class="row mt-4">
            <div class="col-12">
                @foreach ($company as $array)
                    @foreach ($array as $key => $value)
                        <code>{{ $key }} = {{ $value }}</code>
                        <br>
                    @endforeach
                    <hr>
                @endforeach
            </div>
        </div>
    @endif
@endsection
