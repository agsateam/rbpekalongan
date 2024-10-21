@extends('layouts.master')
@section('title', 'Booking')

@section('head')
<script src="https://unpkg.com/js-image-zoom@0.7.0/js-image-zoom.js" type="application/javascript"></script>
@endsection

@section('content')
<div class="py-16">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <div class="flex justify-center items-center mb-5">
            <h4 class="text-2xl md:text-5xl font-bold">Booking Ruangan</h4>
        </div>

        <div class="flex justify-center md:pt-5">
            <div class="md:w-3/4" id="denah">
                <img src="{{url('images/denah.jpg')}}"/>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var options = {
        "offset": {
            "vertical":0,
            "horizontal":0
        },
        "zoomPosition": "original"
    };
    new ImageZoom(document.getElementById("denah"), options);
</script>
@endsection