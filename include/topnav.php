<?php
session_start();
?>
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
	<a href="index.php" class="navbar-brand ms-lg-5">
		<h1 class="m-0 text-uppercase text-dark mobile-screen"><i class="bi bi-shop fs-1 text-primary me-3"></i>VETS AT WORK VETERINARY</h1>
	</a>
	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<div class="navbar-nav ms-auto py-0">
			<a href="index.php" class="nav-item nav-link">Home</a>
			<a href="about.php" class="nav-item nav-link">About</a>
			<a href="service.php" class="nav-item nav-link">Service</a>
			<!--<a href="product.php" class="nav-item nav-link">Product</a>-->
			<a href="blog.php" class="nav-item nav-link">Blog</a>
			<a href="" class="nav-item nav-link nav-contact bg-info text-white px-5 ms-lg-5" data-bs-toggle="modal" data-bs-target="#login">LOGIN</a>

		</div>
			<!-- <a href="#" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Login <i class="bi bi-arrow-right"></i></a> -->
		</div>
	</div>
</nav>
<!-- Navbar End -->
<span id="web_root" hidden><?php echo web_root; ?></span>
<!-- Login Modal -->
<div class="modal fade" id="login" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">LOGIN ACCOUNT</h5>
				<button type="button" class="btn-close" id="login-btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6 col-12">
						<img src="<?php echo web_root; ?>dist/img/vaw-logo.jpg" class="img-fluid rounded mx-auto bg-background-image">
					</div>
					<div class="col-lg-6 col-12">
						<h4>Welcome!</h4>
						<span>Login to your account</span>
						<br>
						<br>
						<div class="d-flex flex-column">
							<form action="" method="post">
								<div class="form-group" style="padding-bottom: 3px">
									<label for="admin-email" class="form-label">Email Address: </label>
									<input type="email" class="form-control " name="admin-email" id="admin-email" placeholder="E-mail" />
								</div>
								<div class="form-group" style="padding-bottom: 10px">
									<label for="admin-password" class="form-label">Password: </label>
									<input type="password" class="form-control" name="admin-password" id="admin-password" placeholder="Password"/>
								</div>							
								<!-- Login Button -->
								<div class="d-grid">
									<button type="submit" class="btn btn-success" id="admin-login">Login</button>
									<div class="text-danger text-center mt-3"><span id="exceed" hidden></span></div>
								</div>
								<div class="d-flex flex-row-reverse">
									<div class="form-check">
										<label class="form-check-label" for="login_password_show">Show password</label>
										<input class="form-check-input" type="checkbox" value="" id="login_password_show">
									</div>
								</div>
								<div class="row my-2">
									<div class="col-lg-6 col-6">
										<a href="#" id="register-btn" class="auth-link text-left" data-bs-toggle="modal" data-bs-target="#register" style="color:#4863A0;">Create an account</a>
									</div>
									<div class="col-lg-6 col-6 text-end">
										<a href="#" id="forgot-btn" class="auth-link" data-bs-toggle="modal" data-bs-target="#forgot" style="color:#4863A0;">Forgot Password?</a>
									</div>									
								</div>
							</form>
							<div class="text-center mt-4 font-weight-light">
								<span class="text-left" style="font-size: 15px;">By using this service, you understand and agree to the Vets at Work Veterinary Clinic Online Services <a href="#" id="terms-btn-login" data-bs-toggle="modal" data-bs-target="#terms">Terms of Use</a> and <a href="#" id="privacy-btn-login" data-bs-toggle="modal" data-bs-target="#privacy">Privacy Statement</a></span>
							</div>
							<div class="text-center font-weight-light">
								<span class="text-secondary">Vets at Work Veterinary Clinic &copy; <?php echo date("Y"); ?></span>
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Login Modal End -->

