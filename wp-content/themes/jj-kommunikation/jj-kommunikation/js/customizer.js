jQuery(document).ready(function(){
	
		jQuery("li.menu-item-has-children").prepend("<button class='toggle_submenu'>+</button>");
  jQuery("button.toggle_submenu").click(function(){
	  jQuery(this).siblings("ul.sub-menu").toggle(200,"linear");
	  jQuery(this).text(jQuery(this).text() == '+' ? '-' : '+');
	});
	
	jQuery(window).scroll(function() {
	 if (jQuery(this).scrollTop() > 150){
		jQuery('#masthead').addClass("fade-in");
	 } else {
		jQuery('#masthead').removeClass("fade-in");
	 }
  });

}); 

const menuItems = Array.from(document.querySelectorAll("#ribbon-section ul.menu li a"));
const currentUrl = window.location.href;
console.log(currentUrl + ' nuværende url');

const nextButton = document.createElement("a");
nextButton.id = "next-button";

const prevButton = document.createElement("a");
prevButton.id = "prev-button";

const ribbonSection = document.querySelector("#ribbon-section");



ribbonSection.appendChild(prevButton);
ribbonSection.appendChild(nextButton);



function updateButtonsText() {


 menuItems.forEach(function(menuItem, index) {
	console.log(menuItem.attributes[0]);

	if (currentUrl.includes(menuItem.attributes[0].nodeValue)) {
		const lastItem = menuItems.length - 1;
	console.log(menuItems);
		if (index === lastItem) {
		nextButton.innerHTML
		nextButton.innerHTML = `<span class='feature-nav next'>Næste feature</span> <img src='${menuItems[0].firstElementChild.attributes[0].nodeValue}'><span class='feature-name'>${menuItems[0].firstChild.data}</span>`;
		nextButton.setAttribute("href", menuItems[0]);
		} else {
			nextButton.innerHTML = `<span class='feature-nav next'>Næste feature</span> <img src='${menuItems[index + 1].firstElementChild.attributes[0].nodeValue}'><span class='feature-name'>${menuItems[index + 1].firstChild.data}</span>`;
			nextButton.setAttribute("href", menuItems[index + 1]);
		}
		
		if (index == 0) {
			
			prevButton.innerHTML = `<span class='feature-nav next'>Forrige feature</span> <img src='${menuItems[index + lastItem].firstElementChild.attributes[0].nodeValue}'><span class='feature-name'>${menuItems[index + lastItem].firstChild.data}</span>`;
			prevButton.setAttribute("href", menuItems[index + lastItem]);

		} else {
			prevButton.innerHTML = `<span class='feature-nav next'>Forrige feature</span> <img src='${menuItems[index - 1].firstElementChild.attributes[0].nodeValue}'><span class='feature-name'>${menuItems[index - 1].firstChild.data}</span>`;
			prevButton.setAttribute("href", menuItems[index - 1]);
		}





	} else {
	}
});


}

updateButtonsText();
