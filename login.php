<?php
// input의 name값 받아오기
$id   = $_POST["id"];
$pass = $_POST["password"];

$con = mysqli_connect("localhost", "admin", "admin", "dogether");
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($con, $sql); // 연결 객체, 실행 할 쿼리문

$num_match = mysqli_num_rows($result); // 행의 갯수 반환

if (!$num_match) {
    echo json_encode(array('success' => false, 'message' => '아이디'));
} else {
    // 로그인 성공 시에는 세션 설정 후 성공 응답 보내기
    $row = mysqli_fetch_array($result); // 결과 집합의 각 행을 배열에 저장
    $db_pass = $row["password"]; //  결과 집합에서 "password"라는 열(column)의 값
    mysqli_close($con);
    if ($pass != $db_pass) {
        echo json_encode(array('success' => false, 'message' => '비밀번호'));
        exit;
    } else {
        session_start();
        $_SESSION["userid"] = $row["id"];
        $_SESSION["username"] = $row["username"];
        echo json_encode(array('success' => true, 'redirect' => 'index.php'));
    }
}
