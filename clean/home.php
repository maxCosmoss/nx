<!-- /index.php -->
<?php
/**
 * Template Name: Главная
 */

get_header();
$banquetPhotos = [];
?>

<main>

    <div id="post-content-container"></div>


<div class="block block-carousel collapse" data-show="events">
    <div class="container">
        <div class="block__title">
            <div class="block__title_1">
                События
            </div>
            <div class="block__title_2">
                События
            </div>

        </div>

<div class="swiper swiper-posts">
    <div class="carousel swiper-wrapper">
        <?php
        $args = array(
            'cat' => '2',
            'post_type' => 'post',
            'posts_per_page' => 1000
        );
        query_posts($args);
        ?>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="post swiper-slide js-modal-box">
                <img class="post__img js-modal-img" src="<?= get_the_post_thumbnail_url(); ?>" alt="">
                <div class="post__txt">
                    <div class="post__date">
                        <?php the_field('post_date'); ?>

                    </div>
                    <div class="post__title js-modal-title">
                        <?php the_title(); ?>
                    </div>

                    <div class="post__excerpt"><?php the_excerpt(); ?></div>
                    <button class="post__btn js-modal-btn" type="button" data-post-id="<?=get_the_ID();?>">ПОДРОБНЕЕ</button>
                </div>

            </div>

        <?php endwhile;

            wp_reset_postdata();
            wp_reset_query();


        endif; ?>

    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

</div>
        <button class="show-more" data-show="events">ПОКАЗАТЬ ЕЩЕ</button>


    </div>
</div>


    <div class="block block-halls">
        <?php
        $args = array(
            'cat' => '6',
            'post_type' => 'post',
            'posts_per_page' => 20
        );
        query_posts($args);
        ?>

        <div class="container">
            <div class="block__title">
                <div class="block__title_1">
                    Наши залы
                </div>
                <div class="block__title_2">
                    ЗАЛЫ
                </div>
            </div>

            <div class="halls">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php
                    $hallPhotos = get_field('hall-photos');

                    $postId = get_the_ID();
                    if($postId == 157){
                        $banquetPhotos = $hallPhotos;
                    }
                    ?>


                        <div class="hall js-modal-box">

                            <img class="hall__img" src="<?= get_the_post_thumbnail_url(); ?>" alt=" <?php the_title(); ?>">
                            <div class="hall__name js-modal-title">
                                <?php the_title(); ?>

                            </div>
                            <button class="hall__btn js-modal-btn" type="button" data-post-id="<?=$postId;?>">
                                ПОДРОБНЕЕ
                            </button>

                            <div class="hall__images js-modal-imgs" hidden>
                                <?php foreach ($hallPhotos as $img): ?>
                                    <?=wp_get_attachment_image_src($img["hall-photo"], "full" )[0];?>,
                                <?php endforeach; ?>
                            </div>
                        </div>



                <?php endwhile;

                wp_reset_postdata();
                wp_reset_query();


                endif; ?>
            </div>

        </div>
    </div>

    <div class="block block-menu" id="menu">
        <div class="container">
            <div class="block__title block__title_white" >
                <div class="block__title_1">
                    Меню ресторана
                </div>
                <div class="block__title_2">
                    МЕНЮ
                </div>
            </div>

            <div class="menu-box">
                <div class="menu-box__txt">
                    <?= the_field('menu-desc');?>

                </div>

                <?php
                $menu = get_field('menu-fields');
                if ($menu): ?>
                <?php foreach ($menu as $field): ?>
                        <div class="menu-box__item">
                            <img src="<?=$field["menu-img"];?>" alt="<?=$field["menu-name"];?>">
                            <span class="menu-box__item__name">
                            <?=$field["menu-name"];?>
                            </span>
                                <a class="menu-box__item__btn" href="<?=$field["menu-file"];?>" target="_blank">
                                    ОТКРЫТЬ
                                </a>


                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>


            </div>




        </div>
    </div>
    <div class="block block-cook">
        <div class="container">
            <div class="block__title">
                <div class="block__title_1">
                    Шеф повар
                </div>
                <div class="block__title_2">
                    ШЕФ
                </div>
            </div>

            <div class="cook">
                <div class="cook__txt">
                    <?= the_field('cook-txt');?>

                    <div class="cook__txt__bottom">
                        <?= the_field('cook-bottom-txt');?>

                    </div>
                </div>
                <div class="cook__img">
                    <img src="<?= the_field('cook-img');?>" alt="">
                </div>
            </div>

        </div>
    </div>
    <div class="block block-banquet" id="banquets" >
        <div class="container">
            <div class="block__title" >
                <div class="block__title_1">
                    Банкетный зал
                </div>
                <div class="block__title_2">
                    БАНКЕТЫ
                </div>
            </div>
        </div>

                <div class="swiper swiper-banquet container">
                    <div class="swiper-wrapper">
                        <?php
                        $size = array('621', '413');
                        ?>
                        <?php foreach ($banquetPhotos as $img): ?>
                            <div class="swiper-slide">

                                <a data-fslightbox="banquet" href="<?=wp_get_attachment_image_src($img["hall-photo"], "full" )[0]?>">
                                    <?php echo wp_get_attachment_image($img["hall-photo"], $size, "", array( "class" => "banquet__img" ) );  ?>

                                </a>
                            </div>
                        <?php endforeach; ?>

                    </div>

                    <div class="swiper-pagination"></div>

                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>


                </div>

        <div class="container banquet-info">
            <div class="banquet-info__item">
                <div class="banquet-info__item__row">
                <span>
                    Вместимость:
                </span>
                <span>
                    96 человек
                </span>
                </div>
                <div class="banquet-info__item__row">
                <span>
                    Залы и места:
                </span>
                    <span>
                    Основной зал - 96 чел.<br>
