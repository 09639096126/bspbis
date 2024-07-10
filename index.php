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
   <title>Login</title>
 </head>
 <body>
   <div class="loginform">
     <!-- Avatar Image -->
     <div class="avatar">
       <img src="assets/img/bunawan.webp" alt="Avatar">
     </div>
     <h2>BSPBIS Login</h2>
     <!-- Start Form -->
     <form id="form1">
       <select name="" id="options" class="" required>
         <option value="" selected hidden>Sign in As</option>
         <option value="1">Parent</option>
         <option value="2">MSWD</option>
       </select><br><br>
       <p>Username</p>
       <input type="text" name="username" placeholder="Enter Username" id="username">
       <p>Password</p>
       <input type="password" name="password" placeholder="Enter Password" id="password">
       <input type="submit" name="login-btn" class="btn btn-danger" value="Sign In">
     </form>
     <a href="register" class="fw-bold">Register</a>
   </div>

   <!-- SCRIPTS -->
   <script src="assets/js/jquery-3.6.0.min.js"></script>
   <script src="assets/js/sweetalert.min.js"></script>
   <script src="assets/js/bootstrap.bundle.min.js"></script>
 </body>

 </html>

 <script>
   $(document).ready(function() {

     //-------------------------- LOG IN -----------------------------------//

     $('#form1').submit(function(e) {
       e.preventDefault();

       let username = $('#username').val();
       let password = $('#password').val();
       let option = $('#options').val();

       if (username == "") {
         alert('Please Enter Username');
       } else if (username == "" && password == "") {
         alert('Please Enter Username & Password');
       } else if (password == "") {
         alert('Please Enter Password');
       } else {

         $.ajax({
           url: 'includes/signin',
           type: 'POST',
           data: {
             username: username,
             password: password,
             option: option
           },
           dataType: 'JSON',
           beforeSend: function() {

           }
         }).done(function(res) {

           if (res.res_success == 1) {

             if (option == 1) window.location = 'parent/modules/profile';
             if (option == 2) window.location = 'admin/modules/dashboard';

           } else {
             swal("Oops...", res.res_message, "error");
           }

         }).fail(function() {
           console.log('FAIL!');
         })


       }


     })

   })
 </script>