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
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
	<div class="wait overlay">
		<div class="loader"></div>
	</div> <!-- header page-->
	<div class="loader1"></div>
	<!-- start: page -->
	<section class="body-sign">
		<div class="center-sign">

			<div class="panel panel-sign">

				<div class="panel-body">
					<form onsubmit="return false" id="login" autocomplete="off">
						<div class="form-group mb-lg">
							<label>E-mail</label>
							<div class="input-group input-group-icon">
								<input name="email" type="email" class="form-control input-lg" />
								<span class="input-group-addon">
									<span class="icon icon-lg">
										<i class="fa fa-user"></i>
									</span>
								</span>
							</div>
						</div>

						<div class="form-group mb-lg">
							<div class="clearfix">
								<label class="pull-left">Mot de passe</label>
								<a href="pages-recover-password.html" class="pull-right">Mot de passe oublié ?</a>
							</div>
							<div class="input-group input-group-icon">
								<input name="password" type="password" class="form-control input-lg" />
								<span class="input-group-addon">
									<span class="icon icon-lg">
										<i class="fa fa-lock"></i>
									</span>
								</span>

							</div>
						</div>
						<div class="form-group mb-lg">
							<div class="g-recaptcha recaptcha-small" data-sitekey="6Le6FQckAAAAAEtISR4-GfvNj76LfGNlKH_2FK_D"></div>
						</div>
						<div class="row">
							<div class="col-sm-8">
								<div class="checkbox-custom checkbox-default">
									<input id="RememberMe" name="rememberme" type="checkbox" />
									<label for="RememberMe">Se souvenir de moi</label>
								</div>
							</div>
							<div class="col-sm-4 text-right">
								<button type="submit" class="btn btn-primary hidden-xs">Se Connecter</button>
								<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Se Connecter</button>
							</div>
						</div>
						<div class="panel-footer">
							<div class="alert alert-warning">
								<h4 id="e_msg"></h4>
							</div>
						</div>


						<p class="text-center">Vous n'avez pas encore de compte ? <a href="signup.php">Inscrivez-vous !</a></p>
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
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="js/actions.js"></script>

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
	</script>
</body>

</html>