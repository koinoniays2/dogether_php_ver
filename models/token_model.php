<?php 
// 두번째 요청 : (토큰값을 얻어서 사용자의 정보 API 요청을 위한 class)
class TokenModel {
    private $accessToken;
    private $refreshToken;

    
    function __construct($data) {
        $this->accessToken = $data['access_token'];
        $this->refreshToken = $data['refresh_token'];
    }
    // getter
    function getAccessToken() {
        return $this->accessToken;
    }
    function getRefreshToken() {
        return $this->refreshToken;
    }
}
?>