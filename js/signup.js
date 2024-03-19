// 회원가입 페이지------------------------
// 인풋타겟시 span위치 수정
const inputs = document.querySelectorAll("input");

inputs.forEach((input) => {
  input.addEventListener("focus", () => {
    const parentLi = input.closest("li");
    const span = parentLi.querySelector("span");
    span.style.top = "-35%"; // 원하는 위치로 수정
    span.style.fontSize = "0.8rem";
    span.style.color = "gray";
    
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
