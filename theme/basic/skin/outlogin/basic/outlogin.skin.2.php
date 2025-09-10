<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

<!-- 로그인 후 아웃로그인 시작 { -->
<section id="ol_after" class="ol">
    <header id="ol_after_hd">
        <h2>나의 회원정보</h2>
        <i class="fa fa-user-circle fa-3x" aria-hidden="true"></i>
        <strong><?php echo $nick ?>님</strong>
        <?php if ($is_admin == 'super' || $is_auth) {  ?><a href=" <?php echo correct_goto_url(G5_ADMIN_URL); ?>"
            class="btn_admin btn" title="관리자"><i class="fa fa-cog fa-spin fa-fw"></i><span
                class="sound_only">관리자</span></a><?php }  ?>




    </header>
    <ul id="ol_after_private">
        <li>
            <a href=" <?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php" id="ol_after_info"
                title="정보수정">
                정보수정</a>
        </li>
        <?php if(!$is_admin) {?>
        <li>

            <a href="<?php echo G5_SHOP_URL?>/cart.php" id="ol_after_info" title="장바구니">장바구니</a>


        </li>
        <?php } ?>
        <li>
            <a href="<?php echo G5_SHOP_URL?>/orderinquiry.php" title="주문내역" id="ol_after_info">주문내역</a>
        </li>

    </ul>

    <footer>
        <a href="<?php echo G5_BBS_URL ?>/logout.php" id="ol_after_logout">로그아웃</a>
    </footer>
    <button class="login_cls_btn"><i class="fa fa-times" aria-hidden="true"></i><span
            class="sound_only">닫기</span></button>
</section>

<script>
// 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
function member_leave() {
    if (confirm("정말 회원에서 탈퇴 하시겠습니까?"))
        location.href = "<?php echo G5_BBS_URL ?>/member_confirm.php?url=member_leave.php";
}
</script>
<!-- } 로그인 후 아웃로그인 끝 -->