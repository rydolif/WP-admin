'use strict';

document.addEventListener("DOMContentLoaded", function() {

	//----------------------SLIDER-hero----------------------
		var mySwiper = new Swiper('.actions__slider', {
			slidesPerView: 1,
			spaceBetween: 30,
			// loop: true,
			// effect: 'fade',
			autoplay: {
				delay: 5000,
			},
			pagination: {
				el: '.actions__pagination',
				type: 'progressbar',
			},
			navigation: {
				nextEl: '.actions__button_next',
				prevEl: '.actions__button_prev',
			},
			breakpoints: {
				992: {
					slidesPerView: 2,
					spaceBetween: 20
				},
			}
		});

	//----------------------SLIDER-hero----------------------
		var mySwiper = new Swiper('.registers__slider', {
			slidesPerView: 1,
			spaceBetween: 30,
			// loop: true,
			// effect: 'fade',
			autoplay: {
				delay: 5000,
			},
			pagination: {
				el: '.registers__pagination',
				type: 'progressbar',
			},
			navigation: {
				nextEl: '.registers__button_next',
				prevEl: '.registers__button_prev',
			},
			breakpoints: {
				576: {
					slidesPerView: 2,
					spaceBetween: 15
				},
				1200: {
					slidesPerView: 3,
					spaceBetween: 15
				},
			}
		});

	//----------------------SCROLL-----------------------
		const scrollTo = (scrollTo) => {
			let list = document.querySelector(scrollTo);
			
			if (list) {
				list = '.' + list.classList[0]  + ' a[href^="#"';
				document.querySelectorAll(list).forEach(link => {
						link.addEventListener('click', function(e) {
						e.preventDefault();
						const scrollMenu = document.querySelector(scrollTo);

						let href = this.getAttribute('href').substring(1);

						const scrollTarget = document.getElementById(href);

						// const topOffset = scrollMenu.offsetHeight;
						const topOffset = 70;
						const elementPosition = scrollTarget.getBoundingClientRect().top;
						const offsetPosition = elementPosition - topOffset;

						window.scrollBy({
								top: offsetPosition,
								behavior: 'smooth'
						});

						
						let button = document.querySelector('.hamburger'),
								nav = document.querySelector('.header__nav'),
								header = document.querySelector('.header'),
								body = document.querySelector('body');

						button.classList.remove('hamburger--active');
						nav.classList.remove('header__nav--active');
						header.classList.remove('header--menu');
						body.classList.remove('no-scroll');
					});
				});
			}
		};
		scrollTo('.header__nav');
		scrollTo('.hero__btn');
	
	//----------------------FIXED-HEADER-----------------------
		const headerFixed = (headerFixed, headerActive) => {
			const header =  document.querySelector(headerFixed),
						active = headerActive.replace(/\./, '');
	
			window.addEventListener('scroll', function() {
				const top = pageYOffset;
				
				if (top >= 90) {
					header.classList.add(active);
				} else {
					header.classList.remove(active);
				}
	
			});
	
		};
		headerFixed('.header', '.header--active');
	
	//----------------------HAMBURGER-----------------------
		const hamburger = (hamburgerButton, hamburgerNav, hamburgerHeader) => {
			const button = document.querySelector(hamburgerButton),
						nav = document.querySelector(hamburgerNav),
						header = document.querySelector(hamburgerHeader);
			
						const body = document.querySelector('body');

			button.addEventListener('click', (e) => {
				button.classList.toggle('hamburger--active');
				nav.classList.toggle('header__nav--active');
				header.classList.toggle('header--menu');
				body.classList.toggle('no-scroll');
			});
	
		};
		hamburger('.hamburger', '.header__nav', '.header');
		
	//----------------------MODAL-----------------------
		const modals = (modalSelector) => {
			const	modal = document.querySelectorAll(modalSelector);

			console.log(modal);

			if (modal) {
				let i = 1;

				modal.forEach(item => {
					const wrap = item.id;
					const link = document.querySelector('.' + wrap);
					let close = item.querySelector('.close');
					if (link) {
						link.addEventListener('click', (e) => {
							if (e.target) {
								e.preventDefault();
							}
							item.classList.add('active');
						});
					}

					close.addEventListener('click', () => {
						item.classList.remove('active');
					});

					item.addEventListener('click', (e) => {
						if (e.target === item) {
							item.classList.remove('active');
						}
					});
				});
			}

		};
		modals('.modal');


		var checkbox = document.querySelector("input[type=checkbox]");

		checkbox.addEventListener( 'change', function() {
				if(this.checked) {
					this.parentNode.classList.add('active');
				} else {
					this.parentNode.classList.remove('active');
				}
		});


	});
	