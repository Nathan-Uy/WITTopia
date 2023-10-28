<?php

session_start();
include "dbconn.php";
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    $query = "SELECT * FROM teachers WHERE tea_email= '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
  
    if ($row) {
      $hashedPassword = $row['tea_pass'];
  
      if (password_verify($password, $hashedPassword)) {
        // The password is correct.
        header("location:teacherdashboard.php");
      } else {
        // The password is incorrect.
        $message = "Email and Password do not match!";
        $_SESSION ['loginMessage'] = $message;
        header("location:teacherlogin.php");
      }
    } else {
      // The user does not exist.
      $message = "Email and Password do not match!";
      $_SESSION ['loginMessage'] = $message;
      header("location:teacherlogin.php");
    }
  }
?>