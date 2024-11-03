
if(document.querySelector('.modal__img')){
    var swiper = new Swiper(".modal__img", {
        pagination: {
            el: '.modal-swiper-pagination',
            clickable: true
        },

    });
}


jQuery(document).ready(function($) {

    var modal = $('.js-modal-info');
    var modalBook = $('.js-modal-book');



    $('.modal-overlay, .modal-close, .js-modal-close').on('click', function () {
        // modal.classList.remove('show');
        $('.modal-wrap').removeClass('show');
        $('.modal__txt').addClass('hide');
        modalBook.removeClass('success');
    })

    $('.js-modal-btn').on('click', function() {
        var postId = $(this).data('post-id'); // Получаем ID поста из настроек
        var box = $(this).closest('.js-modal-box')
        var title = box.find('.js-modal-title');
        var img = box.find('.js-modal-img');
        var imgs = box.find('.js-modal-imgs');
        var imgData = img.length>0 ? [img.attr('src')] : imgs.length>0 ? imgs.html().split(',').filter(function(i){return i.trim().length>0}) : [];
        const slides = imgData.map(function(i){
            return '<div class="swiper-slide"><img src='+i+'></div>'
        })
        modal.find('.modal__name').html(title.html());
        swiper.removeAllSlides();
        swiper.appendSlide(slides);



        // var desc = box.querySelector('.js-modal-desc');

        $.ajax({
            url: ajaxurl, // URL для AJAX-запроса
            type: 'POST',
            data: {
                action: 'load_post_content', // Имя действия
                post_id: postId // ID поста
            },
            success: function(response) {
                if (response.success) {
                    // Вставляем контент в нужное место
                    // $('#post-content-container').html(response.data);


                    modal.find('.modal__txt').html(response.data);
                    modal.find('.modal__txt').removeClass('hide');





                } else {
                    console.log(response.data); // Выводим сообщение об ошибке
                }
            },
            error: function() {
                console.log('Ошибка в запросе');
            }
        });

        modal.addClass('show');

    });

    $('.js-modal-book-btn').on('click', function(){
        modal.removeClass('show');
        modalBook.addClass('show');

    });
    // $('.js-modal-success-btn').on('click', function(){
    //     modalBook.addClass('success');
    // })


    $(document).on("submit", ".js-send-form", function(event){
        var $that = $(this);
        var $formData = new FormData($that.get(0));
        $formData.append('ajax', 1);
        jQuery.ajax({
            url: $that.attr("action"),
            type: $that.attr("method"),
            contentType: false,
            processData: false,
            data: $formData,
            dataType: "text", //"json",
            success: function(data) {
                modalBook.addClass('success');
            },
        });
        event.preventDefault();
    });

});