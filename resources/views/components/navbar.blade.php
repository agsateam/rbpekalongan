<div class="bg-white z-40 sticky top-0">
    <div class="header max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto flex py-4 md:py-0 flex-wrap items-center gap-4">

        <img src="{{ url('/') }}/images/logobumn.png" alt="Logo Bumn" class="h-4 md:h-8 md:mt-1">
        <img src="{{ url('/') }}/images/rbpekalongan.png" alt="Logo Rumah Bumn" class="h-8 md:h-16">
        <img src="{{ url('/') }}/images/telkom.png" alt="Logo Telkom" class="h-8 md:h-16">



        <a href="{{ url('/') }}/login"
            class="ml-auto border p-1 hidden font-semibold border-[#195770] rounded-md hover:bg-[#195770] hover:text-white hover:font-bold md:px-4 md:py-2 md:block">Masuk</a>
    </div>
</div>


<nav class="bg-[#195770] z-50 bg-contain sticky top-16 md:top-16"
    style="background-image: url('{{ url('/') }}/images/batik1.png')">
    <div class="max-w-screen-xl flex flex-wrap justify-end mx-auto">
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white md:hidden mr-4 my-2 border border-gray-500 rounded-md bg-[#195770]"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden md:block w-full md:mr-20 md:w-auto" id="navbar-default">
            <ul class="text-white font-medium flex flex-col md:flex-row">
                <li
                    class="{{ request()->is('/') ? 'bg-[#1ba0db]' : 'bg-[#195770]' }} hover:bg-[#1ba0db] cursor-pointer">
                    <a href="{{ url('/') }}/" class="block px-3 py-4 md:px-6" aria-current="page">Beranda</a>
                </li>
                <li
                    class="{{ str_contains(url()->current(), 'event') ? 'bg-[#1ba0db]' : 'bg-[#195770]' }} hover:bg-[#1ba0db] cursor-pointer">
                    <a href="{{ url('/') }}/event" class="block px-3 py-4 md:px-6" aria-current="page">Event</a>
                </li>
                <li
                    class="{{ str_contains(url()->current(), 'booking') ? 'bg-[#1ba0db]' : 'bg-[#195770]' }} hover:bg-[#1ba0db] cursor-pointer">
                    <a href="{{ url('/') }}/booking" class="block px-3 py-4 md:px-6"
                        aria-current="page">Booking</a>
                </li>
                <li
                    class="{{ str_contains(url()->current(), 'product') || str_contains(url()->current(), 'umkm') ? 'bg-[#1ba0db]' : 'bg-[#195770]' }} hover:bg-[#1ba0db] cursor-pointer">
                    <a href="{{ url('/') }}/product" class="block px-3 py-4 md:px-6"
                        aria-current="page">Produk</a>
                </li>
                <li
                    class="{{ str_contains(url()->current(), 'contact') ? 'bg-[#1ba0db]' : 'bg-[#195770]' }} hover:bg-[#1ba0db] cursor-pointer">
                    <a href="{{ url('/') }}/contact" class="block px-3 py-4 md:px-6" aria-current="page">Hubungi
                        Kami</a>
                </li>
                <li class="bg-[#195770] hover:bg-[#1ba0db] cursor-pointer md:hidden">
                    <a href="{{ url('/') }}/login" class="block px-3 py-4 md:px-6 sm:hidden"
                        aria-current="page">Masuk</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
