<?php
session_start();
include_once('../../config.php');
include_once '../../Model/user.php';
include_once '../../Controller/userC.php';

$userC = new userC();


$_SESSION["uid"] = null;
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["g-recaptcha-response"])) {

	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$password = htmlspecialchars($_POST['password']);
	// $captcha_response = $_POST['g-recaptcha-response'];


	$secretkey = '6Le6FQckAAAAAAvdbMMLTuuj8kLgPLkhLqCZP8HU';
	$ip = $_SERVER['REMOTE_ADDR'];
	$response = $_POST["g-recaptcha-response"];
	$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response&remoteip=$ip";

	$fire = file_get_contents($url);
	$data = json_decode($fire);


	$passcheck = md5($password);
	$row = $userC->getUserByEmailAndPassword($email, $passcheck);
	$count = $userC->countUsers($email, $passcheck);

	if ($count == 1 && $row["role"] == 'Patient'  && $data->success == true) {


		if ($row) {

			$_SESSION["uid"] = $row["id"];

			// $ip_add = getenv("REMOTE_ADDR");
			$ip_add = $_SERVER['REMOTE_ADDR'];
		}


		//if user is login from page we will send login_success

		$BackToMyPage = $_SERVER['HTTP_REFERER'];
		if (!isset($BackToMyPage)) {
			header('Location: ' . $BackToMyPage);
		} else {
			echo "<script>
    $(document).ready(function() {
        swal({
            title: 'Connexion réussie!',
            text: 'Vous êtes maintenant connecté.',
            icon: 'success',
            button: 'Continuer',
            customClass: {
                confirmButton: 'swal-center-btn'
            }
        }).then(function() {
            window.location.href = 'index.php'; // Page par défaut
        });
    });
</script>";
		}


		exit;
	} else {
		if ($data->success == false) {
			echo "<span style='color:#ea3d23;'>vérifiez que vous n'êtes pas un robot!</span>";
			exit();
		} else {
			echo "<span style='color:#ea3d23;'>adrese mail ou mot de passe incorrect</span>";
			exit();
		}
	}
}
