<div class="my-16 py-16">
    <div class="md:max-w-screen-xl mx-0 md:mx-14 2xl:mx-auto" data-aos="fade-up">
        <h4 class="text-2xl md:text-4xl font-bold mb-10 text-center">Mitra Rumah BUMN</h4>

        @if ($mitra->isEmpty())
            <p class="text-center text-gray-500">Mitra Belum Ada</p>
        @else
            {{-- <div class="flex gap-10 items-center md:justify-center overflow-x-scroll px-8 md:px-0 md:flex-wrap scrollbar-hide"
                id="scrollable-container">
                @foreach ($mitra as $m)
                    <a target="_blank" href="{{ $m->link }}" class="flex-shrink-0">
                        <img loading="lazy" src="{{ $m->logo }}" class="h-32" alt="{{ $m->nama_mitra }}">
                    </a>
                @endforeach
            </div> --}}
            <div class="flex overflow-hidden gap-8 group">
                <div class="flex gap-8 animate-infinite-scroll group-hover:paused">
                    @foreach ($mitra as $m)
                        <a href="{{$m->link}}" target="_blank" class="h-16 w-28 md:h-28 md:w-44">
                            <img loading="lazy" src="{{ $m->logo }}" class="h-full w-full object-contain" />
                        </a>
                    @endforeach
                </div>
                <div class="flex gap-8 animate-infinite-scroll group-hover:paused" aria-hidden="true">
                    @foreach ($mitra as $m)
                        <a href="{{$m->link}}" target="_blank" class="h-16 w-28 md:h-28 md:w-44">
                            <img loading="lazy" src="{{ $m->logo }}" class="h-full w-full object-contain" />
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>

<style>
    /* Menghilangkan scrollbar untuk tampilan yang lebih bersih */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
