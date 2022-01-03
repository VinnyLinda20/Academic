@extends('layouts.app')

@section('content')
    <div class="col-md-8 offset-md-2">
        <h3> Edit Faculty</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                </ul>
            </div> <br />
        @endif

        <form method="post" action="/faculty/{{ $faculty->id }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="code"> Code </label>
                <input type="text" class="form-control" name="id" value="{{ $faculty->id }}">
            </div>
            <div class="form-group">
                <label for="name"> Nama </label>
                <input type="text" class="form-control" name="name" value="{{ $faculty->name }}">
                <button type="submit" class="btn btn-primary"> Simpan </button>
        </form>
    </div>
@endsection