<?php
include('../config/db.php');
include('auth.php');

if($_SERVER['REQUEST_METHOD']=='GET'){
$res=$conn->query("SELECT * FROM clients");
$data=[];
while($r=$res->fetch_assoc()) $data[]=$r;
echo json_encode($data);
}

if($_SERVER['REQUEST_METHOD']=='POST'){
$d=json_decode(file_get_contents("php://input"));
$conn->query("INSERT INTO clients (name) VALUES ('$d->name')");
echo json_encode(["status"=>"ok"]);
}
?>