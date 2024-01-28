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

	<title>Responsive Tables | Okler Themes | Porto-Admin</title>
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
					<img src="assets/images/R.jpg" height="35" alt="AFRIKARE Admin" />
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
									<a href="index.php">
										<i class="fa fa-home" aria-hidden="true"></i>
										<span>Dashboard</span>
									</a>
								</li>
								<li>
									<a href="profile.php">
										<i class="fa fa-user" aria-hidden="true"></i>
										<span>Mon profil</span>
									</a>
								</li>
								<li>
									<a href="consultation.php">

										<i class="fa fa-user" aria-hidden="true"></i>
										<span>Faire une consultation</span>
									</a>
								</li>
								<li>
									<a href="listeConsultation.php">

										<i class="fa fa-list" aria-hidden="true"></i>
										<span>Mes consultations</span>
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
					<h2>Responsive Tables</h2>

					<div class="right-wrapper pull-right">
						<ol class="breadcrumbs">
							<li>
								<a href="index.php">
									<i class="fa fa-home"></i>
								</a>
							</li>
							<li><span>Tables</span></li>
							<li><span>Responsive</span></li>
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

						<h2 class="panel-title">Bootstrap Responsive</h2>
					</header>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-condensed mb-none">
								<thead>
									<tr>
										<th>Code</th>
										<th>Company</th>
										<th class="text-right">Price</th>
										<th class="text-right">Change</th>
										<th class="text-right">Change %</th>
										<th class="text-right">Open</th>
										<th class="text-right">High</th>
										<th class="text-right">Low</th>
										<th class="text-right">Volume</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>AAC</td>
										<td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
										<td class="text-right">$1.38</td>
										<td class="text-right">-0.01</td>
										<td class="text-right">-0.36%</td>
										<td class="text-right">$1.39</td>
										<td class="text-right">$1.39</td>
										<td class="text-right">$1.38</td>
										<td class="text-right">9,395</td>
									</tr>
									<tr>
										<td>AAD</td>
										<td>ARDENT LEISURE GROUP</td>
										<td class="text-right">$1.15</td>
										<td class="text-right"> +0.02</td>
										<td class="text-right">1.32%</td>
										<td class="text-right">$1.14</td>
										<td class="text-right">$1.15</td>
										<td class="text-right">$1.13</td>
										<td class="text-right">56,431</td>
									</tr>
									<tr>
										<td>AAX</td>
										<td>AUSENCO LIMITED</td>
										<td class="text-right">$4.00</td>
										<td class="text-right">-0.04</td>
										<td class="text-right">-0.99%</td>
										<td class="text-right">$4.01</td>
										<td class="text-right">$4.05</td>
										<td class="text-right">$4.00</td>
										<td class="text-right">90,641</td>
									</tr>
									<tr>
										<td>ABC</td>
										<td>ADELAIDE BRIGHTON LIMITED</td>
										<td class="text-right">$3.00</td>
										<td class="text-right"> +0.06</td>
										<td class="text-right">2.04%</td>
										<td class="text-right">$2.98</td>
										<td class="text-right">$3.00</td>
										<td class="text-right">$2.96</td>
										<td class="text-right">862,518</td>
									</tr>
									<tr>
										<td>ABP</td>
										<td>ABACUS PROPERTY GROUP</td>
										<td class="text-right">$1.91</td>
										<td class="text-right">0.00</td>
										<td class="text-right">0.00%</td>
										<td class="text-right">$1.92</td>
										<td class="text-right">$1.93</td>
										<td class="text-right">$1.90</td>
										<td class="text-right">595,701</td>
									</tr>
									<tr>
										<td>ABY</td>
										<td>ADITYA BIRLA MINERALS LIMITED</td>
										<td class="text-right">$0.77</td>
										<td class="text-right"> +0.02</td>
										<td class="text-right">2.00%</td>
										<td class="text-right">$0.76</td>
										<td class="text-right">$0.77</td>
										<td class="text-right">$0.76</td>
										<td class="text-right">54,567</td>
									</tr>
									<tr>
										<td>ACR</td>
										<td>ACRUX LIMITED</td>
										<td class="text-right">$3.71</td>
										<td class="text-right"> +0.01</td>
										<td class="text-right">0.14%</td>
										<td class="text-right">$3.70</td>
										<td class="text-right">$3.72</td>
										<td class="text-right">$3.68</td>
										<td class="text-right">191,373</td>
									</tr>
									<tr>
										<td>ADU</td>
										<td>ADAMUS RESOURCES LIMITED</td>
										<td class="text-right">$0.72</td>
										<td class="text-right">0.00</td>
										<td class="text-right">0.00%</td>
										<td class="text-right">$0.73</td>
										<td class="text-right">$0.74</td>
										<td class="text-right">$0.72</td>
										<td class="text-right">8,602,291</td>
									</tr>
									<tr>
										<td>AGG</td>
										<td>ANGLOGOLD ASHANTI LIMITED</td>
										<td class="text-right">$7.81</td>
										<td class="text-right">-0.22</td>
										<td class="text-right">-2.74%</td>
										<td class="text-right">$7.82</td>
										<td class="text-right">$7.82</td>
										<td class="text-right">$7.81</td>
										<td class="text-right">148</td>
									</tr>
									<tr>
										<td>AGK</td>
										<td>AGL ENERGY LIMITED</td>
										<td class="text-right">$13.82</td>
										<td class="text-right"> +0.02</td>
										<td class="text-right">0.14%</td>
										<td class="text-right">$13.83</td>
										<td class="text-right">$13.83</td>
										<td class="text-right">$13.67</td>
										<td class="text-right">846,403</td>
									</tr>
									<tr>
										<td>AGO</td>
										<td>ATLAS IRON LIMITED</td>
										<td class="text-right">$3.17</td>
										<td class="text-right">-0.02</td>
										<td class="text-right">-0.47%</td>
										<td class="text-right">$3.11</td>
										<td class="text-right">$3.22</td>
										<td class="text-right">$3.10</td>
										<td class="text-right">5,416,303</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</section>

				<section class="panel">
					<header class="panel-heading">
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>

						<h2 class="panel-title">Unseen Column</h2>
					</header>
					<div class="panel-body">
						<table class="table table-bordered table-striped table-condensed mb-none">
							<thead>
								<tr>
									<th>Code</th>
									<th class="hidden-xs hidden-sm">Company</th>
									<th class="text-right">Price</th>
									<th class="text-right hidden-xs hidden-sm">Change</th>
									<th class="text-right hidden-xs">Change %</th>
									<th class="text-right">Open</th>
									<th class="text-right hidden-xs hidden-sm">High</th>
									<th class="text-right hidden-xs hidden-sm">Low</th>
									<th class="text-right">Volume</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>AAC</td>
									<td class="hidden-xs hidden-sm">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
									<td class="text-right">$1.38</td>
									<td class="text-right hidden-xs hidden-sm">-0.01</td>
									<td class="text-right hidden-xs">-0.36%</td>
									<td class="text-right">$1.39</td>
									<td class="text-right hidden-xs hidden-sm">$1.39</td>
									<td class="text-right hidden-xs hidden-sm">$1.38</td>
									<td class="text-right">9,395</td>
								</tr>
								<tr>
									<td>AAD</td>
									<td class="hidden-xs hidden-sm">ARDENT LEISURE GROUP</td>
									<td class="text-right">$1.15</td>
									<td class="text-right hidden-xs hidden-sm"> +0.02</td>
									<td class="text-right hidden-xs">1.32%</td>
									<td class="text-right">$1.14</td>
									<td class="text-right hidden-xs hidden-sm">$1.15</td>
									<td class="text-right hidden-xs hidden-sm">$1.13</td>
									<td class="text-right">56,431</td>
								</tr>
								<tr>
									<td>AAX</td>
									<td class="hidden-xs hidden-sm">AUSENCO LIMITED</td>
									<td class="text-right">$4.00</td>
									<td class="text-right hidden-xs hidden-sm">-0.04</td>
									<td class="text-right hidden-xs">-0.99%</td>
									<td class="text-right">$4.01</td>
									<td class="text-right hidden-xs hidden-sm">$4.05</td>
									<td class="text-right hidden-xs hidden-sm">$4.00</td>
									<td class="text-right">90,641</td>
								</tr>
								<tr>
									<td>ABC</td>
									<td class="hidden-xs hidden-sm">ADELAIDE BRIGHTON LIMITED</td>
									<td class="text-right">$3.00</td>
									<td class="text-right hidden-xs hidden-sm"> +0.06</td>
									<td class="text-right hidden-xs">2.04%</td>
									<td class="text-right">$2.98</td>
									<td class="text-right hidden-xs hidden-sm">$3.00</td>
									<td class="text-right hidden-xs hidden-sm">$2.96</td>
									<td class="text-right">862,518</td>
								</tr>
								<tr>
									<td>ABP</td>
									<td class="hidden-xs hidden-sm">ABACUS PROPERTY GROUP</td>
									<td class="text-right">$1.91</td>
									<td class="text-right hidden-xs hidden-sm">0.00</td>
									<td class="text-right hidden-xs">0.00%</td>
									<td class="text-right">$1.92</td>
									<td class="text-right hidden-xs hidden-sm">$1.93</td>
									<td class="text-right hidden-xs hidden-sm">$1.90</td>
									<td class="text-right">595,701</td>
								</tr>
								<tr>
									<td>ABY</td>
									<td class="hidden-xs hidden-sm">ADITYA BIRLA MINERALS LIMITED</td>
									<td class="text-right">$0.77</td>
									<td class="text-right hidden-xs hidden-sm"> +0.02</td>
									<td class="text-right hidden-xs">2.00%</td>
									<td class="text-right">$0.76</td>
									<td class="text-right hidden-xs hidden-sm">$0.77</td>
									<td class="text-right hidden-xs hidden-sm">$0.76</td>
									<td class="text-right">54,567</td>
								</tr>
								<tr>
									<td>ACR</td>
									<td class="hidden-xs hidden-sm">ACRUX LIMITED</td>
									<td class="text-right">$3.71</td>
									<td class="text-right hidden-xs hidden-sm"> +0.01</td>
									<td class="text-right hidden-xs">0.14%</td>
									<td class="text-right">$3.70</td>
									<td class="text-right hidden-xs hidden-sm">$3.72</td>
									<td class="text-right hidden-xs hidden-sm">$3.68</td>
									<td class="text-right">191,373</td>
								</tr>
								<tr>
									<td>ADU</td>
									<td class="hidden-xs hidden-sm">ADAMUS RESOURCES LIMITED</td>
									<td class="text-right">$0.72</td>
									<td class="text-right hidden-xs hidden-sm">0.00</td>
									<td class="text-right hidden-xs">0.00%</td>
									<td class="text-right">$0.73</td>
									<td class="text-right hidden-xs hidden-sm">$0.74</td>
									<td class="text-right hidden-xs hidden-sm">$0.72</td>
									<td class="text-right">8,602,291</td>
								</tr>
								<tr>
									<td>AGG</td>
									<td class="hidden-xs hidden-sm">ANGLOGOLD ASHANTI LIMITED</td>
									<td class="text-right">$7.81</td>
									<td class="text-right hidden-xs hidden-sm">-0.22</td>
									<td class="text-right hidden-xs">-2.74%</td>
									<td class="text-right">$7.82</td>
									<td class="text-right hidden-xs hidden-sm">$7.82</td>
									<td class="text-right hidden-xs hidden-sm">$7.81</td>
									<td class="text-right">148</td>
								</tr>
								<tr>
									<td>AGK</td>
									<td class="hidden-xs hidden-sm">AGL ENERGY LIMITED</td>
									<td class="text-right">$13.82</td>
									<td class="text-right hidden-xs hidden-sm"> +0.02</td>
									<td class="text-right hidden-xs">0.14%</td>
									<td class="text-right">$13.83</td>
									<td class="text-right hidden-xs hidden-sm">$13.83</td>
									<td class="text-right hidden-xs hidden-sm">$13.67</td>
									<td class="text-right">846,403</td>
								</tr>
								<tr>
									<td>AGO</td>
									<td class="hidden-xs hidden-sm">ATLAS IRON LIMITED</td>
									<td class="text-right">$3.17</td>
									<td class="text-right hidden-xs hidden-sm">-0.02</td>
									<td class="text-right hidden-xs">-0.47%</td>
									<td class="text-right">$3.11</td>
									<td class="text-right hidden-xs hidden-sm">$3.22</td>
									<td class="text-right hidden-xs hidden-sm">$3.10</td>
									<td class="text-right">5,416,303</td>
								</tr>
							</tbody>
						</table>
					</div>
				</section>


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