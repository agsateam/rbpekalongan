@extends('layouts.admin')
@section('title', 'Fungsi Rumah BUMN')
@section('content')

    <div class="flex flex-wrap gap-4">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-300" role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="flex flex-col md:flex-row justify-between w-full">
            <h4 class="text-2xl md:text-3xl font-bold mb-5">Fungsi</h4>
            <div class="breadcrumbs text-sm">
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>Web Content</li>
                    <li>Fungsi</li>
                </ul>
            </div>
        </div>

        @foreach ($fungsirb as $f)
            <a href="{{ route('webcontent.fungsiedit', $f->id) }}"
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row w-full hover:bg-gray-100">
                <div class="p-2 flex flex-row gap-2">
                    @foreach (range(1, 5) as $i)
                        @php $foto = 'foto'.$i; @endphp
                        @if ($f->$foto)
                            <img class="object-cover rounded-t-lg h-40 w-40 md:rounded-none md:rounded-s-lg xl"
                                src="{{ $f->$foto }}" alt="Foto fungsi {{ $i }}">
                        @else
                            <p class="text-center">Belum Ada Foto</p>
                        @endif
                    @endforeach
                </div>
                <div class="flex flex-col justify-between leading-normal ml-8">
                    <h5 class="text-xl font-bold tracking-tight text-gray-900">
                        {{ $f->nama_fungsi }}
                    </h5>
                </div>
            </a>
        @endforeach
    </div>

@endsection
