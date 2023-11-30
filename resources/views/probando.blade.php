<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Probando</title>
  <link href="{{ asset('css/splide.min.css') }}" rel="stylesheet">
  <script src="{{ asset('js/splide.min.js') }}"></script>
  <script src="{{ asset('js/splideAutoScroll.min.js') }}"></script>
  <script src="{{ asset('js/splideIntersection.min.js') }}"></script>
  <style>
    .my-slider-progress {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 5px;
      z-index: 10;
    }

    .my-slider-progress-bar {
     background-color: #fff;
      height: 100%;
      transition: width 400ms ease;
      z-index: 10;
      width: 0;
      box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);
      border: solid 1.5px #5F788F;
    }

    #main-slider {
      margin-top: 0;
      position: relative;
    }

    #thumbnail-slider {
      margin-top: 10px;
    }

    #thumbnail-slider .splide__slide {
      border: 2px solid #ccc;
      cursor: pointer;
      overflow: hidden;
    }

    #thumbnail-slider .my-slider-progress-bar {
      height: 2px;
      background: green;
      z-index: 10;
    }

    
    #thumbnail-slider .splide__slide img {
      max-width: 100%;
      height: auto;
      
    }
  </style>
</head>
<body>

  <!-- Slider principal -->
  <div class="splide" id="main-slider">
    
    <div class="splide__track">
      <ul class="splide__list">
        @foreach($historias as $item)
          <li class="splide__slide">
              <img src="{{ $item->archivo }}" alt="" class="perfil__imagen" title="obama">
              
          </li>
          <div class="my-slider-progress">
            <div class="my-slider-progress-bar"></div>
          </div>
        @endforeach
      </ul>
    </div>
  </div>

  <!-- Slider de miniaturas abajo -->
  <div class="splide" id="thumbnail-slider">
    <div class="splide__track">
      <ul class="splide__list">
        @foreach($historias as $item)
          <li class="splide__slide">
              <img src="{{ $item->archivo }}" alt="" class="perfil__imagen" title="obama">
          </li>
        @endforeach
      </ul>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var main = new Splide('#main-slider', {
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
        document.querySelector('.my-slider-progress-bar').style.width = String(100 * rate) + '%';
        
      }
    });
  </script>
</body>
</html>
