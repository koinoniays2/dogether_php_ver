<!DOCTYPE html>
<html lang="en">
  <head> </head>
  <?php
    session_start(); // 세션에서 변수가 설정되었는지 확인
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
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
          <a href="login_form.php">
            <?php if(!$userid) { ?>   
            <li>로그인</li>
            <?php } else { ?>
            <li><a href="logout.php">로그아웃</a></li>
            <?php } ?>
          </a>
          <a href="index.php">
            <li>회원가입</li>
          </a>
          <a href="index.php">
            <li>커뮤니티</li>
          </a>
        </ul>
        <!-- 토글메뉴 -->
        <label for="hamburger">
          <!-- <img src="/images/hamburger.png" alt="toggle_menu_btn"> -->
        </label>
        <input type="checkbox" id="hamburger">
      </nav>
    </div>
  </body>
</html>
