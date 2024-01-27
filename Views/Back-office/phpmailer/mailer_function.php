<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// Include autoload.php file
require 'vendor/autoload.php';

$message_o = '';

function sendemail_verify($name, $email, $verify_token)
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->Username = 'dansokomoussa42@gmail.com';
        $mail->Password = 'rcbu afzn dstm dhhz';

        $mail->setFrom('dansokomoussa42@gmail.com', "Blockchain AFRIKARE");
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = " Bienvenue !";

        $mail->Body = "
                    <html lang='en'>
                    <head>
                        <!-- ... Metas, links, etc. ... -->
                    </head>
                  
                        <body>
                    <center style='width: 100%; background-color: #f1f1f1;'>
        <div style='max-width: 600px; margin: 0 auto;'>
            <table class='container'>
                <tr>
                    <td>
                        <div class='hero bg_white' style='background-size: cover; height: 400px;'>
                            <div class='overlay'></div>
                            <table>
                                <tr>
                                    <td>
                                        <div class='text' style='padding: 0 4em; text-align: center;'>
                                            <h3 style='color: #333;'>Cher(e) <?php echo $name; ?>,</h3>
                                            <p>Nous sommes ravis de vous accueillir en tant que nouveau membre de notre plateforme AFRIKARE. Votre parcours médical commence ici, et nous sommes là pour vous accompagner.</p>
                                            <p>Pour finaliser la création de votre compte, veuillez suivre les étapes ci-dessous :</p>
                                            <p><a href='http://localhost/Hackathon/views/front/verify-email.php?token=<?php echo $verify_token; ?>' style='background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Cliquez ici pour activer votre compte</a></p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </center>
                            </body>
                    </html>
                ";


        $mail->send();
        return true;
    } catch (Exception $e) {
        $_SESSION['error'] = "<script>swal('Erreur', '" . $e->getMessage() . "', 'error');</script>";
        return false;
    }
}
