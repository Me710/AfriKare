<?php

include '../../connexion.php';
include '../../config.php';
include_once '../../Model/panier.php';
include_once '../../Controller/panierC.php';
include_once '../../Model/commande.php';
include_once '../../Controller/commandeC.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// Include autoload.php file
require 'vendor/autoload.php';
// Create object of PHPMailer class
$mail = new PHPMailer(true);

$commandeC = new commandeC();
$liste = $commandeC->AfficherCommandes();
$panierC = new panierC();
$listeProduits = $panierC->afficherpanier();
// error_reporting(0);


$error = "";

if (

  isset($_POST["nom"]) &&

  isset($_POST["email"])

) {
  $name = $_POST['nom'];
  $email = $_POST['email'];
  $subject = 'Facture de la Commande';
  $message = 'Merci de nous avoir choisi !';
}
try {
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  // Gmail ID which you want to use as SMTP server
  $mail->Username = 'dansokomoussa42@gmail.com';
  // Gmail Password
  $mail->Password = 'tmntknorxfwvetuu';
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;

  // Email ID from which you want to send the email
  $mail->setFrom('dansokomoussa42@gmail.com');
  // Recipient Email ID where you want to receive emails
  $mail->addAddress('dansokofaring@gmail.com');

  $mail->isHTML(true);
  $mail->Subject = "Facture de la Commande";
  $mail->Body = "<h4>Bonjour,<br>Merci de nous avoir choisi !  <br>Votre Commande a ete pris en charge</h4>";

  $mail->send();
  $output = '<div class="alert alert-success">
                  <h5>Merci de vérifiez votre boite mail!</h5>
                </div>';
} catch (Exception $e) {
  $output = '<div class="alert alert-danger">
                  <h5>' . $e->getMessage() . '</h5>
                </div>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Caleb Adeleye">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
  <title>Reçu</title>
  <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
  <!-- Web Fonts
======================= -->
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

  <!-- Stylesheet
======================= -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/65eb163cd4.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
  <link href="{{ asset('css/invoice.css') }}" rel="stylesheet" />
  <style>
    .nom {
      color: #FEA116 !important;
    }
  </style>
</head>

<body>


  <div id="error">
    <?php echo $error; ?>
  </div>

  <?php
  if (isset($_POST['idCommande'])) {
    $commande = $commandeC->RecupererCommande($_POST['idCommande']);
  }
  ?>

  <?php
  $grand_total = 0;
  foreach ($liste as $com) {
  ?>
    <!-- Container -->
    <div class="container-fluid invoice-container" id="invoice">

      <!-- Header -->
      <header>

        <hr style="background-color: gray;">
      </header>

      <!-- Main Content -->
      <main id="receipt">

        <div class="row">
          <div class="col-sm-6"><strong>Date:</strong> <?php echo $com['date'] ?> </div>
          <div class="col-sm-6 text-sm-right">
            <h4 class="text-7 mb-0">Reçu</h4>
          </div>

        </div>
        <div class="row">
          <div class="col-sm-12 text-sm-center">
            <h3 style="padding-top: 15px;">Commande N°A00<?php echo $com['idCommande'] ?></h3>
          </div>

        </div>
        <hr style="background-color: black;">
        <div class="row">
          <div class="col-sm-6 text-sm-right order-sm-1"> <strong>
              <div class="nom">RESTORAN</div>
            </strong>
            <address>
              Tunisia<br />
              (+216) 11 22 33 44<br />
              restoran@gmail.com

            </address>
          </div>

          <div class="col-sm-6 order-sm-0"> <strong>Client:</strong>
            <input type="hidden" name="nom" value="<?php echo $com['nom'] ?>">
            <input type="hidden" name="email" value="<?php echo $com['email'] ?>">

            <?php

            ?>
            <address>
              NOM: <?php echo $com['nom'] ?><br />
              ADRESSE: <?php echo $com['adresse'] ?><br />
              EMAIL: <?php echo $com['email'] ?><br />
              TELEPHONE: (+216) <?php echo $com['tel'] ?><br />
              PAIEMENT: <?php echo $com['modep'] ?><br />
            </address>
          </div>
        </div>

        <div class="card">
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table mb-0">
                <thead class="card-header">
                  <tr>
                    <td class="col-3 border-0"><strong>IMAGE</strong></td>
                    <td class="col-3 border-0"><strong>ARTICLES</strong></td>
                    <td class="col-3 border-0"><strong>Description</strong></td>
                    <td class="col-4 border-0"><strong>PRIX</strong></td>
                    <!-- <td class="col-2 text-center border-0"><strong>PRIX L</strong></td> -->
                    <td class="col-1 text-center border-0"><strong>QUANTITE</strong></td>
                    <td class="col-2 text-right border-0"><strong>TOTAL</strong></td>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $grand_total = 0;
                  foreach ($listeProduits as $produit) {
                  ?>
                    <tr>
                      <td class="col-3 border-1" style="background-color: #FFF;color: #FFF;"><img class="flex-shrink-0 img-fluid rounded" src="<?php echo $produit['image_produit'] ?>" width="20%" alt=""></td>

                      <td class="col-3 border-1" style="background-color: #FFF;color: #000;"><?php echo $produit['nom_produit'] ?></td>
                      <td class="col-4 text-1 border-1" style="background-color: #FFF;color: #000;">Description</td>
                      <td class="col-2 text-center border-1" style="background-color: #FFF;color: #000;"><?php echo $produit['prix_produit'] . '&nbsp;' . 'DT' ?></td>
                      <!-- <td class="col-2 text-center border-1"  style="background-color: #FFF;color: #000;">8 DT</td> -->
                      <td class="col-1 text-center border-1" style="background-color: #FFF;color: #000;"><?php echo $produit['quantite_produit'] ?></td>
                      <td class="col-2 text-right border-1" style="background-color: #0F172B;color: #fff;"><?php echo $produit['total_prix'] . '&nbsp;' . 'DT'; ?></td>
                    </tr>
                    <?php $grand_total += $produit['total_prix']; ?>
                  <?php

                  }
                  ?>

                </tbody>
                <tfoot class="card-footer">

                  <tr>
                    <td colspan="5" class="text-right  border-0"><strong>Sous-Total:</strong></td>
                    <td class="text-right" style="background-color:#0F172B; color: #fff;"><?php echo number_format($grand_total, 2) . '&nbsp;' . 'DT'; ?></td>
                  </tr>
                  <tr>
                    <td colspan="5" class="text-right"><strong>Total:</strong> sous total+ 8 DT frais de livraison</td>
                    <td class="text-right" style="background-color:#0F172B; color: #fff;"><?php echo number_format($grand_total + 8, 2) . '&nbsp;' . 'DT'; ?></td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

      </main>
      <!-- Footer -->
      <footer class="text-center">
        <p class="text-1"><strong>NOTE :</strong> Toute altération sur ce reçu sera invalidée.</p>
        <br><br>
        <br><br>
        <!-- <br><br> -->
        <br>
        <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Imprimer</a>
          <a href="#" id="download" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-download"></i> Télécharger</a>
        </div>
      </footer>

    </div>
  <?php

  }
  ?>

  <?php
  $stmt2 = $connect->prepare('DELETE FROM paniers');
  $stmt2->execute();

  ?>

  <script>
    window.onload = function() {
      document.getElementById("download")
        .addEventListener("click", () => {
          const invoice = this.document.getElementById("invoice");
          var opt = {
            filename: 'facture',
            image: {
              type: 'jpeg',
              quality: 0.98
            },
            html2canvas: {
              scale: 2
            },
            jsPDF: {
              unit: 'in',
              format: 'letter',
              orientation: 'portrait'
            }
          };
          html2pdf().from(invoice).set(opt).save();

        })
    }
  </script>
</body>

</html>