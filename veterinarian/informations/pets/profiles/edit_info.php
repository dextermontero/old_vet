<?php
require_once("../../../../include/initialize.php");
if($_SESSION['roles'] == 'veterinarian'){
	$user = $_SESSION['login_id'];
}else{
	header("location: ../../../../");
}
if(isset($_GET['pet_id'])){
	$get = $_GET['pet_id'];
	$chkGet = "SELECT pet_id FROM pet_profile WHERE pet_id = '$get'";
	$resGet = $conn->query($chkGet);
	if($resGet -> num_rows > 0) {
		$id = $_GET['pet_id'];
	}else {
		header('location: '.web_root.'veterinarian/informations/pets/');
	}
}
?>
<?php
$sql = "SELECT pet_profile.pet_id, pet_profile.pet_name, pet_profile.pet_breed, pet_profile.pet_weight, pet_profile.pet_birthdate, pet_profile.pet_vaccination, pet_profile.pet_blood_type, pet_profile.pet_medical_status, user_profile.firstname, user_profile.lastname FROM pet_profile INNER JOIN user_profile ON user_profile.user_id = pet_profile.user_id WHERE pet_profile.pet_id = '$id'";
$result = $conn->query($sql);
if($result -> num_rows > 0){
	$row = $result -> fetch_assoc();
	$fullname = ucfirst($row['firstname']) .' '. ucfirst($row['lastname']);
?>
	<span id="pet_id" hidden><?php echo $row['pet_id']; ?></span>
<?php
}
?>							