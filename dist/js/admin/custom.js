jQuery(function ($) {
    
    var newsBlockInit = function ($block) {
         initSwiperSliders();
        setTimeout(function() {         
          testWebP(testWebpCallFunc);
          initSwiperSliders();
        }, 500);

        var a = $(".js-slider-promo .swiper-container")
      , b = $(".js-slider-quotes .swiper-container")
      , c = $(".js-slider-top .swiper-container");
    0 < c.length && c.each(function() {
        var a = $(this).parent()
          , b = new Swiper(this,{
            lazy: {
                loadPrevNext: !0,
                loadPrevNextAmount: 2
            },
            autoplay: {
                delay: 5e3
            },
            loop: !0,
            effect: "fade",
            slidesPerView: 1,
            spaceBetween: 10,
            speed: 1e3,
            watchOverflow: !0,
            pagination: {
                el: a.find(".js-pagination")[0],
                type: "bullets",
                clickable: !0
            },
            navigation: !1
        });
        $(this).hover(function() {
            b.autoplay.stop()
        }, function() {
            b.autoplay.start()
        })
    }),
    0 < a.length && a.each(function() {
        var a = $(this).parent()
          , b = new Swiper(this,{
            lazy: {
                loadPrevNext: !0,
                loadPrevNextAmount: 2
            },
            autoplay: {
                delay: 5e3
            },
            loop: !0,
            effect: "fade",
            slidesPerView: 1,
            spaceBetween: 10,
            speed: 1e3,
            watchOverflow: !0,
            pagination: {
                el: a.find(".js-pagination")[0],
                type: "bullets",
                clickable: !0
            },
            navigation: {
                nextEl: a.find(".swiper-button-next")[0],
                prevEl: a.find(".swiper-button-prev")[0]
            }
        });
        $(this).hover(function() {
            b.autoplay.stop()
        }, function() {
            b.autoplay.start()
        })
    }),
    0 < b.length && b.each(function() {
        var a = $(this).parent()
          , b = new Swiper(this,{
            autoplay: {
                delay: 5e3
            },
            effect: "fade",
            slidesPerView: 1,
            spaceBetween: 10,
            speed: 1e3,
            watchOverflow: !0,
            pagination: {
                el: a.find(".js-pagination")[0],
                type: "bullets",
                clickable: !0
            },
            navigation: !1
        });
        b.on("slideChange", function() {
            var a = b.realIndex
              , c = b.slides[a];
            $(c).find(".quote-card").hasClass("quote-card--white") ? $(b.$el).closest(".slider-quotes").addClass("pagination-light") : $(b.$el).closest(".slider-quotes").removeClass("pagination-light")
        }),
        $(this).hover(function() {
            b.autoplay.stop()
        }, function() {
            b.autoplay.start()
        })
    })

    };
    // Initialize dynamic block preview (editor).
    if (window.acf) {

        window.acf.addAction(
            "render_block_preview",
            newsBlockInit
        );
    }
});




function testWebP(e) {
  var t = new Image();
  (t.onload = t.onerror =
    function () {
      e(2 == t.height);
    }),
    (t.src =
      "data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA");
}

/*
setTimeout(function() {
  $('.block-editor-block-list__layout, .acf-fields, .acf-field').click(function (e) { 
    e.preventDefault();
    console.log('1');
    setTimeout(function() {
      testWebP(testWebpCallFunc);
    }, 500);
    setTimeout(function() {
      $('.components-button.components-icon-button.components-toolbar__control').click(function (e) { 
        e.preventDefault();
        console.log('2');
        setTimeout(function() {
          testWebP(testWebpCallFunc);
        }, 500);
      });
    }, 500);
  });
}, 500);
*/

function testWebpCallFunc(e) {
  jQuery(".lazyWebp:not(.init)").lazy({
    visibleOnly: !0,
    beforeLoad: function (t) {
      e && changeImgSrc(t), t.addClass("init");
    },
    onError: function (t) {
      e &&
        "true" == t.attr("used-webp") &&
        (console.log(
          "error load webp image, src =",
          '"' + t.attr("data-src") + '"'
        ),
        t.attr("src", t.attr("data-src-default")));
    },
    afterLoad: function (e) {
      jQuery(e).css({ visibility: "visible" }).fadeTo(250, 1),
        document.getElementById("photo-box-list") && createGalleryGrid();
    },
  }),
    e &&
      jQuery(".swiper-container .swiper-lazy.webp").each(function () {
        changeImgSrc(jQuery(this));
      }),
    initSwiperSliders(),
    e &&
      jQuery(".b-before-after .lazyWebp").each(function () {
        changeImgSrc(jQuery(this)), jQuery(this).attr("src", jQuery(this).attr("data-src"));
      }),
    setTimeout(function () {
      //twenty();
    }, 200);
}





