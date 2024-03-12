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
    <link rel="stylesheet" href="css/join.css" type="text/css" />

    <!-- 제이쿼리 -->
    <script src="js/jquery-3.7.1.min.js"></script>
    <title>회원가입</title>
</head>
<body>
    <header id="header">
        <?php include "header.php";?>
    </header>
    <main>
        <section id="main_container">
            <div id="login_box">
                <div id="login_title">
                    <a href="index.php"><p>DOGETHER</p><span>with everyday</span></a>
                </div>
                <div id="login_form">
                    <form name="login_form" method="post" action="login.php">
                        <!-- name=폼 제출시 요소의 값 식별, action=데이터를 전송 할 URL -->
                        <ul>
                            <li><input type="text" id="id" name="id" placeholder="아이디" /></li>
                            <li><input type="password" id="password" name="password" placeholder="비밀번호" /></li>
                            <li><input type="password" id="passwordCheck" name="passwordCheck" placeholder="비밀번호 확인" /></li>
                            <li><input type="text" id="phoneNum" name="password" placeholder="'-'없이 전화번호를 입력해주세요." /></li>
                        </ul>
                        <div id="error_text">
                        </div>
                        <div id="login_btn">
                            회원가입
                        </div>
                    </form>
                </div>
        </section>
    </main>
    <!-- JS -->
    <script type="text/javascript" src="./js/loginForm.js"></script>
</body>
</html>