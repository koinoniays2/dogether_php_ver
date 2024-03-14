// 소셜 로그인을 눌렀을 때 오게되는 페이지 (url에있는 code, state를 얻기위해) & 실행되는 페이지 : 로그인 요청시 URL을 받고, 받은 정보를 이용해 리디렉션 페이지(social_login.php)에서 작업(컨트롤러)처리
<?php 
include "controller/social_login_controller.php";
// 인가코드 : 사용자 데이터에 액세스할 수 있는 권한을 부여받는 코드
$code = $_GET['code'];
// 플랫폼 구분자
$state = $_GET['state'];
$socialLoginInstance = new SocialLoginController($code, $state);
$socialLoginInstance->getToken();
$socialLoginInstance->getProfile();
?>