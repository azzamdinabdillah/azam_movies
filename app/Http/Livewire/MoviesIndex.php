<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MoviesIndex extends Component
{
    public $pencarian = 'marvel';
    public $pencarianKosong;

    public function render()
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/popular')->json()['results'];

        $genreMovies = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/genre/movie/list')->json()['genres'];

        // dd($this->pencarianKosong);

        $genreMovie = collect($genreMovies)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });



        $topRatedMovies = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/top_rated')->json()['results'];

        return view('livewire.movies-index', [
            'popularMovies' => $popularMovies,
            'genreMovies' => $genreMovie,
            'topRatedMovies' => $topRatedMovies,
        ]);
    }
}