3 VIP-комнаты на 12 чел.
                </span>
                </div>
            </div>

            <div class="banquet-info__item">
                <div class="banquet-info__item__row">
                <span>
                    Банкет на персону:
                </span>
                    <span>
                   от 3500 руб.
                </span>
                </div>
                <div class="banquet-info__item__row">
                <span>
                    Напитки:
                </span>
                    <span>
                    по специальной цене
                </span>
                </div>
            </div>

            <div class="banquet-info__item">
                <div class="banquet-info__item__row">
                <span>
                    Оборудование:
                </span>
                    <span>
                  звуковое и световое оборудование
                </span>
                </div>
            </div>
        </div>


        </div>

    <div class="block block-catering" id="catering">
        <div class="container" >
            <div class="block__title block__title_white" >
                <div class="block__title_1">
                    Выездные фуршеты
                </div>
                <div class="block__title_2">
                    КЕЙТЕРИНГ
                </div>
            </div>
            <div class="catering-images">
                <div class="catering-images__left">
                    <img src="/wp-content/themes/clean/img/catering/1.png"  alt="КЕЙТЕРИНГ">
                </div>
<!--                <div class="catering-images__right">-->
                    <div class="catering-images__item">
                        <img src="/wp-content/themes/clean/img/catering/2.png"  alt="КЕЙТЕРИНГ">
                    </div>

                        <div class="catering-images__item">
                            <img src="/wp-content/themes/clean/img/catering/3.png"  alt="КЕЙТЕРИНГ">
                        </div>
                        <div class="catering-images__item">
                            <img src="/wp-content/themes/clean/img/catering/4.png"  alt="КЕЙТЕРИНГ">
                        </div>


