<div class="bg-gray-100 mt-16 pt-16 pb-24">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <h4 class="text-xl md:text-4xl font-bold mb-5">Produk UMKM Binaan</h4>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            @foreach ($products as $data)
            <a target="_blank" href="{{ route('product.detail') ."/". $data->id }}" class="w-full flex flex-col p-2 bg-white pb-5">
                <img src="{{ $data->photo ?? url('images/noimage.jpg') }}" class="w-full">

                <span class="mt-3 text-base md:text-xl font-bold text-[#195770]">{{ $data->name }}</span>
                <span class="mt-1 text-base text-gray-500">Rp {{ number_format($data->price) }}</span>
                <span class="mt-1 text-sm text-gray-600 font-semibold">{{ $data->umkm->name }}</span>
            </a>
            @endforeach
        </div>
        <div class="flex justify-center">
            <a href="{{route('product')}}" class="btn bg-[#195770] text-white md:text-base mt-10">Produk Lainnya</a>
        </div>
    </div>
</div>