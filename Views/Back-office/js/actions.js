$(document).ready(function () {
  $("#login").on("submit", function (event) {
    event.preventDefault();
    $(".overlay").show();

    $.ajax({
      url: "login.php",
      method: "POST",
      data: $("#login").serialize(),
      success: function (data) {
        if (data == "login_success") {
          window.location.href = "index.php";
        } else {
          $("#e_msg").html(data);
          $(".overlay").hide();
        }
      },
      error: function (xhr) {
        console.log("Ajax error = " + xhr.statusText);
        alert("Error during Ajax request");
      },
      complete: function () {
        $(".loader-div").hide(); // Masque le loader une fois les données chargées
      },
    });
  });

  //Get User Information
  $("#signup_form").on("submit", function (event) {
    event.preventDefault();
    $(".overlay").show();
    var formData = new FormData(this);
    $.ajax({
      url: "register.php",
      method: "POST",
      data: formData,
      contentType: false, // Nécessaire pour envoyer des fichiers
      processData: false, // Nécessaire pour envoyer des fichiers
      success: function (data) {
        $(".overlay").hide();
        if (data == "register_success") {
          window.location.href = "index.php";
        } else {
          $("#signup_msg").html(data);
        }
      },
    });
  });

  // user Name
  $("#update_username").on("submit", function (event) {
    event.preventDefault();
    $(".overlay").show();
    $.ajax({
      url: "update.php",
      method: "POST",
      data: $("#update_username").serialize(),
      success: function (data) {
        if (data == "userupdate_success") {
          window.location.href = "edit_profile.php";
        } else {
          $("#update_name_msg").html(data);
          $(".overlay").hide();
        }
      },
    });
  });
  // user update password
  $("#update_password").on("submit", function (event) {
    event.preventDefault();
    $(".overlay").show();
    $.ajax({
      url: "update.php",
      method: "POST",
      data: $("#update_password").serialize(),
      success: function (data) {
        if (data == "updatepassword_success") {
          window.location.href = "edit_profile.php";
        } else {
          $("#update_password_msg").html(data);
          $(".overlay").hide();
        }
      },
    });
  });
});
