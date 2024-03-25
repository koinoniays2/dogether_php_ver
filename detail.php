<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/index.css" type="text/css" />
  <link rel="stylesheet" href="css/header.css" type="text/css" />
  <link rel="stylesheet" href="css/footer.css" type="text/css" />
  <link rel="stylesheet" href="css/guide.css" type="text/css" />
  <link rel="stylesheet" href="css/map.css" type="text/css" />
  <link rel="stylesheet" href="css/detail.css" type="text/css" />
  <link rel="icon" href="./images/favicon.ico" type="image/x-icon">

  <!-- 폰트어썸 -->
  <script src="https://kit.fontawesome.com/96b5911d82.js" crossorigin="anonymous"></script>
  <title>DOGETHER</title>
</head>

<body>
  <!-- 헤더 -->
  <header id="header">
    <?php include "header.php"; ?>
  </header>
  <!-- 섹션2 인트로 픽스 -->
  <section id="detail-intro">
    <div id="intro-box1" class="intro-box">
      <div class="text-box">반려동물 동반입장 가능한 곳을 찾고 계신가요?</div>
    </div>
  </section>

  <!-- api지도 섹션 -->
  <section id="detail-section">
    <div class="detail-container">
      <div class="detail-title"></div>
      <div class="detail-text"></div>
      <!-- 카테고리 부분 -->
      <div class="category"></div>
      <p style="color:gray; text-align:center;">처음 나오는 정보는 서울지역 애견 동반 정보입니다.
      <br />메뉴 클릭 시 해당 지역의 정보를 확인할 수 있습니다.</p>
      <!-- map -->
      <div class="map_wrap">
        <div id="map" style="width:100%;height:100%;position:relative;overflow:hidden;"></div>
        <div id="menu_wrap" class="bg_white">
          <div class="option">
            <form id="search_form" onsubmit="searchPlaces(); return false;">
              <input type="text" value="서울 애견동반" id="keyword" size="15">
              <button type="submit"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></button>
            </form>
          </div>
          <hr>
          <ul id="placesList"></ul>
          <div id="pagination"></div>
        </div>
      </div>
      <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=c4bae9c95198a725f932a1e32a9cad1f&libraries=services"></script>
      <!-- js 렌더링 -->
      <div class="content"></div>
      <!-- 페이지네이션 -->
      <div id="page_btn_container">
        <button id="prev_button">이전</button>
        <div class="page_container"></div>
        <button id="next_button">다음</button>
      </div>
    </div>
    <img src="./images/dogfan.png" alt="dogs_img" />
  </section>
  <footer>

    <?php include "footer.php"; ?>

  </footer>
</body>
<script src="./js/detail.js"></script>
<script type="module" src="./js/api.js"></script>
<script type="module" src="./js/map.js"></script>

</html>