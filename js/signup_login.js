// ----------------로그인 페이지 JS추가

// 로그인 input활성화시 placeholder 사라지게하기
let idInput = document.getElementById("id");
let passwordInput = document.getElementById("password");

// 아이디 입력란에 포커스 이벤트를 추가하여 플레이스홀더를 숨기는 함수를 호출
idInput.addEventListener("focus", function () {
  idInput.removeAttribute("placeholder");
});
// 비밀번호 입력란에 포커스 이벤트를 추가하여 플레이스홀더를 숨기는 함수를 호출
passwordInput.addEventListener("focus", function () {
  passwordInput.removeAttribute("placeholder");
});
// 포커스가 입력란에서 빠져나갈 때 플레이스홀더를 다시 보이게 하는 함수를 호출
idInput.addEventListener("blur", function () {
  idInput.setAttribute("placeholder", " ");
});
// 포커스가 입력란에서 빠져나갈 때 플레이스홀더를 다시 보이게 하는 함수를 호출
passwordInput.addEventListener("blur", function () {
  passwordInput.setAttribute("placeholder", " ");
});

// 회원가입 페이지------------------------
// 인풋타겟시 span위치 수정
const inputs = document.querySelectorAll("input");

inputs.forEach((input) => {
  input.addEventListener("focus", () => {
    const parentLi = input.closest("li");
    const span = parentLi.querySelector("span");
    span.style.top = "-35%"; // 원하는 위치로 수정
    span.style.fontSize = "0.8rem";
    span.style.color = "lightgray";
    
  });

  input.addEventListener("blur", () => {
    const parentLi = input.closest("li");
    const span = parentLi.querySelector("span");
    span.style.textDecorationLine = "underline"
    if (!input.value) {
      span.style.top = "12.5%"; // 다시 초기 위치로 복원
      span.style.fontSize = "1rem";
      span.style.borderColor = "transparent";
      span.style.color = "gray";
      span.style.textDecorationLine = "none"

    }
  });
});
