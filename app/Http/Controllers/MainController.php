<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function details($id)
    {
        $detailsMovie = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/' . $id)->json();
        // dd($detailsMovie);

        $genreMovies = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/genre/movie/list')->json()['genres'];

        $genreMovie = collect($genreMovies)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        return view('movies.detail', [
            'detailMovie' => $detailsMovie,
            'genreMovies' => $genreMovie,
        ]);
    }

    public function search()
    {
        return view('movies.search');
    }
}
