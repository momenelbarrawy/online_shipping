<?php
require_once("../../Models/Buyer.php");
require_once("../../Models/Seller.php");
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phonenumber']) && isset($_POST['type'])) {
  if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['phonenumber']) && !empty($_POST['type'])) {
    $role = $_POST["type"];
    if ($role == "buyer") {
      $user = new Buyer;
      $user->setname($_POST['username']);
      $user->setemail($_POST['email']);
      $user->setpassword($_POST['password']);
      $user->setphone($_POST["phonenumber"]);
    } else {
      $user = new Seller;
      $user->setname($_POST['username']);
      $user->setemail($_POST['email']);
      $user->setpassword($_POST['password']);
      $user->setphone($_POST["phonenumber"]);
    }

    if ($user->register($role)) {
      header("location:../General/index.html");
    }
  } else {
    echo "Please fill all fields";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link rel="stylesheet" href="../Assets/css/all.min.css" />
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet" />
  <!-- Css file -->
  <link rel="stylesheet" href="../Assets/css/Register.css" />
  <link rel="stylesheet" href="../Assets/css/font-awesome.min.css" />
</head>

  <body>
    <!-- 
    <div class="alert alert-danger alert-dismissible py-3">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        Error 
    </div> 
    -->
  <div class="register">
    <div class="photo">
      <i class="fa-solid fa-user"></i>
    </div>
    <div class="container">
      <form action="" enctype="multipart/form-data" method="post">

        <div class="icon">
          <i class="fa-solid fa-user"></i>
          <input type="text" placeholder="Username" name="username" id="username" class="user" />
        </div>

        <div class="icon">
          <i class="fa-solid fa-user"></i>
          <input type="email" placeholder="Email" name="email" id="email" class="user" />
        </div>



        <div class="icon">
          <i class="fa-solid fa-lock"></i>
          <input type="password" placeholder="Password.." name="password" id="password" class="pass" />
        </div>


        <div class="icon">
          <i class="fa-solid fa-lock"></i>
          <input type="number" placeholder="Your Number..." name="phonenumber" id="phonenumber" class="phone-number" />
        </div>

        <select name="type" title="type" id="type">
          <option value="" hidden>Type</option>
          <option value="buyer">Buyer</option>
          <option value="seller">Seller</option>
        </select>


        <div class="submit">
          <input type="submit" value="Register" name="submit" class="log" />
        </div>


        <div class="info">
          <div class="check">
            <p>
              If you already have an account click
              <a href="../Auth/login.html">Sign In</a>
            </p>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script>
    var name = document.getElementById("username");
    var pass = document.getElementById("password");
    var cpass = document.getElementById("cpassword");
    var email = document.getElementById("email");
    var home_address = document.getElementById("homeaddress");
    var phone_number = document.getElementById("phonenumber");
    name.value = "";
    pass.value = "";
    cpass.value = "";
    email.value = "";
    home_address.value = "";
    phone_number.value = "";
  </script>
</body>

</html>