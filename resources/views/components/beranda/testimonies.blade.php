@php
use App\Models\Testimoni;
$testi = Testimoni::where('status', 'accepted')->get();
@endphp

<div class="bg-gray-100 my-16 py-16">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <div class="flex justify-between items-start">
            <h4 class="text-xl md:text-4xl font-bold mb-5">Testimoni</h4>
            <div class="hidden md:flex items-center">
                <span class="text-lg mr-3">Punya testimoni untuk kami?</span>
                <a href="{{route('testi.add')}}" class="btn btn-sm text-white bg-[#195770] hover:bg-[#1ba0db]">Tulis Disini!</a>
            </div>
        </div>
    
        @if ($testi->count() > 0)
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <div class="relative overflow-hidden rounded-lg h-[500px] lg:h-80 bg-white shadow-md">
                @foreach ($testi as $t)
                    <div class="bg-white hidden duration-1000 ease-in-out" data-carousel-item>
                        <div class="absolute -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 w-2/3">
                            <div class="flex flex-row ">
                                <svg class="w-14 text-gray-400 self-start rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                                    <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
                                </svg>
                                <div class="flex flex-col ml-5 text-lg">
                                    <span class="hidden md:block">{!! Illuminate\Support\Str::replace(["\r\n"], ["<br/>"], $t->testimoni) !!}</span>
                                    <span class="md:hidden">{!! Illuminate\Support\Str::replace(["\r\n"], ["<br/>"], Str::limit($t->testimoni, 180)) !!}</span>
                                    <div class="mt-3">
                                        <span class="font-bold">{{ $t->name }}</span>
                                        <span class="mx-2">|</span>
                                        <span class="italic">{{ $t->umkm }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 group-hover:bg-black/50">
                    <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 group-hover:bg-black/50">
                    <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
        @else
        <span class="text-xl">Testimoni belum tersedia.</span>
        @endif

        <div class="md:hidden flex items-center mt-8">
            <span class="text-lg mr-3">Punya testimoni untuk kami?</span>
            <a href="{{route('testi.add')}}" class="btn btn-sm text-white bg-[#195770] hover:bg-[#1ba0db]">Tulis Disini!</a>
        </div>
    </div>
</div>