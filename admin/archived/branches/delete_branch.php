<?php
require_once("../../../include/initialize.php");
session_start();
if($_SESSION['roles'] == 'administrator' || $_SESSION['roles'] == 'superadmin'){
	$user = $_SESSION['login_id'];
}else{
	header("location: ../../../");
}
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$sql = "SELECT * FROM archive WHERE archive_id = '$id'";
	$result = $conn->query($sql);
	if($result -> num_rows > 0){
		$row = $result -> fetch_assoc();
		$service_id = $row['id'];
		$chk = $conn->prepare("DELETE FROM branch WHERE branch_id = ?");
	}else{
		echo 'failed';
	}
}
?>