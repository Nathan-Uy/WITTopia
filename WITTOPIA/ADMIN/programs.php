<?php
SESSION_START();
include("../dbconn.php");  //database connection
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}else if($_SESSION['u_type']=='student'){
    header("location: ../login.php");
}
//if user is trying to access admin dashboard through url, it will redirect to login page
if(isset($_GET['proid'])){ // Check if 'uid' is set in the $_GET array
        
    $id = $_GET['proid'];
    $query = "DELETE FROM programs WHERE prog_id = '".$id."'";
    $result = mysqli_query($conn, $query);

    if($result){
        header("location:programs.php");
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
    <title>Programs</title>
</head>
<body>
    <!-- header file -->
        <?php include("admin_header.php"); ?>
    <!-- sidebar -->
        <?php include("admin_sidebar.php"); ?>

    <div class="content">
        <center>
        <h1>Programs</h1>
        <div>
        <a href="addprogram.php"><button class="btn btn-warning">Add Program</button></a>
        </div>
        
        <br>
            <table class="table table-striped"">
                <thead style="text-align:center;">
                    <tr style="text-align:center;">
                        <th style="font-size:20px; padding: 20px;">ID</th>
                        <th style="font-size:20px; padding: 20px;">Program</th>
                        <th style="font-size:20px; padding: 20px;">Department:</th>
                        <th style="font-size:20px; padding: 20px;">Action:</th>
                    </tr>
                <tbody  style="text-align:center;">
                    <?php 
                try{
                    $query = "SELECT *
                    FROM programs
                    INNER JOIN department ON programs.dept_id = department.dept_id;";
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_assoc($result)) { 
                    ?>  
            <tr>
                <th><?php echo $row['prog_id']?></th>
                <th><?php echo $row['prog_name']; ?></th>
                <th ><?php echo $row['department']?></th>
                <td>
                    <a href="../editprogram.php? proid=<?php echo $row["prog_id"]; ?>" class="btn link-dark"><i class="fa-solid fa-edit fs-5"></i></a>
                    <a onClick="return confirm('Dissolve Program?');" href="programs.php? proid=<?php echo $row["prog_id"]; ?>" class="btn link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
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