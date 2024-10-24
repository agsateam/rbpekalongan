@php
use App\Models\WebContent;
$data = WebContent::select(["video_link", "video_desc"])->first();

function convertLink($link){
    $template = 'https://www.youtube.com/embed/{link}?controls=0';
    $video_id = null;

    if(str_contains($link, "youtu.be")){
        $filter1 = explode("?", $link)[0];
        $filter2 = explode("youtu.be/", $link)[1];
        $video_id = $filter2;
    }else{
        $filter1 = explode("watch?v=", $link)[1];
        $filter2 = explode("&", $link)[0];
        $video_id = $filter2;
    }

    return str_replace("{link}", $video_id, $template);
}
@endphp


<div class="py-16">
    <div class="bg-[#195770] flex flex-col lg:flex-row max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto rounded-lg">
        <iframe class="w-full aspect-video rounded-tl-md rounded-bl-md border border-[#195770]"
            src="{{convertLink($data->video_link)}}" title="Video Profile RB Pekalongan" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <div class="lg:w-2/5 text-white p-3 md:p-6 text-left">
            <p>{{$data->video_desc}}</p>
        </div>
    </div>
</div>
