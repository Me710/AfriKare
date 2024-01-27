<?php


session_start();


unset($_SESSION["uid"]);

unset($_SESSION["name"]);

//Destroy entire session data.
// session_destroy();
$BackToMyPage = $_SERVER['HTTP_REFERER'];
if (isset($BackToMyPage)) {
    header('Location: ' . $BackToMyPage);
} else {
    header('Location: signin.php'); // default page
}
