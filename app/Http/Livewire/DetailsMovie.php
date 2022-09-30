<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class DetailsMovie extends Component
{
    public $data;
    public $dataGenre;

    public function mount($detail, $genreMovies)
    {
        $this->data = $detail;
        $this->dataGenre = $detail['genres'];
    }

    public function render()
    {
        return view('livewire.details-movie');
    }
}
