<?php 
    error_reporting(0);
    session_start();
    session_destroy();

    if($_SESSION['message']){
        $message = $_SESSION['message'];

        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>




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
    <title>Home</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="logo\logo2.png" alt="Logo" style="width: 100%; height: 50px;"></a>
            
    </div>
    <form class="menu">
            <ul class="navbar-nav me-auto mb- mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
    
                    <li class="nav-item"  active>
                        <a class="nav-link active" href="selectuser.php" >Login</a>
                    </li>
            </ul>
        </form>
</nav>

<div class="classbg">
   
<img src="photos/bg.jpeg" class="mainbg" alt="Wester Institute of Technology">
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">

            <img src="photos/rts.jpg" alt="rts" class="rts">

        </div>
        <div class="col-md-8">
            <h3>Welcome to WITTopia!</h3>
            <p>WITTopia is an engineering college in La Paz, Iloilo City, Philippines. The college was organized in 1964 to establish an engineering school to serve the growing manpower needs of Western Visayas.</p>
            <p>Mission: At WITTopia we nurture lifelong learners, fostering curiosity, compassion, and confidence for a changing world.</p>
            <p>Vision: WITTopia strives for educational excellence, inspiring innovative and responsible leaders in a diverse and vibrant community.</p>
        </div>
       
    </div>
</div>

<center>
    <h1>The Acedeme</h1>
</center>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="photos/first.jpg" alt="Engr. Ricardo T. Salas"  class="presidents">
            <h3>Engr. Ricardo T. Salas</h3>
        </div>
        <div class="col-md-4">
             <img src="photos/second.jpg" alt="Engr. Richard Salas" class="presidents">
             <h3>Engr. Richard S. Salas</h3>
        </div>
        <div class="col-md-4">
            <img src="photos/third.jpg" alt="Engr. Richard Kenneth Salas" class="presidents">
            <h3>Engr. Richard K. Salas</h3>
        </div>
    </div>
</div>

<center class="courses">
    <h1>Courses Offered</h1>
</center>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="photos/compe.jpg" alt="Engr. Ricardo T. Salas"  class="presidents">
            <h4>BS Computer Engineering</h4>
        </div>
        <div class="col-md-4">
             <img src="photos/civil.jpg" alt="Engr. Richard Salas" class="presidents">
             <h4>BS Civil Engineering</h4>
        </div>
        <div class="col-md-4">
            <img src="photos/mechanical.jpg" alt="Engr. Richard Kenneth Salas" class="presidents">
            <h4>BS Mechanical Engineering</h4>
        </div>
    </div>
</div>

<center class="form">
    <h1>Admission Form</h1>
</center>

<div align="center" class="admission_form">
    <form action="data_check.php" method="POST">
        <div class="adform">
            <label class="label_text" >First Name: </label>
            <input type="text" name="first_name" class="adm_in" required>
        </div>
        <div class="adform">
            <label class="label_text" >Last Name: </label>
            <input type="text" name="last_name" class="adm_in" required>
        </div>
        <div class="adform">
            <label class="label_text" >Email: </label>
            <input type="text" name="email" class="adm_in" required>
        </div>
        <div class="adform">
            <label class="label_text" >Phone: </label>
            <input type="text" name="number" class="adm_in" maxlength="11" required>
        </div>
        <div class="adform">
            <label class="label_text" >Remarks:</label>
            <textarea name="remarks" class="input_text" cols="30" rows="3"></textarea>
        </div>

        <div class="adform">
            <button type="submit" name="submit" class="btn">Submit</button>
        </div>
    </form>
</div>

<footer>
    <p class="footer_text">&copy; Cog-Elect 3 Pre-Final Project | Submitted By: Yosores & Tono</p>
</footer>

    <!--Bootstrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- external javascript-->
  
</body>
</html>