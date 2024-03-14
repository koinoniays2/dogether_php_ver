<?php 
// 카카오 로그아웃 안전하게 하기
class LogoutController {
    private $accessToken;
    public function __construct($accessToken) {
        $this->accessToken = $accessToken;
    }

    function logout() {
        $header = array("Authorization: Bearer ". $this->accessToken);
        $url = "https://kauth.kakao.com/oauth/token";
        $ch = curl_init();
        //url 지정
        curl_setopt($ch,CURLOPT_URL,$url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        //문자열로 변환
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

        //실행, 종료
        curl_exec($ch);
        curl_close($ch);
    }
}
?>