<!--                </div>-->



            </div>
            <div class="catering-bottom">
                <div class="catering-bottom__txt">
                    Кейтеринг – это комплексная услуга по организации питания, аренде оборудования, работе официантов, поваров на мероприятии в любом месте. Если очень просто, то кейтеринг – это выездной ресторан, который может накормить ваших гостей.
                </div>
                <button class="catering-bottom__btn js-modal-book-btn" type="button">
                    ОСТАВИТЬ ЗАЯВКУ
                </button>
            </div>




            </div>
    </div>

    <div class="block block-carousel collapse" data-show="stock">
        <div class="container">
            <div class="block__title">
                <div class="block__title_1">
                    Акции
                </div>
                <div class="block__title_2">
                    Акции
                </div>

            </div>

            <div class="swiper swiper-posts">
                <div class="carousel swiper-wrapper">
                    <?php
                    $args = array(
                        'cat' => '3',
                        'post_type' => 'post',
                        'posts_per_page' => 1000
                    );
                    query_posts($args);
                    ?>

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="post swiper-slide js-modal-box">
                            <img class="post__img js-modal-img" src="<?= get_the_post_thumbnail_url(); ?>" alt="">
                            <div class="post__txt">
                                <div class="post__date">
                                    <?php the_field('post_date'); ?>

                                </div>
                                <div class="post__title js-modal-title">
                                    <?php the_title(); ?>
                                </div>

                                <div class="post__excerpt"><?php the_excerpt(); ?></div>
                                <button class="post__btn js-modal-btn" type="button" data-post-id="<?=get_the_ID();?>">ПОДРОБНЕЕ</button>
                            </div>

                        </div>

                    <?php endwhile;

                        wp_reset_postdata();
                        wp_reset_query();


                    endif; ?>

                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

            </div>
            <button class="show-more" data-show="stock">ПОКАЗАТЬ ЕЩЕ</button>


        </div>
    </div>

    <div class="block block-rest">
        <div class="container">
            <div class="block__title  block__title_white">
                <div class="block__title_1">
                    Чистые пруды
                </div>
                <div class="block__title_2">
                    <span class="hide-sm">
                        РЕСТОРАННЫЙ
                    </span>
                     КОМПЛЕКС
                </div>
            </div>

            <div class="gallery">

                <?php
                $rest = get_field("rest");
                $iter = 0;
                $bigImgs = [1, 2, 6, 7, 11, 12, 16, 17, 21, 22];

                if ($rest): ?>
                    <?php foreach ($rest as $field): ?>
                        <?php
                    $iter++;
                        $size = in_array($iter, $bigImgs) ? array('639', '380') : array('426', '322');
                        ?>
                        <a class="gallery__item" data-fslightbox="rest" href="<?=wp_get_attachment_image_src( $field["rest-elem-img"], "full" )[0]  ?>
">
                            <?php echo wp_get_attachment_image( $field["rest-elem-img"], $size, "", array( "class" => "gallery__img" ) );  ?>
                            <span class="gallery__name">
                            <?=$field["rest-name"];?>
                            </span>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>


            </div>





        </div>
    </div>

    <div class="block block-carousel collapse" data-show="smi">
        <div class="container">
            <div class="block__title">
                <div class="block__title_1">
                    Что о нас пишут
                </div>
                <div class="block__title_2">
                    СМИ О НАС
                </div>

            </div>

            <div class="swiper swiper-posts">
                <div class="carousel swiper-wrapper" >
                    <?php
                    $args = array(
                        'cat' => '4',
                        'post_type' => 'post',
                        'posts_per_page' => 1000
                    );
                    query_posts($args);
                    ?>

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="post swiper-slide js-modal-box">
                            <img class="post__img js-modal-img" src="<?= get_the_post_thumbnail_url(); ?>" alt="">
                            <div class="post__txt">
                                <div class="post__date">
                                    <?php the_field('post_date'); ?>

                                </div>
                                <div class="post__title js-modal-title">
                                    <?php the_title(); ?>
                                </div>

                                <div class="post__excerpt"><?php the_excerpt(); ?></div>
                                <button class="post__btn js-modal-btn" type="button" data-post-id="<?=get_the_ID();?>">ПОДРОБНЕЕ</button>
                            </div>

                        </div>

                    <?php endwhile;

                        wp_reset_postdata();
                        wp_reset_query();


                    endif; ?>

                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

            </div>
            <button class="show-more" data-show="smi">ПОКАЗАТЬ ЕЩЕ</button>

        </div>
    </div>

    <div class="block block-stars">
        <div class="container">
            <div class="block__title ">
                <div class="block__title_1">
                    Звездные гости
                </div>
                <div class="block__title_2">
                    ЗВЕЗДЫ
                </div>
            </div>

            <div class="gallery collapse" data-show="gallery">

                <?php
//                $rest = get_field("star");
                $iter = 0;
                $bigImgs = [1, 2, 6, 7, 11, 12, 16, 17, 21, 22];

                ?>
                <?php for ($i = 8962; $i<=8982; $i++): ?>
                <?php $iter++;
                    $size = in_array($iter, $bigImgs) ? array('639', '380') : array('426', '322');

                    ?>
                    <a style="width:<?=$size[0].'px'?>; height:<?=$size[1].'px'?>; border: #fff solid 2px" class="gallery__item" data-fslightbox="stars" href="/wp-content/themes/clean/img/stars/full/IMG_<?=$i?>.PNG">
