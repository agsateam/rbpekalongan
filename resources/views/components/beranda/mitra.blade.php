<div class="my-16 py-16">


    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">


        <h4 class="text-xl md:text-4xl font-bold mb-8 text-center">Mitra Rumah BUMN</h4>

        @if ($mitra->isEmpty())
            <p class="text-center text-gray-500">Mitra Belum Ada</p>
        @else
            <div class="mitra flex flex-wrap items-center justify-between gap-4">
                @foreach ($mitra as $m)
                    <a href="{{ $m->link }}">
                        <div class="h-64 w-64 hover:scale-125">
                            <img src="{{ $m->logo }}" class="w-full" alt="{{ $m->nama_mitra }}">
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

    </div>
</div>
