document.addEventListener("DOMContentLoaded", function () {
  // Header class toggle on scroll
  function handleHeaderScroll() {
    let scrollpos = window.scrollY;
    const header = document.querySelector("header");
    const header_height = header.offsetHeight;

    const add_class_on_scroll = () => header.classList.add("scrolled");
    const remove_class_on_scroll = () => header.classList.remove("scrolled");

    window.addEventListener("scroll", function () {
      scrollpos = window.scrollY;

      if (scrollpos >= header_height) {
        add_class_on_scroll();
      } else {
        remove_class_on_scroll();
      }
    });
  }

  // Hide loading screen once the page has loaded
  function hideLoadingScreen() {
    window.addEventListener("load", function () {
      const loadingScreen = document.getElementById("splash");
      loadingScreen.classList.remove("show");
    });
  }

  // Parallax effect for elements with .small-parallax class
  function initParallax() {
    const parallaxElements = document.querySelectorAll(".small-parallax");
    if (parallaxElements.length > 0) {
      document.addEventListener("scroll", function () {
        parallaxElements.forEach(function (el) {
          const speed = 0.5; // Adjust the parallax speed
          let yPos = -window.scrollY * speed;
          yPos = Math.max(-50, Math.min(50, yPos)); // Limit yPos between -50 and 50
          el.style.transform = "translateY(" + yPos + "px)";
        });
      });
    }
  }

  // Obtener todos los enlaces que quieres controlar
  var links = document.querySelectorAll('.header-brands a[href^="#"]');

  // Verificar si hay enlaces antes de continuar
  if (links.length > 0) {
    // Función para verificar si un elemento está visible en el viewport
    function isElementInViewport(el) {
      var rect = el.getBoundingClientRect();
      return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <=
          (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <=
          (window.innerWidth || document.documentElement.clientWidth)
      );
    }

    // Función para manejar el cambio de clase activa
    function handleActiveClass() {
      links.forEach(function (link) {
        var sectionId = link.getAttribute("href").substr(1); // Obtener el ID de la sección
        var section = document.getElementById(sectionId); // Obtener la sección correspondiente

        if (section && isElementInViewport(section)) {
          link.classList.add("active"); // Agregar la clase activa al enlace si la sección está visible
        } else {
          link.classList.remove("active"); // Quitar la clase activa si la sección no está visible
        }
      });
    }
  }

  // Función para realizar el efecto de counterup
  function counterUp() {
    var counters = document.querySelectorAll(".counter");

    counters.forEach(function (counter) {
      var target = +counter.innerText; // Obtener el número objetivo del texto
      var count = 0; // Inicializar el contador en 0

      var updateCounter = function () {
        var increment = target / 200; // Velocidad del incremento, ajustable según sea necesario

        count = count + increment;

        if (count < target) {
          counter.innerText = Math.ceil(count); // Redondear hacia arriba para mostrar números enteros
          setTimeout(updateCounter, 10); // Llamar recursivamente a la función con un pequeño retraso
        } else {
          counter.innerText = target; // Asegurarse de que el contador muestre el número final exacto
        }
      };

      updateCounter(); // Llamar a la función para iniciar el contador
    });
  }

  // Initialize all functions
  function initialize() {
    // initLenis();
    handleHeaderScroll();
    hideLoadingScreen();
    initParallax();

    // Llamar a la función inicialmente y en el evento scroll
    // handleActiveClass();
    // window.addEventListener("scroll", handleActiveClass);

    // Verificar si hay contadores en la página antes de ejecutar la función
    var countersExist = document.querySelectorAll(".counter").length > 0;
    if (countersExist) {
      setTimeout(function () {
        counterUp();
      }, 700);
    }
  }

  initialize();

  var navElement = document.getElementById("nav");
  var toggleButton = document.getElementById("nav-toggle");

  if (toggleButton && navElement) {
    toggleButton.addEventListener("click", function () {
      navElement.classList.toggle("active");
      toggleButton.classList.toggle("open");
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  // Obtener todos los elementos con la propiedad data-tabs
  var tabElements = document.querySelectorAll("[data-tabs]");

  // Verificar si hay elementos con data-tabs antes de continuar
  if (tabElements.length > 0) {
    // Función para manejar la activación de tabs
    function handleTabClick(event) {
      var targetId = this.getAttribute("data-tabs"); // Obtener el ID objetivo desde data-tabs
      var targetElement = document.getElementById(targetId); // Obtener el elemento objetivo

      // Si existe el elemento objetivo
      if (targetElement) {
        // Quitar la clase active de todos los elementos
        document
          .querySelectorAll(".brands-view_content_tab .active")
          .forEach(function (el) {
            el.classList.remove("active");
          });

        // Agregar la clase active al elemento clicado
        this.classList.add("active");

        // Agregar la clase active al elemento objetivo
        targetElement.classList.add("active");
      }
    }

    // Añadir el evento click a cada elemento con data-tabs
    tabElements.forEach(function (tab) {
      tab.addEventListener("click", handleTabClick);
    });
  }
});

//SWIPER
document.addEventListener("DOMContentLoaded", function () {
  // // Obtén todos los elementos .swiper-slider y .swiper-thumbnail en el DOM
  // const swiperSliders = document.querySelectorAll(".swiper-slider");
  // const swiperThumbnails = document.querySelectorAll(".swiper-thumbnails");

  // // Verifica si hay al menos un .swiper-slider y un .swiper-thumbnail en el DOM
  // if (swiperSliders.length > 0 && swiperThumbnails.length > 0) {
  //   // Itera sobre cada elemento .swiper-slider y .swiper-thumbnail
  //   swiperSliders.forEach(function (swiperSlider, index) {
  //     // Crear una instancia de Swiper para cada .swiper-slider
  //     const swiper = new Swiper(swiperSlider, {
  //       spaceBetween: 10,
  //       slidesPerView: 4,
  //       freeMode: true,
  //       watchSlidesProgress: true,
  //     });

  //     // Verifica si existe un elemento .swiper-thumbnail correspondiente
  //     if (swiperThumbnails[index]) {
  //       // Crear una instancia de Swiper para cada .swiper-thumbnail
  //       const swiper2 = new Swiper(swiperThumbnails[index], {
  //         spaceBetween: 10,
  //         navigation: {
  //           nextEl: ".swiper-button-next",
  //           prevEl: ".swiper-button-prev",
  //         },
  //         thumbs: {
  //           swiper: swiper,
  //         },
  //       });
  //     }
  //   });
  // }

  var swiper = new Swiper(".mySwiper", {
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
  var swiper2 = new Swiper(".mySwiper2", {
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

  var swipermodelos = new Swiper(".swiper-modelos", {
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
});

//TABS
document.addEventListener("DOMContentLoaded", function () {
  const tabs = document.querySelectorAll(".brands-view_aside ul li");
  const articles = document.querySelectorAll(".brands-view_content_tab");

  tabs.forEach((tab) => {
    tab.addEventListener("click", function () {
      const targetId = this.getAttribute("data-tab");

      // Eliminar la clase .active de todos los <li> y <article>
      tabs.forEach((t) => t.classList.remove("active"));
      articles.forEach((article) => article.classList.remove("active"));

      // Agregar la clase .active al <li> clicado y al <article> correspondiente
      this.classList.add("active");
      document.getElementById(targetId).classList.add("active");
    });
  });
});

//SCROLL2
document.addEventListener("DOMContentLoaded", function () {
  const lenis = new Lenis();

  function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
  }

  requestAnimationFrame(raf);

  const anchors = document.querySelectorAll('nav a[href^="#"]');
  const offset = 100;

  // Filter out any anchors that don't have corresponding target elements
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
            targetElement.getBoundingClientRect().top + window.scrollY - offset;
          lenis.scrollTo(targetPosition, {
            duration: 1.5,
            easing: (t) => t * (2 - t),
          });
        }
      }
    });
  });

  function onScroll() {
    const scrollPosition = window.scrollY + offset;

    let isFocusSet = false;

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
        isFocusSet = true;
      } else {
        anchor.classList.remove("focus");
      }
    });

    // Apply .focus to the last anchor if the scroll position is beyond its starting position
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
    applyFocusToLastAnchor();
  }

  function applyFocusToLastAnchor() {
    const lastAnchor = validAnchors[validAnchors.length - 1];
    const lastSection = sections[sections.length - 1];
    const scrollPosition = window.scrollY + offset;

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

  window.addEventListener("scroll", onScroll);
  onScroll(); // Initial call to set the correct focus class on load
});
