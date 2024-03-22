<!DOCTYPE html>
<html lang="en">

<head> </head>
<?php
session_start(); // 세션에서 변수가 설정되었는지 확인
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["name"])) $name = $_SESSION["name"];
else $name = "";

?>

<body>
  <div class="header-container">
      <div id="logo">
        <a href="index.php">
          <img src="images/logo2.png" alt="logo" />
        </a>
      </div>
    <nav id="menu">
      <ul>
        <?php if (!$userid) { ?>
        <li><a href="login_form.php">로그인</a></li>
        <li><a href="terms_form.php">회원가입</a></li>
        <li><a href="login_form.php" onclick="alert('로그인 후 이용해주세요.');">커뮤니티</a></li>
        <?php } else { $logged = $name."님";?>
          <li><a><?= $logged ?></a></li>
          <li><a href="logout.php">로그아웃</a></li>
          <li><a href="index.php">커뮤니티</a></li>
        <?php } ?>
      </ul>
    </nav>
    <!-- 토글메뉴 -->
    <input type="checkbox" id="check_box" />
    <label for="check_box" id="toggle_label">
      <span></span>
      <span></span>
      <span></span>
    </label>
    <div id="side_menu">
      <ul>
        <li style="font-size: 20px; margin-top: 30px; margin-bottom: 10px; color: #ee9b01;">USER</li>
        <li><a href="login_form.php">로그인</a></li>
        <li><a href="terms_form.php">회원가입</a></li>
        <li><a href="index.php">커뮤니티</a></li>
        <div style="width: 100%; border-radius: 1rem; height: 5px; background: #808080; margin-top: 30px;"></div>
        <li style="font-size: 20px; margin-top: 30px; margin-bottom: 10px; color: #ee9b01;">MENU</li>
        <li><a href="detail.php?dataId=병원">동물병원&약국</a></li>
        <li><a href="detail.php?dataId=음식점">음식점</a></li>
        <li><a href="detail.php?dataId=미용">애견 미용샵</a></li>
        <li><a href="detail.php?dataId=미술관">미술관</a></li>
        <li><a href="detail.php?dataId=카페">카페</a></li>
        <li><a href="detail.php?dataId=숙소">숙소</a></li>
      </ul>
    </div>
  </div>
  </div>
  </div>
  <script>
    let lastScrollTop = 0;
    const header = document.getElementById("header");

    window.addEventListener("scroll", function() {
      let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

      if (window.innerWidth <= 768) { // 모바일 디바이스인 경우
        header.style.top = "0"; // 헤더를 항상 보이도록 설정
      } else { // 데스크탑 디바이스인 경우
        if (currentScroll > lastScrollTop) {
          header.style.top = "-100px"; // Adjust this value to hide your header completely
        } else {
          header.style.top = "0";
        }
      }

      lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    });
  </script>
</body>

<!-- // 화면 너비가 768px 이상일 때만 스크롤 이벤트 리스너를 활성화합니다.
if (window.innerWidth > 768) {
window.addEventListener("scroll", function() {
let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

if (currentScroll > lastScrollTop) {
header.style.top = "-100px";
} else {
header.style.top = "0";
}
lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; }); } </script>
  </body> -->

</html>