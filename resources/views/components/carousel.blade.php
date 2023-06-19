<style>
  
.mov{
    display: none;
}


@media screen and (max-width: 1400px){

}
@media screen and (max-width: 900px){

}
@media screen and (max-width: 500px){
    .lar{
        display: none;
    }
    .mov{
        display: block;
    }

}
</style>
<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
       <a href="https://www.instagram.com/koolfrenzy/" target="new"><div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://i.postimg.cc/x8Fnqs61/banner-kf-1.jpg" class="lar absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">

            <img src="https://i.postimg.cc/G2dN82bm/carousel-responsive-1.jpg" class="mov absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div></a>
        <!-- Item 2 -->
        <a href="https://www.instagram.com/koolfrenzy/" target="new"><div class="hidden duration-700 ease-in-out" data-carousel-item>
              <img src="https://i.postimg.cc/Rh0vSrQY/banner-kf-2.jpg" class="lar absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">

            <img src="https://i.postimg.cc/vBhKWsmL/carousel-responsive-2.jpg" class="mov absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div></a>
        <!-- Item 3 -->
        <a href="https://www.instagram.com/koolfrenzy/" target="new"><div class="hidden duration-700 ease-in-out" data-carousel-item>
             <img src="https://i.postimg.cc/9XsxxVXD/banner-recortado.jpg" class="lar absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">

            <img src="https://i.postimg.cc/ZnqMHMBk/carousel-responsive-3.jpg" class="mov absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div></a>
        
        
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
        <i class="fa-solid fa-angle-left"></i>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
        <i class="fa-solid fa-chevron-right"></i>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
