@extends('layouts.base')

@section('contents')

    <h1>Comics cestinati</h1>

    @if (session('delete_success'))
        @php $comic = session('delete_success') @endphp
        <div class="alert alert-danger">
            Il comic "{{ $comic->title }}" è stato eliminato definitivamente
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Serie</th>
                <th scope="col">Data</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trashedComics as $comic)
                <tr>
                    <th scope="row">{{ $comic->id }}</th>
                    <td>{{ $comic->title }}</td>
                    <td>{{ $comic->series }}</td>
                    <td>{{ $comic->sale_date }}</td>
                    <td>{{ $comic->price }}</td>
                    <td>
                        <form action="{{ route('comics.restore', ['comic' => $comic->id]) }}" method="post" class="d-inline-block">
                            @csrf
                            <button class="btn btn-success">Ripristina</button>
                        </form>
                        <form action="{{ route('comics.harddelete', ['comic' => $comic->id]) }}" method="post" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Elimina Definitivamente</button>
                        </form>
                    </td>
                </tr>            
            @endforeach
        </tbody>
    </table>

    {{ $trashedComics->links() }}

@endsection