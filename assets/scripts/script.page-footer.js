// SmoothScroll
$(function() {
	$('.button').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top-0}, 1000);
					return false;
			}
		}
	});
 });

// Menu
$(document).ready(function(){
	$(".hamburguer-menu").click(function() {
		$(".hold-menu").toggleClass("show");
		$(".hamburguer-menu").toggleClass("show");
		$("body").toggleClass("show");
		//$(".hamburguer-menu .fa-times").toggleClass("hide");
	});
	
	$(".close-menu").click(function() {
		$(".hold-menu").toggleClass("show");
		$(".hamburguer-menu").toggleClass("show");
		$("body").toggleClass("show");
	});
});

// Parallax
var rellax = new Rellax('.rellax', {
    breakpoints: [300, 765, 1024],
    //center:true
});
//

//Accordion Menu
$(document).ready(function () {
	// scans document classes and changes attributes according current page href
    [ ...document.getElementsByClassName("main-menu__item__link") ].forEach ( element => {
		if ( window.location.href.includes( element.getAttribute('href'))) {
			element.classList.add('currentPage');
			document.querySelector('.currentPage ~ ul').classList.add('open-this-menu');
			switchMenuAccordion();
		}
	})
});

$("button.open-close").click(function () {
    $("ul.main-menu__item__submenu").removeClass("open-this-menu");
    $("ul.main-menu__item__submenu").addClass("close-this-menu");
    
    $(this).next().removeClass("close-this-menu");
    $(this).next().addClass("open-this-menu");
    
    switchMenuAccordion();
});

function switchMenuAccordion() {
	$(".close-this-menu").animate(
        {maxHeight: "0em"},
        {duration: 300, queue: "menus"}
    );
    $(".open-this-menu").animate(
        { maxHeight: "100em" },
        { duration: 300, queue: "menus" }
    );
    $("ul.main-menu__item__submenu").dequeue("menus");
}