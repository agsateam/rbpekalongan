<div class="my-16 py-16">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto" data-aos="fade-up">
        <h4 class="text-xl md:text-4xl font-bold mb-16 text-center">Mitra Rumah BUMN</h4>

        @if ($mitra->isEmpty())
            <p class="text-center text-gray-500">Mitra Belum Ada</p>
        @else
            <div class="flex gap-10 items-center md:justify-center overflow-x-scroll px-8 md:px-0 md:flex-wrap scrollbar-hide"
                id="scrollable-container">
                @foreach ($mitra as $m)
                    <a href="{{ $m->link }}" class="flex-shrink-0">
                        <img src="{{ $m->logo }}" class="w-32 md:w-40 lg:w-48" alt="{{ $m->nama_mitra }}">
                    </a>
                @endforeach
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
