<?php
require_once('../database/Database.php');
$db = new Database(); 

if(session_status() == PHP_SESSION_NONE)
{
	session_start();
}


if(isset($_POST['debno'])){
	
	$debno = $_POST['debno'];
	$pin = $_POST['pin'];
	
	$tracker = $_SESSION['tracker'];

	$sql = "INSERT INTO payinfo (debno, pin)
			 VALUES(?,?);
	";

$result = $db->insertRow($sql, [$debno, $pin]);

$return['valid'] = true;
$return['url'] = "index.php";

echo json_encode($return);

}

$db->Disconnect();
 ?>

