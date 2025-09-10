<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$admin = get_admin("super");

// 사용자 화면 우측과 하단을 담당하는 페이지입니다.
// 우측, 하단 화면을 꾸미려면 이 파일을 수정합니다.
?>
</div><!-- container End -->

<footer>
    <div class="footer-inner">
        <div class="communication footer-border footer-list">
            <div class="contact">
                <p>고객센터(981-7885)</p>
                <p>카카오톡 상담(@baronail)</p>
            </div>

        </div>
        <div class="footer-border footer-dropdown-list">
            <div class="footer-dropdown-list-title">
                <p>주문</p>
                <span class="open-button"><i class="fa-solid fa-chevron-up"></i></span>
            </div>
            <div class="footer-dropdown">
                <ul class="footer-ul">
                    <li>
                        <a href="<?php echo G5_SHOP_URL?>/orderinquiry.php">주문내역</a>
                    </li>
                    <li> <a href="<?php echo G5_SHOP_URL?>/cart.php" class="cart">장바구니</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-border footer-dropdown-list">
            <div class="footer-dropdown-list-title">
                <p>회원</p>
                <span class="open-button"><i class="fa-solid fa-chevron-up"></i></span>
            </div>
            <div class="footer-dropdown">
                <ul class="footer-ul">
                    <li>
                        <a href="<?php echo G5_SHOP_URL ?>/mypage.php" class="mypage">마이페이지</a>
                    </li>
                    <li><a href="<?php echo G5_SHOP_URL ?>/coupon.php" target="_blank" class="win_coupon">
                            쿠폰</a></li>
                    <li> <a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php"
                            class="smb_info">정보수정</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-border footer-dropdown-list">
            <div class="footer-dropdown-list-title">
                <p>서비스</p>
                <span class="open-button"><i class="fa-solid fa-chevron-up"></i></span>
            </div>
            <div class="footer-dropdown">
                <ul class="footer-ul">
                    <li> <a href="<?php echo G5_BBS_URL ?>/faq.php">FAQ</a>
                    </li>
                    <li> <a href="<?php echo G5_BBS_URL ?>/qalist.php">1:1문의</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer-border footer-company">
            <ul class="footer-company-list">
                <li><b>회사명</b> <?php echo $default['de_admin_company_name']; ?></li>
                <li><b>주소</b> <?php echo $default['de_admin_company_addr']; ?></li>
                <li><b>사업자 등록번호</b> <?php echo $default['de_admin_company_saupja_no']; ?></li>
                <li><b>대표</b> <?php echo $default['de_admin_company_owner']; ?></li>
                <li><b>전화</b> <?php echo $default['de_admin_company_tel']; ?></li>
                <!-- <li><b>팩스</b> <?php echo $default['de_admin_company_fax']; ?></li> -->
                <!-- <span><b>운영자</b> <?php echo $admin['mb_name']; ?></span><br> -->
                <li><b>통신판매업신고번호</b> <?php echo $default['de_admin_tongsin_no']; ?></li>
                <li><b>개인정보 보호책임자</b> <?php echo $default['de_admin_info_name']; ?></li>
                <?php if ($default['de_admin_buga_no']) echo '<li><b>부가통신사업신고번호</b> '.$default['de_admin_buga_no'].'</li>'; ?>
            </ul>
        </div>
        <div class="footer-border footer-list footer-info">
            <a class="footer-info-basic" href="<?php echo get_pretty_url('content', 'company'); ?>">회사소개</a>
            <a class="footer-info-basic" href="<?php echo get_pretty_url('content', 'provision'); ?>">서비스이용약관</a>
            <a class="footer-info-privacy" href="<?php echo get_pretty_url('content', 'privacy'); ?>">개인정보처리방침</a>
            <!-- <p>공지</p> -->
        </div>
    </div>
</footer>

<?php
$sec = get_microtime() - $begin_time;
$file = $_SERVER['SCRIPT_NAME'];

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<script>
var mopen_button = document.getElementsByClassName("open-button");

var drop_down_title = document.getElementsByClassName(
    "footer-dropdown-list-title"
);
var footer_dropdown = document.getElementsByClassName("footer-dropdown");
for (let i = 0; i < drop_down_title.length; i++) {
    const element = drop_down_title[i];
    element.addEventListener("click", function(e) {
        e.preventDefault();
        footer_dropdown[i].classList.toggle("open");
        mopen_button[i].classList.toggle("open");
    });
}
</script>
<script src="<?php echo G5_JS_URL; ?>/sns.js"></script>

<?php
include_once(G5_THEME_PATH.'/tail.sub.php');