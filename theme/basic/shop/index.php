<?php
include_once('./_common.php');

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MSHOP_PATH.'/index.php');
    return;
}

if (!defined('_INDEX_')) define('_INDEX_', true);

include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
?>

<section id="idx_banner">
    <?php echo display_banner('메인', 'mainbanner.10.skin.php'); // 큰 배너 1 ?>
</section>



<div id="product_Item">

    <?php if($default['de_type4_list_use']) { ?>
    <!-- 인기상품 시작 { -->
    <section class="main">
        <div class="sale_prd">
            <h2><a href="<?php echo shop_type_url('4'); ?>">인기상품</a></h2>
            <ul class="bxslider">
                <?php
		$list = new item_list();
		$list->set_type(4);
		$list->set_view('it_img', true);
		$list->set_view('it_id', false);
		$list->set_view('it_name', true);
		$list->set_view('it_basic', false);
		$list->set_view('it_cust_price', false);
		$list->set_view('it_price', true);
		$list->set_view('sns', false);
		$list->set_view('star', true);
		echo $list->run();
		?>
            </ul>

        </div>
    </section>
    <!-- } 인기상품 끝 -->
    <?php } ?>

    <?php if($default['de_type5_list_use']) { ?>
    <!-- 인기상품 시작 { -->
    <section class="main">
        <div class="sale_prd">
            <h2><a href="<?php echo shop_type_url('5'); ?>">할인상품</a></h2>
            <ul class="bxslider">
                <?php
		$list = new item_list();
		$list->set_type(5);
		$list->set_view('it_img', true);
		$list->set_view('it_id', false);
		$list->set_view('it_name', true);
		$list->set_view('it_basic', false);
		$list->set_view('it_cust_price', false);
		$list->set_view('it_price', true);
		$list->set_view('it_icon', true);
		$list->set_view('sns', false);
		$list->set_view('star', true);
		echo $list->run();
		?>
            </ul>
        </div>
    </section>
    <!-- } 인기상품 끝 -->
    <?php } ?>




    <div class="tab">
        <ul class="tabnav">
            <li><a href="#tab01">히트상품</a></li>
            <li><a href="#tab02">추천상품</a></li>
            <li><a href="#tab03">최신상품</a></li>


        </ul>
        <div class="tabcontent">
            <div id="tab01">
                <?php if($default['de_type1_list_use']) { ?>
                <!-- 인기상품 시작 { -->
                <section class="main">
                    <div class="sale_prd">
                        <?php
		$list = new item_list();
		$list->set_type(1);
		$list->set_view('it_img', true);
		$list->set_view('it_id', false);
		$list->set_view('it_name', true);
		$list->set_view('it_basic', false);
		$list->set_view('it_cust_price', false);
		$list->set_view('it_price', true);
		$list->set_view('it_icon', true);
		$list->set_view('sns', false);
		$list->set_view('star', true);
		echo $list->run();
		?>
                    </div>
                </section>
                <!-- } 인기상품 끝 -->
                <?php } ?>

            </div>
            <div id="tab02">
                <?php if($default['de_type2_list_use']) { ?>
                <!-- 인기상품 시작 { -->
                <section class="main">
                    <div class="sale_prd">
                        <?php
		$list = new item_list();
		$list->set_type(2);
		$list->set_view('it_img', true);
		$list->set_view('it_id', false);
		$list->set_view('it_name', true);
		$list->set_view('it_basic', false);

		$list->set_view('it_cust_price', false);
		$list->set_view('it_price', true);
		$list->set_view('it_icon', true);
		$list->set_view('sns', false);
		$list->set_view('star', true);
		echo $list->run();
		?>
                    </div>
                </section>
                <!-- } 인기상품 끝 -->
                <?php } ?>

            </div>
            <div id="tab03">
                <?php if($default['de_type3_list_use']) { ?>
                <!-- 인기상품 시작 { -->
                <section class="main">
                    <div class="sale_prd">
                        <?php
		$list = new item_list();
		$list->set_type(3);
		$list->set_view('it_img', true);
		$list->set_view('it_id', false);
		$list->set_view('it_name', true);
		$list->set_view('it_basic', false);
		$list->set_view('it_cust_price', false);
		$list->set_view('it_price', true);
		$list->set_view('it_icon', true);
		$list->set_view('sns', false);
		$list->set_view('star', true);
		echo $list->run();
		?>
                    </div>
                </section>
                <!-- } 인기상품 끝 -->
                <?php } ?>
            </div>

        </div>
    </div>
    <!--tab-->


</div>

<script>
$(function() {
    $('.tabcontent > div').hide();
    $('.tabnav a').click(function() {
        $('.tabcontent > div').hide().filter(this.hash).fadeIn();
        $('.tabnav a').removeClass('active');
        $(this).addClass('active');
        return false;
    }).filter(':eq(0)').click();
});
</script>
<script>
$(document).ready(function() {
    $('.bxslider').bxSlider({
        mode: 'horizontal',
        slideMargin: 5,
        auto: true, // 자동 실행 여부
        controls: false, // 이전 다음 버튼 노출 여부
        pager: false

    });
});
</script>

<script>
$("#container_inner").removeClass("container").addClass("idx-container");
</script>

<?php
include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
?>