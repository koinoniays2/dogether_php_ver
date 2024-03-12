<?php
// input의 name값 받아오기
$id   = $_POST["id"];
$pass = $_POST["password"];

$con = mysqli_connect("localhost", "admin", "admin", "dogether");
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($con, $sql); // 연결 객체, 실행 할 쿼리문

$num_match = mysqli_num_rows($result); // 행의 갯수 반환

if (!$num_match) {
    echo ("
            <script>
                window.alert('등록되지 않은 아이디입니다.')
                history.go(-1)
            </script>
        ");
} else {
    $row = mysqli_fetch_array($result); // 결과 집합의 각 행을 배열에 저장
    $db_pass = $row["password"]; //  결과 집합에서 "password"라는 열(column)의 값

    mysqli_close($con);

    if ($pass != $db_pass) {

        echo ("
                <script>
                    window.alert('비밀번호가 올바르지 않습니다.')
                    history.go(-1)
                </script>
        ");
        exit;
    } else {
        // 로그인 성공 시 세션에 저장
        session_start();
        $_SESSION["userid"] = $row["id"];
        $_SESSION["username"] = $row["username"];

        echo ("
                <script>
                    location.href = 'index.php';
                </script>
            ");
    }
}
