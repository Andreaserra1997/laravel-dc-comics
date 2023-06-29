@extends('layouts.base')

@section('contents')
    <h1>{{ $comic->title }}</h1>
    <h2>Serie: {{ $comic->series }}, Data: {{ $comic->sale_date }}, Prezzo: {{ $comic->price }}</h2>

    <img src="{{ $comic->thumb }}" alt="">

    <p>{!! $comic->description !!}</p>
@endsection