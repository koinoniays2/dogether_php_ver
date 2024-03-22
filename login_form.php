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
    <?php include "config/const.php"; ?>
    <header id="header">
        <?php include "header.php"; ?>
    </header>
    <main>
        <div class="background-overlay"></div>
        <section id="main_container">
            <div id="login_box">
                <!-- <div id="login_title">
                    <p>DOGETHER</p><span>with everyday</span>
                </div> -->
                <div id="login_form">
                    <form name="login_form">
                        <!-- name=폼 제출시 요소의 값 식별, action=데이터를 전송 할 URL -->
                        <ul>
                            <li>
                                <p>아이디</p>
                                <input type="text" id="id" name="id"/>
                                <!-- <span class="id-error"></span> -->
                            </li>
                            <li>
                                <p>비밀번호</p>
                                <input type="password" id="password" name="password"/>
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
                    <p><a href="terms_form.php">회원가입</a></p>
                </div>
                <div id="login_social">
                    <div>
                        <a href=<?php echo SocialLogin::socialLoginUrl("kakao") ?>>
                            <img src="images/카카오톡.png" alt="카카오톡" />
                        </a>
                    </div>
                    <div>
                        <a href=<?php echo SocialLogin::socialLoginUrl("google") ?>>
                            <img src="images/googlelogo_bgwhite.png" alt="구글" />
                        </a>
                    </div>
                    <div>
                        <a href=<?php echo SocialLogin::socialLoginUrl("naver") ?>>
                            <img src="images/네이버.png" alt="네이버" />
                        </a>
                    </div>
                </div>
        </section>
    </main>
    <!-- JS -->
    <script src="./js/login_form.js"></script>
    <script type="text/javascript" src="./js/loginForm.js"></script>
</body>

</html>