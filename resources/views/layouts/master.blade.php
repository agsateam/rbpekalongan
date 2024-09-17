<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    @yield('head')
</head>

<body class="font-manrope">
    @include('components.navbar')

    <div class="bg-right-top bg-no-repeat" style="background-image: url('{{url('/')}}/images/batik2.png')">
        @yield('content')
    </div>

    <div class="w-full bg-[#195770]">
        <div class="flex flex-col md:flex-row max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto py-16">
            <div class="flex flex-col items-start">
                <div class="flex flex-col md:flex-row md:justify-center md:items-center">
                    <div class="md:border-r-2 border-white pr-0 mr-0 md:pr-5 md:mr-5">
                        <img src="{{url('/')}}/images/logo-light.png" alt="Logo Rumah Bumn" class="w-48">
                    </div>
                    <div class="ml-2 mt-3 md:ml-0 md:mt-0 font-bold text-md text-xl md:text-5xl text-white">Pekalongan</div>
                </div>
                <div class="mt-5 md:mt-10 text-md md:text-xl text-white pl-2">
                    <p>Jl. Merak No.2, Kandang Panjang, Kec. Pekalongan Utara<br>Kota Pekalongan, Jawa Tengah</p>
                </div>
            </div>
            <div class="mt-10 grow flex md:justify-end items-end">
                <a href="#" class="mx-2">
                    <img src="/images/icon-shopee.svg" class="w-10">
                </a>
                <a href="#" class="mx-2">
                    <img src="/images/icon-tokped.svg" class="w-10">
                </a>
                <a href="#" class="mx-2">
                    <img src="/images/icon-tiktok.svg" class="w-10">
                </a>
                <a href="#" class="mx-2">
                    <img src="/images/icon-ig.svg" class="w-10">
                </a>
            </div>
        </div>
        <div class="w-full h-14 bg-contain" style="background-image: url('{{url('/')}}/images/batik1.png')"></div>
    </div>

    @yield('script')
</body>
</html>