<!-- Register Modal -->
<div class="modal fade" id="register" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">REGISTER ACCOUNT</h5>
				<button type="button" class="btn-close" id="register-btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6 col-12">
						<img src="<?php echo web_root; ?>dist/img/vaw-logo.jpg" class="img-fluid rounded mx-auto bg-background-image">
					</div>
					<div class="col-lg-6 col-12">
						<div class="row">
							<div class="d-flex flex-column">
								<form action="" method="POST" id="registration_form">
									<div class="col-lg-12 col-12">
										<div class="form-group" style="padding-bottom: 3px">
											<label for="firstname" class="form-label">First Name: <span class="text-danger">*</span></label>
											<input type="text" class="form-control " name="firstname" id="firstname" onkeypress="return /[a-z ]/i.test(event.key)" placeholder="Enter your First Name"/>
											<span id="err_firstname"></span>
										</div>								
									</div>
									<div class="col-lg-12 col-12">
										<div class="form-group" style="padding-bottom: 3px">
											<label for="lastname" class="form-label">Last Name: <span class="text-danger">*</span></label>
											<input type="text" class="form-control " name="lastname" id="lastname" onkeypress="return /[a-z ]/i.test(event.key)" placeholder="Enter your Last Name"/>
											<span id="err_lastname"></span>
										</div>								
									</div>
									<div class="col-lg-12 col-12">
										<div class="form-group" style="padding-bottom: 3px">
											<label for="register-email" class="form-label">Email Address: <span class="text-danger">*</span></label>
											<input type="email" class="form-control " name="register-email" id="register-email" placeholder="Enter your E-mail Address"/>
											<span id="err_email"></span>
										</div>								
									</div>
									<div class="form-group" style="padding-bottom: 10px">
										<label for="password" class="form-label">Password: <span class="text-danger">*</span></label>
										<input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password"/>
										<div class="card mt-1" id="pass_valid" hidden>
											<div class="card-body p-0 px-1">
												<span id="pass_letter" class="text-danger"><i class="bi bi-x"></i> contains at least 3 characters<br></span>
												<span id="pass_capital" class="text-danger"><i class="bi bi-x"></i> contains at least 1 uppercase letters<br></span>
												<span id="pass_digit" class="text-danger"><i class="bi bi-x"></i> contains at least 1 Number<br></span>
												<span id="pass_symbol" class="text-danger"><i class="bi bi-x"></i> contains at least 1 Special Symbols with only : _ ~ - ! @ # $ % ^ & * ( )<br></span>
											</div>
										</div>
									</div>
									<!-- Login Button -->
									<div class="d-grid">
										<button type="submit" class="btn btn-success" id="register-login" disabled>Create Account</button>
										<span id="msg" class="text-success mt-2"></span>
									</div>	
									<div class="row my-2 g-0">
										<div class="col-lg-7 col-12">
											Already have an account?<a href="#" id="log-btn" class="auth-link text-left" data-bs-toggle="modal" data-bs-target="#login" style="color:#4863A0;">Login</a>
										</div>	
										<div class="col-lg-5 col-12 d-flex flex-row-reverse">
											<div class="form-check">
											<label class="form-check-label" for="create_password_show">Show password</label>
											<input class="form-check-input" type="checkbox" value="" id="create_password_show">
										</div>
										</div>										
									</div>
								</form>
								<div class="text-center mt-2 font-weight-light">
									<span class="text-left" style="font-size: 15px;">By using this service, you understand and agree to the Vets at Work Veterinary Clinic Online Services <a href="#" id="terms-btn-register" data-bs-toggle="modal" data-bs-target="#terms">Terms of Use</a> and <a href="#" id="privacy-btn-register" data-bs-toggle="modal" data-bs-target="#privacy">Privacy Statement</a></span>
								</div>
								<div class="text-center font-weight-light">
									<span class="text-secondary">Vets at Work Veterinary Clinic &copy; <?php echo date("Y"); ?></span>
								</div>								
							</div>
						</div>				
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Register Modal End -->

<!-- Forgot Password Modal -->
<div class="modal fade" id="forgot" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">FORGOT PASSWORD</h5>
				<button type="button" class="btn-close" id="forgot-btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6 col-12">
						<img src="<?php echo web_root; ?>dist/img/vaw-logo.jpg" class="img-fluid rounded mx-auto bg-background-image">
					</div>
					<div class="col-lg-6 col-12">
						<h4>Forgot Your Password?</h4>
						<span>We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</span>
						<br>
						<br>					
						<div class="row">
							<div class="d-flex flex-column">
								<form action="" method="POST">
									<div class="col-lg-12 col-12">
										<div class="form-group" style="padding-bottom: 3px">
											<label for="forgot-email" class="form-label">Email Address: </label>
											<input type="email" class="form-control " name="forgot-email" id="forgot-email" placeholder="Email Address"/>
										</div>								
									</div>
									<!-- Login Button -->
									<div class="d-grid mt-2">
										<button type="submit" class="btn btn-success" id="forgot-login">Reset Password</button>
									</div>
									<div class="row my-2">
										<div class="col-lg-6 col-6">
											<a href="#" id="reg-btn" class="auth-link text-left" data-bs-toggle="modal" data-bs-target="#register" style="color:#4863A0;">Create an account</a>
										</div>
										<div class="col-lg-6 col-6 text-end">
											Already have an Account? <a href="#" id="login-btn" class="auth-link" data-bs-toggle="modal" data-bs-target="#login" style="color:#4863A0;">Login</a>
										</div>									
									</div>									
								</form>
								<div class="text-center mt-2 font-weight-light">
									<span class="text-left" style="font-size: 15px;">By using this service, you understand and agree to the Vets at Work Veterinary Clinic Online Services <a href="#" id="terms-btn-forgot" data-bs-toggle="modal" data-bs-target="#terms">Terms of Use</a> and <a href="#" id="privacy-btn-forgot" data-bs-toggle="modal" data-bs-target="#privacy">Privacy Statement</a></span>
								</div>	
								<div class="text-center font-weight-light">
									<span class="text-secondary">Vets at Work Veterinary Clinic &copy; <?php echo date("Y"); ?></span>
								</div>									
							</div>
						</div>				
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Forgot Password Modal End -->

