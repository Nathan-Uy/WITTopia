<?php
SESSION_START();
include("dbconn.php");  //database connection

if(isset($_POST['submit'])){
    $code = $_POST['c_code'];
    $prog = $_POST['prog'];
   
    // Check if the program exists in the programs table
    $progQuery = "SELECT prog_id FROM programs WHERE prog_name = '$prog'";
    
    try {
        // Execute the program query
        $progResult = mysqli_query($conn, $progQuery);
        if ($progResult && mysqli_num_rows($progResult) > 0) {
            // If the department exists, fetch the department ID from the result
            $row = mysqli_fetch_assoc($progResult);
            $progid = $row['prog_id'];
        }else {
            // If the department doesn't exist, insert it into tbldept
            $insertProgQuery = "INSERT INTO programs (prog_name) VALUES ('$prog')";
            $insertProgResult = mysqli_query($conn, $insertProgQuery);
            
            if (!$insertProgResult) {
                echo "Failed to insert course: " . mysqli_error($conn);
                exit; // Exit the script if insertion fails
            }

            // Retrieve the newly inserted department's ID
            $progid = mysqli_insert_id($conn);
        }
    $query = "INSERT INTO courses (courseid, coursecode, prog_id)
    VALUES(NULL, '$code' ,'$progid')";
                    
    $result = mysqli_query($conn, $query);
    if($result) {
        header("Location: courses.php");
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
    <link rel="stylesheet" href="css/admin.css">
    <!-- font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Add Course</title>
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
        <?php include("./student_header.php"); ?>
    <!-- side bar -->
    <?php include ("teachersidebar.php"); ?>

    <div class="content">
        <center>
        <div class="stud_form">
        <h3>Add Courses</h3>
            <form action="#" method="POST">
                <div class = "mb-3">
                    <label for="c_code" class="form-label">Course Code :</label>
                    <input type="text" name="c_code" required />
                </div>

                <div class = "mb-3">
                    <label for="prog" class="form-label">Program: </label>
                    <input type="text" name="prog" required/>
                </div>

                <div class = "mb-3">
                  
                    <input type="submit" name="submit" value="Add Course" class = "btn btn-danger" required/>
                </div>
            </form>
        </div>
        </center>
    </div>
</body>
</html>



    <!--Bootstrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- external javascript-->
    
 
</body>
</html>