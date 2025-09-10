<?php
include_once('./_common.php');


if (G5_IS_MOBILE) {
    include_once(G5_THEME_MSHOP_PATH.'/index.php');
    return;
}


include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
?>

<section id="idx_banner">
    <?php echo display_banner('메인', 'mainbanner.10.skin.php'); // 큰 배너 1 ?>
</section>



<div id="product_Item">
    <?php if($default['de_type3_list_use']) { ?>
    <!-- 최신상품 시작 { -->
    <div class="main" id="idx_hit">
        <div class="sale_prd">

            <div class="product-more-wrapper">
                <div class="tab-title">
                    <p class="title">최신상품</p>

                    <a class="more" href="<?php echo shop_type_url('3'); ?>"><i
                            class="fa-regular fa-square-plus"></i>더보기</a>
                </div>
                <div class="tab-menu">
                    <ul class="tabnav-new">
                        <li>
                            <a href="#all-tab">전체</a>
                        </li>
                        <li><a href="#nail-tab">네일</a></li>
                        <li><a href="#cuticle-tab">큐티클</a></li>
                        <li><a href="#gelnail-tab">젤네일</a></li>
                        <li><a href="#gelsticker-tab">젤스티커</a></li>

                    </ul>
                </div>

                <div class="tabcontent-new">
                    <div id="all-tab">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <?php
                            $list = new item_list();
                            $list->set_type(3);
                            $list->set_view('it_img', true);
                            $list->set_view('it_id', false);
                            $list->set_view('it_name', true);
                            $list->set_view('it_basic', false);
                            $list->set_view('it_cust_price', true);
                            $list->set_view('it_price', true);
                            $list->set_view('it_icon', true);
                            $list->set_view('sns', false);
                            $list->set_view('star', true);
                            echo $list->run();
                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="nail-tab">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <?php
                            $list = new item_list();
                            $list->set_type(3); // 베스트상품
                            $list->set_category('10', 1); 
                            $list->set_view('it_img', true);
                            $list->set_view('it_id', false);
                            $list->set_view('it_name', true);
                            $list->set_view('it_basic', false);
                            $list->set_view('it_cust_price', true);
                            $list->set_view('it_price', true);
                            $list->set_view('it_icon', true);
                            $list->set_view('sns', false);
                            $list->set_view('star', true);
                            echo $list->run();
                        ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="cuticle-tab">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <?php
                            $list = new item_list();
                            $list->set_type(3); // 베스트상품
                            $list->set_category('20', 1); // 
                            $list->set_view('it_img', true);
                            $list->set_view('it_id', false);
                            $list->set_view('it_name', true);
                            $list->set_view('it_basic', false);
                            $list->set_view('it_cust_price', true);
                            $list->set_view('it_price', true);
                            $list->set_view('it_icon', true);
                            $list->set_view('sns', false);

                            echo $list->run();
                        ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="gelnail-tab">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <?php
                            $list = new item_list();
                            $list->set_type(3); // 베스트상품
                            $list->set_category('30', 1); // 
                            $list->set_view('it_img', true);
                            $list->set_view('it_id', false);
                            $list->set_view('it_name', true);
                            $list->set_view('it_basic', false);
                            $list->set_view('it_cust_price', true);
                            $list->set_view('it_price', true);
                            $list->set_view('it_icon', true);
                            $list->set_view('sns', false);

                            echo $list->run();
                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="gelsticker-tab">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <?php
                            $list = new item_list();
                            $list->set_type(3); // 베스트상품
                            $list->set_category('40', 1); // 
                            $list->set_view('it_img', true);
                            $list->set_view('it_id', false);
                            $list->set_view('it_name', true);
                            $list->set_view('it_basic', false);
                            $list->set_view('it_cust_price', true);
                            $list->set_view('it_price', true);
                            $list->set_view('it_icon', true);
                            $list->set_view('sns', false);
                            echo $list->run();
                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- } 최신상품 끝 -->


    <?php } ?>
    <div class="boxtodayview_wrapper">
        <?php include(G5_SHOP_SKIN_PATH.'/boxtodayview.skin.php');  ?>

    </div>

    <?php if($default['de_type4_list_use']) { ?>
    <!-- 베스트상품 { -->
    <section class="main">
        <div class="sale_prd">
            <div class="product-more-wrapper">
                <div class="tab-title">
                    <p class="title">베스트상품</p>
                    <a class="more" href="<?php echo shop_type_url('4'); ?>"><i
                            class="fa-regular fa-square-plus"></i>더보기</a>
                </div>
                <div class="tab-menu">
                    <ul class="tabnav">
                        <li>
                            <a href="#all-tab">전체</a>
                        </li>
                        <li><a href="#nail-tab">네일</a></li>
                        <li><a href="#cuticle-tab">큐티클</a></li>
                        <li><a href="#gelnail-tab">젤네일</a></li>
                        <li><a href="#gelsticker-tab">젤스티커</a></li>

                    </ul>
                </div>

                <div class="tabcontent">
                    <div id="all-tab">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <?php
                            $list = new item_list();
                            $list->set_type(4);
                            $list->set_view('it_img', true);
                            $list->set_view('it_id', false);
                            $list->set_view('it_name', true);
                            $list->set_view('it_basic', false);
                            $list->set_view('it_cust_price', true);
                            $list->set_view('it_price', true);
                            $list->set_view('it_icon', true);
                            $list->set_view('sns', false);
                            $list->set_view('star', true);
                            echo $list->run();
                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="nail-tab">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <?php
                            $list = new item_list();
                            $list->set_type(4); // 베스트상품
                            $list->set_category('10', 1); 
                            $list->set_view('it_img', true);
                            $list->set_view('it_id', false);
                            $list->set_view('it_name', true);
                            $list->set_view('it_basic', false);
                            $list->set_view('it_cust_price', true);
                            $list->set_view('it_price', true);
                            $list->set_view('it_icon', true);
                            $list->set_view('sns', false);

                            echo $list->run();
                        ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="cuticle-tab">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <?php
                            $list = new item_list();
                            $list->set_type(4); // 베스트상품
                            $list->set_category('20', 1); // 
                            $list->set_view('it_img', true);
                            $list->set_view('it_id', false);
                            $list->set_view('it_name', true);
                            $list->set_view('it_basic', false);
                            $list->set_view('it_cust_price', true);
                            $list->set_view('it_price', true);
                            $list->set_view('it_icon', true);
                            $list->set_view('sns', false);

                            echo $list->run();
                        ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="gelnail-tab">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <?php
                            $list = new item_list();
                            $list->set_type(4); // 베스트상품
                            $list->set_category('30', 1); // 
                            $list->set_view('it_img', true);
                            $list->set_view('it_id', false);
                            $list->set_view('it_name', true);
                            $list->set_view('it_basic', false);
                            $list->set_view('it_cust_price', true);
                            $list->set_view('it_price', true);
                            $list->set_view('it_icon', true);
                            $list->set_view('sns', false);

                            echo $list->run();
                        ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="gelsticker-tab">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <?php
                            $list = new item_list();
                            $list->set_type(4); // 베스트상품
                            $list->set_category('40', 1); // 
                            $list->set_view('it_img', true);
                            $list->set_view('it_id', false);
                            $list->set_view('it_name', true);
                            $list->set_view('it_basic', false);
                            $list->set_view('it_cust_price', true);
                            $list->set_view('it_price', true);
                            $list->set_view('it_icon', true);
                            $list->set_view('sns', false);
                            echo $list->run();
                        ?>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- } 베스트상품 끝 -->

    <?php } ?>





</div>
<script>

</script>

<script>
$(function() {
    $('.tabcontent-new > div').hide();
    $('.tabnav-new a').click(function() {
        $('.tabcontent-new > div').hide().filter(this.hash).fadeIn();
        $('.tabnav-new a').removeClass('active');
        $(this).addClass('active');
        return false;
    }).filter(':eq(0)').click();
});
$(function() {
    $('.tabcontent > div').hide();
    $('.tabnav a').click(function() {
        $('.tabcontent > div').hide().filter(this.hash).fadeIn();
        $('.tabnav a').removeClass('active');
        $(this).addClass('active');
        return false;
    }).filter(':eq(0)').click();
});


// 최신 상품 이미지슬라이드
const product_image_slide = new Swiper(".swiper-container", {
    centeredSlides: true, //센터모드
    autoplay: { //자동슬라이드 
        delay: 5000, // 슬라이드 시간 설정
    },
});

// 베스트 상품 이미지 슬라이드
</script>


<script>
$("#container_inner").removeClass("container").addClass("idx-container");
</script>

<?php
include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
?>