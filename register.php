<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
  <link rel="shortcut icon" href="assets/img/bunawan.webp" type="image/x-icon">
  <link rel="stylesheet" href="assets/css/style3.css">
  <title>login</title>
</head>

<body>
  <div class="loginform">
    <h2>Register</h2>
    <!-- Start Form -->
    <form id="form1">
      <p>Username</p>
      <input type="text" name="username" placeholder="Enter Username" id="username" required>
      <p>Password</p>
      <input type="password" name="password" placeholder="Enter Password" id="password" required>
      <p>First Name</p>
      <input type="text" name="fname" placeholder="Enter First Name" id="fname" required>
      <p>Last Name</p>
      <input type="text" name="lname" placeholder="Enter Last Name" id="lname" required>
      <p>Gender</p>
      <select name="" id="gender" class="form-control" required>
        <option value="" option hidden>Select Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select><br>
      <input type="submit" name="login-btn" class="btn btn-danger" value="Sign Up">
    </form>
    <a href="index" class="fw-bold">Login</a>
  </div>


  <!-- TOAST-->
  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <span class='toast-icon bi-info-circle'></span>
        <strong class="me-auto">&nbsp; Notifications</strong>
        <div id="toast-msg"></div>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body text-white">
      </div>
    </div>
  </div>

  <!-- SCRIPTS -->
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/sweetalert.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<script>
  //TOAST
  function Toast(msg, icon) {
    const toastLive = document.getElementById('liveToast')
    const toast = new bootstrap.Toast(toastLive)
    $('.toast-icon').addClass('bi-' + icon);
    $('#toast-msg').html(msg);

    toast.show();

    $(".toast").toast({
      autohide: false
    });

  }

  $(document).ready(function() {

    $('#form1').submit(function(e) {
      e.preventDefault();

      let username = $('#username').val()
      let password = $('#password').val()
      let fname = $('#fname').val()
      let lname = $('#lname').val()
      let gender = $('#gender').val()

      $.ajax({
        url: 'includes/register',
        type: 'POST',
        data: {
          username: username,
          password: password,
          gender: gender,
          fname: fname,
          lname: lname
        },

        dataType: 'JSON',
        beforeSend: function() {}

      }).done(function(res) {
        if (res.res_success == 1) {
          Toast("Success!", "info-circle");
          setTimeout("window.location.href = 'index';", 2500);
        } else {
          alert(res.res_message);
        }
      }).fail(function() {
        console.log("FAIL!")
      })
    })
  })
</script>