function mostrarSplide(main, thumbnails, progreso) {
    main = new Splide('#main-slider', {
      type: 'fade',
      heightRatio: 0.5,
      pagination: false,
      cover: true,
      interval: 2000,
      pauseOnHover: true,
      autostart:true,
      // Habilita el desplazamiento automático
      autoplay: true,
      intersection: {
          inView: {
              autoplay: true,
          },
          outView: {
              autoplay: false,
          },
      pauseOnHover: true,
      },
    });


      thumbnails = new Splide('#thumbnail-slider', {
      fixedWidth: 100,
      fixedHeight: 64,
      isNavigation: true,
      arrows: false,
      gap: 10,
      focus: 'center',
      pagination: false,
      cover: true,
      perPage:8,
      breakpoints: {
        1400:{
          perPage: 7, 
          gap: '1rem',
          height: '6rem',
        },
        600: {
          perPage: 4,
          gap    : '.7rem',
          height : '5rem',
          fixedWidth: 66,
          fixedHeight: 38,
        },
        380:{
          perPage: 2,
        },
      },
      dragMinThreshold: {
        mouse: 4,
        touch: 10,
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
    }, 2000);

      

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
      progreso.style.width = String(100 * rate) + '%';
      
    }
  };