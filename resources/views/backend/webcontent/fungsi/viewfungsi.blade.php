@extends('layouts.admin')
@section('title', 'Pendaftaran Event')
@section('content')


    <div id="accordion-collapse" data-accordion="collapse">
        @foreach ($fungsi as $f)
            <h2 id="accordion-collapse-heading-{{ $f->id }}">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 hover:bg-gray-100 gap-3"
                    data-accordion-target="#accordion-collapse-body-{{ $f->id }}" aria-expanded="true"
                    aria-controls="accordion-collapse-body-{{ $f->id }}">
                    <span>{{ $f->jenis_fungsi }}</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-{{ $f->id }}" class="hidden"
                aria-labelledby="accordion-collapse-heading-{{ $f->id }}">


                @if ($f->id == 1)
                    @foreach ($fungsi1 as $f1)
                        <x-fungsi-form :fungsi="$f1->id" :deskripsi="$f1->deskripsi" />
                    @endforeach
                @elseif($f->id == 2)
                    @foreach ($fungsi2 as $f2)
                        <x-fungsi-form :fungsi="$f2->id" :deskripsi="$f2->deskripsi" />
                    @endforeach
                @elseif($f->id == 3)
                    @foreach ($fungsi3 as $f3)
                        <x-fungsi-form :fungsi="$f3->id" :deskripsi="$f3->deskripsi" />
                    @endforeach
                @elseif($f->id == 4)
                    @foreach ($fungsi4 as $f4)
                        <x-fungsi-form :fungsi="$f4->id" :deskripsi="$f4->deskripsi" />
                    @endforeach
                @elseif($f->id == 5)
                    @foreach ($fungsi5 as $f5)
                        <x-fungsi-form :fungsi="$f5->id" :deskripsi="$f5->deskripsi" />
                    @endforeach
                @endif

            </div>
        @endforeach
    </div>

@endsection