<!--                        --><?php //echo wp_get_attachment_image( $field["star-img"], $size, "", array( "class" => "gallery__img" ) );  ?>
                        <img class="gallery__img" src="/wp-content/themes/clean/img/stars/thumb/IMG_<?=$i?>.png" alt="">
                    </a>

                <?php endfor;?>


            </div>
            <button class="show-more" data-show="gallery">ПОКАЗАТЬ ЕЩЕ</button>

        </div>
    </div>


</main>
<div class="contacts">

<div class="container contacts__box">
    <div class="contacts__left">
        <div class="block__title">
            <div class="block__title_1">
                Наши контакты
            </div>
            <div class="block__title_2">
                КОНТАКТЫ
            </div>
        </div>

        <a href="tel:<?= transformPhoneNumber(get_field('tel_rest', 'option')); ?>" class="contacts__info__tel">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.0091 15.4003L18.9186 15.1276C18.7042 14.4905 18.0017 13.8261 17.3563 13.6511L14.9676 12.9985C14.3198 12.8223 13.3958 13.0593 12.9218 13.5332L12.0573 14.3977C8.91549 13.5487 6.4518 11.085 5.60397 7.94373L6.46853 7.07917C6.94247 6.60523 7.17941 5.68241 7.00317 5.03463L6.35181 2.64475C6.17558 1.99816 5.50993 1.29563 4.87408 1.08365L4.6014 0.99197C3.96433 0.779994 3.05577 0.99437 2.58186 1.46828L1.28867 2.76265C1.05764 2.99246 0.909986 3.64976 0.909986 3.65216C0.864755 7.75793 2.47467 11.7136 5.37893 14.6179C8.27605 17.5151 12.2169 19.1226 16.3108 19.0881C16.3322 19.0881 17.0086 18.9428 17.2396 18.713L18.5328 17.4198C19.0067 16.9459 19.221 16.0374 19.0091 15.4003Z" stroke="currentColor" stroke-width="1.5"/>
            </svg>
            <span><?php the_field('tel_rest', 'option'); ?></span>
            Ресторан “Чистые пруды”
        </a>

        <a href="tel:<?= transformPhoneNumber(get_field('tel_otel', 'option')); ?>" class="contacts__info__tel">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.0091 15.4003L18.9186 15.1276C18.7042 14.4905 18.0017 13.8261 17.3563 13.6511L14.9676 12.9985C14.3198 12.8223 13.3958 13.0593 12.9218 13.5332L12.0573 14.3977C8.91549 13.5487 6.4518 11.085 5.60397 7.94373L6.46853 7.07917C6.94247 6.60523 7.17941 5.68241 7.00317 5.03463L6.35181 2.64475C6.17558 1.99816 5.50993 1.29563 4.87408 1.08365L4.6014 0.99197C3.96433 0.779994 3.05577 0.99437 2.58186 1.46828L1.28867 2.76265C1.05764 2.99246 0.909986 3.64976 0.909986 3.65216C0.864755 7.75793 2.47467 11.7136 5.37893 14.6179C8.27605 17.5151 12.2169 19.1226 16.3108 19.0881C16.3322 19.0881 17.0086 18.9428 17.2396 18.713L18.5328 17.4198C19.0067 16.9459 19.221 16.0374 19.0091 15.4003Z" stroke="currentColor" stroke-width="1.5"/>
            </svg>
            <span><?php the_field('tel_otel', 'option'); ?></span>
            Отель Дива

        </a>

        <a href="mailto:<?php the_field('mail_rest', 'option'); ?>" class="contacts__info__tel">
            <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-top:-5px;">
                <path d="M14 0.75H2C0.8955 0.75 0 1.6455 0 2.75V10.75C0 11.8545 0.8955 12.75 2 12.75H14C15.1045 12.75 16 11.8545 16 10.75V2.75C16 1.6455 15.1045 0.75 14 0.75ZM10.708 6.08691L14.9414 2.45897C14.9707 2.55272 15 2.64647 15 2.75V10.75C15 10.8193 14.9736 10.8809 14.96 10.9463L10.708 6.08691ZM14 1.75C14.0664 1.75 14.125 1.77541 14.1875 1.78809L8 7.09181L1.8125 1.78809C1.875 1.77541 1.93359 1.75 2 1.75H14ZM1.03956 10.9453C1.02587 10.8799 1 10.8193 1 10.75V2.75C1 2.64647 1.02978 2.55272 1.05909 2.45897L5.29103 6.08594L1.03956 10.9453ZM2 11.75C1.89894 11.75 1.80712 11.7207 1.71484 11.6924L6.05078 6.73728L7.67481 8.12887C7.76806 8.20997 7.88428 8.25 8 8.25C8.11572 8.25 8.23194 8.20997 8.32519 8.12891L9.94922 6.73731L14.2852 11.6924C14.1934 11.7207 14.1016 11.75 14 11.75H2Z" fill="currentColor" />
            </svg>
            <span><?php the_field('mail_rest', 'option'); ?></span>


        </a>

        <span class="contacts__info__addr">
                    <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-top: -5px;">