<!-- Activation Modal -->
<div class="modal fade" id="verify" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Account Activation</h5>
				<button type="button" class="btn-close" id="activation-btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6 col-12">
						<img src="<?php echo web_root; ?>dist/img/vaw-logo.jpg" class="img-fluid rounded mx-auto bg-background-image">
					</div>
					<div class="col-lg-6 col-12">
						<h4>Activate Your Account</h4>
						<span></span>
						<br>
						<br>					
						<div class="row">
							<div class="d-flex flex-column">
								<form action="" method="POST">
									<div class="col-lg-12 col-12">
										<div class="form-group" style="padding-bottom: 3px">
											<label for="activation-code" class="form-label">Activation Code: </label>
											<input type="text" class="form-control " name="activation-code" id="activation-code" placeholder="Enter your activation code here"/>
										</div>								
									</div>
									<!-- Login Button -->
									<div class="d-grid mt-2">
										<button type="submit" class="btn btn-success" id="activate-login">Activate</button>
									</div>									
								</form>
								<div class="text-center mt-2 font-weight-light">
									<span class="text-secondary">Vets at Work Veterinary Clinic &copy; <?php echo date("Y"); ?></span>
								</div>								
							</div>
						</div>				
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="terms" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Terms and Condition</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<h6>Terms & Conditions (FOR THE VET CLINIC)</h6>
				<br>
				<p>1. Vets at Work Veterinary Clinic (VAW) reserve the right to refuse treatment on any animal.</p>
				<p>2. The veterinarian will not be liable in any way, if there are complications with treatment, surgery, confinement, and/or wellness such as deworming and vaccination. Everything will be on the owner’s risk and discretion.</p>
				<p>3. Clients are required to provide the pet’s medical history and/or disease progression properly and truthfully to the extent of their knowledge to properly assess the pet’s condition.</p>
				<p>4. Owners are encouraged to provide adequate restraining apparatus and to be present, If needed, in the duration of the treatment/consultation.</p>
				<p>5. Vets at Work Veterinary Clinic (VAW) reserve the right to take any photographic or video footage that is on business premises. This is not limited to consultation and/or treatment of patients.</p>
				<p>6. Vets at Work Veterinary Clinic (VAW) will not be held responsible for any accident/injury sustained either by the patient or the patient’s handler during the duration of the consultation, restraining, and/or treatment.</p>
				<p>7. Vets at Work Veterinary Clinic (VAW) will not be held responsible for any loss or damage to vehicles or personal property while on business premises.</p>
				<p>8. Clients are required to pay a deposit fee of P 1,000.00 for confinement.</p>
				<br>
				<p><b>Cancellation:</b> Cancelling of appointment of the user, you, we, and others who chose to cancel the appointment will get a 70% refund of their payments with the scheduled appointment.</p>
				<p><b>Reschedule:</b> Rescheduling  of appointment of the users, you, we ,and others are accepted once the client have an existing appointment with the clinic.</p>
				<br>
				<h6>Terms & Conditions ( FOR THE WEBSITE)</h6>
				<p>Updated at 2022-02-24</p>
				<br>
				<h6>General Terms</h6>
				<p>By accessing and placing an appointment, you confirm that you are in agreement with and bound by the terms of service contained in the Terms & Conditions outlined below. These terms apply to the entire website and any email or other type of communication between you and.</p>
				<p>Under no circumstances shall team be liable for any direct, indirect, special, incidential or consequential damages, including, but not limited to, loss of data or profit, arising out of the use, or the inability to use, the materials on this site, even if team or an authorized representative has been advised of the possibility of such damages. If your of materials from this site results in the need for servicing, repair or correction of equipment or data, you assume any costs thereof will not be responsible for any outcome that may occur during the course of usage of our resources. We reserve the rights to change prices and revise the resources usage policy in any moment.</p>
			</div>
		</div>
	</div>
</div>
