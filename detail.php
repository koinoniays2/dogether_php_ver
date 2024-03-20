<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/detail.css" type="text/css" />
  <link rel="stylesheet" href="css/index.css" type="text/css" />
  <link rel="stylesheet" href="css/header.css" type="text/css" />
  <link rel="stylesheet" href="css/footer.css" type="text/css" />
  <link rel="stylesheet" href="css/map.css"type="text/css" />
  <link rel="icon" href="./images/favicon.ico" type="image/x-icon">
  <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=c4bae9c95198a725f932a1e32a9cad1f&libraries=services"></script>
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
    <div class="bg-sticky"></div>
    <div class="bg-wrapper">
      <div id="intro-box1" class="intro-box">
        <div class="img-box">
          <img src="./images/detail_hotel.jpg" alt="detail_img" />
        </div>
        <div class="text-box">반려동물 동반입장 가능한 곳을 찾고 계신가요?</div>
      </div>
      <div id="intro-box2" class="intro-box">
        <div class="text-box">
          동물병원부터 숙소까지 다양한 장소를 검색해보세요
        </div>
        <div class="img-box">
          <img src="./images/detail_hospital.jpg" alt="detail_img2" />
        </div>
      </div>
    </div>
  </section>

  <!-- api지도 섹션 -->
  <section id="detail-section">
    <div class="detail-container">
      <div class="detail-title"></div>
      <div class="detail-text"></div>
      <!-- 카테고리 부분 -->
      <div class="category"></div>
      <!-- map -->
      <div class="map_wrap">
        <div id="map" style="
              width: 100%;
              height: 100%;
              position: relative;
              overflow: hidden;
            "></div>

        <div id="menu_wrap" class="bg_white">
          <div class="option">
            <div>
              <form id="search_form" onsubmit="searchPlaces(); return false;">
                <!-- 키워드 : -->
                <input type="text" value="애견동반" id="keyword" size="15" />
                <button type="button"><i class="fa-solid fa-magnifying-glass" style="color: #808080;"></i></button>
              </form>
            </div>
          </div>
          <hr />
          <ul id="placesList"></ul>
          <div id="pagination"></div>

        </div>
      </div>
      <!-- js 렌더링 -->
      <div class="content"></div>
      <!-- 페이지네이션 -->
      <div class="page-container"></div>
    </div>
    <img src="./images/dogfan.png" alt="dogs_img"/>
  </section>

  <footer>
    <script>
      fetch("footer.html")
        .then((response) => response.text())
        .then((html) => {
          document.querySelector("footer").innerHTML = html;
        });
    </script>
  </footer>
</body>
<script src="./js/detail.js"></script>
<script src="./js/api.js"></script>
<!-- <script type="module" src="./js/cafeData.js"></script> -->
<script type="module" src="./js/map.js"></script>

</html>