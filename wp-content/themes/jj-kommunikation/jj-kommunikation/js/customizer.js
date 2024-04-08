jQuery(document).ready(function(){
/*
		jQuery("li.menu-item-has-children").prepend("<button class='toggle_submenu'>+</button>");
  jQuery("button.toggle_submenu").click(function(){
	  jQuery(this).siblings("ul.sub-menu").toggle(200,"linear");
	  jQuery(this).text(jQuery(this).text() == '+' ? '-' : '+');
	});*/

	//if (window.matchMedia('(max-width: 768px)').matches) {
		jQuery("<div/>", { "id": "mobile-jj" }).prependTo('#mega-menu-menu-1'); 
		jQuery("<div/>", { "id": "mobile-header" }).appendTo('#mobile-jj'); 
		jQuery("li.astm-search-menu.is-menu.popup.is-first.menu-item").clone().prependTo(".mega-toggle-blocks-right");


		jQuery(".mega-toggle-blocks-right").clone().prependTo("#mobile-header");
		jQuery(".site-branding").clone().prependTo("#mobile-header");
		jQuery("#secondary-menu").clone().appendTo("#mobile-jj");
		jQuery("#mobile-header .site-branding img.custom-logo").attr("src", "/wp-content/uploads/EngiiCore-Logo.svg");


	//}

	
	jQuery(function() {
		function adjustHeader() {
			if (jQuery(window).scrollTop() > 150) {
				jQuery('#masthead').addClass("fade-in");
			} else {
				jQuery('#masthead').removeClass("fade-in");
			}
		}
	
		// Run on page load
		adjustHeader();
	
		// Run on scroll
		jQuery(window).scroll(adjustHeader);
	});
	

}); 

const menuItems = Array.from(document.querySelectorAll("#ribbon-section ul.menu li a"));
const currentUrl = window.location.href;

const nextButton = document.createElement("a");
nextButton.id = "next-button";
nextButton.classList.add("engiicore-animate-slide-right-three");
nextButton.classList.add('animating');

const prevButton = document.createElement("a");
prevButton.id = "prev-button";
prevButton.classList.add("engiicore-animate-slide-left-three");
prevButton.classList.add('animating');

const ribbonSection = document.querySelector("#ribbon-section");



ribbonSection.appendChild(prevButton);
ribbonSection.appendChild(nextButton);



