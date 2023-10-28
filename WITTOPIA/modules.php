<?php
SESSION_START();
include("dbconn.php");  //database connection

//if user is trying to access student dashboard through url, it will redirect to login page

if(isset($_GET['mid'])){ // Check if 'uid' is set in the $_GET array
        
    $id = $_GET['mid'];
    $query = "DELETE FROM modules WHERE mod_id = '".$id."'";
    $result = mysqli_query($conn, $query);

    if($result){
        header("location:modules.php");
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
    <link rel="stylesheet" href="css/admin.css">
    <!-- font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Courses</title>
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
                <a href="">Calendar</a>
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
        <center>
      <h1>Modules</h1>
        <div>
        <a href="addmodules.php""><button class="btn btn-warning">Add Module</button></a>
        </div>
        
        <br>
            <table class="table table-striped">
                <thead style="text-align:center;">
                    <tr style="text-align:center;">
                        <th style="font-size:15px; padding: 15px;">Module ID</th>
                        <th style="font-size:15px; padding: 15px;">Module Title</th>
                        <th style="font-size:15px; padding: 15px;">Url</th>
                        <th style="font-size:15px; padding: 15px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
               try{
                    $query = "SELECT * 
                    FROM modules;";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) { 
                    ?>  
            <tr style="text-align:center;">
                <th><?php echo $row['mod_id']?></th>
                <th><?php echo $row['mod_title']?></th>
                <th><?php echo $row['mod_url']?></th>

                <td>
                    <a class="btn link-dark" href="editmodule.php? mid=<?php echo $row["mod_id"] ?>"><i class="fa-solid fa-edit fs-5"></i></a>
                    <a class="btn link-dark" onClick="return confirm('Delete Module?');" href="modules.php? mid=<?php echo $row["mod_id"] ?>"><i class="fa-solid fa-trash fs-5"></i></a>
                </td>
            </tr>
        <?php
        
    } 
  }catch(Exception $e){
    echo "Error";
  }
    ?>
                </tbody>
            </table>
        </center>
</body>
</html>



    <!--Bootstrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- external javascript-->
    
 
</body>
</html>