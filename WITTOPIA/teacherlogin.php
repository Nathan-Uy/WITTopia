
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css-->
    <link rel="stylesheet" href="css/styles.css">
    <title>Login</title>
</head>
<body>

  <center>
    <div class="log_form">
        <form action="verifyteacher.php" class="login_form" method="POST">
            <h2>Welcome to WITTopia!</h2>
            <h6>
            <?php
                error_reporting(0);
                session_start();
                session_destroy();
                echo $_SESSION['loginMessage'];
                ?>
            </h6>
            <div>
                <p class="log_label">Username</p>
                <input type="email" name="username" autocomplete="on" required>
            </div>
            <div>
                <p class="log_label" >Password</p>
                <input type="password" name="password" required>
            </div>
            <div>
                <input type="submit" name="submit" value="Login" class="btn btn-danger">
            </div>
        </form>
    </div>
  </center>
    


    <!--Bootstrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- external javascript-->

</body>
</html>