// 아이디 중복 확인
const checkId = document.querySelector("#check_id");

// 중복 확인 검사 여부
let checkOk = false;

checkId.addEventListener("click", (e) => {
    e.preventDefault();
    const id = document.querySelector('input[name="id"]').value;
    const idText = document.querySelector(".id_text");
    if(!id) {
        idText.textContent = "";
        idText.textContent = "아이디를 입력해주세요.";
        idText.style.color = "red";
    } else {
        $.ajax({
            url: "http://localhost/dogether_php_ver/register_id_check.php",
            type: "POST",
            data: {id: id},
            dataType: "json",
            success: function(response){
                if (response.success) {
                    idText.textContent = "";
                    idText.textContent = "사용 가능한 아이디입니다.";
                    idText.style.color = "#163B88";
                    checkOk = true;
                } else {
                    if(response.message === "중복") {
                        idText.textContent = "";
                        idText.textContent = "중복 된 아이디입니다.";
                        idText.style.color = "red";
                    }
                }
            }
        });
    }
});


// 회원 등록
const registBtn = document.querySelector("#register_btn");
registBtn.addEventListener("click", (e) => {
    e.preventDefault();
    const id = document.querySelector('input[name="id"]').value;
    const password = document.querySelector('input[name="password"]').value;
    const passwordCheck = document.querySelector('input[name="password_check"]').value;
    const name = document.querySelector('input[name="name"]').value;
    const email = document.querySelector('input[name="email"]').value;
    const mobileTel = document.querySelector('input[name="mobile_tel"]').value;
    const sample6Postcode = document.querySelector('input[name="address_postcode"]').value;
    const sample6Address = document.querySelector('input[name="address_"]').value;
    const sample6DetailAddress = document.querySelector('input[name="address_detail"]').value;

    // 필수항목 유효검사
    const idText = document.querySelector(".id_text");
    const passwordText = document.querySelector(".password_text");
    const passwordCheckText = document.querySelector(".password_check_text");
    const nameText = document.querySelector(".name_text");
    const emailText = document.querySelector(".email_text");
    const mobileText = document.querySelector(".mobile_text");
    const addressText = document.querySelector(".address_text");

    if(!id) {
        idText.textContent = "";
        idText.textContent = "아이디를 입력해주세요.";
        idText.style.color = "red";
    }
    if(!password) {
        passwordText.textContent = "";
        passwordText.textContent = "비밀번호를 입력해주세요.";
        passwordText.style.color = "red";
    }
    if(!passwordCheck) {
        passwordCheckText.textContent = "";
        passwordCheckText.textContent = "비밀번호 확인을 입력해주세요.";
        passwordCheckText.style.color = "red";
    }
    if(password !== passwordCheck) {
        passwordCheckText.textContent = "";
        passwordCheckText.textContent = "입력하신 비밀번호가 다릅니다.";
        passwordCheckText.style.color = "red";
    }
    if(!name) {
        nameText.textContent = "";
        nameText.textContent = "이름을 입력해주세요.";
        nameText.style.color = "red";
    }
    if(!email) {
        emailText.textContent = "";
        emailText.textContent = "이메일을 입력해주세요.";
        emailText.style.color = "red";
    }
    if(!mobileTel) {
        mobileText.textContent = "";
        mobileText.textContent = "휴대 전화번호를 입력해주세요.";
        mobileText.style.color = "red";
    }
    if(!sample6Address) {
        addressText.textContent = "";
        addressText.textContent = "주소를 입력해주세요.";
        addressText.style.color = "red";
    }
    if(checkOk === false) {
        idText.textContent = "";
        idText.textContent = "아이디 중복 확인을 해주세요.";
        idText.style.color = "red";
    }

    const formData = {id: id, password: password, password_check: passwordCheck, name: name, email: email, mobile_tel: mobileTel,
        address_postcode: sample6Postcode, address_: sample6Address, address_detail: sample6DetailAddress};

    if(id && password && passwordCheck && name && email && mobileTel && sample6Postcode && checkOk) {
        $.ajax({
            url: "http://localhost/dogether/register.php",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(response){
                console.log(response);
                if (response.success) {
                    alert("회원가입이 완료되었습니다. 로그인 해 주십시오.");
                    location.href = "login_form.php";
                }
            }
        });
    } else {
        window.scroll(0, 0);
    }
});