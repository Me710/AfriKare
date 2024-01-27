<?php
session_start();
require_once '../../config.php';
require_once('../../Model/user.php');
require_once('../../Controller/userC.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favcc.png" type="image/png" sizes="16x16">
    <title>Vérification de l'e-mail</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

    <?php
    $userC = new userC();

    if (isset($_GET['token'])) {
        $token = $_GET['token'];
        $row = $userC->getUserByToken($token);

        if ($row) {
            if ($row['verify_status'] == "0") {
                $clicked_token = $row['token'];
                $query = $userC->updateUserVerifyStatus($clicked_token);
                if ($query) {
                    echo "<script>
                        swal({
                            title: 'Succès !',
                            text: 'Votre compte a été vérifié avec succès.',
                            icon: 'success',
                            button: 'OK'
                        }).then(function() {
                            window.location.href = 'index.php';
                        });
                    </script>";
                } else {
                    echo "<script>
                        swal({
                            title: 'Erreur !',
                            text: 'La vérification a échoué. Veuillez réessayer plus tard.',
                            icon: 'error',
                            button: 'OK'
                        }).then(function() {
                            window.location.href = 'login-form.php';
                        });
                    </script>";
                }
            } else {
                echo "<script>
                    swal({
                        title: 'Succès !',
                        text: 'Ce mail est déjà vérifié. Connectez-vous.',
                        icon: 'success',
                        button: 'OK'
                    }).then(function() {
                        window.location.href = 'login-form.php';
                    });
                </script>";
            }
        } else {
            echo "<script>
                swal({
                    title: 'Erreur !',
                    text: 'Code de vérification invalide.',
                    icon: 'error',
                    button: 'OK'
                }).then(function() {
                    window.location.href = 'login-form.php';
                });
            </script>";
            exit();
        }
    } else {
        echo "<script>
            swal({
                title: 'Erreur !',
                text: 'Le code de vérification n'existe pas.',
                icon: 'error',
                button: 'OK'
            }).then(function() {
                window.location.href = 'login-form.php';
            });
        </script>";
        exit();
    }
    ?>

</body>

</html>