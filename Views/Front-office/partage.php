<?php
session_start();
include_once('../../config.php');

include_once '../../Model/user.php';
include_once '../../Controller/userC.php';

$userC = new userC();

?>
<!doctype html>
<html class="fixed">

<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<title>Mes Partages</title>
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
					<div class="sidebar-title">
						Navigation
					</div>
					<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<div class="nano">
					<div class="nano-content">
						<nav id="menu" class="nav-main" role="navigation">
							<ul class="nav nav-main">
								<li>
									<a href="index.php">
										<i class="fa fa-home" aria-hidden="true"></i>
										<span>Dashboard</span>
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
					<h2>Mes Partages</h2>

					<div class="right-wrapper pull-right">
						<ol class="breadcrumbs">
							<li>
								<a href="index.php">
									<i class="fa fa-home"></i>
								</a>
							</li>
							<li><span>Tables</span></li>
							<li><span>Mes Partages</span></li>
						</ol>

						<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
					</div>
				</header>

				<!-- start: page -->


				<section class="panel">
					<header class="panel-heading">
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>

						<h2 class="panel-title">Consultations Autorisées</h2>
					</header>
					<div class="panel-body">
						<div class="table-responsive">
						<table class="table table-bordered table-striped table-condensed mb-none"> <thead> <tr> <th>Date / Heure</th> <th>Médecin consulté</th> <th>Motif consultation</th> <th>Résultat</th> </tr> </thead> <tbody> <tr> <td>25/01/2024 10:20</td> <td>Dr. Fatou Diouf</td> <td>Contrôle tension</td> <td>Stable</td> </tr> <tr> <td>25/01/2024 15:30</td> <td>Dr. Babacar Wade</td> <td>Bilan annuel</td> <td>RAS</td> </tr> <tr> <td>26/01/2024 09:00</td> <td>Dr. Awa Gaye</td> <td>Suivi grossesse</td> <td>Tout est normal</td> </tr> <tr> <td>27/01/2024 12:10</td> <td>Dr. Pape Sall</td> <td>Douleurs abdominales</td> <td>Gastro-entérite</td> </tr> </tbody> </table>						</div>
					</div>
				</section>

				<section class="panel">
					<header class="panel-heading">
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>

						<h2 class="panel-title">Transactions Données</h2>
					</header>
					<div class="panel-body">
					<table class="table table-bordered table-striped table-condensed mb-none"> <thead> <tr> <th>Date / Heure</th> <th>Acheteur</th> <th>Type de données</th> <th>Usage</th> <th>Compensation</th> </tr> </thead> <tbody> <tr> <td>25/01/2024 09:30</td> <td>Université de médecine</td> <td>Dossier médical complet</td> <td>Recherche sur diabète</td> <td>50$ + part des revenus</td> </tr> <tr> <td>25/01/2024 11:00</td> <td>Assurance maladie</td> <td>Historique médical</td> <td>Évaluation des risques</td> <td>Réduction des primes</td> </tr> <tr> <td>25/01/2024 16:45</td> <td>Centre recherche</td> <td>Imagerie médicale</td> <td>Recherche sur cancer</td> <td>250$ + 5% revenus</td> </tr> <tr> <td>26/01/2024 08:30</td> <td>Startup HealthTech</td> <td>Dossier médical</td> <td>Test application mobile</td> <td>Accès gratuit à l'app</td> </tr> <tr> <td>26/01/2024 15:45</td> <td>Laboratoire pharmaceutique</td> <td>Données génétiques</td> <td>Développement de médicaments</td> <td>150$ forfaitaire</td> </tr> <tr> <td>27/01/2024 09:15</td> <td>Ministère de la santé</td> <td>Données anonymisées</td> <td>Surveillance épidémiologique</td> <td>Partage gratuit</td> </tr> <tr> <td>27/01/2024 22:10</td> <td>Entreprise médicale</td> <td>Dossier médical</td> <td>Test d'outil de diagnostique</td> <td>100$ </td> </tr> <tr> <td>28/01/2024 05:45</td> <td>ONG médicale</td> <td>Données de tests</td> <td>Études démographiques</td> <td>Partage gratuit</td> </tr> <tr> <td>28/01/2024 07:15</td> <td>Revue scientifique</td> <td>Données anonymisées</td> <td>Publication d'étude</td> <td>Partage gratuit</td> </tr> <tr> <td>28/01/2024 08:30</td> <td>Hôpital</td> <td>Dossier médical</td> <td>Test logiciel dossier patient</td> <td>Accès privilégié au logiciel</td> </tr> </tbody> </table>
				<!-- end: page -->
			</section>
		</div>

		<aside id="sidebar-right" class="sidebar-right">
			<div class="nano">
				<div class="nano-content">
					<a href="#" class="mobile-close visible-xs">
						Collapse <i class="fa fa-chevron-right"></i>
					</a>

					<div class="sidebar-right-wrapper">

						<div class="sidebar-widget widget-calendar">
							<h6>Upcoming Tasks</h6>
							<div data-plugin-datepicker data-plugin-skin="dark"></div>

							<ul>
								<li>
									<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
									<span>Company Meeting</span>
								</li>
							</ul>
						</div>

						<div class="sidebar-widget widget-friends">
							<h6>Friends</h6>
							<ul>
								<li class="status-online">
									<figure class="profile-picture">
										<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
									</figure>
									<div class="profile-info">
										<span class="name">Joseph Doe Junior</span>
										<span class="title">Hey, how are you?</span>
									</div>
								</li>
								<li class="status-online">
									<figure class="profile-picture">
										<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
									</figure>
									<div class="profile-info">
										<span class="name">Joseph Doe Junior</span>
										<span class="title">Hey, how are you?</span>
									</div>
								</li>
								<li class="status-offline">
									<figure class="profile-picture">
										<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
									</figure>
									<div class="profile-info">
										<span class="name">Joseph Doe Junior</span>
										<span class="title">Hey, how are you?</span>
									</div>
								</li>
								<li class="status-offline">
									<figure class="profile-picture">
										<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
									</figure>
									<div class="profile-info">
										<span class="name">Joseph Doe Junior</span>
										<span class="title">Hey, how are you?</span>
									</div>
								</li>
							</ul>
						</div>

					</div>
				</div>
			</div>
		</aside>
	</section>

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

</body>

</html>