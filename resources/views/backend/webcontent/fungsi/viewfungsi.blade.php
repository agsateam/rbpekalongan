@extends('layouts.admin')
@section('title', 'Pendaftaran Event')
@section('content')

    <div class="flex flex-wrap gap-2 md:gap-4">

        <!-- Modal toggle -->
        @foreach ($fungsi as $f)
            <p class="hidden" id="{{ $f->id }}">{{ $f->id }}</p>
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" data-id="{{ $f->id }}"
                data-jenis-fungsi="{{ $f->jenis_fungsi }}" data-deskripsi="{{ $f->deskripsi }}"
                class="text-left flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:w-96 hover:bg-gray-100"
                type="button" onclick="openModal(this)">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $f->jenis_fungsi }}
                    </h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $f->deskripsi }}</p>
                </div>
            </button>
        @endforeach
    </div>

    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white" id="modal-title">
                        <!-- Judul modal akan diubah melalui JS -->
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form class="p-4 md:p-5" action="{{ route('webcontent.fungsiupdate') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Input jenis fungsi -->
                    <input type="hidden" id="modal-fungsi-id" name="fungsi_id">
                    <input type="hidden" id="modal-jenis-fungsi" name="jenis_fungsi">

                    <div class="flex items-center justify-center w-full mb-4 gap-4">
                        <!-- Dropzone input foto -->
                        {{-- Foto1 --}}
                        <label for="dropzone-file1"
                            class="flex flex-col items-center justify-center w-40 h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6" id="default-dropzone1">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG</p>
                            </div>
                            <img id="image-preview1" src="" alt="Preview"
                                class="hidden w-full h-full object-cover rounded-lg" />
                            <input id="dropzone-file1" type="file" class="hidden" name="foto1"
                                accept="image/png, image/jpeg" />
                        </label>

                        {{-- Foto2 --}}
                        <label for="dropzone-file2"
                            class="flex flex-col items-center justify-center w-40 h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6" id="default-dropzone2">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG</p>
                            </div>
                            <img id="image-preview2" src="" alt="Preview"
                                class="hidden w-full h-full object-cover rounded-lg" />
                            <input id="dropzone-file2" type="file" class="hidden" name="foto2"
                                accept="image/png, image/jpeg" />
                        </label>

                        {{-- Foto 3 --}}
                        <label for="dropzone-file3"
                            class="flex flex-col items-center justify-center w-40 h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6" id="default-dropzone3">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG</p>
                            </div>
                            <img id="image-preview3" src="" alt="Preview"
                                class="hidden w-full h-full object-cover rounded-lg" />
                            <input id="dropzone-file3" type="file" class="hidden" name="foto3"
                                accept="image/png, image/jpeg" />
                        </label>

                        {{-- Foto4 --}}
                        <label for="dropzone-file4"
                            class="flex flex-col items-center justify-center w-40 h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6" id="default-dropzone4">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG</p>
                            </div>
                            <img id="image-preview4" src="" alt="Preview"
                                class="hidden w-full h-full object-cover rounded-lg" />
                            <input id="dropzone-file4" type="file" class="hidden" name="foto4"
                                accept="image/png, image/jpeg" />
                        </label>

                        {{-- Foto5 --}}
                        <label for="dropzone-file5"
                            class="flex flex-col items-center justify-center w-40 h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6" id="default-dropzone5">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG</p>
                            </div>
                            <img id="image-preview5" src="" alt="Preview"
                                class="hidden w-full h-full object-cover rounded-lg" />
                            <input id="dropzone-file5" type="file" class="hidden" name="foto5"
                                accept="image/png, image/jpeg" />
                        </label>
                    </div>

                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Deskripsi</label>
                            <textarea id="modal-deskripsi" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan deskripsi fungsi" name="deskripsi"></textarea>
                        </div>
                    </div>

                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Update Fungsi
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal(button) {
            const fungsiId = button.getAttribute('data-id');
            const jenisFungsi = button.getAttribute('data-jenis-fungsi');
            const deskripsi = button.getAttribute('data-deskripsi');

            // Set judul modal
            document.getElementById('modal-title').textContent = jenisFungsi + " (ID: " + fungsiId + ")";

            // Set input hidden dengan id dan jenis fungsi
            document.getElementById('modal-fungsi-id').value = fungsiId;
            document.getElementById('modal-jenis-fungsi').value = jenisFungsi;

            // Set textarea deskripsi
            document.getElementById('modal-deskripsi').value = deskripsi;
        }

        // Event listener untuk gambar
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
        previewImage('dropzone-file2', 'image-preview2', 'default-dropzone2');
        previewImage('dropzone-file3', 'image-preview3', 'default-dropzone3');
        previewImage('dropzone-file4', 'image-preview4', 'default-dropzone4');
        previewImage('dropzone-file5', 'image-preview5', 'default-dropzone5');
    </script>

@endsection
