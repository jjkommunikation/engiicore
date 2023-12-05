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
//let currentItemIndex = 0;
/*
menuItems.forEach(menuItem => {
	console.dir(menuItem.childNodes[0].textContent);
	if (menuItem.attributes[0].nodeValue == currentUrl) {
		console.log('yay det virker ' + menuItem.attributes[0].nodeValue);
		
	} else {
		
	}
}); */

//console.dir(menuItems[1].attributes[0]);

const nextButton = document.createElement("a");
nextButton.id = "next-button";

const prevButton = document.createElement("a");
prevButton.id = "prev-button";

const ribbonSection = document.querySelector("#ribbon-section");

ribbonSection.appendChild(prevButton);
ribbonSection.appendChild(nextButton);



function updateButtonsText() {


 menuItems.forEach(function(menuItem, index) {
//console.log(menuItem.attributes[0].nodeValue);
console.log(menuItems[index].getAttribute("href"));
	if (menuItem.attributes[0].nodeValue == currentUrl) {
		
	
		nextButton.textContent = `Next: ${menuItems[index + 1]}`;
		nextButton.setAttribute("href", menuItems[index + 1]);
		if (index == 0) {
			const lastItem = menuItems.length - 1;
			prevButton.textContent = `Prev: ${menuItems[index + lastItem]}`;
			prevButton.setAttribute("href", menuItems[index + lastItem]);

		} else {
			prevButton.textContent = `Prev: ${menuItems[index + 1]}`;
			prevButton.setAttribute("href", menuItems[index + 1]);
		}





	} else {
	}
});


}

updateButtonsText();
