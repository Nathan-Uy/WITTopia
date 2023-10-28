<?php
SESSION_START();
include("../dbconn.php");  //database connection
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}else if($_SESSION['u_type']=='student'){
    header("location: ../login.php");
}
//if user is trying to access admin dashboard through url, it will redirect to login page
if(isset($_POST['submit'])){
    $prog = $_POST['p_name'];
    $dept= $_POST['dept'];
   
    // Check if the department already exists in tbldept
    $deptQuery = "SELECT dept_id FROM department WHERE department = '$dept'";
    
    try {
        // Execute the department query
        $deptResult = mysqli_query($conn, $deptQuery);
        if ($deptResult && mysqli_num_rows($deptResult) > 0) {
            // If the department exists, fetch the department ID from the result
            $row = mysqli_fetch_assoc($deptResult);
            $deptid = $row['dept_id'];
        }else {
            // If the department doesn't exist, insert it into tbldept
            $insertDeptQuery = "INSERT INTO department (department) VALUES ('$dept')";
            $insertDeptResult = mysqli_query($conn, $insertDeptQuery);
            
            if (!$insertDeptResult) {
                echo "Failed to insert department: " . mysqli_error($conn);
                exit; // Exit the script if insertion fails
            }

            // Retrieve the newly inserted department's ID
            $deptid = mysqli_insert_id($conn);
        }
    $query = "INSERT INTO programs (prog_id, prog_name, dept_id)
    VALUE (NULL, '$prog' ,'$deptid')";
                    
    $result = mysqli_query($conn, $query);
    if($result) {
        header("Location: programs.php");
    } else {
        echo "Failed" . mysqli_error($conn);
    }
}catch(Exception $e){

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
    <title>Teachers</title>
    <style type="text/css">
        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding: 2px;
            
        }
        .stud_form{
            background-color: white;
            width: 400px;
            padding-top: 20px;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-- header file -->
        <?php include("admin_header.php"); ?>
    <!-- sidebar -->
        <?php include("admin_sidebar.php"); ?>

        <div class="content">
        <center>
        <div class="stud_form">
        <h3>Add Program</h3>
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class = "mb-3">
                    <label for="fname" class="form-label">Program :</label>
                    <input type="text" name="p_name" required />
                </div>

                <div class = "mb-3">
                    <label for="dept" class="form-label">Department: </label>
                    <input type="text" name="dept" required/>
                </div>

                <div class = "mb-3">
                  
                    <input type="submit" name="submit" value="Add Program" class = "btn btn-danger" required/>
                </div>
            </form>
        </div>
        </center>
    </div>
</body>
</html>