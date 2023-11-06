<?php
session_start();
require 'db-conn.php';
$errorSignupEmail = false;
$succesfulSignup = false;
$succesfulSignupAdmin = false;
$errorPass = false;

if(isset($_POST['admin-submit'])){
	if (isset($_POST['first-name'])){
						$connect = mysqli_connect($server, $username, $password, $database);

						$fname = $_POST['first-name'];
						$lname = $_POST['last-name'];
						$email = $_POST['email'];
						$pass = $_POST['password'];
						$confirmpass = $_POST['confirm-password'];

						if ($pass == $confirmpass) {
							$queryEmail = "select * from admindata where email = '$email'";
        					$executeQueryEmail = mysqli_query($connect,$queryEmail);
							$row = mysqli_num_rows($executeQueryEmail);
							if($row >= 1){
								$errorSignupEmail = true;
							}else{
								$insertQuery = "INSERT INTO `admindata`(`firstname`,`lastname`,`email`,`password`,`datetime`)
											VALUES('$fname','$lname','$email','$pass',current_timestamp());";
								mysqli_query($connect, $insertQuery);
								$succesfulSignupAdmin = true;
							}
						} else {
							$errorPass = true;
						}
			}
}

    else{

		if (isset($_POST['first-name'])) {
	// $passStrLen = $_POST['password'];
	// if ((preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/', $passStrLen))) {
	//make connect to database
	$connect = mysqli_connect($server, $username, $password, $database);
	$fname = $_POST['first-name'];
	$lname = $_POST['last-name'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$confirmpass = $_POST['confirm-password'];
	if ($pass == $confirmpass) {
		$queryEmail = "select * from userdata where email = '$email'";
        $executeQueryEmail = mysqli_query($connect,$queryEmail);
		$row = mysqli_num_rows($executeQueryEmail);
		if($row >= 1){
			$errorSignupEmail = true;
		}else{
			$insertQuery = "INSERT INTO `userdata`(`firstname`,`lastname`,`email`,`password`,`datetime`)
						VALUES('$fname','$lname','$email','$pass',current_timestamp());";
			mysqli_query($connect, $insertQuery);
			$succesfulSignup = true;
		}
	} else {
		$errorPass = true;
	}
	// else {
    //     $regexUsername = true;
    // }

		}

    }

?>

<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
	<base href="../../../">
	<title>Metronic - the world's #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular &amp; Laravel
		by Keenthemes</title>
	<meta name="description"
		content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
	<meta name="keywords"
		content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title"
		content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
	<meta property="og:url" content="https://keenthemes.com/metronic" />
	<meta property="og:site_name" content="Keenthemes | Metronic" />
	<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
	<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
	<!-- bootstrap  -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
     

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Authentication - Sign-up -->
		<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
			style="background-image: url(assets/media/illustrations/sigma-1/14.png">
			<!--begin::Content-->
			<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
				<!--begin::Logo-->
				<a href="../../demo2/dist/index.html" class="mb-12">
					<img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px" />
				</a>
				<!--end::Logo-->
				<!--begin::Wrapper-->
				<div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
					<?php
					if ($errorSignupEmail) {
						echo '<div class="alert alert-warning text-center m-auto" role="alert"><strong>Error!</strong> Sign Up Unsuccessful!!! <strong>' . $email . '</strong> is already registered!!! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> </div>'; 
					}
					elseif ($succesfulSignup) {
						echo '<div class="alert alert-success text-center m-auto" role="alert"><strong>Success!</strong> Sign Up successful!!! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> </div>'; 
					}
					elseif ($succesfulSignupAdmin) {
						echo '<div class="alert alert-success text-center m-auto" role="alert"><strong>Success!</strong> Successfully signed up as admin!!! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> </div>'; 
					}
					elseif ($errorPass) {
						echo '<div class="alert alert-warning alert-dismissible fade show text-center m-auto" role="alert"><strong>Error!</strong> Password did not match!!! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> </div>'; //<a href="/loginproject/loginsignup.php" class="btn btn-primary w-20 mx-3" >Login Now</a>
					}
					// elseif ($regexUsername) {
					// 	echo '<div class="alert alert-warning alert-dismissible fade show text-center m-auto" role="alert"><strong>Error username!</strong> include atleast 8 letters in username! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> </div>'; //<a href="/loginproject/loginsignup.php" class="btn btn-primary w-20 mx-3" >Login Now</a>
					// }
					?>
					<!--begin::Form-->
					<form action="" method="post" class="form w-100" novalidate="novalidate" id="kt_sign_up_form">
						<!--begin::Heading-->
						<div class="mb-10 text-center">
							<!--begin::Title-->
							<h1 class="text-dark mb-3">Create an Account</h1>
							<!--end::Title-->
							<!--begin::Link-->
							<div class="text-gray-400 fw-bold fs-4">Already have an account?
								<a href="../../demo2/dist/authentication/flows/basic/sign-in.php"
									class="link-primary fw-bolder">Sign in here</a>
							</div>
							<!--end::Link-->
						</div>
						<!--end::Heading-->
						<!--begin::Action-->
						<button type="button" class="btn btn-light-primary fw-bolder w-100 mb-10">
							<img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg"
								class="h-20px me-3" />Sign in with Google</button>
						<!--end::Action-->
						<!--begin::Separator-->
						<div class="d-flex align-items-center mb-10">
							<div class="border-bottom border-gray-300 mw-50 w-100"></div>
							<span class="fw-bold text-gray-400 fs-7 mx-2">OR</span>
							<div class="border-bottom border-gray-300 mw-50 w-100"></div>
						</div>
						<!--end::Separator-->
						<!--begin::Input group-->
						<div class="row fv-row mb-7">
							<!--begin::Col-->
							<div class="col-xl-6">
								<label class="form-label fw-bolder text-dark fs-6">First Name</label>
								<input class="form-control form-control-lg form-control-solid" type="text"
									placeholder="" name="first-name" autocomplete="off" />
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-xl-6">
								<label class="form-label fw-bolder text-dark fs-6">Last Name</label>
								<input class="form-control form-control-lg form-control-solid" type="text"
									placeholder="" name="last-name" autocomplete="off" />
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="fv-row mb-7">
							<label class="form-label fw-bolder text-dark fs-6">Email</label>
							<input class="form-control form-control-lg form-control-solid" type="email" placeholder=""
								name="email" autocomplete="off" />
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="mb-10 fv-row" data-kt-password-meter="true">
							<!--begin::Wrapper-->
							<div class="mb-1">
								<!--begin::Label-->
								<label class="form-label fw-bolder text-dark fs-6">Password</label>
								<!--end::Label-->
								<!--begin::Input wrapper-->
								<div class="position-relative mb-3">
									<input class="form-control form-control-lg form-control-solid" type="text"
										placeholder="" name="password" autocomplete="off" />
									<span
										class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
										data-kt-password-meter-control="visibility">
										<i class="bi bi-eye-slash fs-2"></i>
										<i class="bi bi-eye fs-2 d-none"></i>
									</span>
								</div>
								<!--end::Input wrapper-->
								<!--begin::Meter-->
								<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
									<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
									<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
									<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
									<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
								</div>
								<!--end::Meter-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Hint-->
							<div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp;
								symbols.</div>
							<!--end::Hint-->
						</div>
						<!--end::Input group=-->
						<!--begin::Input group-->
						<div class="fv-row mb-5">
							<label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
							<input class="form-control form-control-lg form-control-solid" type="text"
								placeholder="" name="confirm-password" autocomplete="off" />
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="fv-row mb-10">
							<label class="form-check form-check-custom form-check-solid form-check-inline">
								<input class="form-check-input" type="checkbox" name="toc" value="1" />
								<span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
									<a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
							</label>
						</div>
						<!--end::Input group-->
						<!--begin::Actions-->
						<div class="text-center">
							<button type="submit" class="btn btn-lg btn-primary">
								<!-- id="kt_sign_up_submit" -->
								<span class="indicator-label">User Register</span>
								<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
							<button type="submit" name="admin-submit" class="btn btn-lg btn-primary">
								<!-- id="kt_sign_up_submit" -->
								<span class="indicator-label">Admin Register</span>
								<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
						</div>
						<!--end::Actions-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Content-->
			<!--begin::Footer-->
			<div class="d-flex flex-center flex-column-auto p-10">
				<!--begin::Links-->
				<div class="d-flex align-items-center fw-bold fs-6">
					<a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
					<a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
					<a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
				</div>
				<!--end::Links-->
			</div>
			<!--end::Footer-->
		</div>
		<!--end::Authentication - Sign-up-->
	</div>

	<!--end::Main-->
	<script>var hostUrl = "assets/";</script>
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Page Custom Javascript(used by this page)-->
	<script src="assets/js/custom/authentication/sign-up/general.js"></script>
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>