@extends('layouts.admin')
@section('title', 'Link Sosial Media')

@section('content')
    <div class="md:px-5">


        <div class="flex flex-col md:flex-row justify-between">
            <h4 class="text-2xl md:text-3xl font-bold mb-5">Link Sosial Media</h4>
            <div class="breadcrumbs text-sm">
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>Web Content</li>
                    <li>Link Sosial Media</li>
                </ul>
            </div>
        </div>

        @include('components.backend.alert')



        <div class="flex flex-col border rounded-md p-5 mt-5">
            @foreach ($link as $l)
                <form class="md:col-span-2 flex flex-col" action="{{ route('webcontent.link.update') . '/' . $l->id }}"
                    method="post">
                    @csrf
                    @method('PUT')
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-base font-semibold">Link Akun Shoppe <span
                                    class="text-red-600 font-bold">*</span></span>
                        </div>
                        <textarea type="text" name="shoppe" placeholder="Masukkan Link..." class="input input-bordered w-full h-20"
                            required>{{ $l->shoppe }}</textarea>
                    </label>

                    <label class="form-control w-full mt-5">
                        <div class="label">
                            <span class="label-text text-base font-semibold">Link Akun Tokopedia<span
                                    class="text-red-600 font-bold">*</span></span>
                        </div>
                        <textarea type="text" name="tokopedia" placeholder="Masukkan Link..." class="input input-bordered w-full h-20"
                            required>{{ $l->tokopedia }}</textarea>
                    </label>

                    <label class="form-control w-full mt-5">
                        <div class="label">
                            <span class="label-text text-base font-semibold">Link Akun TikTok<span
                                    class="text-red-600 font-bold">*</span></span>
                        </div>
                        <textarea type="text" name="tiktok" placeholder="Masukkan Link..." class="input input-bordered w-full h-20"
                            required>{{ $l->tiktok }}</textarea>
                    </label>

                    <label class="form-control w-full mt-5">
                        <div class="label">
                            <span class="label-text text-base font-semibold">Link Akun Instagram<span
                                    class="text-red-600 font-bold">*</span></span>
                        </div>
                        <textarea type="text" name="instagram" placeholder="Masukkan Link..." class="input input-bordered w-full h-20"
                            required>{{ $l->instagram }}</textarea>
                    </label>


                    <button type="submit" class="btn bg-[#195770] text-white mt-5">Simpan</button>

                </form>
            @endforeach


        </div>
    </div>
@endsection
