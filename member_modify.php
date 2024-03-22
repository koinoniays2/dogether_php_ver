<?php
    $id = $_GET["id"];
    $password = $_POST["password"];
    // $email1  = $_POST["email1"];
    // $email2  = $_POST["email2"];
    // $email = $email1."@".$email2;
    $email = $_POST["email"];
    $mobile_tel = $_POST["mobile_tel"];
    $address = $_POST["address_"];
    $address_detail = $_POST["address_detail"];

    $con = mysqli_connect("localhost", "admin", "admin", "dogether");
    $sql = "UPDATE users SET password='$password', email='$email', mobile_tel='$mobile_tel', address='$address', address_detail='$address_detail' WHERE id='$id'";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>