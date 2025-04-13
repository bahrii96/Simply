function testWebP(callback) {
    var webP = new Image();
    webP.onload = webP.onerror = function () {
        callback(webP.height == 2);
    };
    webP.src = 'data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA';
};

function changeImgSrc(element) {
    element.attr("used-webp", true);
    element.attr("data-src-default", element.data("src"));
    if (element[0].hasAttribute("data-webp") && element.data("webp").length > 0) {
        element.attr("data-src", element.data("webp"));
    };
    if (element[0].hasAttribute("data-webp-retina") && element.data("webp-retina").length > 0) {
        element.attr("data-retina", element.data("webp-retina"));
    };
};

jQuery(document).ready(function () {
    testWebP(function (support) {
        jQuery('.lazyWebp').lazy({
            visibleOnly: true,

            beforeLoad: function (element) {
                if (support) changeImgSrc(element);
            },
            onError: function (element) {
                if (support && element.attr("used-webp") == 'true') {
                    console.log('error load webp image, src =', '"' + element.attr("data-src") + '"');
                    element.attr("src", element.attr("data-src-default"));
                }
            },
            afterLoad: function (element) {
                jQuery(element).css({
                    'visibility': 'visible',
                }).fadeTo(250, 1)
            },
        });
        if (support) jQuery(".swiper-container .swiper-lazy.webp").each(function () { changeImgSrc(jQuery(this)) });
        initSwiperSliders();
    });
    // lazy.js
    jQuery('.lazy').lazy({
        afterLoad: function (element) {
            jQuery(element).css({ 'visibility': 'visible' });
            if (!jQuery(element).hasClass("noFade")) jQuery(element).fadeTo(250, 1);
        },
    });
    // lazy.js
});


