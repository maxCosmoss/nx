var headerBtnOpen = document.querySelector('.header__btn__open');
var headerBtnClose = document.querySelector('.header__btn__close');
var header = document.querySelector('.header');
var headerNav = document.querySelector('.header__nav');

headerBtnOpen.addEventListener('click', function () {
    header.classList.add('menu-open');
})

headerBtnClose.addEventListener('click', function () {
    header.classList.remove('menu-open');
})

headerNav.addEventListener('click', function () {
    header.classList.remove('menu-open');

})