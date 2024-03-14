<?php 
include "config/const.php"; // import개념
include "models/token_model.php";
class SocialLoginController {
    // 모델
    private $tokenModel = null;
    private $profileModel = null;
    // 레포지토리
    private $socialLoginRepository;
    private $code; // 인가코드
    private $state; // 플랫폼 구분자

    function __construct($code, $state/*, $socialLoginRepository */) {
        $this->code = $code;
        $this->state = $state;
        // $this->socialLoginRepository;
    }

    // 토큰값을 받기위한 API 요청 함수
    function getToken() {
        $restApiKey = '';
        $returnUrl = '';
        $loginUrl = '';
        $client_secret = '';
        $callbackUrl = urlencode(SocialLogin::REDIRECT_URL); // const.php의 SocialLogin클래스에 정의된 리디렉트 주소

        // 플랫폼에 따른 const.php에 정의된 상수를 사용
        if($this->state == "google") {
            $restApiKey = GOOGLE_API;
            $client_secret = GOOGLE_CLIENT_SECRET;
            $loginUrl = "https://oauth2.googleapis.com";
        }
        // API 요청 URL
        $returnUrl = "$loginUrl/token?grant_type=authorization_code&client_id=".$restApiKey
        ."&redirect_uri=".$callbackUrl."&code=".$this->code;
        $returnUrl .= $client_secret != '' ? "&client_secret=".$client_secret : '';

        try{
            $ch = curl_init(); // curl : php의 데이터를 전송하는 데 사용되는 라이브러리
            // 키 => 밸류(자바스크립트의 : ), -> (참조 자바스크립트의 .) 
            $body_data = array( 
            "code"=>$this->code,
            "client_id" => $restApiKey,
            "client_secret" =>$client_secret,
            "redirect_uri"=>$callbackUrl,
            "grant_type" =>"authorization_code");
            $body = json_encode($body_data);
            //url 지정
            curl_setopt($ch,CURLOPT_URL,$returnUrl);
            //post로 전송
            curl_setopt($ch,CURLOPT_POST,true); 
            // 전송할 body값 입력
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
            //문자열로 변환
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            //curl 실행
            $response = curl_exec($ch);
            print_r("getToken".$response); // print_r : 객체 출력, echo print : 객체 출력 X
            // ㄴ요청 결과값 : { "access_token": "ya29.a0Ad52N3-98YKS0U84uUa3B8s68B2ceNG9of-yeEr_WCcRR1l_T2IGfFF54GDJAAJua05IGmfxrU3nx8BCWLVTupBCTpeEccBAVm5WDUr7eLHolom75HbhuwTzoUDvdEV7z_9DIIrVzz6Yd8ZCUy6hwRvbF8q4TCiv3OA4aCgYKAcoSARESFQHGX2MipBpXfVr-ZXDKXFtePysL4g0171", "expires_in": 3599, "refresh_token": "1//0einw_hmhuHvmCgYIARAAGA4SNwF-L9IrIgnGzy6HogT040EIBdrMqJk85khXB0yTG38_n2VoKeFP_Eo9QKlLoXrwXv-QggcQk3E", "scope": "https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile openid", "token_type": "Bearer", "id_token": "eyJhbGciOiJSUzI1NiIsImtpZCI6IjA4YmY1YzM3NzJkZDRlN2E3MjdhMTAxYmY1MjBmNjU3NWNhYzMyNmYiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL2FjY291bnRzLmdvb2dsZS5jb20iLCJhenAiOiI1OTc0MDI4NjM3MTMtZmdvYmRrMWJpaTNjaTJxa3JwZW9raDZvbHNsam05cnUuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJhdWQiOiI1OTc0MDI4NjM3MTMtZmdvYmRrMWJpaTNjaTJxa3JwZW9raDZvbHNsam05cnUuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMTcyNjUxMjU2MDA2ODgzODMxNzkiLCJlbWFpbCI6ImtvaW5vbmlheXNAZ21haWwuY29tIiwiZW1haWxfdmVyaWZpZWQiOnRydWUsImF0X2hhc2giOiJFZXB4cHZnay1qSDFvNnpqWUFXQzF3IiwibmFtZSI6Im9vIG8iLCJwaWN0dXJlIjoiaHR0cHM6Ly9saDMuZ29vZ2xldXNlcmNvbnRlbnQuY29tL2EvQUNnOG9jTGlCSXJtUkROUjhzZzN0VjdjQ0ltSk5rLU5FUzNjb3dTRmFaR2dOLTNpT0E9czk2LWMiLCJnaXZlbl9uYW1lIjoib28iLCJmYW1pbHlfbmFtZSI6Im8iLCJsb2NhbGUiOiJrbyIsImlhdCI6MTcxMDMyODk2MSwiZXhwIjoxNzEwMzMyNTYxfQ.Li6h4BlJd89ZW1IhqZH7JT80onEVb3YVbFY3zHMAtCzAV1Nf94t3MNQckYmkGAooxssdlelifauNZSOO3h6s4oQWyHL-LIkLd74CUHU5o2HLWMkcVLUUoYXJ6H6a2_4N0PbRVf5rKTc0G-k3SAIXwIPundaMvLBJ0m6Ml0gKANqtUvmUkc0nluxJfDhyF90k92fRMRBooibgDVOuG0Cd4aghwZXjHZ11OGYbuWFPcsNZCH84NhgDlNM3IaoGTpf2qfWMADMEXa9mh9-KP2DCwoW2CcMpvm2mOh2oAxeYjD8Dm-cXGEgXbOjAhpPsh_kfcNEzfPIRCQ8BdxMKl9OIMg" }
            //json데이터
            $data = json_decode($response, true);
            // tokenModel 인스턴스 생성
            $tokenModel = new TokenModel($data); // 받아온 결과값(data)의 access_token, refresh_token을 구하기 위한 인스턴스 생성
            $this->tokenModel = $tokenModel; // 컨트롤러(this)의 키워드인 모델에 인스턴스를 넣음
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    // 사용자 정보를 받기위한 API 요청 함수
    function getProfile(){
        $header = array("Authorization: Bearer ".$this->tokenModel->getAccessToken());
        $profile_url = '';
        $profile_url = "https://www.googleapis.com/oauth2/v3/userinfo";
        $ch = curl_init();
        //url 지정
        curl_setopt($ch,CURLOPT_URL,$profile_url);
        //문자열로 변환
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        //header 입력
        curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
        //json데이터
        $response = curl_exec($ch);
        // curl 종료
        curl_close($ch);
        
        $decoded_data = json_decode($response,true);
        print_r("getProfile".$decoded_data);
    }
}
?>