<?php
include_once('./_common.php');

// 테마에 mypage.php 있으면 include
if(defined('G5_THEME_MSHOP_PATH')) {
    $theme_mypage_file = G5_THEME_MSHOP_PATH.'/mypage.php';
    if(is_file($theme_mypage_file)) {
        include_once($theme_mypage_file);
        return;
        unset($theme_mypage_file);
    }
}

$g5['title'] = '마이페이지';
include_once(G5_MSHOP_PATH.'/_head.php');

// 쿠폰
$cp_count = get_shop_member_coupon_count($member['mb_id'], true);

//주문건
$sql = " select count(*) as cnt from {$g5['g5_shop_order_table']} where mb_id = '{$member['mb_id']}' ";
$row = sql_fetch($sql);
$item_order_count = $row['cnt'];
?>

<div id="smb_my">

    <section id="smb_my_ov">
        <h2>회원정보 개요</h2>
        <div class="my_name">

            <strong><?php echo $member['mb_id'] ? $member['mb_name'] : '비회원'; ?></strong>님 반갑습니다
            <ul class="smb_my_act">
                <?php if ($is_admin == 'super') { ?><li><a href="<?php echo G5_ADMIN_URL; ?>/" class="btn_admin">관리자</a>
                </li><?php } ?>
                <li><a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=register_form.php" class="btn01">정보수정</a>
                </li>
                <li><a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=member_leave.php"
                        onclick="return member_leave();" class="btn01">회원탈퇴</a></li>
            </ul>
        </div>
        <ul class="my_pocou">
            <li class="my_cou">
                보유쿠폰
                <a href="<?php echo G5_SHOP_URL; ?>/coupon.php" target="_blank"
                    class="win_coupon"><?php echo number_format($cp_count); ?></a>
            </li>
            <li>
                주문 / 취소,반품,환불 내역
                <a href="<?php echo G5_SHOP_URL; ?>/orderinquiry.php"> <?php
                    echo $item_order_count ;
                ?></a>

            </li>

        </ul>
        <div class="my_info">
            <div class="my_info_wr">
                <strong>연락처</strong>
                <span><?php echo ($member['mb_tel'] ? $member['mb_tel'] : '미등록'); ?></span>
            </div>
            <div class="my_info_wr">
                <strong>E-Mail</strong>
                <span><?php echo ($member['mb_email'] ? $member['mb_email'] : '미등록'); ?></span>
            </div>
            <div class="my_info_wr">
                <strong>최종접속일시</strong>
                <span><?php echo $member['mb_today_login']; ?></span>
            </div>
            <div class="my_info_wr">
                <strong>회원가입일시</strong>
                <span><?php echo $member['mb_datetime']; ?></span>
            </div>

        </div>
        <div class="my_ov_btn"><button type="button" class="btn_op_area">상세정보 보기<i class="fa fa-caret-down"
                    aria-hidden="true"></i><span class="sound_only">상세정보 보기</span></button></div>

    </section>

    <script>
    $(".btn_op_area").on("click", function() {
        $(".my_info").toggle();
        $(".fa-caret-down").toggleClass("fa-caret-up")
    });
    </script>

    <section id="smb_my_od">
        <h2><a href="<?php echo G5_SHOP_URL; ?>/orderinquiry.php">최근 주문내역</a></h2>
        <?php
        // 최근 주문내역
        define("_ORDERINQUIRY_", true);

        $limit = " limit 0, 5 ";
        include G5_MSHOP_PATH.'/orderinquiry.sub.php';
        ?>
        <a href="<?php echo G5_SHOP_URL; ?>/orderinquiry.php" class="btn_more">더보기</a>
    </section>

    <section id="smb_my_wish" class="wishlist">
        <h2><a href="<?php echo G5_SHOP_URL; ?>/wishlist.php">최근 위시리스트</a></h2>

        <ul>
            <?php
            $sql = " select *
                       from {$g5['g5_shop_wish_table']} a,
                            {$g5['g5_shop_item_table']} b
                      where a.mb_id = '{$member['mb_id']}'
                        and a.it_id  = b.it_id
                      order by a.wi_id desc
                      limit 0, 6 ";
            $result = sql_query($sql);
            for ($i=0; $row = sql_fetch_array($result); $i++)
            {
                $image_w = 250;
                $image_h = 250;
                $image = get_it_image($row['it_id'], $image_w, $image_h, true);
                $list_left_pad = $image_w + 10;
            ?>

            <li>
                <div class="wish_img"><?php echo $image; ?></div>
                <div class="wish_info">
                    <a href="<?php echo get_shop_item($row['it_id'], true); ?>"
                        class="info_link"><?php echo stripslashes($row['it_name']); ?></a>
                    <span class="info_date"><?php echo substr($row['wi_time'], 2, 8); ?></span>
                </div>
            </li>

            <?php
            }

            if ($i == 0)
                echo '<li class="empty_list">보관 내역이 없습니다.</li>';
            ?>
        </ul>
        <a href="<?php echo G5_SHOP_URL; ?>/wishlist.php" class="btn_more">더보기</a>
    </section>

</div>

<script>
function member_leave() {
    return confirm('정말 회원에서 탈퇴 하시겠습니까?')
}
</script>

<?php
include_once(G5_MSHOP_PATH.'/_tail.php');