<?php
session_start();
include_once('../../../config.php');
include_once('../../../Model/user.php');
include_once('../../../Controller/userC.php');

$userC = new userC();

if (isset($_SESSION["uid"])) {
    $uid = $_SESSION['uid'];
    $_SESSION['fullName'] = $userC->getUserFullName($uid);
    $name = $_SESSION['fullName'];
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// Include autoload.php file
require 'vendor/autoload.php';

$message_o = '';

if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['object']) && isset($_POST['message'])) {
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

        $subject = filter_var($_POST['object'], FILTER_SANITIZE_STRING);
        $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
        if (!empty($email) && !empty($subject) && !empty($message)) {
            // Additional data validation if needed
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                $mail->Username = 'dansokomoussa42@gmail.com';
                $mail->Password = 'rcbu afzn dstm dhhz';

                $mail->setFrom($email);
                // Add CC recipient
                $mail->addCC($email);

                $mail->isHTML(true);
                $mail->Subject = $subject;

                // Attach media files
                if (!empty($_FILES['media']['name'][0])) {
                    for ($i = 0; $i < count($_FILES['media']['name']); $i++) {
                        $tmpFilePath = $_FILES['media']['tmp_name'][$i];
                        if ($tmpFilePath != "") {
                            $mail->addAttachment($tmpFilePath, $_FILES['media']['name'][$i]);
                        }
                    }
                }

                // Add the body content with the logo
                $mail->Body = "
    <!DOCTYPE html>
    <html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml'
        xmlns:o='urn:schemas-microsoft-com:office:office'>

    <head>
        <meta charset='utf-8'> <!-- utf-8 works for most cases -->
        <meta name='viewport' content='width=device-width'> <!-- Forcing initial-scale shouldn't be necessary -->
        <meta http-equiv='X-UA-Compatible' content='IE=edge'> <!-- Use the latest (edge) version of IE rendering engine -->
        <meta name='x-apple-disable-message-reformatting'> <!-- Disable auto-scale in iOS 10 Mail entirely -->
        <title></title>
        <link href='https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700' rel='stylesheet'>
    </head>

    <body width='100%'
        style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;'>
        <center style='width: 100%; background-color: #f1f1f1;'>
            <div
                style='display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;'>
                &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
            </div>
            <div style='max-width: 600px; margin: 0 auto;' class='email-container'>
                <!-- BEGIN BODY -->
                <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'
                    style='margin: auto;'>
                    <tr>
                        <td valign='top' class='bg_white'
                            style='padding: 1em 2.5em 0 2.5em;'>
                            <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
                                <tr>
                                    <td class='logo' style='text-align: center;'>
                                        <h1 style='color: #17bebb; font-size: 24px; font-weight: 700; font-family: Poppins, sans-serif;'><a href='#'>contact</a></h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr><!-- end tr -->
                    <tr>
                        <td valign='middle' class='hero bg_white' style='padding: 2em 0 4em 0;'>
                            <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
                                <tr>
                                    <td style='padding: 0 2.5em; text-align: center; padding-bottom: 3em;'>
                                        <div class='text' style='color: rgba(0,0,0,.3);'>
                                            <h2 style='color: #000; font-size: 20px; margin-bottom: 0; font-weight: 200; line-height: 1;'>E-mail : $email</h2>
                                        
                                            </div>
                                    </td>
                                </tr>
                               <tr>
                                    <td style='padding: 0 2.5em; text-align: center; padding-bottom: 3em;'>
                                        <div class='text' style='color: rgba(0,0,0,.3);'>
                                            <h2 style='color: #000; font-size: 20px; margin-bottom: 0; font-weight: 200; line-height: 1.4;'></h2>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr><!-- end tr -->
                    <!-- 1 Column Text + Button : END -->
                </table>
                <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'
                    style='margin: auto;'>
                    <tr>
                        <td valign='middle' class='bg_light footer email-section' style='padding-top: 20px;'>
                            <table style='text-align: left; padding-right: 10px;'>
                                <tr>
                                    <td>
                                        <h3 style='color: #000; font-size: 20px; margin-bottom: 0;'>About</h3>
                                        <p style='color: rgba(0,0,0,.5);'>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign='middle' class='bg_light footer email-section' style='padding-top: 20px;'>
                            <table style='text-align: left; padding-left: 5px; padding-right: 5px;'>
                                <tr>
                                    <td>
                                        <h3 style='color: #000; font-size: 20px; margin-bottom: 0;'>Contact Info</h3>
                                        <ul style='margin: 0; padding: 0;'>
                                            <li><span style='color: rgba(0,0,0,1);'>203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                                            <li><span style='color: rgba(0,0,0,1);'>+2 392 3929 210</span></li>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign='middle' class='bg_light footer email-section' style='padding-top: 20px;'>
                            <table style='text-align: left; padding-left: 10px;'>
                                <tr>
                                    <td>
                                        <h3 style='color: #000; font-size: 20px; margin-bottom: 0;'>Links</h3>
                                        <ul style='margin: 0; padding: 0;'>
                                            <li><a href='#' style='color: rgba(0,0,0,1);'>Home</a></li>
                                            <li><a href='#' style='color: rgba(0,0,0,1);'>About</a></li>
                                            <li><a href='#' style='color: rgba(0,0,0,1);'>Services</a></li>
                                            <li><a href='#' style='color: rgba(0,0,0,1);'>Work</a></li>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'
                    style='margin: auto;'>
                    <tr>
                        <td class='bg_light' style='text-align: center;'>
                            <p style='color: rgba(0,0,0,.8);'>No longer want to receive these emails? You can <a href='#' style='color: rgba(0,0,0,.8);'>Unsubscribe here</a></p>
                        </td>
                    </tr>
                </table>
            </div>
        </center>
    </body>
    </html>";


                $mail->send();

                $message_o = "<script>swal('Succès', 'Merci de nous avoir contactés !\\nNous vous répondrons bientôt !', 'success');</script>";
            } catch (Exception $e) {
                $message_o = "<script>swal('Erreur', '" . $e->getMessage() . "', 'error');</script>";
            }
        } else {
            $message_o = "<script>swal('Erreur', 'Veuillez remplir tous les champs du formulaire.', 'error');</script>";
        }
    }
}
echo $message_o;
