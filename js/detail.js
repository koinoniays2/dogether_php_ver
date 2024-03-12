// document.addEventListener('DOMContentLoaded', function() {
//   // 첫 번째 intro-box를 3초 후에 나타나게 설정
//   setTimeout(function() {
//     document.getElementById('intro-box1').style.opacity = '1';
//   }, 2000);

//   // 두 번째 intro-box를 첫 번째 intro-box가 사라진 후에 나타나게 설정
//   setTimeout(function() {
//     document.getElementById('intro-box1').style.opacity = '0';
//     document.getElementById('intro-box2').style.opacity = '1';
//   }, 6000); // 3초 후 + 3초 후
// });

document.addEventListener("DOMContentLoaded", function () {
  // 페이지가 로드될 때 실행되는 함수

  // 초기에 intro-box1을 서서히 나타나게 설정
  let introBox1 = document.getElementById("intro-box1");
  introBox1.style.transition = "opacity 1s ease-in-out";
  introBox1.style.opacity = "1";

  // 첫 번째 intro-box1를 3초 뒤에 서서히 사라지게 하고, 그 후 display: none;으로 변경
  setTimeout(function () {
    introBox1.style.opacity = "0";

    // 3초 후에 display: none;으로 변경
    setTimeout(function () {
      introBox1.style.display = "none";

      // 1초 뒤에 intro-box2를 서서히 나타나게 설정
      let introBox2 = document.getElementById("intro-box2");
      introBox2.style.display = "flex"; // 또는 "block" 등을 사용하여 적절한 디스플레이 속성을 설정
      introBox2.style.visibility = "visible"; // visibility를 visible로 변경
      introBox2.style.transition = "opacity 1s ease-in-out";
      introBox2.style.opacity = "1";
    }, 1000);
  }, 4000);
});

