@extends('layouts.admin')
@section('title', 'Informasi Pengguna')
@section('content')
<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Informasi Pengguna</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li><a href="{{route('admin')}}">Pengguna</a></li>
                <li>Info</li>
            </ul>
        </div>
    </div>
    
    <div class="flex justify-end mt-5">
        <a href="{{route('admin')}}" class="btn btn-sm bg-gray-500 text-white">Kembali</a>
    </div>

    <div class="mt-5 mb-5">
        @include('components.backend.alert')
    </div>

    <div class="flex flex-col border rounded-md p-5 mt-5">
        <form class="flex flex-col" action="{{route('admin.profile.update')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <label class="form-control w-full">
                <div class="label"><span class="label-text text-base font-semibold">Nama</span></div>
                <input type="text" id="input" name="name" placeholder="Nama" class="w-full focus:ring-0 border-none pl-1" value="{{$data->name}}" required disabled/>
            </label>
            <label class="form-control w-full">
                <div class="label"><span class="label-text text-base font-semibold">Email</span></div>
                <input type="text" id="input" name="email" placeholder="Email" class="w-full focus:ring-0 border-none pl-1" value="{{$data->email}}" required disabled/>
            </label>
            <label class="form-control w-full">
                <div class="label"><span class="label-text text-base font-semibold">Telepon/WA</span></div>
                <input type="number" inputmode="numeric" id="input" name="phone" placeholder="628..." class="w-full focus:ring-0 border-none pl-1" value="{{$data->phone}}" required disabled/>
            </label>
            <div class="hidden flex-col md:flex-row justify-between gap-3" id="buttonSubmit">
                <button type="submit" class="submit btn bg-[#195770] hover:bg-[#195770] mt-5 text-white md:w-2/3" disabled>Simpan</button>
                <button type="button" onclick="edit(false)" class="btn bg-gray-500 hover:bg-gray-500 md:mt-5 text-white md:w-1/3">Batal</button>
            </div>
        </form>

        <div class="flex flex-col mt-10">
            <span id="edit" onclick="edit(true)" class="w-fit text-[#195770] font-semibold hover:underline ml-1 cursor-pointer">Ubah Data</span>
            <span onclick="resetPw('{{ route('admin.password.reset') . '/' . $data->id }}')" class="w-fit text-red-800 font-semibold hover:underline ml-1 mt-2 cursor-pointer">Reset Password</a>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function resetPw(href){
        Swal.fire({
            title: 'Reset Password',
            text: 'Setelah direset, password baru adalah "password123"',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: "#195770",
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya',
        }).then((val) => {
            val['isConfirmed'] && (window.location.href = href)
        })
    }

    function edit(edit){
        document.querySelector(".submit").disabled = !edit;
        let toggleEdit = document.getElementById("edit");
        edit ? toggleEdit.classList.add('hidden') : toggleEdit.classList.remove('hidden');
        document.getElementById("buttonSubmit").classList.remove(edit ? 'hidden' : 'flex');
        document.getElementById("buttonSubmit").classList.add(edit ? 'flex' : 'hidden');

        let input = document.querySelectorAll("#input");
        input.forEach(element => {
            element.disabled = !edit;
            if(edit){
                element.classList.remove("pl-1");
                element.classList.remove("border-none");
                element.classList.add("pl-3");
                element.classList.add("rounded-md");
                element.classList.add("border-gray-300");
            }else{
                element.classList.add("pl-1");
                element.classList.add("border-none");
                element.classList.remove("pl-3");
                element.classList.remove("rounded-md");
                element.classList.remove("border-gray-300");
            }
        });
    }
</script>
@endsection