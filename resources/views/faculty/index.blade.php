
              <!-- {{-- MENAMPILKAN TAMPILAN YANG ADA DI FOLDER LAYOUTS --}} -->
              @extends('layouts.app')

<!-- {{-- UNTUK MENAMPILKAN FORM UNTUK PENJUALAN --}} -->
<?php $no = 1; ?>
@section('content')
    <h3>Data Faculty</h3>
    <a href="/faculty/create" class="btn btn-success"> Tambah Data</a>
    <div class="col-sm-12">

        @if (session()->get('success'))
            <div class="alert alert-sucess">
                {{ session()->get('sucess') }}
            </div>
        @endif
    </div>


    <table class="table table-striped mt-3">
        <thead>
            <tr>
               
                <th> ID </th>
                <th> Fakultas </th>
                <th colspan=2></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facultiys as $faculty)
                <tr>
                    <td> {{ $no++ }}</td>
                
                    <td> {{ $faculty->name }}</td>
                    <td>
                        <a href="/faculty/{{ $faculty->id }}/edit/" class="btn btn-primary"> Edit</a>
                    </td>
                    <td>
                        <form action="/faculty/{{ $faculty->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
           