// detail main BG setTimeOut
document.addEventListener("DOMContentLoaded", function () {

  let introBox1 = document.getElementById("intro-box1");
  introBox1.style.transition = "opacity 1s ease-in-out";
  introBox1.style.opacity = "1";

  setTimeout(function () {
    introBox1.style.opacity = "0";

    setTimeout(function () {
      introBox1.style.display = "none";


      let introBox2 = document.getElementById("intro-box2");
      introBox2.style.display = "flex";
      introBox2.style.visibility = "visible"; // visibility를 visible로 변경
      introBox2.style.transition = "opacity 1s ease-in-out";
      introBox2.style.opacity = "1";
    }, 1000);
  }, 3000);
});

