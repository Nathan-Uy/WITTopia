<?php 
session_start();
include "dbconn.php";

if(isset($_POST['submit'])){
     $adname = $_POST['first_name'];
     $adlname = $_POST['last_name'];
     $ademail = $_POST['email'];
     $adphone = $_POST['number'];
     $admes = $_POST['remarks'];

    $query="INSERT INTO admission (ad_id,ad_name,ad_last,ad_email,ad_phone,ad_remarks)
        VALUES (NULL,'$adname','$adlname','$ademail','$adphone','$admes')";

    $result = mysqli_query($conn,$query);

    if($result){
        $_SESSION['message'] = "Application Succesful";
        header("location:index.php");
    }else{
        echo "Application Error";
    }

}
?>