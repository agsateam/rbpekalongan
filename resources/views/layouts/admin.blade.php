@php
    use App\Models\EventRegistration;
    use App\Models\Umkm;
    use App\Models\Testimoni;
    $eventRegistCount = EventRegistration::where('status', 'registered')->count();
    $umkmRegistCount = Umkm::where('status', 'registered')->count();
    $testiSendedCount = Testimoni::where('status', 'send')->count();
@endphp

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | RB Pekalongan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{url('images/icon.png')}}">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    @yield('head')
</head>

<body class="font-manrope">
    <main class="flex flex-row relative">
        <menu class="hidden lg:block h-screen sticky top-0 overflow-y-auto bg-[#195770] text-white lg:w-3/12 shadow-lg">
            <div class="w-full py-5 px-5 sticky top-0 bg-[#195770] z-10">
                <a href="{{ route('home') }}">
                    <img src="{{ url('images/logo-light.png') }}" class="w-3/5">
                </a>
            </div>
            <ul class="menu">
                @include('components.backend.menu')
            </ul>
        </menu>
        <section class="w-full flex flex-col">
            <header class="sticky top-0 z-50">

                <div class="navbar flex justify-end py-0 bg-[#195770] text-white shadow-lg bg-contain"
                    style="background-image: url('{{ url('/') }}/images/batik1.png')">
                    <div class="block lg:hidden drawer pl-2">
                        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
                        <div class="drawer-content">
                            <label for="my-drawer" class="text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                </svg>
                            </label>
                        </div>
                        <div class="drawer-side z-40">
                            <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                            <ul class="menu bg-[#195770] text-white min-h-full w-64 p-4">
                                <!-- Sidebar content here -->
                                <a href="{{ route('home') }}">
                                    <img src="{{ url('images/logo-light.png') }}" class="w-3/5 ml-2 mb-10">
                                </a>
                                @include('components.backend.menu', ['screen' => 'mobile'])
                            </ul>
                        </div>
                    </div>
                    <div class="md:mr-3 bg-[#195770] pl-3 rounded-md">
                        <div class="dropdown dropdown-end">
                            <div class="flex justify-center items-center">
                                <span class="text-base capitalize mr-1">{{ Auth::user()->name }}</span>
                                <button tabindex="0" role="button"
                                    class="btn btn-ghost btn-circle inline-flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-8">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </button>
                            </div>
                            <ul tabindex="0"
                                class="dropdown-content menu bg-[#195770] rounded-md z-[1] w-52 p-2 shadow">
                                <li><a class="rounded-none border border-white mb-1" href="{{ route('admin.profile') ."/". Auth::user()->id }}">Profil</a></li>
                                <li><a class="rounded-none border border-white mb-1" href="{{ route('admin.password') }}">Ubah Password</a></li>
                                <li><a class="rounded-none border border-white" href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </header>
            <div class="w-full h-full p-5 bg-right-top bg-no-repeat"
                style="background-image: url('{{ url('/') }}/images/batik2.png')">
                @yield('content')
            </div>
        </section>
    </main>

    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>


</html>
