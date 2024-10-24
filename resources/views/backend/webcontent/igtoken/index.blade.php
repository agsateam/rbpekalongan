@extends('layouts.admin')
@section('title', 'Instagram Token')

@section('content')
<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Instagram Token</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li>Web Content</li>
                <li>Instagram Token</li>
            </ul>
        </div>
    </div>

    @include('components.backend.alert')

    <div class="flex flex-col border rounded-md p-5 mt-5">
        <form class="md:col-span-2 flex flex-col" action="{{route('webcontent.igtoken.update')}}" method="post">
            @csrf
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text text-base font-semibold">Token <span class="text-red-600 font-bold">*</span></span>
                </div>
                <textarea
                    type="text"
                    name="token"
                    placeholder="Input Token..."
                    class="input input-bordered w-full h-20"
                    required
                >{{$data->instagram_token}}</textarea>
            </label>
            <button type="submit" class="btn bg-[#195770] text-white mt-5">Simpan</button>
        </form>

        <div class="mt-10 border-t pt-5 text-gray-600">
            <div class="flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-[#195770] size-5 hidden md:block">
                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 0 1-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 0 1-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 0 1-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584ZM12 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                </svg>
                <div class="ml-1 text-base">
                    <span class="md:hidden text-[#195770] font-bold">*</span>
                    Instagram token digunakan untuk mendapatkan konten-konten instagram yang akan ditampilkan di halaman awal website.
                </div>
            </div>
            <h1 class="mt-5 text-xl font-medium">Bagaimana mendapatkan instagram token?</h1>
            
            <table class="mt-2 mb-10">
                <tr class="align-top">
                    <td>1.</td>
                    <td>
                        <span>Akses link berikut : <a target="_blank" class="text-[#195770] font-bold" href="https://spotlightwp.com/access-token-generator/">Menuju Link</a></span>
                    </td>
                </tr>
                <tr class="align-top">
                    <td>2.</td>
                    <td>
                        <span>Scroll ke section "Generate your access token", kemudian pilih <i>personal account</i> atau <i>bussiness account</i> sesuai tipe akun instagram.</span>
                        <img src="{{url('/images/igtoken-step2.png')}}" class="md:w-1/2 my-1">
                    </td>
                </tr>
                <tr class="align-top">
                    <td>3.</td>
                    <td>
                        <span>Izinkan untuk akses ke akun instagram.</span>
                    </td>
                </tr>
                <tr class="align-top">
                    <td>4.</td>
                    <td>
                        <span>Jika sudah sesuai token akan tersedia, salin token dan masukkan ke input token diatas.</span>
                        <img src="{{url('/images/igtoken-step4.png')}}" class="md:w-1/2 my-1">
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection