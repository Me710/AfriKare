<?php


session_start();


unset($_SESSION["mid"]);

//Destroy entire session data.
// session_destroy();
$BackToMyPage = $_SERVER['HTTP_REFERER'];
if (isset($BackToMyPage)) {
    header('Location: ' . $BackToMyPage);
} else {
    header('Location: signin.php'); // default page
}
