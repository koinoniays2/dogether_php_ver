<!-- API 키   -->
<?php
// php 상수 설정 : define()
// 네이밍 컨벤션 : 스네이크 케이스(hi_hello), 카멜 케이스(hiHello), 파스칼케이스(HiHello)
define("GOOGLE_API", "구글 API 넣으세요");
define("GOOGLE_CLIENT_SECRET", "구글 SECRET KEY 넣으세요");
define("KAKAO_API","카카오 API 넣으세요");
define("NAVER_API","네이버 API 넣으세요");
define("NAVER_CLIENT_SECRET","네이버 SECRET KEY 넣으세요");

// DB 정보
class NetworkInfo {
    const HOST = "localhost";
    const USER = "admin";
    // const USER = "sunnylee";
    const PASSWORD = "admin";
    // const PASSWORD = "lsh0916!";
    const DB = "dogether";
    // const DB = "sunnylee";
}
// 소셜 로그인 후 redirect
class SocialLogin {
    public const REDIRECT_URL = "http://localhost/dogether_php_ver/social_login.php";

    static public function socialLoginUrl($loginState) {
        switch($loginState){
            case "google":
                //* state : 소셜로그인 구분자, scope : 구글 정보 주소, prompt : 사용자 동의요청 쿼리
                // self::REDIRECT_URL 클래스 내부에서 호출
                return 'https://accounts.google.com/o/oauth2/v2/auth?client_id='.GOOGLE_API.'&redirect_uri='.self::REDIRECT_URL.'&response_type=code&state=google&scope=https://www.googleapis.com/auth/userinfo.email+https://www.googleapis.com/auth/userinfo.profile&access_type=offline&prompt=consent';
            case "kakao":
                return 'https://kauth.kakao.com/oauth/authorize?client_id='.KAKAO_API.'&redirect_uri='.self::REDIRECT_URL.'&response_type=code&state=kakao&prompt=login';
            case "naver":
                return 'https://nid.naver.com/oauth2.0/authorize?client_id='.NAVER_API.'&redirect_uri='.self::REDIRECT_URL.'&response_type=code&state=naver';
            default:
                return "";
        }
    }
}
// :: 객체를 생성하지 않고 클래스의 정적 멤버를 직접 참조하는 방법. 클래스의 정적 멤버는 클래스의 인스턴스가 생성되지 않아도 접근가능
$mysqlConnect = mysqli_connect(NetworkInfo::HOST, NetworkInfo::USER, NetworkInfo::PASSWORD, NetworkInfo::DB);
?>