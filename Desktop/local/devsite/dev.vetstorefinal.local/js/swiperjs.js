//Homepage slider
var swiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });


  // var swiper = new Swiper('#profileModal .swiper-container', {
  //   slidesPerView: 3,
  //   spaceBetween: 30,
  //   slidesPerGroup: 3,
  //   loop: true,
  //   loopFillGroupWithBlank: true,
  //   pagination: {
  //     el: '.swiper-pagination',
  //     clickable: true,
  //   },
  //   navigation: {
  //     nextEl: '.swiper-button-next',
  //     prevEl: '.swiper-button-prev',
  //   },
  // });

  //Healthcard Slider
  var swiper = new Swiper('.healthcard-container', {
    slidesPerView: 1,
    spaceBetween: 100,
    slidesPerGroup: 1,
    loop: false,
    loopFillGroupWithBlank: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  var swiper = new Swiper('.loginModal-container', {
    slidesPerView: 1,
    spaceBetween: 100,
    slidesPerGroup: 1,
    loop: false,
    loopFillGroupWithBlank: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
 