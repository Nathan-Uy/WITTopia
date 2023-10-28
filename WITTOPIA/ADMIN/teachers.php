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

if(isset($_GET['teaid'])){ // Check if 'uid' is set in the $_GET array
        
    $id = $_GET['teaid'];
    $query = "DELETE FROM teachers WHERE tea_id = '".$id."'";
    $result = mysqli_query($conn, $query);

    if($result){
        header("location:teachers.php");
    }else {
        echo "Error: " . mysqli_error($conn);
}
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
        <center>
      <h1>Teachers</h1>
        <div>
        <a href="addteacher.php""><button class="btn btn-warning">Add Teacher</button></a>
        </div>
        
        <br>
            <table class="table table-striped">
                <thead style="text-align:center;">
                    <tr style="text-align:center;">
                        <th style="font-size:15px; padding: 15px;">ID</th>
                        <th style="font-size:15px; padding: 15px;">Photo</th>
                        <th style="font-size:15px; padding: 15px;">First Name</th>
                        <th style="font-size:15px; padding: 15px;">Last Name</th>
                        <th style="font-size:15px; padding: 15px;">Email: </th>
                        <th style="font-size:15px; padding: 15px;">Department:</th>
                        <th style="font-size:15px; padding: 15px;">Action:</th>
                    </tr>
                <tbody>
                    <?php 
                try{
                    $query = "SELECT *
                    FROM teachers
                    INNER JOIN department ON teachers.dept_id = department.dept_id;";
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_assoc($result)) { 
                    ?>  
            <tr style="text-align:center;">
                <th ><?php echo $row['tea_id']?></th>
                <th ><img src="<?php echo $row['tea_image'];?>"></th>
                <th ><?php echo $row['tea_name']?></th>
                <th ><?php echo $row['tea_last']?></th>
                <th ><?php echo $row['tea_email']?></th>
                <th ><?php echo $row['department']?></th>
                <td>
                    <a href="../editteacher.php? teaid=<?php echo $row["tea_id"]; ?>" class="btn link-dark"><i class="fa-solid fa-edit fs-5"></i></a>
                    <a onClick="return confirm('Delete Teacher?');" href="teachers.php? teaid=<?php echo $row["tea_id"]; ?>" class="btn link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
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