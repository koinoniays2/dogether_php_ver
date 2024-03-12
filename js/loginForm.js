function checkInput() {
    if (!document.login_form.id.value) {
        alert("아이디를 입력하세요");
        document.login_form.id.focus();
        return;
    }

    if (!document.login_form.password.value) {
        alert("비밀번호를 입력하세요");
        document.login_form.password.focus();
        return;
    }
    document.login_form.submit();
}
const loginBtn = document.querySelector("#login_btn");
loginBtn.addEventListener("click", checkInput);