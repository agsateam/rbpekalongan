<div class="bg-white z-40 sticky top-0">
    <div class="header max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto flex flex-wrap items-center py-3 gap-2">
        <img src="{{url('/')}}/images/logobumn.png" alt="Logo Bumn" class="h-4 md:h-8">
        <img src="{{url('/')}}/images/logorumahbumn.png" alt="Logo Rumah Bumn" class="h-6 md:h-12">
        <div class="font-bold text-sm mt-2 md:text-xl">Pekalongan</div>
        <div
            class="ml-auto border p-1 hidden font-semibold border-[#195770] rounded-md hover:bg-[#195770] hover:text-white hover:font-bold md:px-4 md:py-2 md:block">
            <a href="#">Masuk</a>
        </div>
    </div>
</div>


<nav class="bg-[#195770] z-50 bg-contain sticky top-12 md:top-16" style="background-image: url('{{url('/')}}/images/batik1.png')">
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
            <ul
                class="text-white font-medium flex flex-col md:flex-row">
                <li class="{{ request()->is('/') ? 'bg-[#1ba0db]' : 'bg-[#195770]' }} hover:bg-[#1ba0db] cursor-pointer py-2 md:py-4 px-8">
                    <a href="/"
                        class="block py-2 px-3 rounded md:p-0"
                        aria-current="page"
                    >Beranda</a>
                </li>
                <li class="{{ request()->is('/event') ? 'bg-[#1ba0db]' : 'bg-[#195770]' }} hover:bg-[#1ba0db] cursor-pointer py-2 md:py-4 px-8">
                    <a href="/event"
                        class="block py-2 px-3 rounded md:p-0"
                        aria-current="page"
                    >Event</a>
                </li>
                <li class="{{ request()->is('/booking') ? 'bg-[#1ba0db]' : 'bg-[#195770]' }} hover:bg-[#1ba0db] cursor-pointer py-2 md:py-4 px-8">
                    <a href="/booking"
                        class="block py-2 px-3 rounded md:p-0"
                        aria-current="page"
                    >Booking</a>
                </li>
                <li class="{{ request()->is('/product') ? 'bg-[#1ba0db]' : 'bg-[#195770]' }} hover:bg-[#1ba0db] cursor-pointer py-2 md:py-4 px-8">
                    <a href="/product"
                        class="block py-2 px-3 rounded md:p-0"
                        aria-current="page"
                    >Produk</a>
                </li>
                <li class="{{ request()->is('/contact') ? 'bg-[#1ba0db]' : 'bg-[#195770]' }} hover:bg-[#1ba0db] cursor-pointer py-2 md:py-4 px-8">
                    <a href="/contact"
                        class="block py-2 px-3 rounded md:p-0"
                        aria-current="page"
                    >Hubungi Kami</a>
                </li>
                <li class="bg-[#195770] hover:bg-[#1ba0db] cursor-pointer py-2 md:py-4 px-8 md:hidden">
                    <a href="#" class="py-2 px-3 block rounded md:p-0 sm:hidden" aria-current="page">Masuk</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