function initSwiperSliders() {
    mainSlider = new Swiper(".b-main .swiper-container", { lazy: { loadPrevNext: !0, loadPrevNextAmount: 5 }, loop: !1, slidesPerView: 1, spaceBetween: 0, effect: "fade", watchOverflow: !0, speed: 700, autoplay: { disableOnInteraction: !1 }, pagination: { el: ".b-main .swiper-pagination", clickable: !0 }, observeParents: !0, observer: !0, allowTouchMove: !1, on: { afterInit: function() { this.autoplay.stop() }, slideChange: function() { $(".b-main .swiper-slide.swiper-slide-active").hasClass("slide1") && animTextPrev($(".b-main .swiper-slide.swiper-slide-active .h1")), $(".b-main .swiper-slide.swiper-slide-active").hasClass("slide2") && animTextPrev($(".b-main .swiper-slide.swiper-slide-active .h1")), $(".b-main .swiper-slide.swiper-slide-active").hasClass("slide3") && animTextPrev($(".b-main .swiper-slide.swiper-slide-active .h1")), $(".b-main .swiper-slide.swiper-slide-active").hasClass("slide4") && animTextPrev($(".b-main .swiper-slide.swiper-slide-active .h1")) }, beforeTransitionStart: function() { $(".b-main .swiper-slide.swiper-slide-active").hasClass("slide1") && (player1.play(), player2.stop(), player3.stop(), player4.stop(), animTextNext($(".b-main .swiper-slide.swiper-slide-active .h1")), shapeScaleUp($(".player1"))), $(".b-main .swiper-slide.swiper-slide-active").hasClass("slide2") && (player2.play(), player1.stop(), player3.stop(), player4.stop(), animTextNext($(".b-main .swiper-slide.swiper-slide-active .h1")), shapeScaleUp($(".player2"))), $(".b-main .swiper-slide.swiper-slide-active").hasClass("slide3") && (player3.play(), player1.stop(), player2.stop(), player4.stop(), animTextNext($(".b-main .swiper-slide.swiper-slide-active .h1")), shapeScaleUp($(".player3"))), $(".b-main .swiper-slide.swiper-slide-active").hasClass("slide4") && (player4.play(), player1.stop(), player2.stop(), player3.stop(), animTextNext($(".b-main .swiper-slide.swiper-slide-active .h1")), shapeScaleUp($(".player4"))) } } });
    var a = new Swiper(".achievs-slider .swiper-container", { lazy: { loadPrevNext: !0, loadPrevNextAmount: 5 }, loop: !1, slidesPerView: "auto", spaceBetween: 30, grabCursor: !0, speed: 500, navigation: { nextEl: ".achievs-slider .swiper-button-next", prevEl: ".achievs-slider .swiper-button-prev" }, observeParents: !0, observer: !0, breakpoints: { 625: { spaceBetween: 20 } } }),
        b = new Swiper(".team-slider .swiper-container", { lazy: { loadPrevNext: !0, loadPrevNextAmount: 5 }, loop: !1, slidesPerView: "auto", spaceBetween: 30, grabCursor: !0, speed: 500, navigation: { nextEl: ".team-slider .swiper-button-next", prevEl: ".team-slider .swiper-button-prev" }, observeParents: !0, observer: !0, breakpoints: { 625: { spaceBetween: 20 } } }),
        c = new Swiper(".gallery-slider .swiper-container", { lazy: { loadPrevNext: !0, loadPrevNextAmount: 5 }, loop: !1, slidesPerView: 1, spaceBetween: 60, grabCursor: !0, speed: 500, navigation: { nextEl: ".gallery-slider .swiper-button-next", prevEl: ".gallery-slider .swiper-button-prev" }, pagination: { el: ".b-template-gallery .swiper-pagination", clickable: !0 }, observeParents: !0, observer: !0, breakpoints: { 625: { spaceBetween: 30 } } })
}