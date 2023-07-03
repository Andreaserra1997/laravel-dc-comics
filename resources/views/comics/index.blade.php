@extends('layouts.base')

@section('contents')

    <h1>Comics</h1>

    @if (session('delete_success'))
        @php $comic = session('delete_success') @endphp
        <div class="alert alert-danger">
            Il comic "{{ $comic->title }}" è stato eliminato
            <form action="{{ route("comics.restore", ['comic' => $comic]) }}" method="post" class="d-inline-block">
            @csrf
            <button class="btn btn-warning">Ripristina</button>
            </form>
        </div>
    @endif

    @if (session('restore_success'))
        @php $comic = session('restore_success') @endphp
        <div class="alert alert-success">
            Il comic "{{ $comic->title }}" è stato ripristinato
        </div>
    @endif

    <a class="btn btn-primary" href="{{ route('comics.create') }}">Nuovo</a>
    <a class="btn btn-primary" href="{{ route('comics.trashed') }}">Cestino</a>

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
                        <a class="btn btn-warning" href="{{ route('comics.edit', ['comic' => $comic->id]) }}">Edita</a>
                        <form action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="post" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Cancella</button>
                        </form>
                    </td>
                </tr>            
            @endforeach
        </tbody>
    </table>

    {{ $comics->links() }}

@endsection