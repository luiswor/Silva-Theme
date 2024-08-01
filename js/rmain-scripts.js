document.addEventListener("DOMContentLoaded", function () {
  // Header class toggle on scroll
  function handleHeaderScroll() {
    const header = document.querySelector("header");
    const headerHeight = header.offsetHeight;

    window.addEventListener("scroll", function () {
      if (window.scrollY >= headerHeight) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    });
  }

  // Hide loading screen once the page has loaded
  function hideLoadingScreen() {
    window.addEventListener("load", function () {
      document.getElementById("splash").classList.remove("show");
    });
  }

  // Parallax effect for elements with .small-parallax class
  function initParallax() {
    const parallaxElements = document.querySelectorAll(".small-parallax");
    document.addEventListener("scroll", function () {
      parallaxElements.forEach((el) => {
        const speed = 0.5;
        let yPos = -window.scrollY * speed;
        yPos = Math.max(-50, Math.min(50, yPos));
        el.style.transform = `translateY(${yPos}px)`;
      });
    });
  }

  // Handle active class for sections
  function handleActiveClass() {
    const links = document.querySelectorAll('.header-brands a[href^="#"]');
    if (links.length > 0) {
      function isElementInViewport(el) {
        const rect = el.getBoundingClientRect();
        return (
          rect.top >= 0 &&
          rect.left >= 0 &&
          rect.bottom <=
            (window.innerHeight || document.documentElement.clientHeight) &&
          rect.right <=
            (window.innerWidth || document.documentElement.clientWidth)
        );
      }

      function updateActiveClass() {
        const scrollPosition = window.scrollY + 100;

        links.forEach((link) => {
          const sectionId = link.getAttribute("href").substr(1);
          const section = document.getElementById(sectionId);
          if (section && isElementInViewport(section)) {
            link.classList.add("active");
          } else {
            link.classList.remove("active");
          }
        });
      }

      window.addEventListener("scroll", updateActiveClass);
      updateActiveClass(); // Initial call
    }
  }

  // Counter up effect
  function counterUp() {
    document.querySelectorAll(".counter").forEach((counter) => {
      const target = +counter.innerText;
      let count = 0;

      function updateCounter() {
        const increment = target / 200;
        count += increment;

        if (count < target) {
          counter.innerText = Math.ceil(count);
          setTimeout(updateCounter, 10);
        } else {
          counter.innerText = target;
        }
      }

      updateCounter();
    });
  }

  // Initialize Swiper sliders
  function initSwipers() {
    new Swiper(".mySwiper", {
      loop: true,
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
      autoplay: {
        delay: 3200,
        disableOnInteraction: false,
      },
    });

    const swiper = new Swiper(".mySwiper", {
      loop: true,
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
      autoplay: {
        delay: 3200,
        disableOnInteraction: false,
      },
    });

    new Swiper(".mySwiper2", {
      loop: true,
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
      autoplay: {
        delay: 3200,
        disableOnInteraction: false,
      },
    });

    new Swiper(".swiper-modelos", {
      loop: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      autoplay: {
        delay: 3200,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
      slidesPerView: 1,
      breakpoints: {
        768: {
          slidesPerView: 2,
        },
        1200: {
          slidesPerView: 3,
        },
      },
    });
  }

  // Initialize tabs
  function initTabs() {
    const tabs = document.querySelectorAll(".brands-view_aside ul li");
    const articles = document.querySelectorAll(".brands-view_content_tab");

    tabs.forEach((tab) => {
      tab.addEventListener("click", function () {
        const targetId = this.getAttribute("data-tab");
        document
          .querySelectorAll(
            ".brands-view_aside ul li.active, .brands-view_content_tab.active"
          )
          .forEach((el) => el.classList.remove("active"));

        this.classList.add("active");
        document.getElementById(targetId).classList.add("active");
      });
    });
  }

  // Initialize scroll behavior
  function initScroll() {
    const lenis = new Lenis();

    function raf(time) {
      lenis.raf(time);
      requestAnimationFrame(raf);
    }

    requestAnimationFrame(raf);

    const anchors = document.querySelectorAll('nav a[href^="#"]');
    const offset = 100;

    const validAnchors = Array.from(anchors).filter((anchor) => {
      const targetId = anchor.getAttribute("href").substring(1);
      return targetId === "top" || document.getElementById(targetId);
    });

    const sections = validAnchors.map((anchor) => {
      const targetId = anchor.getAttribute("href").substring(1);
      return document.getElementById(targetId);
    });

    validAnchors.forEach((anchor) => {
      anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const targetId = this.getAttribute("href").substring(1);

        if (targetId === "top") {
          lenis.scrollTo(0, { duration: 1.5, easing: (t) => t * (2 - t) });
        } else {
          const targetElement = document.getElementById(targetId);
          if (targetElement) {
            const targetPosition =
              targetElement.getBoundingClientRect().top +
              window.scrollY -
              offset;
            lenis.scrollTo(targetPosition, {
              duration: 1.5,
              easing: (t) => t * (2 - t),
            });
          }
        }
      });
    });

    function updateScrollFocus() {
      const scrollPosition = window.scrollY + offset;

      validAnchors.forEach((anchor, index) => {
        const targetElement = sections[index];
        const nextTargetElement = sections[index + 1];

        const targetPosition = targetElement
          ? targetElement.getBoundingClientRect().top + window.scrollY - offset
          : 0;
        const nextTargetPosition = nextTargetElement
          ? nextTargetElement.getBoundingClientRect().top +
            window.scrollY -
            offset
          : Infinity;

        if (
          scrollPosition >= targetPosition &&
          scrollPosition < nextTargetPosition
        ) {
          anchor.classList.add("focus");
        } else {
          anchor.classList.remove("focus");
        }
      });

      const lastAnchor = validAnchors[validAnchors.length - 1];
      const lastSection = sections[sections.length - 1];
      if (
        lastSection &&
        scrollPosition >=
          lastSection.getBoundingClientRect().top + window.scrollY - offset
      ) {
        lastAnchor.classList.add("focus");
      } else if (lastAnchor) {
        lastAnchor.classList.remove("focus");
      }
    }

    window.addEventListener("scroll", updateScrollFocus);
    updateScrollFocus(); // Initial call
  }

  // Initialize all functions
  function initialize() {
    handleHeaderScroll();
    hideLoadingScreen();
    initParallax();
    handleActiveClass();
    if (document.querySelectorAll(".counter").length > 0) {
      setTimeout(counterUp, 700);
    }
    initSwipers();
    initTabs();
    initScroll();

    const navElement = document.getElementById("nav");
    const toggleButton = document.getElementById("nav-toggle");

    if (toggleButton && navElement) {
      toggleButton.addEventListener("click", function () {
        navElement.classList.toggle("active");
        toggleButton.classList.toggle("open");
      });
    }
  }

  initialize();
});
