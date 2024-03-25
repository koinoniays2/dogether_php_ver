<?php
include "controller/logout_controller.php";
session_start();
$accessToken = $_SESSION["accessToken"];
$state = $_SESSION["state"];
$controller = new LogoutController($accessToken);

if($state == 'kakao') {
  $controller->logout();
}
unset($_SESSION["userid"]);
unset($_SESSION["name"]);
unset($_SESSION["level"]);
unset($_SESSION["accessToken"]);
unset($_SESSION["state"]);
header("Location: http://" . $_SERVER['HTTP_HOST']. '/dogether_php_ver/index.php');
exit();
// echo ("
//         <script>
//             location.href = 'index.php';
//         </script>
//     ");
?>