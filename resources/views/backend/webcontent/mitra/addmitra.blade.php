@extends('layouts.admin')
@section('title', 'Mitra')
@section('content')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        <div class="flex flex-col md:flex-row justify-between">
            <h4 class="text-2xl md:text-3xl font-bold mb-5">Mitra</h4>
            <div class="breadcrumbs text-sm">
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>Web Content</li>
                    <li>Mitra</li>
                </ul>
            </div>
        </div>

        <div class="">
            <form class="p-4 md:p-5" action="{{ route('webcontent.mitra.save') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="flex items-center  w-full mb-4 gap-4">


                    {{-- Foto1 --}}
                    <label for="dropzone-file1"
                        class="flex flex-col items-center justify-center w-40 h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6 'hidden'" id="default-dropzone1">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                    class="font-semibold">Click</span>
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG</p>
                        </div>
                        <img id="image-preview1" src="" alt="Preview"
                            class="hidden w-full h-full object-cover rounded-lg" />
                        <input id="dropzone-file1" type="file" class="hidden" name="logo"
                            accept="image/png, image/jpeg" />
                    </label>


                </div>

                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="mb-5">
                        <label for="nama_mitra" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Mitra</label>
                        <input type="text" id="nama_mitra"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            name="nama_mitra" required />
                    </div>

                    <div class="mb-5">
                        <label for="nama_mitra"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link</label>
                        <input type="text" id="link"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            name="link" required />
                    </div>
                </div>

                <div class="flex justify-start mt-6 gap-2">
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Simpan
                    </button>

                    <a href="{{ route('webcontent.mitra') }}"
                        class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Kembali</a>
                </div>


            </form>
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

        previewImage('dropzone-file1', 'image-preview1', 'default-dropzone1');
    </script>

@endsection
