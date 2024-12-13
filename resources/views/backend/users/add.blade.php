@extends('layouts.admin')
@section('title', 'Tambah Data Admin')
@section('content')
<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Tambah Data Admin</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li>Pengguna</li>
                <li>Tambah</li>
            </ul>
        </div>
    </div>
    
    <div class="flex justify-end mt-5">
        <a href="{{route('admin')}}" class="btn btn-sm bg-gray-500 text-white">Kembali</a>
    </div>

    <div class="flex flex-col border rounded-md p-5 mt-5">
        <form class="flex flex-col" action="{{route('admin.save')}}" method="post">
            @csrf
            <label class="form-control w-full">
                <div class="label"><span class="label-text text-base font-semibold">Nama</span></div>
                <input type="text" name="name" value="{{old('name')}}" placeholder="Nama" class="input input-rounded border border-gray-300" required/>
                @error('name')
                <span class="text-sm ml-1 mt-1 text-red-600">{{$message}}</span>
                @enderror
            </label>
            <label class="form-control w-full">
                <div class="label"><span class="label-text text-base font-semibold">Email</span></div>
                <input type="text" name="email" value="{{old('email')}}" placeholder="Email" class="input input-rounded border border-gray-300" required/>
                @error('email')
                <span class="text-sm ml-1 mt-1 text-red-600">{{$message}}</span>
                @enderror    
            </label>
            <label class="form-control w-full">
                <div class="label"><span class="label-text text-base font-semibold">Telepon/WA</span></div>
                <input type="number" inputmode="numeric" name="phone" value="{{old('phone')}}" placeholder="628..." class="input input-rounded border border-gray-300" required/>
                @error('phone')
                <span class="text-sm ml-1 mt-1 text-red-600">{{$message}}</span>
                @enderror    
            </label>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 mt-2">
                <label class="form-control w-full">
                    <div class="label"><span class="label-text text-base font-semibold">Password</span></div>
                    <input id="password" type="password" name="password" placeholder="Password" class="input input-rounded border border-gray-300" required/>
                    <span id="confirmpw1" class="hidden text-sm ml-1 mt-1 text-red-600">Password tidak cocok!</span>
                </label>
                <label class="form-control w-full">
                    <div class="label"><span class="label-text text-base font-semibold">Ulangi Password</span></div>
                    <input id="password" type="password" name="confirmpassword" placeholder="Ulangi Password" class="input input-rounded border border-gray-300" required/>
                    <span id="confirmpw2" class="hidden text-sm ml-1 mt-1 text-red-600">Password tidak cocok!</span>
                </label>
            </div>
            <div class="flex justify-between gap-1 md:gap-3">
                <button type="submit" id="buttonSubmit" class="btn bg-[#195770] hover:bg-[#195770] mt-10 text-white grow">Simpan</button>
                <button type="button" class="btn bg-[#195770] hover:bg-[#195770] mt-10 text-white w-fit" id="toggleEye" onclick="showPassword()"></button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    let passwordShowed = false;
    let toggle = document.querySelector("#toggleEye");
    let passwords = document.querySelectorAll("#password");
    let eye = `<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='size-6'>
                <path stroke-linecap='round' stroke-linejoin='round' d='M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z' />
                <path stroke-linecap='round' stroke-linejoin='round' d='M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z' />
            </svg>`;
    let eyeSlash = `<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='size-6'>
                    <path stroke-linecap='round' stroke-linejoin='round' d='M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88' />
                </svg>`;

    document.addEventListener("DOMContentLoaded", function(event) {
        toggle.innerHTML = eye;
    });

    function showPassword(){
        if(passwordShowed){
            toggle.innerHTML = eye;
            passwordShowed = false;
            passwords.forEach(element => {
                element.type = "password";
            });
        }else{
            toggle.innerHTML = eyeSlash;
            passwordShowed = true;
            passwords.forEach(element => {
                element.type = "text";
            });
        }
    }
    
    const repeatPass = passwords[1];
    repeatPass.addEventListener('input', (event) => {
        newPass1 = passwords[0];
        newPass2 = repeatPass;
        
        if(newPass1.value == newPass2.value){
            document.getElementById('confirmpw1').classList.remove("block");
            document.getElementById('confirmpw2').classList.remove("block");
            document.getElementById('confirmpw1').classList.add("hidden");
            document.getElementById('confirmpw2').classList.add("hidden");
            document.getElementById('buttonSubmit').disabled = false;
        }else{
            document.getElementById('confirmpw1').classList.remove("hidden");
            document.getElementById('confirmpw2').classList.remove("hidden");
            document.getElementById('confirmpw1').classList.add("block");
            document.getElementById('confirmpw2').classList.add("block");
            document.getElementById('buttonSubmit').disabled = true;
        }
    })
</script>
@endsection