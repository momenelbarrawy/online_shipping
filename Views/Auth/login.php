<?php
require_once '../../Models/User.php';
if (isset($_POST['username']) && isset($_POST['password'])) {
  if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $user = new User;
    $user->setname($_POST['username']);
    $user->setpassword($_POST['password']);
    if ($user->login()) {
      header("location:../General/index.html");
    } else {
      echo "<div class=\"alert alert-danger alert-dismissible py-3\">
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            Error : Please fill all fields </div>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="../Assets/css/all.min.css" />
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet" />
  <!-- Css file -->
  <link rel="stylesheet" href="../Assets/css/Login.css" />
  <link rel="stylesheet" href="../Assets/css/font-awesome.min.css" />
</head>

<body>
  <!-- 
    <div class="alert alert-danger alert-dismissible py-3">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        Error 
    </div> 
    -->
  <div class="login">
    <div class="photo">
      <i class="fa-solid fa-user"></i>
    </div>
    <div class="container">
      <form method="POST" enctype="multipart/form-data" action="">


        <div class="icon">
          <i class="fa-solid fa-user"></i>
          <input type="text" placeholder="Email" name="username" class="user" />
        </div>



        <div class="icon">
          <i class="fa-solid fa-lock"></i>
          <input type="password" placeholder="Password" name="password" class="pass" />
        </div>



        <div class="submit">
          <input type="submit" name="submit" value="LOGIN" class="log" />
        </div>



        <div class="info">
          <p class="register-link">
            Don't have an account?
            <a href="../Auth/register.php">Sign Up</a>
          </p>
          <div class="for-pass">
            <div class="check">
              <input type="checkbox" id="me" class="not" />
              <label for="me">Remember me</label>
            </div>

            <p id="me"><i>Forget your password?</i></p>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script>
    var eduname = document.getElementById('username')
    var edupass = document.getElementById('password')
    eduname.value = ''
    edupass.value = ''
  </script>
</body>

</html>