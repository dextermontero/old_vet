<?php
require_once("../../../include/initialize.php");
session_start();
if($_SESSION['roles'] == 'administrator' || $_SESSION['roles'] == 'superadmin'){
	$user = $_SESSION['login_id'];
}else{
	header("location: ../../../");
}

$id = $_POST['id'];
$category = 'pets';

$sql = $conn->prepare("INSERT INTO archive(id, user_id, category)VALUES(?, ?, ?)");
$sql->bind_param("sss", $id, $user, $category);
if($sql->execute()){
	$update = $conn->prepare("UPDATE pet_profile SET archive_status = '1' WHERE pet_id = ?");
	$update -> bind_param("s", $id);
	if($update->execute()){
		echo 'success';
	}else{
		echo 'failed';
	}
}else{
	echo 'failed';
}
?>