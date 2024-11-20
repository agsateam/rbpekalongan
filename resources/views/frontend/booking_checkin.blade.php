<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check-In Booking | RB Pekalongan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{url('images/icon.png')}}">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>

<body class="font-manrope">
    <div class="bg-white z-40 sticky top-0">
        <div class="header max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto flex flex-wrap items-center py-3 gap-2">
    
            <img src="{{ url('/') }}/images/logobumn.png" alt="Logo Bumn" class="h-4 md:h-8">
            <img src="{{ url('/') }}/images/logorumahbumn.png" alt="Logo Rumah Bumn"
                class="h-6 md:h-12 border-r-2 border-black">
    
            <div class="font-bold text-sm mt-2 md:text-xl">Pekalongan</div>

        </div>
    </div>
    
    
    <nav class="bg-[#195770] z-50 bg-contain sticky top-12 md:top-16"
        style="background-image: url('{{ url('/') }}/images/batik1.png')">
        <div class="max-w-screen-xl flex flex-wrap justify-end mx-auto">
            <a href="{{route('home')}}" class="bg-[#195770] px-5 flex h-14 items-center text-white font-semibold">Kembali ke Beranda</a>
        </div>
    </nav>

    <div class="bg-right-top bg-no-repeat" style="background-image: url('{{url('/')}}/images/batik2.png')">
        <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto py-40">
            <div class="w-full flex justify-center">
                <form class="md:w-1/2 flex flex-col" action="{{ route('booking.checkin.update') }}" method="post">
                    @csrf
                    <h4 class="flex items-center justify-center text-3xl md:text-4xl font-bold mb-10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                        </svg>
                        Check-In Booking
                    </h4>
                    @include('components.backend.alert')
                    <label class="form-control w-full">
                        <div class="flex h-12">
                            <span class="inline-flex items-center px-5 text-gray-600 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md font-semibold text-xl">BC</span>
                            <input type="number" inputmode="numeric" name="code" placeholder="Kode..." class="rounded-none rounded-e-lg border block flex-1 min-w-0 w-full text-xl border-gray-300 pl-3 focus:ring-0 focus:border-gray-300" required>
                        </div>
                        @error('code')
                        <div class="text-red-500 ml-1 text-sm mt-1 mb-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </label>
                    <button type="submit" class="btn bg-[#195770] hover:bg-[#1ba0db] text-white mt-5 w-full">Check-In</button>
                </form>
            </div>
        </div>
    </div>

    {{-- footer --}}
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
</body>
</html>