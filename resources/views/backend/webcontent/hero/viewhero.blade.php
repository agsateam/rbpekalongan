@extends('layouts.admin')
@section('title', 'Hero')
@section('content')

    <div class="">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-300" role="alert">
                <span class="font-medium">{{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row justify-between">
            <h4 class="text-2xl md:text-3xl font-bold mb-5">Hero</h4>
            <div class="breadcrumbs text-sm">
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>Web Content</li>
                    <li>Hero</li>
                </ul>
            </div>
        </div>
        <div class="">


            @foreach ($hero as $h)
                <!-- Input jenis fungsi -->
                <input type="hidden" name="id" value="{{ $h->id }}">

                <div class="flex flex-wrap items-center justify-center w-full mb-4 gap-4">
                    @for ($i = 1; $i <= 6; $i++)
                        @php
                            $foto = 'foto' . $i;
                            $previewId = 'image-preview' . $i;
                            $dropzoneId = 'default-dropzone' . $i;
                            $inputId = 'dropzone-file' . $i;
                        @endphp

                        <label for="{{ $inputId }}"
                            class="flex flex-col items-center justify-center w-96 h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6 {{ $h->$foto ? 'hidden' : '' }}"
                                id="{{ $dropzoneId }}">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click</span>
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG</p>
                            </div>
                            <img id="{{ $previewId }}" src="{{ $h->$foto }}" alt="Preview"
                                class="{{ $h->$foto ? '' : 'hidden' }} w-full h-full object-cover rounded-lg" />
                            <input id="{{ $inputId }}" type="file" class="hidden" name="{{ $foto }}"
                                accept="image/png, image/jpeg" disabled />
                        </label>
                    @endfor
                </div>

                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Deskripsi</label>
                        <textarea id="modal-deskripsi" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan deskripsi fungsi" name="deskripsi" disabled>{{ $h->deskripsi }}</textarea>
                    </div>
                </div>

                <div class="flex justify-start mt-6 gap-2">
                    <a href="{{ route('webcontent.hero.edit', $h->id) }}"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Edit Hero
                    </a>




                </div>
            @endforeach
        </div>

    </div>

    <script>
        function previewImage(inputId, previewId, dropzoneId) {
            document.getElementById(inputId).addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const imagePreview = document.getElementById(previewId);
                        imagePreview.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                        document.getElementById(dropzoneId).classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        @for ($i = 1; $i <= 6; $i++)
            previewImage('dropzone-file{{ $i }}', 'image-preview{{ $i }}',
                'default-dropzone{{ $i }}');
        @endfor
    </script>

@endsection
