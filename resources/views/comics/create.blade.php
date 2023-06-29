@extends('layouts.base')

@section('contents')
    <h1>Inserisci un nuovo Comics</h1>
    <form method="POST" action="{{ route('comics.store') }}">
        <div class="mb-3">
            <label for="titolo" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="titolo">
        </div>
        <div class="mb-3">
            <label for="serie" class="form-label">Serie</label>
            <input type="text" class="form-control" id="serie">
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="text" class="form-control" id="data">
        </div>
        <div class="mb-3">
            <label for="prezzo" class="form-label">Prezzo</label>
            <input type="text" class="form-control" id="prezzo">
        </div>
        <div class="mb-3">
            <label for="src" class="form-label">Immagine</label>
            <input type="text" class="form-control" id="src">
        </div>
        <div class="mb-3">
            <label for="descrizione" class="form-label">Descrizione</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <button class="btn btn-primary">Salva</button>
    </form>
@endsection