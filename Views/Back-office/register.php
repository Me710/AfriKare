<?php
session_start();
include_once('../../config.php');
include_once '../../Model/user.php';
include_once '../../Controller/userC.php';
include_once './phpmailer/mailer_function.php';

$userC = new userC();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$email = htmlspecialchars($_POST['email']);

	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		echo "
            <div id='email-exists-alert' class='alert alert-danger'>
                <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
                <b>Please enter a valid email.</b>
            </div>";
		exit();
	} else {

		$f_name = htmlspecialchars($_POST["nom"]);
		$l_name = htmlspecialchars($_POST["prenom"]);
		$date = htmlspecialchars($_POST["date"]);
		$poids = htmlspecialchars($_POST["poids"]);
		$role = htmlspecialchars($_POST["role"]);


		$password = htmlspecialchars($_POST['password']);
		$repassword = htmlspecialchars($_POST['repassword']);
		$verify_token = md5(rand());



		$nameValidation = "/^[a-zA-Z ]+$/";
		$emailValidation = "/^[a-z0-9._%+-]+@[a-z]/";


		if (empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($repassword)) {
			echo "
                    <div id='email-exists-alert' class='alert alert-danger'>
                        <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
                        <b>Veuillez remplir tous les champs !</b>
                    </div>";
			exit();
		} else {
			if (!preg_match($nameValidation, $f_name)) {
				echo "
                        <div id='email-exists-alert' class='alert alert-danger'>
                            <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
                            <b>Ce prénom n'est pas valide !</b>
                        </div>";
				exit();
			}
			if (!preg_match($nameValidation, $l_name)) {
				echo "
                        <div id='email-exists-alert' class='alert alert-danger'>
                            <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
                            <b>Ce nom n'est pas valide !</b>
                        </div>";
				exit();
			}
			if (!preg_match($emailValidation, $email)) {
				echo "
                        <div id='email-exists-alert' class='alert alert-danger'>
                            <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
                            <b>Cet email n'est pas valide !</b>
                        </div>";
				exit();
			}
			if (strlen($password) < 9) {
				echo "
                        <div id='email-exists-alert' class='alert alert-danger'>
                            <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
                            <b>Le mot de passe est faible</b>
                        </div>";
				exit();
			}
			if ($password != $repassword) {
				echo "
                        <div id='email-exists-alert' class='alert alert-danger'>
                            <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
                            <b>Les mots de passe ne correspondent pas</b>
                        </div>";
				exit();
			}

			$count_email = $userC->checkEmailExists($email);
			if ($count_email > 0) {
				echo "
                        <div id='email-exists-alert' class='alert alert-danger'>
                            <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
                            <b>Cette adresse e-mail est déjà utilisée.</b>
                        </div>";
				exit();
			} else {


				$user = new user($f_name, $l_name, $poids, $email, $password, $role, $date);
				$success = sendemail_verify($f_name, $email, $verify_token);

				if ($success) {
					$userC->addUser($user);
					echo "<script>
									$(document).ready(function() {
										swal({
											title: 'Bienvenue !',
											text: 'Email de vérification envoyé. Veuillez consulter votre boîte de réception.',
											icon: 'success',
											button: {
												text: 'OK',
												closeModal: false,
											},
										}).then(function() {
											window.location.href = 'index.php'; 
											$('#signup_form')[0].reset();
										});
									});
								</script>";

					exit;
				} else {
					echo "<script>
                                $(document).ready(function() {
                                    swal({
                                        title: 'Erreur',
                                        text: 'Le mail n'est pas valide ou n'a pas pu être envoyé. Veuillez réessayer.',
                                        icon: 'error',
                                        button: 'OK'
                                    }).then(function() {
                                        window.location.href = 'signup-form.php';
                                    });
                                });
                            </script>";
					exit;
				}
			}
		}
	}
}
