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

    <title>User Profile | Okler Themes | Porto-Admin</title>
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
                            </ul>
                        </nav>

                    </div>

                </div>

            </aside>
            <!-- end: sidebar -->

            <section role="main" class="content-body">
                <header class="page-header">
                    <h2>User Profile</h2>

                    <div class="right-wrapper pull-right">
                        <ol class="breadcrumbs">
                            <li>
                                <a href="index.php">
                                    <i class="fa fa-home"></i>
                                </a>
                            </li>
                            <li><span>Pages</span></li>
                            <li><span>User Profile</span></li>
                        </ol>

                        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                    </div>
                </header>

                <!-- start: page -->

                <div class="row">
                    <div class="col-md-4 col-lg-3">

                        <section class="panel">
                            <div class="panel-body">
                                <div class="thumb-info mb-md">
                                    <img src="assets/images/!logged-user.jpg" class="rounded img-responsive" alt="John Doe">
                                    <div class="thumb-info-title">
                                        <span class="thumb-info-inner">John Doe</span>
                                        <span class="thumb-info-type">CEO</span>
                                    </div>
                                </div>

                                <div class="widget-toggle-expand mb-md">
                                    <div class="widget-header">
                                        <h6>Profile Completion</h6>
                                        <div class="widget-toggle">+</div>
                                    </div>
                                    <div class="widget-content-collapsed">
                                        <div class="progress progress-xs light">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                60%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content-expanded">
                                        <ul class="simple-todo-list">
                                            <li class="completed">Update Profile Picture</li>
                                            <li class="completed">Change Personal Information</li>
                                            <li>Update Social Media</li>
                                            <li>Follow Someone</li>
                                        </ul>
                                    </div>
                                </div>

                                <hr class="dotted short">

                                <h6 class="text-muted">About</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis vulputate quam. Interdum et malesuada</p>
                                <div class="clearfix">
                                    <a class="text-uppercase text-muted pull-right" href="#">(View All)</a>
                                </div>

                                <hr class="dotted short">

                                <div class="social-icons-list">
                                    <a rel="tooltip" data-placement="bottom" target="_blank" href="http://www.facebook.com" data-original-title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a>
                                    <a rel="tooltip" data-placement="bottom" href="http://www.twitter.com" data-original-title="Twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a>
                                    <a rel="tooltip" data-placement="bottom" href="http://www.linkedin.com" data-original-title="Linkedin"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
                                </div>

                            </div>
                        </section>
                    </div>
                    <div class="col-md-8 col-lg-6">

                        <div class="tabs">
                            <ul class="nav nav-tabs tabs-primary">
                                <li class="active">
                                    <a href="#overview" data-toggle="tab">Overview</a>
                                </li>
                                <li>
                                    <a href="#edit" data-toggle="tab">Edit</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="overview" class="tab-pane active">
                                    <h4 class="mb-md">Update Status</h4>

                                    <section class="simple-compose-box mb-xlg">
                                        <form method="get" action="/">
                                            <textarea name="message-text" data-plugin-textarea-autosize placeholder="What's on your mind?" rows="1"></textarea>
                                        </form>
                                        <div class="compose-box-footer">
                                            <ul class="compose-toolbar">
                                                <li>
                                                    <a href="#"><i class="fa fa-camera"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-map-marker"></i></a>
                                                </li>
                                            </ul>
                                            <ul class="compose-btn">
                                                <li>
                                                    <a class="btn btn-primary btn-xs">Post</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </section>

                                    <h4 class="mb-xlg">Timeline</h4>

                                    <div class="timeline timeline-simple mt-xlg mb-md">
                                        <div class="tm-body">
                                            <div class="tm-title">
                                                <h3 class="h5 text-uppercase">November 2013</h3>
                                            </div>
                                            <ol class="tm-items">
                                                <li>
                                                    <div class="tm-box">
                                                        <p class="text-muted mb-none">7 months ago.</p>
                                                        <p>
                                                            It's awesome when we find a good solution for our projects, Porto Admin is <span class="text-primary">#awesome</span>
                                                        </p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="tm-box">
                                                        <p class="text-muted mb-none">7 months ago.</p>
                                                        <p>
                                                            What is your biggest developer pain point?
                                                        </p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="tm-box">
                                                        <p class="text-muted mb-none">7 months ago.</p>
                                                        <p>
                                                            Checkout! How cool is that!
                                                        </p>
                                                        <div class="thumbnail-gallery">
                                                            <a class="img-thumbnail lightbox" href="assets/images/projects/project-4.jpg" data-plugin-options='{ "type":"image" }'>
                                                                <img class="img-responsive" width="215" src="assets/images/projects/project-4.jpg">
                                                                <span class="zoom">
                                                                    <i class="fa fa-search"></i>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
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

    <!-- Specific Page Vendor -->
    <script src="assets/vendor/jquery-autosize/jquery.autosize.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="assets/javascripts/theme.js"></script>

    <!-- Theme Custom -->
    <script src="assets/javascripts/theme.custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="assets/javascripts/theme.init.js"></script>

</body>

</html>