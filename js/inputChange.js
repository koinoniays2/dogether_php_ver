// 아이디 입력 필드
const idInput = document.querySelector('input[name="id"]');
const idText = document.querySelector(".id_text");

// 비밀번호 입력 필드
const passwordInput = document.querySelector('input[name="password"]');
const passwordText = document.querySelector(".password_text");

// 비밀번호 확인 입력 필드
const passwordCheckInput = document.querySelector('input[name="password_check"]');
const passwordCheckText = document.querySelector(".password_check_text");

// 이름 입력 필드
const nameInput = document.querySelector('input[name="name"]');
const nameText = document.querySelector(".name_text");

// 이메일 입력 필드
const emailInput = document.querySelector('input[name="email"]');
const emailText = document.querySelector(".email_text");

// 휴대 전화번호 입력 필드
const mobileTelInput = document.querySelector('input[name="mobile_tel"]');
const mobileText = document.querySelector(".mobile_text");

// 주소 입력 필드
const addressInput = document.querySelector('input[name="address_detail"]');
const addressText = document.querySelector(".address_text");


// 아이디 입력 필드의 실시간 변화 이벤트 추가
idInput.addEventListener("input", () => {
    const id = idInput.value;
    if (!id) {
        idText.textContent = "아이디를 입력해주세요.";
        idText.style.color = "red";
    } else {
        idText.textContent = "";
    }
});

// 비밀번호 입력 필드의 실시간 변화 이벤트 추가
passwordInput.addEventListener("input", () => {
    const password = passwordInput.value;
    if (!password) {
        passwordText.textContent = "비밀번호를 입력해주세요.";
        passwordText.style.color = "red";
    } else {
        passwordText.textContent = "";
    }
});

// 비밀번호 확인 입력 필드의 실시간 변화 이벤트 추가
passwordCheckInput.addEventListener("input", () => {
    const passwordCheck = passwordCheckInput.value;
    if (!passwordCheck) {
        passwordCheckText.textContent = "비밀번호 확인을 입력해주세요.";
        passwordCheckText.style.color = "red";
    } else {
        passwordCheckText.textContent = "";
    }
});

// 이름 입력 필드의 실시간 변화 이벤트 추가
nameInput.addEventListener("input", () => {
    const name = nameInput.value;
    if (!name) {
        nameText.textContent = "이름을 입력해주세요.";
        nameText.style.color = "red";
    } else {
        nameText.textContent = "";
    }
});

// 이메일 입력 필드의 실시간 변화 이벤트 추가
emailInput.addEventListener("input", () => {
    const email = emailInput.value;
    if (!email) {
        emailText.textContent = "이메일을 입력해주세요.";
        emailText.style.color = "red";
    } else {
        emailText.textContent = "";
    }
});

// 휴대 전화번호 입력 필드의 실시간 변화 이벤트 추가
mobileTelInput.addEventListener("input", () => {
    const mobileTel = mobileTelInput.value;
    if (!mobileTel) {
        mobileText.textContent = "휴대 전화번호를 입력해주세요.";
        mobileText.style.color = "red";
    } else {
        mobileText.textContent = "";
    }
});

// 주소 입력 필드의 실시간 변화 이벤트 추가
addressInput.addEventListener("input", () => {
    const address = addressInput.value;
    if (!address) {
        addressText.textContent = "주소를 입력해주세요.";
        addressText.style.color = "red";
    } else {
        addressText.textContent = "";
    }
});