function initSwiperSliders() {
	let $width = $(window).width()

	const partnersSliders = $('.js-slider-partners .swiper-container')
	const technologySlider = $('.js-slider-technology .swiper-container')
	const reviewsSlider = $('.js-slider-reviews .swiper-container')
	const sliderFilters = $('.js-slider-filter .swiper-container')
	const sliderCategory = $('.js-slider-category .swiper-container')
	const sliderFeatures = $('.js-slider-features .swiper-container')
	const sliderArticle = $('.js-slider-article .swiper-container')
	const sliderGallery = $('.js-slider-gallery .swiper-container')
	const sliderEmployees = $('.js-slider-employees .swiper-container')
	const sliderLeadership = $('.js-slider-leadership .swiper-container')
	const sliderTimeline = $('.js-slider-timeline .swiper-container')
	const sliderTimelineNav = $('.js-slider-timeline-nav .swiper-container')

	const sliderTimelineArr = []


	if (partnersSliders.length > 0) {

		partnersSliders.each(function () {

			const currentSlider = $(this).parent();
			const swiper = new Swiper(this, {
				lazy: {
					loadPrevNext: true,
					loadPrevNextAmount: 10,
				},
				slidesPerView: 10,
				slidesPerGroup: 10,
				spaceBetween: 24,
				speed: 800,
				watchOverflow: true,
				autoplay: {
					delay: 5000,
				},
				grabCursor: true,
				pagination: {
					el: currentSlider.find('.js-pagination')[0],
					type: 'bullets',
					clickable: true,
				},
				navigation: false,
				breakpoints: {
					300: {
						spaceBetween: 10,
						slidesPerView: 3,
						slidesPerGroup: 3,
					},
					375: {
						spaceBetween: 14,
						slidesPerView: 3,
						slidesPerGroup: 3,
					},
					480: {
						spaceBetween: 14,
						slidesPerView: 3,
						slidesPerGroup: 3,
					},
					576: {
						spaceBetween: 14,
						slidesPerView: 4,
						slidesPerGroup: 4,
					},
					678: {
						spaceBetween: 14,
						slidesPerView: 6,
						slidesPerGroup: 6,
					},
					992: {
						spaceBetween: 20,
						slidesPerView: 8,
						slidesPerGroup: 8,
					},
					1280: {
						spaceBetween: 24,
						slidesPerView: 10,
						slidesPerGroup: 10,
					}
				}
			})

			$(this).hover(function () {
				swiper.autoplay.stop();
			}, function () {
				swiper.autoplay.start();
			})

		})
	}

	if (technologySlider.length > 0) {

		technologySlider.each(function () {

			const currentSlider = $(this).parent();
			const swiper = new Swiper(this, {
				lazy: {
					loadPrevNext: true,
					loadPrevNextAmount: 2,
				},
				slidesPerView: 1,
				spaceBetween: 20,
				speed: 1000,
				watchOverflow: true,
				//grabCursor: true,
				pagination: {
					el: currentSlider.find('.js-pagination')[0],
					type: 'bullets',
					clickable: true,
				},
				navigation: false,
			})

		})
	}

	if (reviewsSlider.length > 0) {

		reviewsSlider.each(function () {
			const swiper = new Swiper(this, {
				lazy: {
					loadPrevNext: true,
					loadPrevNextAmount: 2,
				},
				autoplay: {
					delay: 5000,
				},
				loopedSlides: 4,
				loop: true,
				slidesPerView: 1,
				spaceBetween: 20,
				speed: 1000,
				watchOverflow: true,
				grabCursor: true,
				pagination: false,
				navigation: false,
			})

			$(this).hover(function () {
				swiper.autoplay.stop();
			}, function () {
				swiper.autoplay.start();
			})
		})
	}

	if (sliderEmployees.length > 0) {

		sliderEmployees.each(function () {
			const swiper = new Swiper(this, {
				lazy: {
					loadPrevNext: true,
					loadPrevNextAmount: 4,
				},
				autoplay: {
					delay: 5000,
				},
				loopedSlides: 4,
				loop: true,
				slidesPerView: "auto",
				spaceBetween: 20,
				speed: 1000,
				watchOverflow: true,
				grabCursor: true,
				pagination: false,
				navigation: false,

				breakpoints: {
					0: {
						spaceBetween: 8,
						slidesPerView: "auto",
					},
					768: {
						spaceBetween: 20,
						slidesPerView: 1,
					},
				}
			})

			$(this).hover(function () {
				swiper.autoplay.stop();
			}, function () {
				swiper.autoplay.start();
			})
		})
	}

	if (sliderFilters.length > 0) {

		$('.js-slider-filter .swiper-slide .cat-card').each(function (i) {
			$(this).attr('data-index', i)
		})

		sliderFilters.each(function () {
			const swiper = new Swiper(this, {
				slidesPerView: "auto",
				spaceBetween: 0,
				//freeMode: true,
				speed: 500,
				watchOverflow: true,
				//grabCursor: true,
				pagination: false,
				observer: true,
				observeParents: true,
				navigation: false,
				direction: 'horizontal',
				mousewheel: true,
			})

			$(window).resize(function () {
				slideToActive()
				swiper.update()
			})

			function slideToActive() {
				$('.js-slider-filter.swiper-slide .cat-card.active').each(function () {
					const index = $(this).data('index')
					swiper.slideTo(index, 500)
				})
			}

			slideToActive()

			$('body').on('click', '.js-slider-filter .swiper-slide .cat-card', function (e) {
				e.preventDefault()
				const index = swiper.clickedIndex
				$('.js-slider-filter .swiper-slide .cat-card').removeClass('active')
				$(this).addClass('active')
				swiper.slideTo(index, 500)
			})


			const menu = document.querySelector('.js-slider-filter')

			if (menu) {

				const navLinks = gsap.utils.toArray(".js-slider-filter .cat-card");
				const panels = gsap.utils.toArray(".js-target");

				$(".js-slider-filter a").click(function (event) {
					var id = $(this).attr("href").replace("/", '')
					if ($(id).length) {
						event.preventDefault()
						scrollTo("body, html", $(id).offset().top - 130)
					}
				})

				function toggleActiveMenu(panel) {
					for (const link of navLinks) {
						link.classList.remove('active')
					}
					for (const link of navLinks) {
						if (link.href.split('#')[1] === panel.id) {
							link.classList.add('active')
							const index = link.dataset.index
							swiper.slideTo(index, 500)
						}
					}
				}

				panels.forEach((panel, i) => {
					ScrollTrigger.create({
						start: 'top 100px',
						//end: 'bottom 200px',
						//markers: true,
						trigger: panel,
						onUpdate: () => {
							toggleActiveMenu(panel)
						},
					})
				})
			}

		})
	}

	if (sliderCategory.length > 0) {

		$('.js-slider-category .swiper-slide .category-link').each(function (i) {
			$(this).attr('data-index', i)
		})

		sliderCategory.each(function () {
			const swiper = new Swiper(this, {
				slidesPerView: "auto",
				spaceBetween: 16,
				//freeMode: true,
				speed: 500,
				watchOverflow: true,
				//grabCursor: true,
				pagination: false,
				observer: true,
				observeParents: true,
				navigation: false,
				breakpoints: {
					0: {
						spaceBetween: 8,
					},
					1200: {
						spaceBetween: 16,
					},
				}
			})

			$(window).resize(function () {
				slideToActive()
				swiper.update()
			})

			function slideToActive() {
				$('.js-slider-category .swiper-slide .category-link.active').each(function () {
					const index = $(this).data('index')
					swiper.slideTo(index, 500)
				})
			}

			slideToActive()

			$('body').on('click', '.js-slider-category .swiper-slide .category-link', function (e) {
				e.preventDefault()
				const index = swiper.clickedIndex
				$('.js-slider-category .swiper-slide .category-link').removeClass('active')
				$(this).addClass('active')
				swiper.slideTo(index, 500)
			})

		})
	}

	if (sliderFeatures.length > 0) {

		sliderFeatures.each(function () {

			const swiper = new Swiper(this, {
				lazy: {
					loadPrevNext: true,
					loadPrevNextAmount: 6,
				},
				slidesPerView: "auto",
				spaceBetween: 24,
				speed: 800,
				watchOverflow: true,
				direction: 'horizontal',
				mousewheel: true,
				// autoplay: {
				// 	delay: 5000,
				// },
				autoplay: false,
				grabCursor: true,
				pagination: false,
				navigation: false,
				breakpoints: {
					0: {
						spaceBetween: 16,
					},
					992: {
						spaceBetween: 20,
					},
					1280: {
						spaceBetween: 24,
					}
				}
			})

			// $(this).hover(function() {
			// 	swiper.autoplay.stop();
			// }, function() {
			// 	swiper.autoplay.start();
			// })

		})
	}


	if (sliderArticle.length > 0) {

		sliderArticle.each(function () {
			const swiper = new Swiper(this, {
				lazy: {
					loadPrevNext: true,
					loadPrevNextAmount: 2,
				},
				slidesPerView: 1,
				spaceBetween: 20,
				speed: 1000,
				watchOverflow: true,
				//grabCursor: true,
				pagination: false,
				navigation: false,
				direction: 'horizontal',
				mousewheel: true,
				breakpoints: {
					0: {
						spaceBetween: 10,
					},
					1280: {
						spaceBetween: 20,
					}
				}
			})
		})
	}

	if (sliderGallery.length > 0) {

		sliderGallery.each(function () {
			const currentSlider = $(this).parent();
			const swiper = new Swiper(this, {
				lazy: {
					loadPrevNext: true,
					loadPrevNextAmount: 2,
				},
				slidesPerView: 1,
				spaceBetween: 10,
				speed: 1000,
				watchOverflow: true,
				//grabCursor: true,
				pagination: {
					el: currentSlider.find('.js-pagination')[0],
					type: 'bullets',
					clickable: true,
				},
				navigation: false,
			})
		})
	}

	if (sliderLeadership.length > 0) {
		sliderLeadership.each(function () {
			if ($width < 767) {
				const swiper = new Swiper(this, {
					lazy: {
						loadPrevNext: true,
						loadPrevNextAmount: 4,
					},
					slidesPerView: 1,
					spaceBetween: 0,
					speed: 1000,
					watchOverflow: true,
					grabCursor: true,
					pagination: false,
					navigation: false,

					breakpoints: {
						0: {
							slidesPerView: "auto",
						},

						575: {
							slidesPerView: 2,
						},
					}
				})
			}
		})
	}

	if (sliderTimelineNav.length > 0) {
		if ($width < 767) {

			$('.js-slider-timeline-nav .swiper-slide .item').each(function (i) {
				$(this).attr('data-index', i)
			})

			sliderTimelineNav.each(function () {
				const swiper = new Swiper(this, {
					slidesPerView: "auto",
					spaceBetween: 18,
					//freeMode: true,
					speed: 500,
					watchOverflow: true,
					//grabCursor: true,
					pagination: false,
					observer: true,
					observeParents: true,
					navigation: false,
				})


				$(window).resize(function () {
					slideToActive()
					swiper.update()
				})

				function slideToActive() {
					$('.js-slider-timeline-nav .swiper-slide .item.active').each(function () {
						const index = $(this).data('index')
						swiper.slideTo(index, 500)
					})
				}

				slideToActive()

				$('body').on('click', '.js-slider-timeline-nav .swiper-slide .item', function (e) {
					e.preventDefault()
					const index = swiper.clickedIndex
					swiper.slideTo(index, 500)
				})

			})
		}
	}

	if (sliderTimeline.length > 0) {

		sliderTimeline.each(function () {
			const currentSlider = $(this).parent();
			const slider = new Swiper(this, {
				lazy: {
					loadPrevNext: true,
					loadPrevNextAmount: 10,
				},
				slidesPerView: "auto",
				spaceBetween: 20,
				//freeMode: true,
				speed: 500,
				watchOverflow: true,
				grabCursor: true,
				pagination: {
					el: currentSlider.find('.js-pagination')[0],
					type: 'bullets',
					clickable: true,
				},
				observer: true,
				observeParents: true,
				navigation: false,
				breakpoints: {
					0: {
						slidesPerView: 1,
						spaceBetween: 10,
					},

					479: {
						slidesPerView: "auto",
						spaceBetween: 20,
					},
				}
			})

			sliderTimelineArr.push(slider)
		})
	}

	$('.js-tabs').each(function () {
		$(this).find('.js-tabs-content-item').eq(0).addClass('active').show()
	})

	$('body').on('click', '.js-tabs-link', function () {
		const $this = $(this)
		const id = $this.attr('href')
		const idSlider = $(id).find('.js-slider-timeline .swiper-wrapper').attr('id')

		$this.closest('.js-tabs').find('.js-tabs-link').removeClass('active')

		$(this).addClass('active').closest('.js-tabs').find('.js-tabs-content-item').removeClass('active').fadeOut(0)
		$(id).addClass('active').fadeIn(400, function () {
			for (const item of sliderTimelineArr) {
				const slId = item.$wrapperEl.attr('id')

				if (slId === idSlider) {
					item.update()
					continue
				}
			}
		})

		return false;
	})


}
