<?php
error_reporting(0);
SESSION_START();
include("../dbconn.php");  //database connection
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}else if($_SESSION['u_type']=='student'){
    header("location: ../login.php");
}
//if user is trying to access admin dashboard through url, it will redirect to login page

$query = "SELECT * FROM users WHERE u_type = 'student';";
$result = mysqli_query($conn, $query);


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
        <center>
        <h1>Student List</h1>
        <?php
            if($_SESSION['message']){
                echo $_SESSION['message'];
            }
            unset($_SESSION['message']);
        ?>
        <div>
        <a href="../add_student.php""><button class="btn btn-warning">Add Student</button></a>
        </div>
        
        
        <br>
        <br>
        <br>
            <table class="table table-striped"">
                <thead style="text-align:center;">
                    <tr style="text-align:center;">
                        <th style="font-size:15px; padding: 30px;">ID</th>
                        <th style="font-size:15px; padding: 30px;">First Name</th>
                        <th style="font-size:15px; padding: 30px;">Last Name</th>
                        <th style="font-size:15px; padding: 30px;">Email</th>
                        <th style="font-size:15px; padding: 30px;">Number</th>
                        <th style="font-size:15px; padding: 30px;">Action</th>
                    </tr>
                <tbody>
                    <?php 
                try{
      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_assoc($result)) { 
?>  
            <tr style="text-align:center;">
                <th ><?php echo $row['userid']?></th>
                <th ><?php echo $row['u_name']?></th>
                <th ><?php echo $row['u_last']?></th>
                <th ><?php echo $row['u_email']?></th>
                <th ><?php echo $row['u_phone']?></th>
                <td>
                    <a href="../editstudent.php?id=<?php echo $row["userid"]; ?>" class="btn link-dark"><i class="fa-solid fa-edit fs-5"></i></a>
                    <a onClick="return confirm('Delete Student?');" href="../delete.php?id=<?php echo $row["userid"]; ?>" class="btn link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                </td>
            </tr>
        <?php
    } 
  }catch(Exception $e){
    echo "Error";
  }
    ?>
                </tbody>

                </thead>
            </table>
            </center>
    </div>
</body>
</html>



    <!--Bootstrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- external javascript-->
   
</body>
</html>