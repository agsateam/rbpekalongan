import Swiper from 'swiper/bundle';
import './bootstrap';
import 'flowbite';
import { initSwiper } from '../../public/javascript/swiper';

import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init({
    duration: 3000, // Durasi animasi dalam milidetik
    once: true,     // Animasi berjalan sekali saat pertama kali muncul
});



document.addEventListener('DOMContentLoaded',function(){
    // initSwiper();
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        slidesPerView: 1,
        loop: true,
        centeredSlides: true,
        grabCursor: true,
        effect: 'coverflow',
        coverflowEffect: {
            rotate: 15,
            stretch: 0,
            depth: 300,
            modifier: 1,
            slideShadows: true,
          },

          autoplay: {
            delay: 5000,
            disableOnInteraction: false,
          },
      
        // If we need pagination
        pagination: {
          el: '.swiper-pagination',
        },
      
        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      
        // And if we need scrollbar
        scrollbar: {
          el: '.swiper-scrollbar',
        },
      });
})



