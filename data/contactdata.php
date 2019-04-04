<?php
require_once('../database/Database.php');
$db = new Database(); 

if(session_status() == PHP_SESSION_NONE)
{
	session_start();
}


if(isset($_POST['name'])){
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];

	$sql = "INSERT INTO contact (name, email, phone, message)
			 VALUES(?,?,?,?);
	";

$result = $db->insertRow($sql, [$name, $email, $phone, $message]);

$return['valid'] = true;
$return['url'] = "index.php";

echo json_encode($return);

}

$db->Disconnect();
 ?>

