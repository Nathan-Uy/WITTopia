<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "nathaniel";
    $dbname = "wittopia";
    $portnum = "3306"; //password of your database



    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname, $portnum);

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";

    ?>