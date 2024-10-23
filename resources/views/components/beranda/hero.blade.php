<div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto flex justify-center">

    <div class="flex flex-col w-full md:gap-10 md:flex-row items-center justify-between mt-10">
        <div class="flex flex-col w-full px-5 lg:w-1/3 lg:px-0">
            <div class="w-full flex flex-col lg:justify-start">

                <img src="./images/logorumahbumn.png" alt="Logo Rumah Bumn">
                <h3 class="font-manrope text-center text-2xl font-bold md:text-5xl md:text-left">Kota Pekalongan</h3>
                <div class="w-full">
                    <p class="text-center mt-2 md:text-left">{{ $hero[0]->deskripsi }}</p>
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center w-4/5 lg:w-2/3">
            <!-- Slider main container -->
            <div class="swiper w-96 md:w-[600px] xl:w-[700px] h-full">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper mt-8">
                    <!-- Slides -->
                    @foreach ($hero as $h)
                        <div class="swiper-slide flex justify-center">
                            <img src="{{ $h->foto1 ?? 'https://i.ibb.co.com/fCLC6cN/image.png' }}" alt="fofo 1"
                                class="rounded-lg w-11/12 lg:h-96">
                        </div>

                        <div class="swiper-slide flex justify-center">
                            <img src="{{ $h->foto2 ?? 'https://i.ibb.co.com/LS0gGmz/image.png' }}" alt="fofo 2"
                                class="rounded-lg w-11/12 lg:h-96">
                        </div>

                        <div class="swiper-slide flex justify-center">
                            <img src="{{ $h->foto3 ?? 'https://i.ibb.co.com/z2VdqPt/image.png' }}" alt="fofo 2"
                                class="rounded-lg w-11/12 lg:h-96">
                        </div>

                        <div class="swiper-slide flex justify-center">
                            <img src="{{ $h->foto4 ?? 'https://i.ibb.co.com/fCLC6cN/image.png' }}" alt="fofo 1"
                                class="rounded-lg w-11/12 lg:h-96">
                        </div>

                        <div class="swiper-slide flex justify-center">
                            <img src="{{ $h->foto5 ?? 'https://i.ibb.co.com/LS0gGmz/image.png' }}" alt="fofo 2"
                                class="rounded-lg w-11/12 lg:h-96">
                        </div>

                        <div class="swiper-slide flex justify-center">
                            <img src="{{ $h->foto6 ?? 'https://i.ibb.co.com/z2VdqPt/image.png' }}" alt="fofo 2"
                                class="rounded-lg w-11/12 lg:h-96">
                        </div>
                    @endforeach


                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>


            </div>
        </div>

    </div>
</div>
