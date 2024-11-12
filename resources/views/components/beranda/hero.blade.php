<div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto flex justify-center">

    <div class="flex flex-col w-full md:gap-10 md:flex-row items-center justify-between mt-10" data-aos="fade-up">
        <div
            class="flex flex-col w-full px-5 lg:w-1/3 lg:px-0 animate-fade-up animate-once animate-duration-[400ms] animate-delay-300 animate-ease-in">
            <div class="w-full flex flex-col lg:justify-start">

                <img src="./images/rbpekalongan.png" alt="Logo Rumah Bumn">
                <div class="w-full">
                    <p class="text-justify mt-2">{{ $hero[0]->deskripsi }}</p>
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
