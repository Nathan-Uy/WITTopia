<?php
SESSION_START();
include("../dbconn.php");  //database connection
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}else if($_SESSION['u_type']=='student'){
    header("location: ../login.php");
}
//if user is trying to access admin dashboard through url, it will redirect to login page
$query1 = "SELECT COUNT(*) AS total_ad FROM admission;";
$result1 = mysqli_query($conn, $query1);
if( $row1 = mysqli_fetch_assoc($result1)){
    $totalcon = $row1['total_ad'];
} else{
    echo 'Error';
}

$query2 = "SELECT COUNT(*) AS total_prog FROM programs;";
$result2 = mysqli_query($conn, $query2);
if( $row2 = mysqli_fetch_assoc($result2)){
    $totalplist = $row2['total_prog'];
} else{
    echo 'Error';
}

$query3 = "SELECT COUNT(*) AS total_teach FROM teachers;";
$result3 = mysqli_query($conn, $query3);
if( $row3 = mysqli_fetch_assoc($result3)){
    $totallikes = $row3['total_teach'];
} else{
    echo 'Error';
}

$query4 = "SELECT COUNT(*) AS total_dep FROM department;";
$result4 = mysqli_query($conn, $query4);
if( $row4 = mysqli_fetch_assoc($result4)){
    $totalcom = $row4['total_dep'];
} else{
    echo 'Error';
}
$query5 = "SELECT COUNT(*) AS total_stu FROM users WHERE u_type = 'student';";
$result5 = mysqli_query($conn, $query5);
if( $row5 = mysqli_fetch_assoc($result5)){
    $totalstu = $row5['total_stu'];
} else{
    echo 'Error';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- External CSS -->
    <link rel="stylesheet" href="../css/admin.css">
    <!-- font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Dashboard</title>
</head>
<body>
    <!-- header file -->
        <?php include("admin_header.php"); ?>
    <!-- sidebar -->
        <?php include("admin_sidebar.php"); ?>

    <div class="content">
        <h1>Admin Dashboard</h1>

        <!-- Dashboard section beginning-->
<section class="dashboard">


    <div class="box-container">
        <div class="box">
           
              <h2 id="date"></h2>
            </div>

            <div class="box">
            <h3><?php echo $row1["total_ad"]; ?></h3>
                <p>Admissions</p>
                
            </div>

            <div class="box">
                <h3><?php echo $row2["total_prog"]; ?></h3>
                    <p>Programs</p>
            </div>

            <div class="box">
                <h3><?php echo $row3["total_teach"]; ?></h3>
                    <p>Teachers</p>
            </div>

            <div class="box">
                <h3><?php echo $row4["total_dep"]; ?></h3>
                    <p>Departments</p>
                  
            </div>

            <div class="box">
                <h3><?php echo $row5["total_stu"]; ?></h3>
                    <p>Students</p>
            </div>

    </div>

</section>
    </div>

</body>
</html>



    <!--Bootstrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- external javascript-->
    <script>
        // JavaScript code to display the current date
        var today = new Date();
        var dateElement = document.getElementById("date");
        dateElement.innerHTML = "Today's Date: " + today.toDateString();
    </script>
 
</body>
</html>