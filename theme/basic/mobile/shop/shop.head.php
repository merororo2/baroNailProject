<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$q = isset($_GET['q']) ? clean_xss_tags($_GET['q'], 1, 1) : '';

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once(G5_LIB_PATH.'/latest.lib.php');

add_stylesheet('<link rel="stylesheet" href="'.G5_CSS_URL.'/mstyle.css">', 0);

?>
<div class="search_back"></div>

<header id="hd" style="">
    <?php if ((!$bo_table || $w == 's' ) && defined('_INDEX_')) { ?><h1><?php echo $config['cf_title'] ?></h1><?php } ?>
    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php if(defined('_INDEX_')) { // index에서만 실행
        include G5_MOBILE_PATH.'/newwin.inc.php'; // 팝업레이어
    } ?>
    <div class="hd_container">
        <div id="hd_wr">

            <div class="hd_btn">
                <button type="button" id="btn_hdcate"><i class="fa fa-bars"></i><span
                        class="sound_only">분류</span></button>
                <button type="button" id="btn_hdsch"><i class="fa fa-search"></i><span
                        class="sound_only">검색열기</span></button>
            </div>
            <div id="logo"><a href="<?php echo G5_SHOP_URL; ?>/"><img src="<?php echo G5_DATA_URL; ?>/common/logo.png"
                        alt="<?php echo $config['cf_title']; ?> 메인"></a></div>
            <div class="btn_buttons">
                <a href="<?php echo G5_SHOP_URL; ?>/mypage.php" id="btn_hduser"><i class="fa-solid fa-user"></i></a>
                <a href="<?php echo G5_SHOP_URL; ?>/cart.php" id="btn_hdcart"><i class="fa fa-shopping-cart"></i><span
                        class="sound_only">장바구니</span><span
                        class="cart-count"><?php echo get_boxcart_datas_count(); ?></span></a>

            </div>

        </div>
    </div>
    <div class="search">


        <form name="frmsearch1" action="<?php echo G5_SHOP_URL; ?>/search.php" onsubmit="return search_submit(this);">
            <div class="product_search_form">

                <i class="fa-solid fa-arrow-left" id="search_exit"></i>
                <input type="text" name="q" value="<?php echo stripslashes(get_text(get_search_string($q))); ?>"
                    id="sch_str" required placeholder="검색어를 입력해주세요">
                <button type="submit" id="sch_submit" value="검색"><i class="fa fa-search" aria-hidden="true"></i><span
                        class="sound_only">검색</span></button>
            </div>

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

    </div>

    </div>
    <script>
    $("#btn_hdsch").click(function() {
        $(".search").toggleClass("open");
        $("#hd").toggleClass("open");
    })

    $("#search_exit").click(function() {
        $(".search").removeClass("open");

    })
    </script>


    <div class="panel_menu">
        <div class="panel_menu_header">
            <i class="fa-solid fa-arrow-left" id="category_exit"></i>
            <a href="<?php echo G5_SHOP_URL; ?>/">baroNail</a>
            <a href="<?php echo G5_SHOP_URL; ?>/cart.php"> <i class="fa-solid fa-cart-shopping"></i><span
                    class="cart-count"><?php echo get_boxcart_datas_count(); ?></span></a>

        </div>
        <div class="menu_container">
            <div class="login-info">
                <?php if($is_member) {?>
                <p><b><?php echo $member['mb_name']; ?></b>님 환영합니다.</p>

                <?php }else {?>
                <p class="login_before"><b>로그인</b>후 이용해주세요
                <p>

                    <?php } ?>
                <div class="buttons">
                    <?php if($is_member) {?>
                    <ul class="member_login">
                        <li class="login_link_list"> <a href="<?php echo G5_SHOP_URL; ?>/mypage.php">
                                마이페이지
                            </a>
                        </li>
                        <li class="login_link_list"> <a href="<?php echo G5_BBS_URL ?>/logout.php"
                                class="logout_btn">로그아웃</a></li>
                        <li class="login_link_list">
                            <a href="<?php echo G5_SHOP_URL?>/cart.php" class="cart">장바구니</a>
                        </li>
                    </ul>
                    <?php }else {
                    ?>
                    <a href="<?php echo G5_BBS_URL ?>/login.php?url=<?php echo $urlencode; ?>" class="login">로그인</a>
                    <a href="<?php echo G5_BBS_URL ?>/register.php" class="logout_btn join_btn">회원가입

                        <?php } ?>
                </div>
            </div>

            <div class="menu_list">
                <li class="nailtitle"> <a href="<?php echo G5_SHOP_URL ?>/list.php?ca_id=10">네일</a></li>
                <li class="title"><a href="<?php echo G5_SHOP_URL ?>/list.php?ca_id=20">큐티클</a></li>
                <li class="title"><a href="<?php echo G5_SHOP_URL ?>/list.php?ca_id=30">젤네일</a></li>
                <li class="title"> <a href="<?php echo G5_SHOP_URL ?>/list.php?ca_id=40">젤스티커</a></li>
            </div>


            <div class="container"></div>


            <script>
            $("#btn_hdcate").click(function() {
                $(".panel_menu").addClass("open");
                $("body").css("overflow", "hidden");
                $(".search").removeClass("open");
            })
            $("#category_exit").click(function() {
                $(".panel_menu").removeClass("open");
                $("body").css("overflow", "");

            })
            </script>

</header>
<?php
    $container_class = array();
    if( defined('G5_IS_COMMUNITY_PAGE') && G5_IS_COMMUNITY_PAGE ){
        $container_class[] = 'is_community';
    }
?>
<div id="container" class="<?php echo implode(' ', $container_class); ?>">
    <?php if ((!$bo_table || $w == 's' ) && !defined('_INDEX_')) { ?><h1 id="container_title"><a href="<?php G5_URL ?>/"
            class="btn_back"><i class="fa-solid fa-chevron-left"></i></a> <?php echo $g5['title']  ?></h1><?php }