(function ($) {
    "use strict";
    // testimonial sliders
    $(".testimonial-sliders").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
                nav: false,
            },
            600: {
                items: 1,
                nav: false,
            },
            1000: {
                items: 1,
                nav: false,
                loop: true,
            },
        },
    });

    // homepage slider
    $(".homepage-slider").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        nav: true,
        dots: false,
        navText: [
            '<i class="fas fa-angle-left"></i>',
            '<i class="fas fa-angle-right"></i>',
        ],
        responsive: {
            0: {
                items: 1,
                nav: false,
                loop: true,
            },
            600: {
                items: 1,
                nav: true,
                loop: true,
            },
            1000: {
                items: 1,
                nav: true,
                loop: true,
            },
        },
    });

    // logo carousel
    $(".logo-carousel-inner").owlCarousel({
        items: 4,
        loop: true,
        autoplay: true,
        margin: 30,
        responsive: {
            0: {
                items: 1,
                nav: false,
            },
            600: {
                items: 3,
                nav: false,
            },
            1000: {
                items: 4,
                nav: false,
                loop: true,
            },
        },
    });

    // count down
    if ($(".time-countdown").length) {
        $(".time-countdown").each(function () {
            var $this = $(this),
                finalDate = $(this).data("countdown");
            $this.countdown(finalDate, function (event) {
                var $this = $(this).html(
                    event.strftime(
                        "" +
                            '<div class="counter-column"><div class="inner"><span class="count">%D</span>Days</div></div> ' +
                            '<div class="counter-column"><div class="inner"><span class="count">%H</span>Hours</div></div>  ' +
                            '<div class="counter-column"><div class="inner"><span class="count">%M</span>Mins</div></div>  ' +
                            '<div class="counter-column"><div class="inner"><span class="count">%S</span>Secs</div></div>'
                    )
                );
            });
        });
    }

    // projects filters isotop
    $(".product-filters li").on("click", function () {
        $(".product-filters li").removeClass("active");
        $(this).addClass("active");

        var selector = $(this).attr("data-filter");

        $(".product-lists").isotope({
            filter: selector,
        });
    });

    // isotop inner
    $(".product-lists").isotope();

    // magnific popup
    $(".popup-youtube").magnificPopup({
        disableOn: 700,
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
    });

    // light box
    $(".image-popup-vertical-fit").magnificPopup({
        type: "image",
        closeOnContentClick: true,
        mainClass: "mfp-img-mobile",
        image: {
            verticalFit: true,
        },
    });

    // homepage slides animations
    $(".homepage-slider").on("translate.owl.carousel", function () {
        $(".hero-text-tablecell .subtitle")
            .removeClass("animated fadeInUp")
            .css({ opacity: "0" });
        $(".hero-text-tablecell h1")
            .removeClass("animated fadeInUp")
            .css({ opacity: "0", "animation-delay": "0.3s" });
        $(".hero-btns")
            .removeClass("animated fadeInUp")
            .css({ opacity: "0", "animation-delay": "0.5s" });
    });

    $(".homepage-slider").on("translated.owl.carousel", function () {
        $(".hero-text-tablecell .subtitle")
            .addClass("animated fadeInUp")
            .css({ opacity: "0" });
        $(".hero-text-tablecell h1")
            .addClass("animated fadeInUp")
            .css({ opacity: "0", "animation-delay": "0.3s" });
        $(".hero-btns")
            .addClass("animated fadeInUp")
            .css({ opacity: "0", "animation-delay": "0.5s" });
    });

    // stikcy js
    $("#sticker").sticky({
        topSpacing: 0,
    });

    //mean menu
    $(".main-menu").meanmenu({
        meanMenuContainer: ".mobile-menu",
        meanScreenWidth: "992",
    });

    // search form
    $(".search-bar-icon").on("click", function () {
        $(".search-area").addClass("search-active");
    });

    $(".close-btn").on("click", function () {
        $(".search-area").removeClass("search-active");
    });

    $(document).on("change", ".profile-load-image", function (e) {
        var that = $(this);
        let reader = new FileReader();
        reader.onload = function () {
            $(".profile-loaded-image").attr("src", reader.result);
            $(".profile-loaded-image").css("display", "block");
        };
        reader.readAsDataURL(e.target.files[0]);
    });

    jQuery(window).on("load", function () {
        jQuery(".loader").fadeOut(1000);
    });

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim();
        if (all) {
            return [...document.querySelectorAll(el)];
        } else {
            return document.querySelector(el);
        }
    };

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        if (all) {
            select(el, all).forEach((e) => e.addEventListener(type, listener));
        } else {
            select(el, all).addEventListener(type, listener);
        }
    };

    /**
     * Easy on scroll event listener
     */
    const onscroll = (el, listener) => {
        el.addEventListener("scroll", listener);
    };

    /**
     * Navbar links active state on scroll
     */
    let navbarlinks = select("#navbar .scrollto", true);
    const navbarlinksActive = () => {
        let position = window.scrollY + 200;
        navbarlinks.forEach((navbarlink) => {
            if (!navbarlink.hash) return;
            let section = select(navbarlink.hash);
            if (!section) return;
            if (
                position >= section.offsetTop &&
                position <= section.offsetTop + section.offsetHeight
            ) {
                navbarlink.classList.add("active");
            } else {
                navbarlink.classList.remove("active");
            }
        });
    };
    window.addEventListener("load", navbarlinksActive);
    onscroll(document, navbarlinksActive);

    /**
     * Scrolls to an element with header offset
     */
    const scrollto = (el) => {
        let header = select("#header");
        let offset = header.offsetHeight;

        if (!header.classList.contains("header-scrolled")) {
            offset -= 10;
        }

        let elementPos = select(el).offsetTop;
        window.scrollTo({
            top: elementPos - offset,
            behavior: "smooth",
        });
    };

    /**
     * Toggle .header-scrolled class to #header when page is scrolled
     */
    let selectHeader = select("#header");
    if (selectHeader) {
        const headerScrolled = () => {
            if (window.scrollY > 100) {
                selectHeader.classList.add("header-scrolled");
            } else {
                selectHeader.classList.remove("header-scrolled");
            }
        };
        window.addEventListener("load", headerScrolled);
        onscroll(document, headerScrolled);
    }

    /**
     * Back to top button
     */
    let backtotop = select(".back-to-top");
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop.classList.add("active");
            } else {
                backtotop.classList.remove("active");
            }
        };
        window.addEventListener("load", toggleBacktotop);
        onscroll(document, toggleBacktotop);
    }

    /**
     * Mobile nav toggle
     */
    on("click", ".mobile-nav-toggle", function (e) {
        select("#navbar").classList.toggle("navbar-mobile");
        this.classList.toggle("bi-list");
        this.classList.toggle("bi-x");
    });

    /**
     * Mobile nav dropdowns activate
     */
    on(
        "click",
        ".navbar .dropdown > a",
        function (e) {
            if (select("#navbar").classList.contains("navbar-mobile")) {
                e.preventDefault();
                this.nextElementSibling.classList.toggle("dropdown-active");
            }
        },
        true
    );

    /**
     * Scrool with ofset on links with a class name .scrollto
     */
    on(
        "click",
        ".scrollto",
        function (e) {
            if (select(this.hash)) {
                e.preventDefault();

                let navbar = select("#navbar");
                if (navbar.classList.contains("navbar-mobile")) {
                    navbar.classList.remove("navbar-mobile");
                    let navbarToggle = select(".mobile-nav-toggle");
                    navbarToggle.classList.toggle("bi-list");
                    navbarToggle.classList.toggle("bi-x");
                }
                scrollto(this.hash);
            }
        },
        true
    );

    /**
     * Scroll with ofset on page load with hash links in the url
     */
    window.addEventListener("load", () => {
        if (window.location.hash) {
            if (select(window.location.hash)) {
                scrollto(window.location.hash);
            }
        }
    });

    /**
     * Clients Slider
     */
    new Swiper(".clients-slider", {
        speed: 400,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        slidesPerView: "auto",
        pagination: {
            el: ".swiper-pagination",
            type: "bullets",
            clickable: true,
        },
        breakpoints: {
            320: {
                slidesPerView: 2,
                spaceBetween: 40,
            },
            480: {
                slidesPerView: 3,
                spaceBetween: 60,
            },
            640: {
                slidesPerView: 4,
                spaceBetween: 80,
            },
            992: {
                slidesPerView: 6,
                spaceBetween: 120,
            },
        },
    });

    /**
     * Porfolio isotope and filter
     */
    window.addEventListener("load", () => {
        let portfolioContainer = select(".portfolio-container");
        if (portfolioContainer) {
            let portfolioIsotope = new Isotope(portfolioContainer, {
                itemSelector: ".portfolio-item",
                layoutMode: "fitRows",
            });

            let portfolioFilters = select("#portfolio-flters li", true);

            on(
                "click",
                "#portfolio-flters li",
                function (e) {
                    e.preventDefault();
                    portfolioFilters.forEach(function (el) {
                        el.classList.remove("filter-active");
                    });
                    this.classList.add("filter-active");

                    portfolioIsotope.arrange({
                        filter: this.getAttribute("data-filter"),
                    });
                    aos_init();
                },
                true
            );
        }
    });

    /**
     * Initiate portfolio lightbox
     */
    const portfolioLightbox = GLightbox({
        selector: ".portfokio-lightbox",
    });

    /**
     * Portfolio details slider
     */
    new Swiper(".portfolio-details-slider", {
        speed: 400,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            type: "bullets",
            clickable: true,
        },
    });

    /**
     * Testimonials slider
     */
    new Swiper(".testimonials-slider", {
        speed: 600,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        slidesPerView: "auto",
        pagination: {
            el: ".swiper-pagination",
            type: "bullets",
            clickable: true,
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 40,
            },

            1200: {
                slidesPerView: 3,
            },
        },
    });

    /**
     * Animation on scroll
     */
    function aos_init() {
        AOS.init({
            duration: 1000,
            easing: "ease-in-out",
            once: true,
            mirror: false,
        });
    }
    window.addEventListener("load", () => {
        aos_init();
    });
})(jQuery);