function updateButtonsText() {


 menuItems.forEach(function(menuItem, index) {
	//console.log(menuItem.attributes[0]);

	if (currentUrl.includes(menuItem.attributes[0].nodeValue)) {
		const lastItem = menuItems.length - 1;
	//console.log(menuItems);
		if (index === lastItem) {
			let strNext = menuItems[0].children[2].attributes[1].nodeValue;
			let color = strNext.match(/#([0-9a-fA-F]{3,6})/)[0];
			/* nextButton.innerHTML = `<svg width="97" height="182" viewBox="0 0 97 182" fill="none" xmlns="http://www.w3.org/2000/svg">
			<g id="Nextbutton - Planl&#195;&#166;gning">
			<path id="Vector" d="M103.942 7.94709e-06C157.18 1.25779e-05 188 13.1843 188 80.5856L188 101.414C188 168.816 157.18 182 103.942 182L84.0583 182C30.8203 182 1.64172e-05 168.816 2.23394e-05 101.414L2.41695e-05 80.5856C3.00916e-05 13.1842 30.8203 1.58673e-06 84.0584 6.21757e-06L103.942 7.94709e-06Z" fill="${color}"/>
			</g>
			<defs>
			<linearGradient id="paint0_linear_701_926" x1="-81.051" y1="-10.6611" x2="183.67" y2="144.537" gradientUnits="userSpaceOnUse">
			<stop stop-color="#E2BC5D"/>
			<stop offset="1" stop-color="#E2BC5D"/>
			</linearGradient>
			</defs>
			</svg><span class='feature-nav next'>Næste feature
			<svg width="27" height="15" viewBox="0 0 27 15" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path id="Vector 26" d="M0.937988 2.62136C6.77132 -0.211977 19.538 -1.97864 23.938 13.6214M23.938 13.6214L18.938 12.6211M23.938 13.6214L25.938 9.12109" stroke="white"/>
			</svg>
			</span> <img src='${menuItems[0].firstElementChild.attributes[0].nodeValue}'><span class='feature-name'>Næste</span>`; */
			console.log(menuItems[0].firstChild.data)
			nextButton.innerHTML = `
			<span class='feature feature-next engiicore-animate-slide-right-three' style='background-color: ${color}'><img src='${menuItems[0].firstElementChild.attributes[0].nodeValue}'><span class='feature-name'>Næste</span></span>`;
			nextButton.setAttribute("href", menuItems[0]);
		} else {
			//nextButton.setAttribute("style", menuItems[index + 1].children[2].attributes[1].nodeValue);
			let strNext = menuItems[index + 1].children[2].attributes[1].nodeValue;
			let color = strNext.match(/#([0-9a-fA-F]{3,6})/)[0];
			/* nextButton.innerHTML = `<svg width="97" height="182" viewBox="0 0 97 182" fill="none" xmlns="http://www.w3.org/2000/svg">
			<g id="Nextbutton - Planl&#195;&#166;gning">
			<path id="Vector" d="M103.942 7.94709e-06C157.18 1.25779e-05 188 13.1843 188 80.5856L188 101.414C188 168.816 157.18 182 103.942 182L84.0583 182C30.8203 182 1.64172e-05 168.816 2.23394e-05 101.414L2.41695e-05 80.5856C3.00916e-05 13.1842 30.8203 1.58673e-06 84.0584 6.21757e-06L103.942 7.94709e-06Z" fill="${color}"/>
			</g>
			<defs>
			<linearGradient id="paint0_linear_701_926" x1="-81.051" y1="-10.6611" x2="183.67" y2="144.537" gradientUnits="userSpaceOnUse">
			<stop stop-color="#E2BC5D"/>
			<stop offset="1" stop-color="#E2BC5D"/>
			</linearGradient>
			</defs>
			</svg><span class='feature-nav next'>Næste feature
			<svg width="150" height="15" viewBox="0 0 27 15" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path id="Vector 26" d="M0.937988 2.62136C6.77132 -0.211977 19.538 -1.97864 23.938 13.6214M23.938 13.6214L18.938 12.6211M23.938 13.6214L25.938 9.12109" stroke="white"/>
			</svg>
			</span> <img src='${menuItems[index + 1].firstElementChild.attributes[0].nodeValue}'><span class='feature-name'>Næste</span>`; */

			nextButton.innerHTML = `
			<span class='feature feature-next engiicore-animate-slide-right-three' style='background-color: ${color}'><img src='${menuItems[index + 1].firstElementChild.attributes[0].nodeValue}'><span class='feature-name'>Næste</span></span>`;
			nextButton.setAttribute("href", menuItems[index + 1]);
			console.log(menuItems[index + 1].firstChild.data)
		}
		
		if (index == 0) {
			let str = menuItems[lastItem].children[2].attributes[1].nodeValue;
			let color = str.match(/#([0-9a-fA-F]{3,6})/)[0];
/* 			prevButton.innerHTML = `<svg width="97" height="182" viewBox="0 0 97 182" fill="none" xmlns="http://www.w3.org/2000/svg">
			<g id="Nextbutton - Planl&#195;&#166;gning">
			<path id="Vector" d="M103.942 7.94709e-06C157.18 1.25779e-05 188 13.1843 188 80.5856L188 101.414C188 168.816 157.18 182 103.942 182L84.0583 182C30.8203 182 1.64172e-05 168.816 2.23394e-05 101.414L2.41695e-05 80.5856C3.00916e-05 13.1842 30.8203 1.58673e-06 84.0584 6.21757e-06L103.942 7.94709e-06Z" fill="${color}"/>
			</g>
			<defs>
			<linearGradient id="paint0_linear_701_926" x1="-81.051" y1="-10.6611" x2="183.67" y2="144.537" gradientUnits="userSpaceOnUse">
			<stop stop-color="#E2BC5D"/>
			<stop offset="1" stop-color="#E2BC5D"/>
			</linearGradient>
			</defs>
			</svg>			
			<span class='feature-nav prev'>Forrige feature
			<svg width="27" height="15" viewBox="0 0 27 15" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path id="Vector 26" d="M0.937988 2.62136C6.77132 -0.211977 19.538 -1.97864 23.938 13.6214M23.938 13.6214L18.938 12.6211M23.938 13.6214L25.938 9.12109" stroke="white"/>
			</svg>
			</span> <img src='${menuItems[lastItem].firstElementChild.attributes[0].nodeValue}'><span class='feature-name'>Forige</span>`; */
			
			prevButton.innerHTML = `
			 <span style='background-color: ${color}' class='feature feature-previous engiicore-animate-slide-left-three'><img src='${menuItems[lastItem].firstElementChild.attributes[0].nodeValue}'><span class='feature-name'>Forige</span></span>`;
			prevButton.setAttribute("href", menuItems[lastItem]);
		} else {
			
			//prevButton.setAttribute("style", menuItems[index - 1].children[2].attributes[1].nodeValue);
			let str = menuItems[index - 1].children[2].attributes[1].nodeValue;
			let color = str.match(/#([0-9a-fA-F]{3,6})/)[0];
			/* prevButton.innerHTML = `<svg width="97" height="182" viewBox="0 0 97 182" fill="none" xmlns="http://www.w3.org/2000/svg">
			<g id="Nextbutton - Planl&#195;&#166;gning">
			<path id="Vector" d="M103.942 7.94709e-06C157.18 1.25779e-05 188 13.1843 188 80.5856L188 101.414C188 168.816 157.18 182 103.942 182L84.0583 182C30.8203 182 1.64172e-05 168.816 2.23394e-05 101.414L2.41695e-05 80.5856C3.00916e-05 13.1842 30.8203 1.58673e-06 84.0584 6.21757e-06L103.942 7.94709e-06Z" fill="${color}"/>
			</g>
			<defs>
			<linearGradient id="paint0_linear_701_926" x1="-81.051" y1="-10.6611" x2="183.67" y2="144.537" gradientUnits="userSpaceOnUse">
			<stop stop-color="#E2BC5D"/>
			<stop offset="1" stop-color="#E2BC5D"/>
			</linearGradient>
			</defs>
			</svg>			
			<span class='feature-nav prev'>Forrige feature
			<svg width="27" height="15" viewBox="0 0 27 15" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path id="Vector 26" d="M0.937988 2.62136C6.77132 -0.211977 19.538 -1.97864 23.938 13.6214M23.938 13.6214L18.938 12.6211M23.938 13.6214L25.938 9.12109" stroke="white"/>
			</svg>
</span> <img src='${menuItems[index - 1].firstElementChild.attributes[0].nodeValue}'><span class='feature-name'>${menuItems[index - 1].firstChild.data}</span>`; */
			prevButton.innerHTML = `
			<span style='background-color: ${color}' class='feature feature-previous engiicore-animate-slide-left-three'><img src='${menuItems[index - 1].firstElementChild.attributes[0].nodeValue}'><span class='feature-name'>Forige</span></span>`;
			prevButton.setAttribute("href", menuItems[index - 1]);
		}





	} else {
	}
});


}

updateButtonsText();


/*
document.addEventListener("DOMContentLoaded", function() {
	// Check if the 'visited' flag is set in local storage
	if (!localStorage.getItem('visited')) {
	  // If not visited, add class to the element
	  document.getElementById('ribbon-section').classList.add('incoming_tooltip');
  
	  // Set the 'visited' flag in local storage
	  localStorage.setItem('visited', 'true');
	}
  }); */

  document.addEventListener("DOMContentLoaded", function() {
	// Check if the 'visited' flag is set in local storage
	if (!localStorage.getItem('visited')) {
	  // Add class to the element
	  document.getElementById('ribbon-section').classList.add('incoming_tooltip');
  
	  // Add a mouseover event listener to set the 'visited' flag
	  document.getElementById('ribbon-section').addEventListener('mouseover', function() {
		localStorage.setItem('visited', 'true');
		// Optional: Remove the class upon mouseover, if desired
		this.classList.remove('incoming_tooltip');
	  });
	}
  });
  

  // JavaScript for handling the accordion behavior
document.querySelectorAll('.schema-faq-section').forEach(section => {
	section.addEventListener('click', function() {
	  this.classList.toggle('active');
	  var answer = this.querySelector('.schema-faq-answer');
	  if (answer.style.display === 'block') {
		answer.style.display = 'none';
	  } else {
		answer.style.display = 'block';
	  }
	});
  });



  // Filter for posts

  jQuery(document).ready(function($) {

    function fetchPosts(category_ids, page = 1) {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: { 
                action: 'filter_posts', 
                category_ids: category_ids, 
                page: page 
            },
            success: function(result) {
                $('#category-posts').html(result);
                attachPaginationEvent(category_ids); // Attach event to new pagination links
            }
        });
    }

    function attachPaginationEvent(category_ids) {
        $('#category-posts .page-numbers').on('click', function(e) {
            e.preventDefault();
            var page = $(this).text(); // Get the page number
            fetchPosts(category_ids, page);
        });
    }

    $('.category-filter').on('change', function() {
        updateCategoriesAndFetchPosts();
    });

    function updateCategoriesAndFetchPosts() {
        var category_ids = [];
        if ($('#cat-0').is(':checked')) {
            category_ids = [0];
        } else {
            category_ids = $('.category-filter:checked').map(function() {
                return $(this).val();
            }).get();
        }
        fetchPosts(category_ids);
    }

    // Fetch posts for the initially checked category
    updateCategoriesAndFetchPosts();

});


