document.addEventListener('DOMContentLoaded', function () {
    var main = new Splide('#main-slider', {
      type: 'fade',
      heightRatio: 0.5,
      pagination: false,
      cover: true,
      // Habilita el desplazamiento automático
      /*autoplay: 'pause',
      intersection: {
          inView: {
              autoplay: true,
          },
          outView: {
              autoplay: false,
          },
      pauseOnHover: true,
      },*/
    });

    var thumbnails = new Splide('#thumbnail-slider', {
      fixedWidth: 100,
      fixedHeight: 64,
      isNavigation: true,
      arrows: false,
      gap: 10,
      focus: 'center',
      pagination: false,
      cover: true,
      
      dragMinThreshold: {
        mouse: 4,
        touch: 10,
      },
      breakpoints: {
        640: {
          fixedWidth: 66,
          fixedHeight: 38,
        },
      },
    });

    main.sync(thumbnails);

    thumbnails.mount();
    main.mount();
    updateProgressBar()

    var isMouseOverMainSlider = false;

    main.on('moved', function () {
      updateProgressBar();
    });

    setInterval(function () {
      if (!isMouseOverMainSlider) {
        main.go('+1'); // Cambia a la siguiente diapositiva
        updateProgressBar();
      }
    }, 4000);
      

    main.root.addEventListener('mouseenter', function () {
      isMouseOverMainSlider = true;
    });

    main.root.addEventListener('mouseleave', function () {
      isMouseOverMainSlider = false;
    });

    main.root.addEventListener('touchstart', function () {
      isMouseOverMainSlider = true;
    });

    main.root.addEventListener('touchend', function () {
      isMouseOverMainSlider = false;
    });



    function updateProgressBar() {
      var end = main.length;
      var rate = (main.index + 1) / end;
      document.querySelector('.my-slider-progress-bar').style.width = String(100 * rate) + '%';
      
    }
  });