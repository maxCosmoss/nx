var galleryShowBtn = document.querySelectorAll('.show-more');
var headerbg = document.querySelector('.header__bg');
// var modalBtn = document.querySelectorAll('.js-modal-btn');
// var modal = document.querySelector('.modal-wrap');

if(galleryShowBtn){
    galleryShowBtn.forEach(function (i) {
        i.addEventListener('click', function(){
            var data = i.dataset.show;
            document.querySelector('[data-show='+data+']').classList.remove('collapse');
            i.remove();
        })
    })

}

if(window.outerWidth >=500){
    var swiper = new Swiper(".swiper-posts", {
        slidesPerView: 1,
        spaceBetween: 10,

        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },


        breakpoints: {
            500: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            990: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
        },
    });
}


var swiper2 = new Swiper(".swiper-banquet", {
    slidesPerView: 1,
    spaceBetween: 10,
    // centeredSlides: true,
    // loop: true,

    pagination: {
        el: '.swiper-pagination',
        clickable: true
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },


    breakpoints: {
        320: {
            slidesPerView: 'auto',
            spaceBetween: 13,
        },
        500: {
            slidesPerView: 1,
        },
        770: {
            slidesPerView: 'auto',
            spaceBetween: 40,
            initialSlide: 1,

        },

    },
});




window.addEventListener('scroll', function() {
    if(window.scrollY > 550){
        headerbg.classList.add('header-fix');
    }
    else{
        headerbg.classList.remove('header-fix');
    }
})

// modalBtn.forEach(function (i){
//  i.addEventListener('click', function () {
//      var box = i.closest('.js-modal-box')
//      var title = box.querySelector('.js-modal-title');
//      var img = box.querySelector('.js-modal-img');
//      var desc = box.querySelector('.js-modal-desc');
//
//     modal.querySelector('.modal__name').innerHTML = title.innerHTML;
//     modal.querySelector('.modal__txt').innerHTML = desc.innerHTML;
//     if(img){
//         modal.querySelector('.modal__img').innerHTML = '<img src ='+img.src+'>';
//     }
//
//     modal.classList.add('show');
//
//
//  })
// })
// modal.querySelector('.modal-overlay').addEventListener('click', function () {
//     modal.classList.remove('show');
// })
// modal.querySelector('.modal-close').addEventListener('click', function () {
//     modal.classList.remove('show');
// })
