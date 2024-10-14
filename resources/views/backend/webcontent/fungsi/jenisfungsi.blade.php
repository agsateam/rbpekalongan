@extends('layouts.admin')
@section('title', 'Jenis Fungsi')
@section('content')

    <div class="flex flex-wrap gap-4">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-300" role="alert">
                <span class="font-medium">{{ session('success') }}
            </div>
        @endif
        @foreach ($fungsi as $f)
            @php
                // Dapatkan nama variabel dinamis sesuai dengan id fungsi
                $fungsiData = 'fungsi' . $f->id;
            @endphp

            @foreach ($$fungsiData as $df)
                <a href="{{ route('webcontent.fungsiedit') . '/' . $f->id }}"
                    class="flex flex-col items-center  bg-white border border-gray-200 rounded-lg shadow md:flex-row w-full hover:bg-gray-100">
                    <div class="p-2 flex flex-row gap-2">
                        @for ($i = 1; $i <= 5; $i++)
                            @php
                                $foto = 'foto' . $i;
                            @endphp
                            <img class="object-cover rounded-t-lg h-40 w-40 md:rounded-none md:rounded-s-lg"
                                src="{{ $df->$foto }}" alt="Foto fungsi {{ $f->id }}">
                        @endfor
                    </div>
                    <div class="flex flex-col justify-between leading-normal ml-8">
                        <h5 class="text-xl font-bold tracking-tight text-gray-900">
                            {{ $f->jenis_fungsi }}
                        </h5>

                    </div>
                </a>
            @endforeach
        @endforeach
    </div>

@endsection
