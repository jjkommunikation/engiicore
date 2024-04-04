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

    const swiperWrapper = document.querySelector('.menu-engiicore-feature-slider-menu-container');
    const lastSwiperSlide = document.querySelector('.menu-engiicore-feature-slider-menu-container .swiper-slide:last-child');
    const engiicoreFeatureSlider = new Swiper('.menu-engiicore-feature-slider-menu-container', {
		slidesPerView: 4,
        spaceBetween: 20,
        loop: false,
        watchOverflow: true,
        enabled: true,
        visibilityFullFit: true,
        autoResize: true,
        centeredSlies: true,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		breakpoints: {
            320: {
                slidesPerView: 'auto',
                spaceBetween: 10,
                slideToClickedSlide: true,
                effect: 'coverflow',
                modifier: 1,
                slideShadows: true,
                roundLengths: true,
                autoResize: true,
            },
            768: {
                slidesPerView: 2,
            },
			1024: {
				slidesPerView: 2,
			},
            1200: {
                slidesPerView: 'auto',
                spaceBetween:60,
                slideToClickedSlide: true,
            },
            1400: {
                slidesPerView: 3,
                spaceBetween: 20,
            }
		},
        on: {
            // when swiper instance changes slide
            slideChange: function(event) {
                console.log('slide change')
    
                const slides = this.slides;
                const currentSlide = slides[this.realIndex];

                // if first index
                if ( this.realIndex === 0 ) {
                    currentSlide.classList.add('active');
                    slides[this.realIndex + 1].classList.add('active');
                    slides[this.realIndex + 4].classList.remove('active');
                } else {
                    slides.forEach(slide => slide.classList.remove('active'))
                    
                    for ( i = 0; i < 4; i++ ) {
                        if (slides[this.realIndex + i]) {
                            slides[this.realIndex + i].classList.add('active');
                        }
                    }
                }
            },

            // when swiper instance is initiated
            init: function() {
                const slides = this.slides;
                const currentSlide = slides[this.realIndex];

                slides.forEach(slide => slide.classList.remove('active'));

                for ( i = 0; i < 4; i++ ) {
                    if (slides[this.realIndex + i]) {
                        slides[this.realIndex + i].classList.add('active');
                    }
                }
            },

            // when swiper reaches the end of the slide
            toEdge: function(event) {
                this.slides[this.realIndex].classList.remove('active');
            }
        }
        
	});

    engiicoreFeatureSlider.snapGrid[swiper.snapGrid.length - 1] = engiicoreFeatureSlider.slidesGrid[swiper.slidesGrid.length - 1];
}); 