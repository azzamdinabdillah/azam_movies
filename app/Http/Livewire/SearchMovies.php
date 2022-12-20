<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchMovies extends Component
{
    public $pencarian = '';
    public $pencarianKosong;
    public $searchEmpty;

    public $pencarianProperties;
    public $isiPencarian;
    public $katakunci = '';

    public $pencarianMovies;
    public $genreMovies;

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

        $pencarianFilm = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/search/movie?query=kkn')->json();

        // if (count($pencarianFilm) == 1) {
        //     return view('livewire.search-movies');
        // }

        // if ($this->pencarian = '') {
        //     return view('livewire.search-movies');
        // }else{
        //     return view('livewire.search-movies', [
        //         'pencarianMovies' => $pencarianFilm['results'],
        //         'genreMovies' => $genreMovie,
        //     ]);
        // }

        // if ($pencarianFilm['errors'][0] == 'query must be provided') {
        //     return view('livewire.search-movies');
        // }

        // if ($this->pencarianProperties = '') {
            
        // }

        // $this->pencarianMovies = $pencarianFilm['results'];
        // $this->genreMovies = $genreMovie;
        // dump($this->pencarianMovies);

        return view('livewire.search-movies');

        
    }

    public function sistemPencarian()
    {
        // dd($this->pencarianProperties);

        $this->katakunci = $this->pencarianProperties;

        $genreMovies = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/genre/movie/list')->json()['genres'];

        $genreMovie = collect($genreMovies)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        $pencarianFilm = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/search/movie?query=' . $this->pencarianProperties)->json();
        // dd($pencarianFilm);

        $this->pencarianMovies = $pencarianFilm['results'];
        $this->genreMovies = $genreMovie;
        // dump($this->pencarianMovies);

        // $this->pencarian = $this->pencarianProperties;
    }
}
