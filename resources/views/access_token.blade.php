@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('access_token.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Access Token</label>
                    <textarea class="form-control" name="access_token" rows="5">
                        {{ $access_token }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label>v</label>
                    <input type="text" class="form-control col-1" name="v" value="{{ $v }}">
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection
