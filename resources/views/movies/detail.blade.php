@extends('template.layout')

@section('content')
    @livewire('details-movie', ['detail' => $detailMovie, 'genreMovies' => $genreMovies])
@endsection