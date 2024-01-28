<?php
session_start();
if (!isset($_SESSION["mid"])) {
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

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Form Wizard | Okler Themes | Porto-Admin</title>
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

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />

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
                        if (isset($_SESSION["mid"])) {
                            $uid = $_SESSION['mid'];
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
                                <a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i>
                                    Logout</a>
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
                    <h2>Consultation</h2>

                    <div class="right-wrapper pull-right">
                        <ol class="breadcrumbs">
                            <li>
                                <a href="index.php">
                                    <i class="fa fa-home"></i>
                                </a>
                            </li>
                            <li><span>Forms</span></li>
                            <li><span>Wizard</span></li>
                        </ol>

                        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                    </div>
                </header>

                <!-- start: page -->

                <div class="row">
                    <div class="col-xs-12">
                        <section class="panel form-wizard" id="w4">
                            <header class="panel-heading">
                                <div class="panel-actions">
                                    <a href="#" class="fa fa-caret-down"></a>
                                    <a href="#" class="fa fa-times"></a>
                                </div>

                                <h2 class="panel-title">Formulaire</h2>
                            </header>
                            <div class="panel-body">
                                <div class="wizard-progress wizard-progress-lg">
                                    <div class="steps-progress">
                                        <div class="progress-indicator"></div>
                                    </div>
                                    <ul class="wizard-steps">
                                        <li class="active">
                                            <a href="#w4-account" data-toggle="tab"><span>1</span>Authorisation</a>
                                        </li>
                                        <li>
                                            <a href="#w4-profile" data-toggle="tab"><span>2</span>Symptômes</a>
                                        </li>
                                        <li>
                                            <a href="#w4-billing" data-toggle="tab"><span>3</span>Examen</a>
                                        </li>
                                        <li>
                                            <a href="#w4-confirm" data-toggle="tab"><span>4</span>Conseils</a>
                                        </li>
                                    </ul>
                                </div>

                                <form class="form-horizontal" novalidate="novalidate">
                                    <div class="tab-content">
                                        <div id="w4-account" class="tab-pane active">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="auth">Clé d'authentification</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="auth" id="auth">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="name">Prénom du patient</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="name" id="name">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="w4-profile" class="tab-pane">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="symptome">
                                                    Symptômes actuels</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="symptome" id="symptome">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="dure">Durée
                                                </label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" name="dure" id="dure" placeholder="en jour">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="w4-billing" class="tab-pane">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="pression">Pression artérielle</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="pression" id="pression">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="frequence">Fréquence Cardiaque</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="frequence" id="frequence">
                                                </div>
                                            </div>

                                        </div>
                                        <div id="w4-confirm" class="tab-pane">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="diagnostic">Diagnostic </label>
                                                <div class="col-sm-9">
                                                    <textarea name="diagnostic" id="diagnostic" cols="30" class="form-control" rows="10"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="traitement">Plan de traitement </label>
                                                <div class="col-sm-9">
                                                    <textarea name="traitement" id="traitement" cols="30" class="form-control" rows="10"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="panel-footer">
                                            <ul class="pager">
                                                <li class="previous disabled">
                                                    <a><i class="fa fa-angle-left"></i> Previous</a>
                                                </li>
                                                <li class="finish hidden pull-right">
                                                    <button type="button" onclick="saveFormData()"> <a>Envoyer</a></button>

                                                </li>
                                                <li class="next">
                                                    <a>Next <i class="fa fa-angle-right"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </section>
                    </div>
                </div>

                <!-- end: page -->
            </section>
        </div>


    </section>
    <?php
    $schedules = $userC->afficher();
    $sched_result = [];
    foreach ($schedules as $row) {

        $sched_result[$row['id']] = $row;
    }
    ?>

    <script>
        function saveFormData() {

            var formData = {
                auth: getElementValueById('auth'),
                plast_name: getElementValueById('name'),
                symptoms: getElementValueById('symptome'),
                duration: getElementValueById('dure'),
                bloodPressure: getElementValueById('pression'),
                heartRate: getElementValueById('frequence'),
                diagnostic: getElementValueById('diagnostic'),
                treatmentPlan: getElementValueById('traitement')
            };

            // Log the form data to the console
            console.log(formData);

            // Convert the JavaScript object to a JSON string
            var jsonData = JSON.stringify(formData, null, 2);


            console.log(jsonData);

        }

        function getElementValueById(id) {
            var element = document.getElementById(id);
            return element ? element.value : null;
        }
    </script>
    <!-- Vendor -->
    <script src="assets/vendor/jquery/jquery.js"></script>
    <script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

    <!-- Specific Page Vendor -->
    <script src="assets/vendor/jquery-validation/jquery.validate.js"></script>
    <script src="assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
    <script src="assets/vendor/pnotify/pnotify.custom.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="assets/javascripts/theme.js"></script>

    <!-- Theme Custom -->
    <script src="assets/javascripts/theme.custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="assets/javascripts/theme.init.js"></script>


    <!-- Examples -->
    <script src="assets/javascripts/forms/examples.wizard.js"></script>
</body>

</html>