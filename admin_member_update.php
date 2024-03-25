<?php
    session_start();
    if (isset($_SESSION["level"])) $userlevel = $_SESSION["level"];
    else $userlevel = "";

    if ( $userlevel != 1 )
    {
        echo("
            <script>
            alert('관리자가 아닙니다! 회원정보 수정은 관리자만 가능합니다!');
            history.go(-1)
            </script>
        ");
        exit;
    }

    $num   = $_GET["num"];
    $level = $_POST["level"];

    $con = mysqli_connect("localhost", "admin", "admin", "dogether");
    $sql = "UPDATE users SET level=$level where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'admin.php';
	     </script>
	   ";
?>

