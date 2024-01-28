<?php
session_start();
if (isset($_SESSION["uid"])) {
	header("Location: index.php");
	exit;
}
?>
<!doctype html>
<html class="fixed">

<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<meta name="keywords" content="HTML5 Admin Template" />
	<meta name="description" content="Porto Admin - Responsive HTML5 Template">
	<meta name="author" content="okler.net">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="assets/stylesheets/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

	<!-- Head Libs -->
	<script src="assets/vendor/modernizr/modernizr.js"></script>

	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<style>
		.field {
			position: relative;
			margin-bottom: 20px;
		}

		.field .input-icon {
			position: absolute;
			top: 50%;
			transform: translateY(-50%);
			left: 15px;
			color: #888;
		}

		.field input[type="password"] {
			padding: 10px 40px 10px 35px !important;
			font-size: 16px;
			width: 100%;
			box-sizing: border-box !important;
			border: 1px solid #ddd !important;
			border-radius: 5px;
		}

		.field .form-label1 {
			position: absolute;
			top: 50%;
			right: 15px;
			transform: translateY(-50%);
			cursor: pointer;
		}

		.alert-warning {
			color: #8a6d3b;
			background-color: #fcf8e3;
			border-color: #faebcc;
		}
	</style>

</head>

<body>
	<div class="wait overlay">
		<div class="loader"></div>
	</div>
	<!-- start: page -->
	<section class="body-sign">
		<div class="center-sign">
			<div class="panel panel-sign">
				<div class="panel-body">
					<form onsubmit="return false" id="signup_form" class="sign-up-form" enctype="multipart/form-data">

						<div class="form-group mb-lg">
							<label>Nom</label>
							<!-- <input name="publickey" id="publickey" type="hidden" class="form-control input-lg" /> -->
							<input name="nom" type="text" class="form-control input-lg" />
						</div>
						<div class="form-group mb-lg">
							<label>Prénom</label>
							<input name="prenom" type="text" class="form-control input-lg" />
						</div>
						<div class="form-group mb-lg">
							<label>Date de naissance</label>
							<input name="date" type="date" class="form-control input-lg" />
						</div>
						<div class="form-group mb-lg">
							<label>Poids</label>
							<input name="poids" type="text" class="form-control input-lg" placeholder="le poids en Kg" />

						</div>
						<div class="form-group mb-lg">

							<select id="role" name="role" class="form-control input-lg">

								<option value="Docteur">Docteur</option>
								<option value="Patient" selected>Patient(e)</option>
								<option value="Chercheur">Chercheur(.euse)</option>
							</select>
							<span class="select-arrow"></span>
						</div>
						<div class="form-group mb-lg">
							<label>E-mail</label>
							<input name="email" type="email" class="form-control input-lg" />
						</div>
						<div class="field">
							<span class="input-icon"><i class="fas fa-lock"></i></span>
							<input type="password" name="password" class="form-control input-lg" id="password" placeholder="Mot de passe" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$" oninput="saisirPassWord(event)">
							<span class="form-label1 input-group-append">
								<i id="eye" class="far fa-eye-slash" onclick="showHideLPwd();"></i>
							</span>

						</div>

						<div class="field">
							<span class="input-icon"><i class="fas fa-lock"></i></span>
							<input type="password" name="repassword" class="form-control input-lg" id="repassword" placeholder="Confirmer le mot de passe" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$" oninput="saisirRePassWord(event)">
							<span class="form-label1 input-group-append">
								<i id="eye1" class="far fa-eye-slash" onclick="showHideRPwd();"></i>
							</span>

						</div>

						<div class="row">
							<div class="col-sm-8">
								<div class="checkbox-custom checkbox-default">
									<input id="AgreeTerms" name="accepterConditions" type="checkbox" />
									<label for="AgreeTerms">J'accepte les <a href="#">conditions
											d'utilisation</a></label>
								</div>
							</div>
							<div class="col-sm-4 text-right">

								<button type="submit" class="btn btn-primary btn-block btn-lg mt-lg">S'inscrire</button>
							</div>
						</div>
						<p class="text-center">Vous avez déjà un compte? <a href="signin.php">Connectez-vous !</a></p>
						<div class="login-marg alert-warning">
							<div class="row">
								<div class="col-md-8" id="signup_msg"></div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<p class="text-center text-muted mt-md mb-md">Copyright&copy;&nbsp;
				<script>
					document.write(new Date().getFullYear());
				</script> <span>Blockchain AFRIKARE</span> &nbsp;&nbsp;|&nbsp;&nbsp; Tous droits réservés
			</p>
		</div>
	</section>

	<!-- end: page -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- Vendor -->
	<script src="assets/vendor/jquery/jquery.js"></script>
	<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
	<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
	<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="assets/javascripts/theme.js"></script>

	<!-- Theme Custom -->
	<script src="assets/javascripts/theme.custom.js"></script>

	<!-- Theme Initialization Files -->
	<script src="assets/javascripts/theme.init.js"></script>

	<script src="./js/actions.js"></script>

	<script src="./js/index.js"></script>
	<script>
		function showHideLPwd() {
			var input = document.getElementById("password");
			if (input.type === "password") {
				input.type = "text";
				document.getElementById("eye").className = "far fa-eye";
			} else {
				input.type = "password";
				document.getElementById("eye").className = "far fa-eye-slash";
			}
		}

		function showHideRPwd() {
			var input = document.getElementById("repassword");
			if (input.type === "password") {
				input.type = "text";
				document.getElementById("eye1").className = "far fa-eye";
			} else {
				input.type = "password";
				document.getElementById("eye1").className = "far fa-eye-slash";
			}
		}
	</script>
	<script>
		window.onload = function() {
			document.getElementById("download")
				.addEventListener("click", () => {
					const invoice = this.document.getElementById("invoice");
					var opt = {
						filename: 'DocM',
						image: {
							type: 'jpeg',
							quality: 0.98
						},
						html2canvas: {
							scale: 2
						},
						jsPDF: {
							unit: 'in',
							format: 'letter',
							orientation: 'portrait'
						}
					};
					html2pdf().from(invoice).set(opt).save();

				})
		}
	</script>
</body>

</html>