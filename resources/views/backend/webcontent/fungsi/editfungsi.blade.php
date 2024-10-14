@extends('layouts.admin')
@section('title', 'Edit Fungsi')
@section('content')

    @foreach ($fungsi as $f)
        <div class="">
            <form class="p-4 md:p-5" action="{{ route('webcontent.fungsiupdate') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <!-- Input jenis fungsi -->
                <input type="hidden" name="fungsi_id" value="{{ $f->fungsi_id }}">


                <div class="flex items-center justify-center w-full mb-4 gap-4">


                    {{-- Foto1 --}}
                    <label for="dropzone-file1"
                        class="flex flex-col items-center justify-center w-40 h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6 {{ $f->foto1 ? 'hidden' : '' }}"
                            id="default-dropzone1">
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
                        <img id="image-preview1" src="{{ $f->foto1 }}" alt="Preview"
                            class="{{ $f->foto1 ? '' : 'hidden' }} w-full h-full object-cover rounded-lg" />
                        <input id="dropzone-file1" type="file" class="hidden" name="foto1"
                            accept="image/png, image/jpeg" />
                    </label>

                    {{-- Foto2 --}}
                    <label for="dropzone-file2"
                        class="flex flex-col items-center justify-center w-40 h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6 {{ $f->foto2 ? 'hidden' : '' }}"
                            id="default-dropzone2">
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
                        <img id="image-preview2" src="{{ $f->foto2 }}" alt="Preview"
                            class="{{ $f->foto2 ? '' : 'hidden' }} w-full h-full object-cover rounded-lg" />
                        <input id="dropzone-file2" type="file" class="hidden" name="foto2"
                            accept="image/png, image/jpeg" />
                    </label>

                    {{-- Foto3 --}}
                    <label for="dropzone-file3"
                        class="flex flex-col items-center justify-center w-40 h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6 {{ $f->foto3 ? 'hidden' : '' }}"
                            id="default-dropzone3">
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
                        <img id="image-preview3" src="{{ $f->foto3 }}" alt="Preview"
                            class="{{ $f->foto3 ? '' : 'hidden' }} w-full h-full object-cover rounded-lg" />
                        <input id="dropzone-file3" type="file" class="hidden" name="foto3"
                            accept="image/png, image/jpeg" />
                    </label>

                    {{-- Foto4 --}}
                    <label for="dropzone-file4"
                        class="flex flex-col items-center justify-center w-40 h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6 {{ $f->foto4 ? 'hidden' : '' }}"
                            id="default-dropzone4">
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
                        <img id="image-preview4" src="{{ $f->foto4 }}" alt="Preview"
                            class="{{ $f->foto4 ? '' : 'hidden' }} w-full h-full object-cover rounded-lg" />
                        <input id="dropzone-file4" type="file" class="hidden" name="foto4"
                            accept="image/png, image/jpeg" />
                    </label>

                    {{-- Foto5 --}}
                    <label for="dropzone-file5"
                        class="flex flex-col items-center justify-center w-40 h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6 {{ $f->foto5 ? 'hidden' : '' }}"
                            id="default-dropzone5">
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
                        <img id="image-preview5" src="{{ $f->foto5 }}" alt="Preview"
                            class="{{ $f->foto5 ? '' : 'hidden' }} w-full h-full object-cover rounded-lg" />
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
                            placeholder="Masukkan deskripsi fungsi" name="deskripsi">{{ $f->deskripsi }}</textarea>
                    </div>
                </div>

                <div class="flex justify-start mt-6 gap-2">
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Update Fungsi
                    </button>

                    <a href="{{ route('webcontent.fungsi') }}"
                        class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Kembali</a>
                </div>


            </form>
        </div>
    @endforeach

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
        previewImage('dropzone-file2', 'image-preview2', 'default-dropzone2');
        previewImage('dropzone-file3', 'image-preview3', 'default-dropzone3');
        previewImage('dropzone-file4', 'image-preview4', 'default-dropzone4');
        previewImage('dropzone-file5', 'image-preview5', 'default-dropzone5');
    </script>

@endsection