<path d="M8.47374 20C8.37237 20.0006 8.27187 19.9811 8.17803 19.9428C8.08418 19.9045 7.99882 19.848 7.92685 19.7766L2.48105 14.3847C1.6948 13.6037 1.07082 12.6748 0.645015 11.6516C0.219212 10.6284 0 9.5311 0 8.42285C0 7.31459 0.219212 6.21728 0.645015 5.19408C1.07082 4.17089 1.6948 3.24203 2.48105 2.46097C4.07707 0.88421 6.23021 0 8.47374 0C10.7173 0 12.8704 0.88421 14.4664 2.46097C15.2527 3.24203 15.8767 4.17089 16.3025 5.19408C16.7283 6.21728 16.9475 7.31459 16.9475 8.42285C16.9475 9.5311 16.7283 10.6284 16.3025 11.6516C15.8767 12.6748 15.2527 13.6037 14.4664 14.3847L9.02063 19.7766C8.94866 19.848 8.8633 19.9045 8.76945 19.9428C8.6756 19.9811 8.57511 20.0006 8.47374 20ZM8.47374 1.51354C6.63531 1.50902 4.87037 2.23495 3.56713 3.53164C2.92528 4.16949 2.4159 4.92797 2.0683 5.76343C1.72071 6.5989 1.54177 7.49485 1.54177 8.39974C1.54177 9.30462 1.72071 10.2006 2.0683 11.036C2.4159 11.8715 2.92528 12.63 3.56713 13.2678L8.47374 18.1436L13.3804 13.2678C14.0222 12.63 14.5316 11.8715 14.8792 11.036C15.2268 10.2006 15.4057 9.30462 15.4057 8.39974C15.4057 7.49485 15.2268 6.5989 14.8792 5.76343C14.5316 4.92797 14.0222 4.16949 13.3804 3.53164C12.0771 2.23495 10.3122 1.50902 8.47374 1.51354Z" fill="currentColor"/>
<path d="M8.47378 12.2964C7.71206 12.2964 6.96744 12.0706 6.33409 11.6474C5.70074 11.2242 5.2071 10.6227 4.9156 9.91894C4.62411 9.2152 4.54784 8.44082 4.69644 7.69374C4.84505 6.94665 5.21185 6.2604 5.75047 5.72178C6.28909 5.18316 6.97533 4.81636 7.72242 4.66775C8.46951 4.51915 9.24389 4.59542 9.94763 4.88692C10.6514 5.17842 11.2529 5.67205 11.6761 6.3054C12.0992 6.93875 12.3251 7.68337 12.3251 8.4451C12.3251 9.46654 11.9194 10.4461 11.1971 11.1684C10.4748 11.8907 9.49522 12.2964 8.47378 12.2964ZM8.47378 6.13429C8.01675 6.13429 7.56998 6.26982 7.18997 6.52373C6.80996 6.77765 6.51377 7.13854 6.33888 7.56079C6.16398 7.98303 6.11821 8.44766 6.20738 8.89591C6.29654 9.34416 6.51662 9.75591 6.8398 10.0791C7.16297 10.4023 7.57471 10.6223 8.02297 10.7115C8.47122 10.8007 8.93584 10.7549 9.35809 10.58C9.78033 10.4051 10.1412 10.1089 10.3951 9.72891C10.6491 9.3489 10.7846 8.90213 10.7846 8.4451C10.7846 7.83223 10.5411 7.24447 10.1078 6.81111C9.67441 6.37775 9.08665 6.13429 8.47378 6.13429Z" fill="currentColor"/>
</svg>
                    Киевская ул., 80, Симферополь
                </span>

    </div>
    <div class="contacts__right">
        <div id="home-map"></div>
    </div>

