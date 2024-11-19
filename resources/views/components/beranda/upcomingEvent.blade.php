@php
    function sliceText($text)
    {
        if (strlen($text) > 150) {
            $text = substr($text, 0, 150) . '...';
        }
        return $text;
    }
@endphp

<div class="bg-white my-16 py-16">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto" data-aos="fade-up">
        <h4 class="text-xl md:text-4xl font-bold mb-5">Upcoming Event</h4>

        <div id="default-carousel" class="relative w-full h-[750px] md:h-96" data-carousel="slide">
            <div class="relative overflow-hidden rounded-lg h-full border shadow-md">
                @foreach ($events as $item)
                    <div class="w-full h-full hidden duration-1000 ease-in-out" data-carousel-item>
                        <div
                            class="w-full h-full md:h-fit md:px-24 absolute -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            <div class="flex flex-col md:flex-row">
                                <img src="{{ $item['poster'] }}" class="w-full aspect-square object-cover md:w-64 rounded-md">
                                <div class="flex flex-col mt-5 md:mt-0 md:ml-10 px-5 md:px-0">
                                    <span class="text-2xl lg:text-4xl font-bold mb-3">{{ $item['name'] }}</span>
                                    <p class="text-lg">{{ sliceText($item['deskripsi']) }}</p>
                                    <span class="font-semibold mt-3 flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        {{ Carbon\Carbon::createFromDate($item['date'])->format('d/m/Y') }} |
                                        {{ $item['time'] }}
                                    </span>
                                    <span class="font-semibold flex mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                        </svg>
                                        {{ $item['location'] }}
                                    </span>
                                    <div class="mt-5 md:mt-0 grow flex flex-col items-start justify-end">
                                        <a href="{{ route('event.regist') . '/' . $item['id'] }}"
                                            class="h-10 btn btn-sm bg-[#195770] text-white hover:text-black">
                                            Daftar Event Ini
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </a>
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
                    <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
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
                    <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>
</div>
