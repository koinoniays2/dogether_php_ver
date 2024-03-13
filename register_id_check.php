<?php
    $id = $_POST["id"];

    $con = mysqli_connect("localhost", "admin", "admin", "dogether");

    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    $num_record = mysqli_num_rows($result);

    if ($num_record)
    {
        echo json_encode(array('success' => false, 'message' => '중복'));
        exit;
    }
    else
    {
        echo json_encode(array('success' => true));
    }
    mysqli_close($con);
?>