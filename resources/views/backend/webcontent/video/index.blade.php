@extends('layouts.admin')
@section('title', 'Video Profil')
@section('content')

<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Video Profil</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li>Web Content</li>
                <li>Video Profil</li>
            </ul>
        </div>
    </div>

    @include('components.backend.alert')

    <div class="flex flex-col border rounded-md p-5 mt-5">
        <div class="grid grid-cols-1 md:grid-cols-3 md:gap-10">
            <form class="md:col-span-2 flex flex-col" action="{{route('webcontent.video.update')}}" method="post">
                @csrf
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Link Video Youtube <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input
                        id="input_link"
                        type="text"
                        name="video_link"
                        value="{{$data->video_link}}"
                        placeholder="https://www.youtube.com/watch?v=AbCdEfG"
                        class="input input-bordered w-full"
                        onchange="embedLink()"
                        required
                    />
                </label>
                <label class="form-control w-full mt-2">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Deskripsi <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <textarea name="video_desc" placeholder="Deskripsi" class="input input-bordered w-full h-24" required>{{$data->video_desc}}</textarea>
                </label>
                <button type="submit" class="btn bg-[#195770] text-white mt-5">Simpan</button>
            </form>
            <div class="w-full flex justify-center mt-5 md:mt-0">
                <iframe id="video_iframe" class="w-full aspect-video border border-gray-300" src="" title="Video Profile RB Pekalongan" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        embedLink();
    });

    function embedLink() {
        let link = document.querySelector("#input_link").value;
        
        if(link != ""){
            let fixEmbedLink = convertLink(link);
            document.querySelector("#video_iframe").setAttribute("src", fixEmbedLink);
        }
    };

    function convertLink(link){
        let template = 'https://www.youtube.com/embed/{link}?controls=0';
        let video_id = null;

        if(link.includes("youtu.be")){
            let filter1 = link.split("?")[0];
            let filter2 = filter1.split("youtu.be/")[1];
            video_id = filter2;
        }else{
            let filter1 = link.split("watch?v=")[1];
            let filter2 = filter1.split("&")[0];
            video_id = filter2;
        }

        return template.replace("{link}", video_id);
    }
</script>
@endsection