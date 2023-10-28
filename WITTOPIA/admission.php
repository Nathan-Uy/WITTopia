<?php
SESSION_START();
include("dbconn.php");  //database connection
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}else if($_SESSION['u_type']=='student'){
    header("location: ../login.php");
}
//if user is trying to access admin dashboard through url, it will redirect to login page
    
//fetch data from database to display in table
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM admission WHERE ad_id = '$id'";
    $result1 = mysqli_query($conn,$query);

    if($result1){
        header("location: admission.php");
        
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
    <link rel="stylesheet" href="css/admin.css">
    <!-- font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Dashboard</title>
</head>
<body>
    <!-- header file -->
        <?php include("student_header.php"); ?>

    <!-- sidebar file -->
        <?php include("admsidebar.php"); ?>
   

    <div class="content">
        <center>
        <h1>Admission List</h1>
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
                        <th style="font-size:15px; padding: 30px;">Remarks</th>
                        <td style="font-size:15px; padding: 30px;">Action</td>
                    </tr>
                <tbody>
                    <?php 
                try{
                    $query = "SELECT * FROM admission;";
    $result = mysqli_query($conn,$query);
      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_assoc($result)) { 
?>  
            <tr style="text-align:center;">
                <th ><?php echo $row['ad_id']?></th>
                <th ><?php echo $row['ad_name']?></th>
                <th ><?php echo $row['ad_last']?></th>
                <th ><?php echo $row['ad_email']?></th>
                <th ><?php echo $row['ad_phone']?></th>
                <th ><?php echo $row['ad_remarks']?></th>
                <td>
                    <a onClick="return confirm('Delete Admission?');" href="modules.php? mid=<?php echo $row["ad_id"] ?>"href="admission.php? id=<?= $row["ad_id"]; ?>" class="btn btn-danger"><i class="fa-solid fa-trash fs-5"></i></a>
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