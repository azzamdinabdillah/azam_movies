@if ($pencarianKosong == 'errors')
                    <p class="text-white font-semibold text-lg text-center mt-10">Silahkan Masukkan Keywords</p>
            @elseif($pencarianKosong == 'errors_kosong')
                    <p class="text-white font-semibold text-lg text-center mt-10">Maaf, Film Tidak Ditemukan</p>
                @else
                {{-- ukuran hp --}}
                <div class="pt-3 px-5 flex flex-wrap justify-between xl:hidden">
                    @foreach ($pencarianMovies as $pencarianMovie) 
                        <div class="w-[45%] mt-7">
                            <img src="https://image.tmdb.org/t/p/w500/{{ $pencarianMovie['poster_path'] }}" alt=""
                                class="border-2 shadow-2xl rounded-xl border-[#2E0249] mb-3 brightness-75 overflow-hidden w-[100%]">
                            <div class="text-white font-semibold px-2">
                                <a class="text-white font-bold text-lg hover:brightness-75" href="/movie/details/{{ $pencarianMovie['id'] }}">{{ $pencarianMovie['title'] }}</a>
                                <div class="flex items-center gap-2 py-2 text-[11px]">
                                    <img src="../img/bintang.png" alt="" class="w-[10%]">
                                    <p class="text-white font-semibold ">{{ $pencarianMovie['vote_average'] * 10 . '%' }} | {{ \Carbon\Carbon::parse($pencarianMovie['release_date'])->format('M d, Y') }}</p>
                                </div>
                                <p class="text-white font-semibold text-[12px]">
                                    @foreach ($pencarianMovie['genre_ids'] as $genre)
                                        {{ $genreMovies->get($genre) }} @if (!$loop->last)
                                            , 
                                        @endif
                                    @endforeach
                                </p>
                            </div>
        
                        </div>
    
                        @endforeach
                    </div>

                {{-- ukuran desktop --}}
                <div class="mt-10 mb-10 hidden xl:block px-40">
                    <div class="flex flex-wrap gap-y-8 justify-center">
    
                        @foreach ($pencarianMovies as $pencarianMovie)    
                        <div class="w-[25%]">
                            <div class="w-[70%]">
                                <img src="https://image.tmdb.org/t/p/w500/{{ $pencarianMovie['poster_path'] }}" alt=""
                                    class="border-2 shadow-2xl rounded-xl border-[#2E0249] mb-3 brightness-75 overflow-hidden">
                                <div class="text-white font-semibold px-2">
                                    <a href="/movie/details/{{ $pencarianMovie['id'] }}" class="text-white font-bold text-lg hover:brightness-75">{{ $pencarianMovie['title'] }}</a>
                                    <div class="flex items-center gap-1 py-2 text-[11px]">
                                        <img src="{{ asset('img/bintang.png') }}" alt="" class="w-[10%]">
                                        <p class="text-slate-300 font-semibold ">{{ $pencarianMovie['vote_average'] * 10 . '%' }} | {{ \Carbon\Carbon::parse($pencarianMovie['release_date'])->format('M d, Y') }}</p>
                                    </div>
                                    <p class="text-white font-semibold text-[11px]">
                                        @foreach ($pencarianMovie['genre_ids'] as $genre)
                                            {{ $genreMovies->get($genre) }} @if (!$loop->last)
                                                , 
                                            @endif
                                        @endforeach
                                    </p>
                                </div>
                            </div>
    
                        </div>
                        @endforeach
    
    
    
                        
    
                    </div>
                    <div class="swiper-scrollbar" style="background: #1F1D36 !important;"></div>
                </div>
            @endif