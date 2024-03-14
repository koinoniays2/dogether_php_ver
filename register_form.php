<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 폰트어썸 -->
    <script src="https://kit.fontawesome.com/96b5911d82.js" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/index.css" type="text/css" />
    <link rel="stylesheet" href="css/header.css" type="text/css" />
    <link rel="stylesheet" href="css/register_form.css" type="text/css" />
    <!-- 제이쿼리 -->
    <script src="js/jquery-3.7.1.min.js"></script>
    <!-- 주소 API -->
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <title>회원가입</title>
</head>
<body>
    <header id="header">
        <?php include "header.php"; ?>
    </header>
    <?php
    // if (!isset($_SESSION["agreement"]) || $_SESSION["agreement"] !== true) {
    //     // 세션에 동의 여부가 없거나 동의하지 않은 경우
    //     echo "
    //     <script>
    //     alert('잘못된 접근입니다.');
    //     window.location.href = 'index.php';
    //     </script>";
    //     exit;
    // }

    // // 동의한 경우에만 페이지를 보여줌
    // // 여기서 세션 삭제
    // unset($_SESSION["agreement"]);
    ?>

    <main>
        <section id="main_container">
            <!-- <h2>회원가입</h2> -->
            <form name="register_form" id="register_form">
                <ul>
                    <li>
                        <div>
                            <span>아이디</span>
                            <div class="btn_box">
                                <input type="text" id="id" name="id" placeholder="아이디를 입력해주세요." />
                                <button id="check_id" type="submit">중복확인</button>
                            </div>
                        </div>
                        <span class="id_text"></span>
                    </li>
                    <li>
                        <div>
                            <span>비밀번호</span>
                            <input type="password" id="password" name="password" placeholder="비밀번호를 입력해주세요." />
                        </div>
                        <span class="password_text"></span>
                    </li>
                    <li>
                        <div>
                            <span>비밀번호 확인</span>
                            <input type="password" id="password_check" name="password_check" placeholder="비밀번호를 다시 확인해주세요." />
                        </div>
                        <span class="password_check_text"></span>
                    </li>
                    <li>
                        <div>
                            <span>이름</span>
                            <input type="text" id="name" name="name" placeholder="이름을 입력해주세요." />
                        </div>
                        <span class="name_text"></span>
                    </li>
                    <li>
                        <div>
                            <span>이메일</span>
                            <input type="email" id="email" name="email" placeholder="이메일 주소를 입력해주세요.">
                        </div>
                        <span class="email_text"></span>
                    </li>
                    <li>
                        <div>
                            <span>휴대 전화번호</span>
                            <input type="text" id="mobile_tel" name="mobile_tel" placeholder="휴대 전화번호를 입력해주세요.">
                        </div>
                        <span class="mobile_text"></span>
                    </li>
                    <li>
                        <div>
                            <span>주소</span>
                            <div class="address_search">
                                <input type="text" id="sample6_postcode" placeholder="주소" name="address_postcode" readonly>
                                <input type="text" id="sample6_address" name="address_" readonly>
                            </div>
                            <div class="btn_box">
                                <input type="text" id="sample6_detailAddress" placeholder="상세주소" name="address_detail">
                                <button type="button" onclick="sample6_execDaumPostcode()"><i class="fas fa-search"></i></button>
                            </div>
                            <!-- <input type="text" id="sample6_extraAddress" placeholder="참고항목" name="address_option" readonly> -->
                        </div>
                        <span class="address_text"></span>
                    </li>
                </ul>
                <button id="register_btn" type="submit">
                    가입하기
                </button>
            </form>
        </section>
    </main>
    <script>
        function sample6_execDaumPostcode() {
            new daum.Postcode({
                oncomplete: function(data) {
                    // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                    // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                    // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                    var addr = ''; // 주소 변수
                    var extraAddr = ''; // 참고항목 변수

                    //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                    if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                        addr = data.roadAddress;
                    } else { // 사용자가 지번 주소를 선택했을 경우(J)
                        addr = data.jibunAddress;
                    }

                    // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                    if (data.userSelectedType === 'R') {
                        // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                        // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                        if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
                            extraAddr += data.bname;
                        }
                        // 건물명이 있고, 공동주택일 경우 추가한다.
                        if (data.buildingName !== '' && data.apartment === 'Y') {
                            extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                        }
                        // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                        if (extraAddr !== '') {
                            extraAddr = ' (' + extraAddr + ')';
                        }
                        // 조합된 참고항목을 해당 필드에 넣는다.
                        // document.getElementById("sample6_extraAddress").value = extraAddr;

                    } else {
                        // document.getElementById("sample6_extraAddress").value = '';
                    }

                    // 우편번호와 주소 정보를 해당 필드에 넣는다.
                    document.getElementById('sample6_postcode').value = data.zonecode;
                    document.getElementById("sample6_address").value = addr;
                    // 커서를 상세주소 필드로 이동한다.
                    document.getElementById("sample6_detailAddress").focus();
                }
            }).open();
        }
    </script>

    <!-- JS -->
    <script src="js/registerForm.js"></script>
    <script src="js/inputChange.js"></script>
</body>
</html>