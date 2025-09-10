<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$q = isset($_GET['q']) ? clean_xss_tags($_GET['q'], 1, 1) : '';

if(G5_IS_MOBILE) {
    include_once(G5_THEME_MSHOP_PATH.'/shop.head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once(G5_LIB_PATH.'/latest.lib.php');

add_javascript('<script src="'.G5_JS_URL.'/owlcarousel/owl.carousel.min.js"></script>', 10);
add_stylesheet('<link rel="stylesheet" href="'.G5_JS_URL.'/owlcarousel/owl.carousel.css">', 0);
?>

<!-- 상단 시작 { -->
<div id="hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>
    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
	} ?>
    <div style="width:100%; overflow:hidden">
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide img-banner">1</div>
                <div class="swiper-slide img-banner">2</div>
                <div class="swiper-slide img-banner">3</div>
                <!-- <div class=" swiper-slide" style="background: black; height:79px">4</div>
                <div class="swiper-slide" style="background: blue;height:79px">5</div>
                <div class="swiper-slide" style="background: purple; height:79px">6</div> -->

            </div>

        </div>
    </div>
</div>

<script>
const swiper = new Swiper(".swiper", {
    slidesPerView: 1,

    autoplay: { //자동슬라이드 
        delay: 1000, // 슬라이드 시간 설정
    },
    loop: true, // 슬라이드 반복 여부
});
</script>

<div class="sidemenu-container">
    <section class="sub-menu">
        <a class="sub-menu-list" href="<?php echo G5_BBS_URL ?>/faq.php">FAQ</a>
        <a class="sub-menu-list" href="<?php echo G5_BBS_URL ?>/qalist.php">1:1문의</a>
        <a class="sub-menu-list" href="<?php echo G5_SHOP_URL ?>/itemqalist.php">상품문의</a>
        <?php if(!$is_member) {?>
        <a class="sub-menu-list" href="<?php echo G5_SHOP_URL ?>/orderinquiry.php">비회원주문조회 </a>
        <?php }?>
    </section>
</div>

<div class="header-container">
    <ul id="hd_qnb">
        <li>
            <?php if ($is_member) { ?>
            <a href="<?php echo G5_SHOP_URL ?>/mypage.php" class="mypage">마이페이지</a>

            <a href="<?php echo G5_BBS_URL ?>/logout.php" class="logout_btn">로그아웃</a>
            <?php if(!$is_admin) {?>

            <a href="<?php echo G5_SHOP_URL?>/cart.php" class="cart">장바구니</a>


            <?php			}?>
            <?php if ($is_admin) {  ?>
            <a href=" <?php echo G5_ADMIN_URL; ?>/shop_admin" class="admin_btn">관리자</a>
            <?php }  ?>
            <?php } else { ?>
            <button class="login_btn">로그인</button>
            <a href="<?php echo G5_BBS_URL ?>/register.php" class="logout_btn join_btn">회원가입
            </a>
            <?php } ?>
            <div id="member_menu">
                <div class="member_div">
                    <?php echo outlogin('theme/basic'); // 외부 로그인, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
                </div>
                <div class="bg"></div>
            </div>
            <script>
            $(function() {
                $(".login_btn").click(function() {
                    $("#member_menu").toggle();
                });
                $(".login_cls_btn").click(function() {
                    $("#member_menu").hide();
                });
            });
            </script>
        </li>
    </ul>
    <div class="header-menu">
        <div id="logo">
            <a href="/"><img src="<?php echo G5_DATA_URL; ?>/common/logo.png"
                    alt="<?php echo $config['cf_title']; ?>"></a>
        </div>
        <ul class="header-menu-list">
            <?php include_once(G5_SHOP_SKIN_PATH.'/boxcategory.skin.php'); // 상품분류 ?>

        </ul>
        <ul class="header-buttons">
            <li class="header-button">
                <div class=" search_button"><i class="fa-solid fa-magnifying-glass"></i></div>
            </li>
            <li class="header-button">
                <a href="<?php echo G5_SHOP_URL ?>/cart.php"><i class="fa-solid fa-cart-shopping"></i></a></a>
            </li>
            <li>
                <div class="menu-trigger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </li>
        </ul>
    </div>
    <script>
    // 메뉴 하나만 보이게 설정
    $(".search_button").click(function() {
        $(".header-search").toggleClass('active');
        $(".header-category-wrap").removeClass('active');
        $(".menu-trigger").removeClass('active');
        $(".header-category-wrap").css("border-top", "none")


    })
    </script>

    <div class="header-search">
        <div class="header-search-input">
            <fieldset id="hd_sch">
                <legend>쇼핑몰 전체검색</legend>
                <form name="frmsearch1" action="<?php echo G5_SHOP_URL; ?>/search.php"
                    onsubmit="return search_submit(this);">
                    <label for="sch_str" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
                    <input type="text" name="q" value="<?php echo stripslashes(get_text(get_search_string($q))); ?>"
                        id="sch_str" required placeholder="검색어를 입력해주세요">
                    <button type="submit" id="sch_submit" value="검색"><i class="fa fa-search"
                            aria-hidden="true"></i><span class="sound_only">검색</span></button>
                </form>
                <script>
                function search_submit(f) {
                    if (f.q.value.length < 2) {
                        alert("검색어는 두글자 이상 입력하십시오.");
                        f.q.select();
                        f.q.focus();
                        return false;
                    }
                    return true;
                }
                </script>
            </fieldset>

        </div>
        <ul class="header-hashtag-list">
            <li class="header-hashtag-card"># 트랜디</li>
            <li class="header-hashtag-card">#프로네일</li>
            <li class="header-hashtag-card">#Best디자인</li>
            <li class="header-hashtag-card">#첫구매</li>
        </ul>
    </div>


    <!-- <div class="hd_sch_wr">
        <fieldset id="hd_sch">
            <legend>쇼핑몰 전체검색</legend>
            <form name="frmsearch1" action="<?php echo G5_SHOP_URL; ?>/search.php"
                onsubmit="return search_submit(this);">
                <label for="sch_str" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
                <input type="text" name="q" value="<?php echo stripslashes(get_text(get_search_string($q))); ?>"
                    id="sch_str" required placeholder="검색어를 입력해주세요">
                <button type="submit" id="sch_submit" value="검색"><i class="fa fa-search" aria-hidden="true"></i><span
                        class="sound_only">검색</span></button>
            </form>
            <script>
            function search_submit(f) {
                if (f.q.value.length < 2) {
                    alert("검색어는 두글자 이상 입력하십시오.");
                    f.q.select();
                    f.q.focus();
                    return false;
                }
                return true;
            }
            </script>
        </fieldset>

    </div> -->

    <!-- 쇼핑몰 배너 시작 { -->
    <?php // echo display_banner('왼쪽'); ?>
    <!-- } 쇼핑몰 배너 끝 -->

    <div class="header-category-wrap">
        <div class="header-category-container">
            <div class="header-category-card-wrap">

                <ul class="header-category-card">
                    <li class="header-category-card-title"><a href="<?php echo G5_SHOP_URL ?>/list.php?ca_id=10">네일</a>
                    </li>
                    <li class="header-category-card-sub"><a href="<?php echo G5_SHOP_URL ?>/list.php?ca_id=1010">네일1</a>
                    </li>
                    <li class="header-category-card-sub"><a href="<?php echo G5_SHOP_URL ?>/list.php?ca_id=1020">네일2</a>
                    </li>
                </ul>



                <ul class="header-category-card">
                    <li class="header-category-card-title"><a href="<?php echo G5_SHOP_URL ?>/list.php?ca_id=10">네일</a>
                    </li>
                    <li class="header-category-card-sub"><a href="<?php echo G5_SHOP_URL ?>/list.php?ca_id=1010">네일1</a>
                    </li>
                    <li class="header-category-card-sub"><a href="<?php echo G5_SHOP_URL ?>/list.php?ca_id=1020">네일2</a>
                    </li>
                    </li>
                </ul>
                <ul class="header-category-card">
                    <li class="header-category-card-title"><a href="<?php echo G5_SHOP_URL ?>/list.php?ca_id=20">페디</a>
                    </li>
                    <li class="header-category-card-sub"><a href="<?php echo G5_SHOP_URL ?>/list.php?ca_id=2010">페디1</a>
                    </li>
                    <li class="header-category-card-sub"><a href="<?php echo G5_SHOP_URL ?>/list.php?ca_id=2020">페디2</a>
                    </li>
                </ul>

            </div>
            <div class="header-category-card-wrap">
                <ul class="header-category-card">
                    <li class="header-category-card-title"><a href="<?php echo G5_SHOP_URL ?>/list.php?ca_id=30">큐티클</a>
                    </li>
                    <li class="header-category-card-sub"><a
                            href="<?php echo G5_SHOP_URL ?>/list.php?ca_id=3010">큐티클1</a></li>
                    <li class="header-category-card-sub"><a
                            href="<?php echo G5_SHOP_URL ?>/list.php?ca_id=3020">큐티클2</a></li>
                </ul>
            </div>
            <div class="header-category-card-wrap">
                <ul class="header-category-card">
                    <li class="header-category-card-title"><a
                            href="<?php echo G5_SHOP_URL ?>/list.php?ca_id=40">젤스티커</a>
                    </li>
                </ul>
            </div>
            <div class="header-category-card-wrap" style="width: 240px">
                <ul class="header-category-card">
                    <li class="header-category-card-title">custom</li>
                </ul>
                <ul class="header-category-card">
                    <li class="header-category-card-title">care&tool</li>
                </ul>
            </div>
            <div class="header-category-card-wrap">
                <ul class="header-category-card">
                    <li class="header-category-card-title">event</li>
                </ul>
                <ul class="header-category-card">
                    <li class="header-category-card-title">review</li>
                </ul>
                <ul class="header-category-card">
                    <li class="header-category-card-title">brand</li>
                </ul>
                <ul class="header-category-card">
                    <li class="header-category-card-title">about</li>
                </ul>
                <ul class="header-category-card">
                    <li class="header-category-card-title">membership</li>
                </ul>
                <ul class="header-category-card">
                    <li class="header-category-card-title">magazine</li>
                </ul>
                <ul class="header-category-card">
                    <li class="header-category-card-title">collaboration</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
// 메뉴 하나만 보이게 설정
$(".menu-trigger").click(function() {
    $(".header-search").removeClass('active');
    $(".header-category-wrap").toggleClass('active');
    $(".menu-trigger").toggleClass('active');
})
</script>

</div>









</div>
<!-- } 상단 끝 -->





<script>
jQuery(function($) {
    $(".btn_member_mn").on("click", function() {
        $(".member_mn").toggle();
        $(".btn_member_mn").toggleClass("btn_member_mn_on");
    });

    var active_class = "btn_sm_on",
        side_btn_el = "#quick .btn_sm",
        quick_container = ".qk_con";

    $(document).on("click", side_btn_el, function(e) {
        e.preventDefault();

        var $this = $(this);

        if (!$this.hasClass(active_class)) {
            $(side_btn_el).removeClass(active_class);
            $this.addClass(active_class);
        }

        if ($this.hasClass("btn_sm_cl1")) {
            $(".side_mn_wr1").show();
        } else if ($this.hasClass("btn_sm_cl2")) {
            $(".side_mn_wr2").show();
        } else if ($this.hasClass("btn_sm_cl3")) {
            $(".side_mn_wr3").show();
        } else if ($this.hasClass("btn_sm_cl4")) {
            $(".side_mn_wr4").show();
        }
    }).on("click", ".con_close", function(e) {
        $(quick_container).hide();
        $(side_btn_el).removeClass(active_class);
    });

    $(document).mouseup(function(e) {
        var container = $(quick_container),
            mn_container = $(".shop_login");
        if (container.has(e.target).length === 0) {
            container.hide();
            $(side_btn_el).removeClass(active_class);
        }
        if (mn_container.has(e.target).length === 0) {
            $(".member_mn").hide();
            $(".btn_member_mn").removeClass("btn_member_mn_on");
        }
    });

    $("#top_btn").on("click", function() {
        $("html, body").animate({
            scrollTop: 0
        }, '500');
        return false;
    });
});
</script>
<?php
    $wrapper_class = array();
    if( defined('G5_IS_COMMUNITY_PAGE') && G5_IS_COMMUNITY_PAGE ){
        $wrapper_class[] = 'is_community';
    }
?>
<!-- 전체 콘텐츠 시작 { -->
<div id="wrapper" class="<?php echo implode(' ', $wrapper_class); ?>">
    <!-- #container 시작 { -->
    <div id="container">

        <?php if(defined('_INDEX_')) { ?>
        <div id="aside">

        </div>
        <?php } // end if ?>
        <?php
            $content_class = array('shop-content');
            if( isset($it_id) && isset($it) && isset($it['it_id']) && $it_id === $it['it_id']){
                $content_class[] = 'is_item';
            }
            if( defined('IS_SHOP_SEARCH') && IS_SHOP_SEARCH ){
                $content_class[] = 'is_search';
            }
            if( defined('_INDEX_') && _INDEX_ ){
                $content_class[] = 'is_index';
            }
        ?>


        <!-- .shop-content 시작 { -->
        <div class="<?php echo implode(' ', $content_class); ?>">

            <?php if ((!$bo_table || $w == 's' ) && !defined('_INDEX_')) { ?><div id="wrapper_title">
                <?php echo $g5['title'] ?></div><?php } ?>
            <!-- 글자크기 조정 display:none 되어 있음 시작 { -->
            <div id="text_size">
                <button class="no_text_resize" onclick="font_resize('container', 'decrease');">작게</button>
                <button class="no_text_resize" onclick="font_default('container');">기본</button>
                <button class="no_text_resize" onclick="font_resize('container', 'increase');">크게</button>
            </div>
            <!-- } 글자크기 조정 display:none 되어 있음 끝 -->