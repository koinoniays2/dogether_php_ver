const loginBtn = document.querySelector("#login_btn");
// const idErrorText = document.querySelector(".id-error");
// const passErrorText = document.querySelector(".password-error");
const errorText = document.querySelector(".error-text");
loginBtn.addEventListener("click", (e) => {
    e.preventDefault(); // 기본 이벤트 처리 방지

    // 아이디와 비밀번호 값을 가져옴
    const id = document.querySelector('input[name="id"]').value;
    const password = document.querySelector('input[name="password"]').value;

    // 입력 값 검증
    if (!id || !password) {
        alert("아이디와 비밀번호를 입력하세요");
        return;
    }

    // AJAX 요청 보내기
    $.ajax({
        url: "http://localhost/dogether/login.php",
        type: "POST",
        data: {id: id, password: password},
        dataType: "json",
        success: function(response){
            // 서버로부터의 응답 처리
            if (response.success) {
                location.href = "index.php";
            } else {
                if(response.message === "아이디" || "비밀번호") {
                    errorText.textContent = "아이디 또는 비밀번호를 잘못입력했습니다.";
                }
                // if(response.message === "비밀번호") {
                //     passErrorText.textContent = "비밀번호가 잘못됐습니다.";
                // }
                // alert(response.message); // 실패 시 서버에서 전달된 메시지를 표시
            }
        }
    });
});