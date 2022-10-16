<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchMovies extends Component
{
    public $pencarian;
    public $pencarianKosong;
    public $searchEmpty;

    public $pencarianProperties;
    public $isiPencarian;

    public function render()
    {

        // if ($this->pencarian == null) {
        //     $pencarianFilm = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/search/movie?query=' . $this->pencarian)->json();

        //     $this->pencarianKosong = collect($pencarianFilm)->keys()->all()[0];
        // } else {
        //     $pencarianFilm = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/search/movie?query=' . $this->pencarian)->json()['results'];

        //     if (empty($pencarianFilm)) {
        //         $this->pencarianKosong = 'errors_kosong';
        //     }else {
        //         $this->pencarianKosong = collect($pencarianFilm)->keys()->all()[0];
        //     }

        // }

        $genreMovies = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/genre/movie/list')->json()['genres'];

        $genreMovie = collect($genreMovies)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        $pencarianFilm = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/search/movie?query=' . $this->pencarian)->json();

        if (count($pencarianFilm) == 1) {
            return view('livewire.search-movies');
        }

        return view('livewire.search-movies', [
            'pencarianMovies' => $pencarianFilm['results'],
            'genreMovies' => $genreMovie,
        ]);
    }

    public function sistemPencarian()
    {
        $this->pencarian = $this->pencarianProperties;
    }
}
