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
		
		$query = "SELECT service_photo, service_title FROM services WHERE service_id = '$service_id'";
		$result1 = $conn->query($query);
		if($result1 -> num_rows > 0) {
			$row1 = $result1 -> fetch_assoc();
			$title = $row1['service_title'];
			$specific = $row1['service_photo'];
			unlink("../../../dist/img/services/$specific");
			
			$chk = $conn->prepare("DELETE FROM services WHERE service_id = ?");
			$chk -> bind_param("s", $service_id);
			$chk1 = $conn->prepare("DELETE FROM archive WHERE archive_id = ?");
			$chk1 -> bind_param("s", $id);
			if($chk->execute() && $chk1->execute()){
				$s = "SELECT admin_id, firstname, lastname FROM admin_profile WHERE admin_id = '$user'";
				$r = $conn->query($s);
				if($r -> num_rows > 0){
					$ro = $r -> fetch_assoc();
					$id = $ro['admin_id'];
					$fullname = ucfirst($ro['firstname']) .' '. ucfirst($ro['lastname']);
					$date = date("Y-m-d");
					$time = date("H:i:s");
					$activity = "<b>$fullname</b> deleting services information at [service title : $title]";
					$ss = $conn->prepare("INSERT INTO audit_logs(login_id, name, date, time, activity) VALUES (?, ?, ?, ?, ?)");
					$ss -> bind_param("sssss", $id, $fullname, $date, $time, $activity);
					if($ss->execute()){
						echo 'success';
					}
				}else {
					echo 'invalid';
				}
			}else{
				echo 'failed';
			}		
		}
	}else{
		echo 'failed';
	}		
}
?>