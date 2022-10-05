<?php
require_once("../../include/initialize.php");
require_once("../../include/calendar.php");
session_start();
if($_SESSION['roles'] == 'client'){
	$user = $_SESSION['login_id'];
}else{
	header("location: ../../");
}

$gnotify_id = $_GET['notif_id'];
$gcategory = $_GET['category'];
$gservices = $_GET['services'];
$gappointment = $_GET['appointment_id'];
$gservices = $_GET['services'];
$gdate = $_GET['date'];
$gtime = $_GET['time'];
$gstatus = "";

$getStatus = "SELECT status FROM appointments WHERE id = '$gappointment'";
$getResult = $conn->query($getStatus);
if($getResult -> num_rows > 0){
	$getRow = $getResult -> fetch_assoc();
	$gstatus = $getRow['status'];
}
	

$calendar = new Calendar($gdate);

$calsql = "SELECT * FROM notification WHERE id = '$gnotify_id'";
$calresult = $conn->query($calsql);
if($calresult -> num_rows > 0){
	$row = $calresult -> fetch_assoc();
	$services = $row['services'];
	$calendar->add_event(ucfirst($services), $gdate, 1, $gstatus);
}else{
	header("location: ../");
}
	

if(isset($_GET['notif_id']) && isset($_GET['category']) && isset($_GET['appointment_id']) && isset($_GET['date']) && isset($_GET['time'])){
	$actual_link = $_SERVER['REQUEST_URI'];
	if (strpos($actual_link, '%27') !== false) {
		$new_link = str_replace("%27", "", $actual_link) ;
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("Location: $new_link");
		exit;
	}else{
		$sql = "SELECT status FROM notification WHERE id = '$gnotify_id' AND receiver = '$user'";
		$result = $conn->query($sql);
		if($result -> num_rows > 0){
			$row = $result -> fetch_assoc();
			$status = $row['status'];
			if($status == '1'){
				$sql = $conn->prepare("UPDATE notification SET status = '0' WHERE id = ?");
				$sql -> bind_param("s", $gnotify_id);
				if($sql->execute()){
					
				}
			}else{
				
			}
		}
	}
}else{
	header("location: ../");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Notification | Vets at Work Veterinary Clinic</title>
		<?php include('../include/header.php'); ?>
		<link rel="stylesheet" href="<?php echo web_root; ?>css/calendar.css"/>
	</head>
	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">
			<?php include('../include/sidebar.php'); ?>

			<div class="content-wrapper">

				<div class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<a href="javascript: history.go(-1)"><i class="fas fa-arrow-left px-2 text-dark" style="font-size: 30px;"></i></a>
							<div class="col-sm-6">
								<h1 class="m-0">Notification</h1>
							</div>
						</div>
					</div>
				</div>

				<section class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-lg-8 col-12">
												<?=$calendar?>
											</div>
											<div class="col-lg-4 col-12">
												<span class="spacing-height">&nbsp;</span>
												<form>
													<?php
														$uni = $_GET['notif_id'];
														$sql = "SELECT * FROM appointments WHERE id = '$uni'";
														$result = $conn->query($sql);
														if($result -> num_rows > 0){
															$row = $result -> fetch_assoc();
													?>
														<div class="form-group">
															<label for="fullname">Reference ID:</label>
															<input type="text" class="form-control" id="reference_id" value="<?php echo $row['id']; ?>" disabled>
														</div>
														<div class="form-group">
															<label for="petname">Pet Name:</label>
															<input type="text" class="form-control" id="petname" value="<?php echo ucfirst($row['pet_name']); ?>" disabled>
														</div>
														<div class="form-group">
															<label for="services">Service:</label>
															<input type="text" class="form-control" id="service" value="<?php echo $row['service']; ?>" disabled>
														</div>
														<div class="form-group">
															<label for="date">Date:</label>
															<input type="date" class="form-control" id="date" value="<?php echo $row['date']; ?>" disabled>
														</div>
														<div class="form-group">
															<label for="time">Time:</label>
															<input type="text" class="form-control" id="time" value="<?php echo $row['timeslot']; ?>" disabled>
														</div>
														<div class="form-group">
															<label for="status">Status:</label>
															<input type="text" class="form-control" id="status" value="<?php echo ucfirst($row['status']); ?>" disabled>
														</div>
													<?php
														}
													?>
												</form>
											</div>											
										</div>
										<div class="row mt-4">
											<div class="col-lg-12 col-12">
												<div class="table-responsive">
													<table id="same_date" class="table table-striped table-hover table-sm">
														<thead>
															<tr>
																<th class="py-1 px-2"></th>
																<th class="py-1 px-2">Pet Name</th>
																<th class="py-1 px-2">Services</th>
																<th class="py-1 px-2">Date</th>
																<th class="py-1 px-2">Time</th>
																<th class="py-1 px-2">Veterinarian</th>
																<th class="py-1 px-2">Status</th>
																<th class="py-1 px-2 text-center" style="width: 15%;">Action</th>
															</tr>
														</thead>
														<tbody>
															<?php
																$sql = "SELECT * FROM appointments WHERE status = 'scheduled' AND user_id = '$user' OR status = 'rescheduled' AND user_id = '$user' OR status = 'pending' AND user_id = '$user' ORDER BY id DESC";
																$result = $conn->query($sql);
																if($result -> num_rows > 0){
																	while($row = $result -> fetch_assoc()){
															?>											
															<tr>
																<td class="py-1 px-2">&nbsp;&nbsp;</td>
																<td class="py-1 px-2"><?php echo ucfirst($row['pet_name']); ?></td>
																<td class="py-1 px-2 text-nowrap"><?php echo ucfirst($row['service']); ?></td>
																<td class="py-1 px-2 text-nowrap"><?php echo ucfirst($row['date']); ?></td>
																<td class="py-1 px-2"><?php echo $row['timeslot']; ?></td>
																<td class="py-1 px-2">
																	<i>not set</i>
																</td>
																<?php
																	if($row['status'] == 'scheduled'){
																?>
																		<td class="py-1 px-2 text-nowrap text-success">Scheduled</td>
																<?php
																	}elseif($row['status'] == 'pending'){
																?>
																		<td class="py-1 px-2 text-nowrap text-warning">Pending</td>
																<?php
																	}elseif($row['status'] == 'cancel'){
																?>
																		<td class="py-1 px-2 text-nowrap text-danger">Cancelled</td>
																	
																<?php
																	}elseif($row['status'] == 'rescheduled'){?>
																		<td class="py-1 px-2 text-nowrap text-purple">Rescheduled</td>
																<?php
																	}else{
																?>
																		<td class="py-1 px-2 text-nowrap text-primary">Done</td>
																<?php
																	}
																?>
																<td class="py-1 px-2 text-center">
																	<a href="<?php echo web_root; ?>client/notifications/?notif_id=<?php echo $row['id']; ?>&category=appointment&services=<?php echo $row['service']; ?>&appointment_id=<?php echo $row['id']; ?>&date=<?php echo $row['date']; ?>&time=<?php echo $row['timeslot']; ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>&nbsp; View</a>
																</td>
															</tr>
															<?php
																	}
																}
															?>												
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<footer class="main-footer">
				<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
				All rights reserved.
				<div class="float-right d-none d-sm-inline-block">
					<b>Version</b> 3.2.0
				</div>
			</footer>
		</div>
		<?php include('../include/footer.php'); ?>
	</body>
</html>
