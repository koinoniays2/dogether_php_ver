<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ★ login.php, loginForm.js ★ -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 폰트어썸 -->
    <script src="https://kit.fontawesome.com/96b5911d82.js" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/index.css" type="text/css" />
    <link rel="stylesheet" href="css/header.css" type="text/css" />
    <link rel="stylesheet" href="css/login_form.css" type="text/css" />
    <!-- 제이쿼리 -->
    <script src="js/jquery-3.7.1.min.js"></script>
    <title>로그인</title>
</head>
<body>
    <header id="header">
        <?php include "header.php";?>
    </header>
    <main>
        <section id="main_container">
            <div id="login_box">
                <div id="login_title">
                    <a href="index.php"><img src="images/logo2.png" alt="logo" /></a>
                </div>
                <div id="login_form">
                    <form name="login_form">
                        <!-- name=폼 제출시 요소의 값 식별, action=데이터를 전송 할 URL -->
                        <ul>
                            <li>
                                <input type="text" id="id" name="id" placeholder="아이디" />
                                <!-- <span class="id-error"></span> -->
                            </li>
                            <li>
                                <input type="password" id="password" name="password" placeholder="비밀번호" />
                                <!-- <span class="password-error"></span> -->
                                <span class="error-text"></span>
                            </li>
                        </ul>
                        <button id="login_btn" type="submit">
                            로그인
                        </button>
                    </form>
                </div>
                <div id="login_option">
                    <p>아이디 찾기</p>
                    <p>비밀번호 찾기</p>
                    <p>회원가입</p>
                </div>
                <div id="login_social"> 
                    <div>
                        <img src="images/카카오톡.png" alt="카카오톡" />
                    </div>
                    <div>
                        <img src="images/구글.png" alt="구글" />
                    </div>
                    <div>
                        <img src="images/네이버.png" alt="네이버" />
                    </div>
                </div>
        </section>
    </main>
    <!-- JS -->
    <script type="text/javascript" src="./js/loginForm.js"></script>
</body>
</html>