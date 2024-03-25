// 페이지가 로드될 때 실행
document.addEventListener("DOMContentLoaded", function() {
    // 2초 후에 opacity를 1로 변경
    setTimeout(function() {
      var textBox = document.querySelector('.text-box');
      textBox.style.opacity = 1;
    }, 1000);
  });
  
