<?php
    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $con = mysqli_connect("localhost", "admin", "admin", "dogether");

    // 첫 번째 SQL 쿼리를 실행하고 결과를 $name 변수에 저장
    $sql_select = "SELECT name FROM board WHERE num = $num";
    $result_select = mysqli_query($con, $sql_select);
    $row = mysqli_fetch_array($result_select);
    $name = $row["name"];

    // 두 번째 SQL 쿼리를 실행하여 데이터 삭제
    $sql_delete = "DELETE FROM board WHERE num = $num AND name = '$name'";
    mysqli_query($con, $sql_delete);

    // 데이터베이스 연결 종료
    mysqli_close($con);

    // 목록 페이지로 이동
    echo "<script>location.href = 'board_list.php?page=$page';</script>";
?>