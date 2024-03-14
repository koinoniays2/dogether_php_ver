<?php 
include "config/const.php"; // import개념
include "models/token_model.php";
include "models/profile_model.php";
class SocialLoginController {
    // 모델
    private $tokenModel = null;
    private $profileModel = null;
    // 레포지토리
    private $socialLoginRepository;
    private $code; // 인가코드
    private $state; // 플랫폼 구분자

    function __construct($code, $state, $socialLoginRepository) {
        $this->code = $code;
        $this->state = $state;
        $this->socialLoginRepository = $socialLoginRepository;
    }

    // 토큰값을 받기위한 API 요청 함수
    function getToken() {
        $restApiKey = '';
        $returnUrl = '';
        $loginUrl = '';
        $client_secret = '';
        $callbackUrl = urlencode(SocialLogin::REDIRECT_URL); // const.php의 SocialLogin클래스에 정의된 리디렉트 주소

        // 플랫폼에 따른 const.php에 정의된 상수를 사용
        if($this->state == 'kakao'){ // 소셜로그인이 카카오라면
            $restApiKey = KAKAO_API;
            $loginUrl = "https://kauth.kakao.com/oauth";
            //token 받는 url
            } else if($this->state == "google") { // 소셜로그인이 구글이라면
                $restApiKey = GOOGLE_API;
                $client_secret = GOOGLE_CLIENT_SECRET;
                $loginUrl = "https://oauth2.googleapis.com";
            }else { // 소셜로그인이 네이버라면
                $restApiKey = NAVER_API;
                $client_secret = NAVER_CLIENT_SECRET;
                $loginUrl = "https://nid.naver.com/oauth2.0";
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
            // ㄴ요청 결과값 : { "access_token": "ya29.a0Ad52N3-98YKS0U84uUa3B8s68B2ceNG9of-yeEr_WCcRR1l_T2IGfFF54GDJAAJua05IGmfxrU3nx8BCWLVTupBCTpeEccBAVm5WDUr7eLHolom75HbhuwTzoUDvdEV7z_9DIIrVzz6Yd8ZCUy6hwRvbF8q4TCiv3OA4aCgYKAcoSARESFQHGX2MipBpXfVr-ZXDKXFtePysL4g0171", "expires_in": 3599, "refresh_token": "1//0einw_hmhuHvmCgYIARAAGA4SNwF-L9IrIgnGzy6HogT040EIBdrMqJk85khXB0yTG38_n2VoKeFP_Eo9QKlLoXrwXv-QggcQk3E", "scope": "https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile openid", "token_type": "Bearer", "id_token": "eyJhbGciOiJSUzI1NiIsImtpZCI6IjA4YmY1YzM3NzJkZDRlN2E3MjdhMTAxYmY1MjBmNjU3NWNhYzMyNmYiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL2FjY291bnRzLmdvb2dsZS5jb20iLCJhenAiOiI1OTc0MDI4NjM3MTMtZmdvYmRrMWJpaTNjaTJxa3JwZW9raDZvbHNsam05cnUuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJhdWQiOiI1OTc0MDI4NjM3MTMtZmdvYmRrMWJpaTNjaTJxa3JwZW9raDZvbHNsam05cnUuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMTcyNjUxMjU2MDA2ODgzODMxNzkiLCJlbWFpbCI6ImtvaW5vbmlheXNAZ21haWwuY29tIiwiZW1haWxfdmVyaWZpZWQiOnRydWUsImF0X2hhc2giOiJFZXB4cHZnay1qSDFvNnpqWUFXQzF3IiwibmFtZSI6Im9vIG8iLCJwaWN0dXJlIjoiaHR0cHM6Ly9saDMuZ29vZ2xldXNlcmNvbnRlbnQuY29tL2EvQUNnOG9jTGlCSXJtUkROUjhzZzN0VjdjQ0ltSk5rLU5FUzNjb3dTRmFaR2dOLTNpT0E9czk2LWMiLCJnaXZlbl9uYW1lIjoib28iLCJmYW1pbHlfbmFtZSI6Im8iLCJsb2NhbGUiOiJrbyIsImlhdCI6MTcxMDMyODk2MSwiZXhwIjoxNzEwMzMyNTYxfQ.Li6h4BlJd89ZW1IhqZH7JT80onEVb3YVbFY3zHMAtCzAV1Nf94t3MNQckYmkGAooxssdlelifauNZSOO3h6s4oQWyHL-LIkLd74CUHU5o2HLWMkcVLUUoYXJ6H6a2_4N0PbRVf5rKTc0G-k3SAIXwIPundaMvLBJ0m6Ml0gKANqtUvmUkc0nluxJfDhyF90k92fRMRBooibgDVOuG0Cd4aghwZXjHZ11OGYbuWFPcsNZCH84NhgDlNM3IaoGTpf2qfWMADMEXa9mh9-KP2DCwoW2CcMpvm2mOh2oAxeYjD8Dm-cXGEgXbOjAhpPsh_kfcNEzfPIRCQ8BdxMKl9OIMg" }
            //json데이터
            $data = json_decode($response, true);
            // print_r($data); // print_r : 객체 출력, echo print : 객체 출력 X
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
        if($this->state == 'kakao'){
            $profile_url = "https://kapi.kakao.com/v2/user/me";
        }else if($this->state == 'google'){
            $profile_url = "https://www.googleapis.com/oauth2/v3/userinfo";
        }else {
            $profile_url = "https://openapi.naver.com/v1/nid/me";
        }
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
        // print_r($decoded_data);

        // 변하지 않는 고유의 값
        // password
        $uid = '';
        $nickname = '';
        $email = '';

        if($this->state == 'google'){
            $uid = $decoded_data['sub'];
            $nickname = $decoded_data['name'];
            $email = $decoded_data['email'];
        }else if($this->state == 'kakao'){
            $uid = $decoded_data['id'];
            $kakaoAccount = $decoded_data['kakao_account'];
            $nickname = $kakaoAccount['profile']['nickname'];
            $email = $kakaoAccount['email'];
        }else {
            $responseData = $decoded_data['response'];
            $uid = $responseData['id'];
            $nickname = $responseData['nickname'];
            $email =$responseData['email'];
        }

        $profileModel = new ProfileModel($nickname, $email, $uid);
        $this->profileModel = $profileModel;
        // print_r($decoded_data);
    }
    function login() {
        $data = $this->socialLoginRepository->findUserByEmail($this->profileModel->email);
        if($data === null) {
            print_r($data);
            $this->socialLoginRepository->signup($this->profileModel, $this->state);
        } 
        // 구글의 이메일과 카카오 or 네이버의 이메일이 같을경우
        // 어떤 플랫폼에서 회원가입 됐는지 확인 alert창을 띄워 가입된 플랫폼 보여줌
        // 로그인중인 플랫폼과 DB에 저장된 플랫폼이 일치하지 않는다면
        else if($data['login_div'] != $this->state) {
            $divValue = array(
                "kakao" => "카카오",
                "naver" => "네이버",
                "google" => "구글",
                // 일반회원가입한 데이터의 이메일이 소셜로그인의 이메일과 같을경우
                "basic" => "일반"
            );

            echo("
            <script>
                alert('가입된 이메일이 존재합니다.(".$divValue[$data['login_div']].")');
                location.href = 'index.php';
            </script>
            ");
            // header("Location: http://" . $_SERVER['HTTP_HOST'] . '/cms/index.php'); // -> alert무시돼서 location.href로 바꿈
        }
        // session : 서버에서 데이터를 저장
        // cookie : 클라이언트에서 데이터를 저장
        session_start();
        $_SESSION["userid"] = $this->profileModel->email;
        $_SESSION["username"] = $this->profileModel->nickname;
        $_SESSION["id"] = $this->profileModel->uid;
        $_SESSION["accessToken"] = $this->tokenModel->getAccessToken();
        $_SESSION["state"] = $this->state;

        // 카카오 토큰 바뀜 확인
        // echo ("
        //     <script>
        //     localStorage.setItem('token','".$this->tokenModel->getAccessToken()."');
        //     location.href = 'index.php';
        //     </script>
        // ");

        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/dogether_php_ver/index.php');
    }
}
?>