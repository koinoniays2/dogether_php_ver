<!-- DB 연동 -->
<?php
class SocialLoginRepository{
    protected $con;

    public function __construct($con) { $this->con = $con; }

    public function findUserByEmail($email){
        try {
            $sql = "select * from users where email='$email'";
            //쿼리 실행
            $result = mysqli_query($this->con, $sql);

            if (mysqli_num_rows($result) > 0) {
               $row = mysqli_fetch_array($result);
                return $row;
            }else{
                return null;
            }
    
        } catch (Exception $e) {
            print($e->getMessage());
        }
       
        //레코드 수 반환
        // $num_record = mysqli_num_rows($result);
    }
    public function signup($profileModel,$state){
        try {
            $regist_day = date("Y-m-d (H:i)");
            //회원가입과 동일한 sql문 + login_div 추가해서 넣기
            $sql = "INSERT INTO users(id, password, name, email, login_div) ";
            $sql .= "VALUES('$profileModel->email', '$profileModel->uid', '$profileModel->nickname', '$profileModel->email', '$state')";
            //쿼리 실행
            mysqli_query($this->con,$sql);
            //쿼리 종료
            mysqli_close($this->con);
        } catch (Exception $e) {
            print($e->getMessage());
        }
         //오늘 날짜
 
    }
}