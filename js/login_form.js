// login_form 효과 추가 --------------
const loginInput = document.querySelectorAll("input");

loginInput.forEach((inputT) => {
    inputT.addEventListener("focus", () => {
        const parentLi = inputT.closest("li");
        const p = parentLi.querySelector("p");
        p.style.top = "-15px"; // 원하는 위치로 수정
        p.style.fontSize = "0.8rem";
        p.style.color = "gray";
    });

    inputT.addEventListener("blur", () => {
        const parentLi = inputT.closest("li");
        const p = parentLi.querySelector("p");
        p.style.textDecorationLine = "underline"
        if (!inputT.value) {
          p.style.top = "10px"; // 다시 초기 위치로 복원
          p.style.fontSize = "1rem";
          p.style.borderColor = "transparent";
          p.style.color = "gray";
          p.style.textDecorationLine = "none"
        }
    });
});