</div>
</div>

<div class="modal-wrap js-modal-info">
    <div class="modal-overlay"></div>
    <div class="modal">
        <div class="modal__left">
            <div class="modal__img swiper">
                    <div class="swiper-wrapper">
                    </div>
            </div>
            <div class="swiper-pagination modal-swiper-pagination"></div>

        </div>
        <div class="modal__right">
            <div class="modal__name">

            </div>
            <div class="modal__txt hide">

            </div>
            <button class="modal__btn js-modal-book-btn">
                Забронировать
            </button>
        </div>
        <div class="modal-close">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.50156 7.16102L13.4119 2.25072L12.0725 0.911387L7.16222 5.82168L2.25084 0.910297L0.9115 2.24963L5.82289 7.16102L0.911386 12.0725L2.25072 13.4119L7.16222 8.50036L12.0726 13.4108L13.412 12.0714L8.50156 7.16102Z" fill="currentColor" />
            </svg>
        </div>
    </div>
</div>

<div class="modal-wrap js-modal-book">
    <div class="modal-overlay"></div>
    <div class="modal modal-book">
        <div class="modal__name">
            Забронировать столик
        </div>
        <form class="js-send-form" action="/wp-content/themes/clean/send.php" method="post">
            <input name="date" type="text" placeholder="Желаемая дата и время">
            <input name="name" type="text" placeholder="Имя">
            <input name="phone" type="text" placeholder="Телефон" required>
            <textarea name="message" placeholder="Сообщение"></textarea>
            <button class="modal__btn js-modal-success-btn" type="submit">
                Забронировать
            </button>
        </form>


        <div class="modal-close">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.50156 7.16102L13.4119 2.25072L12.0725 0.911387L7.16222 5.82168L2.25084 0.910297L0.9115 2.24963L5.82289 7.16102L0.911386 12.0725L2.25072 13.4119L7.16222 8.50036L12.0726 13.4108L13.412 12.0714L8.50156 7.16102Z" fill="currentColor" />
            </svg>
        </div>
    </div>
    <div class="modal modal-success">
        <div class="modal__name">
            Спасибо!
        </div>
        <div class="modal__message">
            Мы скоро свяжемся с Вами
        </div>
        <button class="modal__btn js-modal-close">
            На главную
        </button>

        <div class="modal-close">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.50156 7.16102L13.4119 2.25072L12.0725 0.911387L7.16222 5.82168L2.25084 0.910297L0.9115 2.24963L5.82289 7.16102L0.911386 12.0725L2.25072 13.4119L7.16222 8.50036L12.0726 13.4108L13.412 12.0714L8.50156 7.16102Z" fill="currentColor" />
            </svg>
        </div>
    </div>
</div>


<script src="/wp-content/themes/clean/modules/swiper/script.js"></script>
<script src="/wp-content/themes/clean/modules/fslightbox/fslightbox.js"></script>
<script src="/wp-content/themes/clean/script/home.js"></script>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
</script>
<script>
    ymaps.ready(init);
    function init() {
        var myMap = new ymaps.Map('home-map', {
                center: [44.962806, 34.101530],
                zoom: 16,
                controls: ['zoomControl']
            }, {
                searchControlProvider: 'yandex#search'
            }),
            myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                hintContent: 'Чистые пруды',
                balloonContent: 'Киевская ул., 80, Симферополь'
            }, {
                iconLayout: 'default#image',
                iconImageHref: '/wp-content/themes/clean/img/map-icon.png',
                iconImageSize: [29, 42],
                iconImageOffset: [-20, -60]
            });
        myMap.geoObjects.add(myPlacemark);
        myMap.behaviors.disable('scrollZoom');
    };
</script>

<?php
get_footer();
