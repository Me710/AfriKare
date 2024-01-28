<?php
session_start();
if (!isset($_SESSION["uid"])) {
	header("Location: signin.php");
	exit;
}
include_once('../../config.php');

include_once '../../Model/user.php';
include_once '../../Controller/userC.php';

$userC = new userC();

?>
<!doctype html>
<html class="fixed">
<!--  -->

<head>

	<!-- Basic -->
	<meta charset="UTF-8">
	n
	<title>Accueil | AFRIKARE</title>
	<meta name="keywords" content="HTML5 Admin Template" />
	<meta name="description" content="AFRIKARE Admin">
	<meta name="author" content="AFRIKARE">
	<link rel="icon" href="assets/images/favicon.ico" type="image/png" sizes="16x16">
	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

	<!-- Specific Page Vendor CSS -->
	<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
	<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
	<link rel="stylesheet" href="assets/vendor/morris/morris.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="assets/stylesheets/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

	<!-- Head Libs -->
	<script src="assets/vendor/modernizr/modernizr.js"></script>

</head>

<body>
	<section class="body">

		<!-- start: header -->
		<header class="header">
			<div class="logo-container">
				<a href="../" class="logo">
					<img src="assets/images/lo.png" height="35" alt="AFRIKARE Admin" />
				</a>
				<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
					<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
				</div>
			</div>

			<!-- start: search & user box -->
			<div class="header-right">



				<span class="separator"></span>



				<span class="separator"></span>

				<div id="userbox" class="userbox">
					<a href="#" data-toggle="dropdown">
						<figure class="profile-picture">
							<img src="assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
						</figure>
						<?php
						if (isset($_SESSION["uid"])) {
							$uid = $_SESSION['uid'];
							$_SESSION['fullName'] = $userC->getUserFullName($uid);
							$CurrentUser = $userC->getUser($uid);

							echo '
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="' . $CurrentUser['email'] . '">
								<span class="name">' . $CurrentUser['nom'] . ' ' . $CurrentUser['prenom'] . '</span>
								<span class="role">' . $CurrentUser['email'] . '</span>
							</div>';
						}
						?>


						<i class="fa custom-caret"></i>
					</a>

					<div class="dropdown-menu">
						<ul class="list-unstyled">

							<li>
								<a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end: search & user box -->
		</header>
		<!-- end: header -->

		<div class="inner-wrapper">
			<!-- start: sidebar -->
			<aside id="sidebar-left" class="sidebar-left">

				<div class="sidebar-header">

					<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<div class="nano">
					<div class="nano-content">
						<nav id="menu" class="nav-main" role="navigation">
							<ul class="nav nav-main">
								<li class="nav-active">
									<a href="index.php">
										<i class="fa fa-home" aria-hidden="true"></i>
										<span>Accueil</span>
									</a>
								</li>
								<li>
									<a href="profile.php">

										<i class="fa fa-user" aria-hidden="true"></i>
										<span>Modifier Mon profil</span>
									</a>
								</li>
								<li>
									<a href="partage.php">

										<i class="fa fa-list" aria-hidden="true"></i>
										<span>Mes partages</span>
									</a>
								</li>
								<li>
								<a href="#">

										<i class="fa fa-users" aria-hidden="true"></i>
										<span>Mes Médecins</span>
								</a>
								</li>
							</ul>
						</nav>


					</div>

				</div>

			</aside>
			<!-- end: sidebar -->

			<section role="main" class="content-body">
				<header class="page-header">
					<h2>Accueil</h2>

					<div class="right-wrapper pull-right">
						<ol class="breadcrumbs">
							<li>
								<a href="index.php">
									<i class="fa fa-home"></i>
								</a>
							</li>
							<li><span>Accueil</span></li>
						</ol>

						<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
					</div>
				</header>



				<!-- start: page -->



				<div class="row">
					<div class="col-xl-3 col-lg-12">
						<section class="panel panel-transparent">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>

								<h2 class="panel-title">My Profile</h2>
							</header>
							<div class="panel-body">
								<section class="panel panel-group">
									<header class="panel-heading bg-primary">

										<div class="widget-profile-info">
											<div class="profile-picture">
												<img src="assets/images/!logged-user.jpg">
											</div>
											<div class="profile-info">
												<h4 class="name text-semibold"><?php echo  $CurrentUser['nom'] . ' ' . $CurrentUser['prenom']; ?></h4>
												<h5 class="role"><?php echo  $CurrentUser['role']; ?></h5>
												<div class="profile-footer">

												</div>
											</div>
										</div>

									</header>
									<div class="medical-record">
										<header class="clearfix">
											<div class="row">
												<div class="col-sm-6 mt-md">
													<h2 class="h2 mt-none mb-sm text-dark text-bold">Dossier Médical</h2><br>
													<h4 class="h4 m-none text-dark text-bold">Date : <?php echo  $CurrentUser['datet']; ?></h4> <br>
												</div>

											</div>
										</header>
										<div class="patient-info">
											<div class="row">
												<div class="col-md-6">
													<div class="patient-details">

														<address>
															Nom du Médecin : ...
															<br />
															Adresse du Médecin : ...
															<br />
															Téléphone: ....
															<br />
															E-mail: ...
														</address>
													</div>
												</div>
												<div class="col-md-6">
													<div class="record-dates text-right">

														<p class="mb-none">
															<span class="text-dark">Date de Naissance:</span>
															<span class="value"><?php echo  $CurrentUser['datet']; ?></span>
														</p>
														<p class="mb-none">
															<span class="text-dark">Poids:</span>
															<span class="value"><?php echo  $CurrentUser['poids']; ?> Kg</span>
														</p>
													</div>
												</div>
											</div>
										</div>

										<div class="table-responsive">
											<!-- Liste des traitements, rendez-vous, etc., peut être ajoutée ici -->
											<table class="table invoice-items">
												<thead>
													<tr class="h4 text-dark">
														<th id="cell-id" class="text-semibold">#</th>
														<th id="cell-item" class="text-semibold">Traitement</th>
														<th id="cell-desc" class="text-semibold">Description</th>
														<th id="cell-price" class="text-center text-semibold">Coût</th>
														<th id="cell-qty" class="text-center text-semibold">Fréquence</th>
														<th id="cell-total" class="text-center text-semibold">Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td class="text-semibold text-dark">Consultation</td>
														<td>Examen médical</td>
														<td class="text-center">$50.00</td>
														<td class="text-center">1</td>
														<td class="text-center">$50.00</td>
													</tr>
													<tr>
														<td>2</td>
														<td class="text-semibold text-dark">Prescription</td>
														<td>Médicaments</td>
														<td class="text-center">$30.00</td>
														<td class="text-center">1</td>
														<td class="text-center">$30.00</td>
													</tr>
												</tbody>
											</table>
										</div>

										<div class="medical-summary">
											<div class="row">
												<div class="col-sm-4 col-sm-offset-8">
													<table class="table h5 text-dark">
														<tbody>
															<tr class="b-top-none">
																<td colspan="2">Diagnostic</td>
																<td class="text-left">Description du diagnostic</td>
															</tr>
															<tr>
																<td colspan="2">Observations</td>
																<td class="text-left">Observations médicales</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</section>

							</div>
						</section>
					</div>


				</div>

				<!-- end: page -->
			</section>

		</div>


	</section>

	<!-- Vendor -->
	<script src="assets/vendor/jquery/jquery.js"></script>
	<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
	<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
	<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

	<!-- Specific Page Vendor -->
	<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
	<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
	<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
	<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
	<script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
	<script src="assets/vendor/flot/jquery.flot.js"></script>
	<script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
	<script src="assets/vendor/flot/jquery.flot.pie.js"></script>
	<script src="assets/vendor/flot/jquery.flot.categories.js"></script>
	<script src="assets/vendor/flot/jquery.flot.resize.js"></script>
	<script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
	<script src="assets/vendor/raphael/raphael.js"></script>
	<script src="assets/vendor/morris/morris.js"></script>
	<script src="assets/vendor/gauge/gauge.js"></script>
	<script src="assets/vendor/snap-svg/snap.svg.js"></script>
	<script src="assets/vendor/liquid-meter/liquid.meter.js"></script>
	<script src="assets/vendor/jqvmap/jquery.vmap.js"></script>
	<script src="assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
	<script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
	<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
	<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
	<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
	<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
	<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
	<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="assets/javascripts/theme.js"></script>

	<!-- Theme Custom -->
	<script src="assets/javascripts/theme.custom.js"></script>

	<!-- Theme Initialization Files -->
	<script src="assets/javascripts/theme.init.js"></script>


	<!-- Examples -->
	<script src="assets/javascripts/dashboard/examples.dashboard.js"></script>
</body>

</html>