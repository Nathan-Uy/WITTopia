<?php
include ("dbconn.php");
 
if(isset($_POST['submit'])){
    $link = $_POST['link'];
    $title = $_POST['title'];

    $query = "INSERT INTO  modules (mod_id,mod_title,mod_url)
    VALUES(NULL,'$title','$link')";

    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Module Added Successfully!');</script>";
        header("location: modules.php");
    }else{
        echo 'Error:' .mysqli_error($conn);
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
    <title>Teachers</title>
    <style type="text/css">
        label{
            display: inline-block;
            text-align: right;
            width: 200px;
            padding: 2px;
            
        }
        .stud_form{
            background-color: white;
            width: 500px;
            padding-top: 20px;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-- header file -->
        <?php include("student_header.php"); ?>
    <!-- sidebar -->
        <?php include("teachersidebar.php"); ?>

        <div class="content">
        <center>
        <div class="stud_form">
        <h3>Add Modules</h3>
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class = "mb-3">
                    <label for="fname" class="form-label">Link:</label>
                    <input type="text" name="link" placeholder="Enter a YouTube link">
                </div>
                <div class = "mb-3">
                    <label for="fname" class="form-label">Title:</label>
                    <input type="text" name="title" required />
                </div>
                <div class = "mb-3">
                    <input type="submit" name="submit" value="Add Module" class = "btn btn-danger" required/>
                </div>
            </form>
        </div>
        </center>
    </div>
</body>
</html>