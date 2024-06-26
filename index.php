<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- CSS -->
  <link rel="stylesheet" href="css/index.css" type="text/css" />
  <link rel="stylesheet" href="css/header.css" type="text/css" />
  <link rel="stylesheet" href="css/footer.css" type="text/css" />
  <link rel="stylesheet" href="css/section-1.css" type="text/css" />
  <link rel="stylesheet" href="css/section-2.css" type="text/css" />
  <link rel="stylesheet" href="css/section-3.css" type="text/css" />
  <link rel="stylesheet" href="css/guide.css" type="text/css" />
  <!-- JS -->
  <script src="./js/jquery-3.7.1.min.js"></script>
  <!-- gsap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/ScrollTrigger.min.js"></script>
  <!-- 폰트어썸 -->
  <script src="https://kit.fontawesome.com/96b5911d82.js" crossorigin="anonymous"></script>
  <title>DOGETHER</title>
  <link rel="icon" href="./images/favicon.ico" type="image/x-icon">
</head>
<style>
  <?php $cursorImage = "images/cursor.png";
  $hoverCursorImage = "images/hoverCursor.png";
  echo "html { cursor: url($cursorImage), auto; }";
  echo "a { cursor: url($hoverCursorImage), auto; }"; ?>
</style>

<body>
  <!-- 헤더 -->
  <header id="header">
    <?php include "header.php"; ?>
  </header>
  <!-- 섹션-1 -->
  <section id="section-1">
    <div class="section-1-container">
      <div id="section1-event" class="sectiion-1-main-text">
        <p>LET'S<br /> DOGETHER!</p>
        <p>
          반려동물과 <b>함께</b>하는 일상<br />
          내 주변 반려동물을 위한 시설을 찾아보세요!
        </p>
        <p>#DOGETHER는 반려동물 시설 및 동반 시설 리스트 제공 플랫폼입니다.</p>
      </div>
      <div id="section1-event2" class="section-2-move">
        <a href="#section-2">알아보기</a>
        <a href="#section-2">알아보기<img src="images/mo_arr.png" alt=""></a>
        <div id="arrow">
          <span><img src="./images/arr.png" alt=""></span>
          <span><img src="./images/arr.png" alt=""></span>
          <span><img src="./images/arr.png" alt=""></span>
        </div>
      </div>
    </div>
  </section>

  <!-- 섹션-2 컨텐츠 목록 -->
  <section id="section-2">
    <div class="section-2-container">
      <div id="section2-t-event" class="section-2-main-text">
        <p>DOGETHER</p>
        <p>Pet and Companion Store</p>
      </div>
      <div class="listbox">
        <div class="section-2-list">
          <div id="section2-event">
            <a href="detail.php?dataId=병원">
              <p class="sub-title">
                <i class="fa-solid fa-angle-right"></i>&nbsp;동물병원
              </p>
              <p class="sub-text">
                <!-- 반려동물 예방접종, 검진, 수술, 응급처치 가능 병원 및 반려동물 -->
                반려동물 병원 및 의약품 판매 약국
              </p>
            </a>
          </div>
          <div id="section2-event">
            <a href="detail.php?dataId=음식점">
              <p class="sub-title">
                <i class="fa-solid fa-angle-right"></i>&nbsp;음식점
              </p>
              <p class="sub-text">반려동물과 동반입장 가능한 음식점</p>
            </a>
          </div>
          <div id="section2-event">
            <a href="detail.php?dataId=카페">
              <p class="sub-title">
                <i class="fa-solid fa-angle-right"></i>&nbsp;카페
              </p>
              <p class="sub-text">반려동물과 동반입장 가능한 카페</p>
            </a>
          </div>
        </div>
        <div class="section-2-list">
          <div id="section2-event">
            <a href="detail.php?dataId=미용">
              <p class="sub-title">
                <i class="fa-solid fa-angle-right"></i>&nbsp;미용
              </p>
              <p class="sub-text">반려동물 케어 및 미용샵</p>
            </a>
          </div>

          <div id="section2-event">
            <a href="detail.php?dataId=미술관">
              <p class="sub-title">
                <i class="fa-solid fa-angle-right"></i>&nbsp;미술관
              </p>
              <p class="sub-text">반려동물과 동반입장 가능한 미술관</p>
            </a>
          </div>
          <div id="section2-event">
            <a href="detail.php?dataId=숙소">
              <p class="sub-title">
                <i class="fa-solid fa-angle-right"></i>&nbsp;숙소
              </p>
              <p class="sub-text">반려동물과 함께 머물수 있는 숙소</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 섹션-3 -->
  <section id="section-3">
    <div class="maxsection-3">
      <div id="section3-event" class="main-text3">
        <p class="title-list3">
          반려견과 외출시엔<br /> <b style="color: #14471E;">"펫티켓"</b><br /> 지켜 즐겁고 안전하게!
        </p>
      </div>
      <div class="listflex3">
        <div class="main-list3">
          <div class="text-center">
            <div id="section3-textE1">
              <p class="subtitle3">배변봉투 챙기셨나요?</p>
              <p class="subtext3">
                깨끗한 환경과 공중 보건을 위해 배변봉투는 필수입니다.<br />
                배변봉투를 이용하여 강아지의 배설물을 주워,<br />
                모든 사람들이 쾌적한 환경을 즐길 수 있게 해주세요.
              </p>
            </div>
            <div id="section3-textE2">
              <p class="subtitle3">외출 시 리드 줄은 필수입니다.</p>
              <p class="subtext3">
                안전을 위해 리드 줄을 착용해 주세요.<br/>
                동물보호법 시행 규칙에 의해 강아지와 외출&산책 시<br />
                리드 줄 미착용일 경우에는 과태료를 부과하게 됩니다.<br />
              </p>
            </div>
            <div id="section3-textE3">
              <p class="subtitle3">입마개 착용 여부</p>
              <p class="subtext3">
                동물보호법에 따른 맹견으로 규정된 품종이나<br />
                사람과 다른 개들에게 평소 공격적인 성향을 보인다면<br />
                입마개를 착용해 주세요.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- guide -->
  <guide>
    <script>
      fetch("guide.php")
        .then((response) => response.text())
        .then((html) => {
          document.querySelector("guide").innerHTML = html;
        });
    </script>
  </guide>
  <!-- footer -->
  <footer>
    <?php include "footer.php"; ?>
  </footer>
  <!-- js -->
  <script src="./js/index.js"></script>
  <script src="js/api.js"></script>
  <script src="js/jquery.scrollTo.min.js"></script>
</body>

</html>