<?php
    $id   = $_POST["id"];
    $password = $_POST["password"];
    $password_check = $_POST["password_check"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile_tel = $_POST["mobile_tel"];
    $address_postcode = $_POST["address_postcode"];
    $address_ = $_POST["address_"];
    $address_detail = $_POST["address_detail"];
    // $address_option = $_POST["address_option"];
    $address = "(".$address_postcode.")".$address_.$address_detail/*."(".$address_option.")"*/;

    
    $regist_day = date("Y-m-d H:i"); // 현재의 '년-월-일-시-분'을 저장

    $con = mysqli_connect("localhost", "admin", "admin", "dogether");

	$sql = "INSERT INTO users(id, password, password_check, name, email, mobile_tel, address) ";
	$sql .= "VALUES('$id', '$password', '$password_check', '$name', '$email', '$mobile_tel', '$address')";

    $result = mysqli_query($con, $sql); // $sql 에 저장된 명령 실행
    mysqli_close($con); 
        
    if (!$result) {
        echo json_encode(array('success' => false, 'message' => '회원가입에 실패했습니다.'));
    } else {
        echo json_encode(array('success' => true));
    }
?>