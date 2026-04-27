<?php
session_start();
include('../config/db.php');
$data = json_decode(file_get_contents("php://input"));
$username = $data->username;
$password = md5($data->password);

$res = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
if($res->num_rows>0){
    $_SESSION['user']=$username;
    echo json_encode(["status"=>"success"]);
}else{
    echo json_encode(["status"=>"error"]);
}
?>