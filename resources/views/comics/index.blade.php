@extends('layouts.base')

@section('contents')

    <h1>Comics</h1>

    <a class="btn btn-primary" href="{{ route('comics.create') }}">Nuovo</a>

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
            @foreach ($comics as $comic)
                <tr>
                    <th scope="row">{{ $comic->id }}</th>
                    <td>{{ $comic->title }}</td>
                    <td>{{ $comic->series }}</td>
                    <td>{{ $comic->sale_date }}</td>
                    <td>{{ $comic->price }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('comics.show', ['comic' => $comic->id]) }}">Apri</a>
                        <a class="btn btn-warning" href="">Edita</a>
                        <a class="btn btn-danger" href="">Cancella</a>
                    </td>
                </tr>            
            @endforeach
        </tbody>
    </table>

    {{ $comics->links() }}

@endsection