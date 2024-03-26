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

    /* const ribbonSwiper = new Swiper('.menu-regnbue-banner-container', {
        direction: 'horizontal',
		slidesPerView: "auto",
		loop: false,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	}); */
}); 