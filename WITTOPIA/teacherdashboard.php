<?php
SESSION_START();
include("dbconn.php");  //database connection

$query1 = "SELECT COUNT(*) AS total_stu FROM users WHERE u_type = 'student';";
$result1 = mysqli_query($conn, $query1);
if( $row1 = mysqli_fetch_assoc($result1)){
    $totalcon = $row1['total_stu'];
} else{
    echo 'Error';
}

$query2 = "SELECT COUNT(*) AS total_mod FROM modules;";
$result2 = mysqli_query($conn, $query2);
if( $row2 = mysqli_fetch_assoc($result2)){
    $totalplist = $row2['total_mod'];
} else{
    echo 'Error';
}

$query3 = "SELECT COUNT(*) AS total_cou FROM courses;";
$result3 = mysqli_query($conn, $query3);
if( $row3 = mysqli_fetch_assoc($result3)){
    $totallikes = $row3['total_cou'];
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
    <link rel="stylesheet" href="css/admin.css">
    <!-- font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Teacher Dashboard</title>
</head>
<body>
    <!-- header file -->
        <?php include("./student_header.php"); ?>
    <aside>
        <ul>
            <li>
                <a href="teacherdashboard.php">Home</a>
            </li>

            <li>
                <a href="">Profile</a>
            </li>

            <li>
                <a href="cal">Calendar</a>
            </li>

            <li>
                <a href="modules.php">Modules</a>
            </li>

            <li>
                <a href="courses.php">Courses</a>
            </li>
        </ul>
    </aside>

    <div class="content">
        <h1>Teacher Dashboard</h1>

        <!-- Dashboard section beginning-->
<section class="dashboard">


    <div class="box-container">
        <div class="box">
           
              <h2 id="date"></h2>
            </div>

            <div class="box">
            <h3><?php echo $row1["total_stu"]; ?></h3>
                <p>Students</p>
                
            </div>

            <div class="box">
                <h3><?php echo $row2["total_mod"]; ?></h3>
                    <p>Modules</p>
            </div>

            <div class="box">
                <h3><?php echo $row3["total_cou"]; ?></h3>
                    <p>Courses</p>
            </div>


    </div>

</section>
    </div>

    <script>
        // JavaScript code to display the current date
        var today = new Date();
        var dateElement = document.getElementById("date");
        dateElement.innerHTML = "Today's Date: " + today.toDateString();
    </script>
</body>
</html>



    <!--Bootstrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- external javascript-->
    
 
</body>
</html>