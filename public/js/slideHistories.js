
var splide = new Splide( '.splide', {
    perPage: 8,
    gap    : '2rem',
    isNavigation: false,
    rewind: false,
    pagination: false,
    breakpoints: {
      1400:{
        perPage: 7, 
        gap: '1rem',
        height: '6rem',
      },
      600: {
        perPage: 5,
        gap    : '.7rem',
        height : '5rem',
      },
      380:{
        perPage: 4,
      },
    },
  } );
  splide.mount();