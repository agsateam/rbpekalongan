<div class="bg-gray-100 my-16 py-16">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto" data-aos="fade-up" data-aos-duration="2000">
        <div class="flex justify-between items-start">
            <h4 class="text-xl md:text-4xl font-bold mb-5">Testimoni</h4>
            <div class="hidden md:flex items-center">
                <span class="text-lg mr-3">Punya testimoni untuk kami?</span>
                <a href="{{ route('testi.add') }}" class="btn btn-sm text-white bg-[#195770] hover:bg-[#1ba0db]">Tulis
                    Disini!</a>
            </div>
        </div>

        @if ($testi->count() > 0)
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <div class="relative overflow-hidden rounded-lg h-[500px] lg:h-80 bg-white shadow-md">
                    @foreach ($testi as $t)
                        <div class="bg-white hidden duration-1000 ease-in-out" data-carousel-item>
                            {{-- <div class="absolute -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 w-2/3"> --}}
                            <div class="absolute -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 w-2/3">
                                <div class="flex flex-row justify-center">
                                    <svg class="hidden md:block w-14 text-gray-400 self-start rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                                        <path
                                            d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
                                    </svg>
                                    <div class="flex flex-col ml-5 text-lg">
                                        <svg class="md:hidden w-6 text-gray-400 self-start rotate-180 mb-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                                            <path
                                                d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
                                        </svg>
                                        <span class="hidden md:block">{!! Illuminate\Support\Str::replace(["\r\n"], ['<br/>'], $t->testimoni) !!}</span>
                                        <span class="md:hidden">{!! Illuminate\Support\Str::replace(["\r\n"], ['<br/>'], Str::limit($t->testimoni, 180)) !!}</span>
                                        <div class="mt-3 flex flex-col md:flex-row">
                                            <div class="flex">
                                                @if ($t->gender == "lk")
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0,0,256,256" class="w-5 mr-2">
                                                        <g fill="#9ca3af" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(9.84615,9.84615)"><path d="M2.10156,23c0,0 0,-1.5 0,-1.69922c0,-2.19922 3.29687,-4.19922 6.89844,-4.90234c0,0 1.10156,-0.59766 0.80078,-1.69922c-1.10156,-1.39844 -1.40234,-2.89844 -1.40234,-2.89844c-0.19922,-0.10156 -0.5,-0.30078 -0.69922,-0.5c-0.30078,-0.40234 -0.69922,-1.60156 -0.59766,-2.5c0.09766,-0.80078 0.29688,-0.5 0.39844,-0.69922c-0.80078,-1.80078 -0.39844,-4.10156 0.5,-5.80078c1.89844,-3.30078 5.89844,-2.30078 6.5,-1.10156c3.80078,-0.69922 3.69922,5.30078 3.10156,6.80078c0,0 0.29688,0.10156 0.29688,1.5c-0.09766,1.5 -1.29687,2.39844 -1.29687,2.39844c0,0.40234 -0.5,1.60156 -1.30078,2.70313c-0.69922,1.39844 0.69922,1.69922 0.69922,1.69922c3.60156,0.69922 6.89844,2.69922 6.89844,4.89844c0,0.19922 0,1.69922 0,1.69922c0,1.40234 -5.39844,2.90234 -10.39844,2.90234c-4.89844,0 -10.39844,-0.5 -10.39844,-2.80078z"></path></g></g>
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0,0,256,256" class="w-6 mr-2">
                                                        <g fill="#9ca3af" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8.53333,8.53333)"><path d="M5,27c0,-5 6.957,-4.174 8,-6.999v-1.001c-3.778,0 -5.914,-1.884 -5.914,-1.884c1.974,-1.643 -0.76,-13.073 5.963,-13.073c0,0 0.907,-1.043 2.08,-1.043c8.218,0 5.51,12.41 7.635,14.154c0,0 -1.968,1.846 -5.765,1.846v1.001c1.044,2.825 8.001,1.999 8.001,6.999z"></path></g></g>
                                                    </svg>
                                                @endif
                                                <span class="font-bold">{{ $t->name }}</span>
                                            </div>
                                            <span class="hidden md:block mx-2">|</span>
                                            <span class="italic">{{ $t->umkm }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 group-hover:bg-black/50">
                        <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 group-hover:bg-black/50">
                        <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
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
            <a href="{{ route('testi.add') }}" class="btn btn-sm text-white bg-[#195770] hover:bg-[#1ba0db]">Tulis
                Disini!</a>
        </div>
    </div>
</div>
