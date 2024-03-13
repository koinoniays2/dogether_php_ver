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
          <a href="join.php">
            <li>회원가입</li>
          </a>
          <a href="index.php">
            <li>커뮤니티</li>
          </a>
        </ul>
      </nav>
        <!-- 토글메뉴 -->
        <input type="checkbox" id="check_box" />
      <label for="check_box">
        <span></span>
        <span></span>
        <span></span>
      </label>
      <div id="side_menu">
        <ul>
          <li><a href="login_form.php">로그인</a></li>
          <li><a href="join.php">회원가입</a></li>
          <li><a href="index.php">커뮤니티</a></li>
          <li id="toggleSubmenu">
            <a href="#">ETC</a>
            <ul class="sub">
              <li><a href="detail.php?dataId=병원">동물병원&약국</a></li>
              <li><a href="detail.php?dataId=음식점">음식점</a></li>
              <li><a href="detail.php?dataId=미용">애견 미용샵</a></li>
              <li><a href="detail.php?dataId=미술관">미술관</a></li>
              <li><a href="detail.php?dataId=카페">카페</a></li>
              <li><a href="detail.php?dataId=숙소">숙소</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    </div>
    </div>
  </body>
</html>
