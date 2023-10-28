<?php

SESSION_START();
include("dbconn.php");  //database connection

//if user is trying to access student dashboard through url, it will redirect to login page
 if(isset($_POST['submit'])){
    $id = $_GET['cid'];
    $code = $_POST['c_code'];
    $prog = $_POST['prog'];
 
    $query2 = "SELECT prog_id FROM programs WHERE prog_name = '$prog'";
    $result = mysqli_query($conn,$query2);
    $prog_id = mysqli_fetch_assoc($result)["prog_id"];
    
    $query1 = "UPDATE courses SET coursecode = '$code', prog_id = '$prog_id' WHERE courseid = $id";
    
   
    

    $result1 = mysqli_query($conn,$query1);
    
    
    if($result1) {
        header("location:courses.php");
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
    <title>Update Program</title>
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
    <?php include("student_header.php"); ?>
    <!-- sidebar -->
        <?php include("admsidebar.php"); ?>

        <div class="content">
        <center>
        <div class="stud_form">
        <h3>Edit Program</h3>
        <?php
            include("dbconn.php");
            $id = $_GET['cid'];
            $query = "SELECT * FROM courses
             INNER JOIN programs ON courses.prog_id = programs.prog_id
             WHERE courseid =  '$id' ";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);    
           ?>
            <form action="#" method="POST">
                <div class = "mb-3">
                    <label for="fname" class="form-label">Program :</label>
                    <input type="text" name="c_code" required value = "<?php echo $row['coursecode']?>"/>
                </div>

                <div class = "mb-3">
                    <label for="dept" class="form-label">Program: </label>
                    <input type="text" name="prog" required value = "<?php echo $row['prog_name']?>"/>
                </div>

                <div class = "mb-3">
                  
                    <input type="submit" name="submit" value="Update Course" class = "btn btn-danger" required/>
                </div>
            </form>
        </div>
        </center>
    </div>
</body>
</html>