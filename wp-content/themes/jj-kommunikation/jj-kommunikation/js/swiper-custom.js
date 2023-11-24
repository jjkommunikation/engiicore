jQuery(document).ready(function(){
    var swiper = new Swiper(".boxSwiper", {
        slidesPerView: "auto",
        spaceBetween: 0,


    // Responsive breakpoints   
    breakpoints: {  

        // when window width is <= 640px     
        640: {       
            slidesPerView: 3,  
            spaceBetween: 30,     
        } 

    }  



    });
    }); 