<?php
error_reporting(0);
session_start();
include "dbconn.php";
if(isset($_POST['username'])){
    $username = $_POST['username'];
            
    //for password
    $userpass = $_POST['password'];

    $query ="SELECT * FROM users WHERE u_email= '".$username."' AND u_pass = '".$userpass."' ";

    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);

    if($row['u_type'] == "student"){
        
        $_SESSION['username']=$username;
        $_SESSION['u_type']="student";
        header("location: ./studenthome.php");
    }
    else if($row['u_type'] == "admin"){
        $_SESSION['username']=$username;
        $_SESSION['u_type']="admin";
        header("location:ADMIN/admin_dashboard.php");
    }else{
        
        $message = "Username and Password do not match!";
        $_SESSION ['loginMessage'] = $message;
        header("location:login.php");
}
}
?>