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
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    $specialization = $_POST['spec'];
    $deptname = $_POST['dept']; // Assuming this is the department name
    $file = $_FILES['image']['name'];
    $destination = "../image/".$file;
    $dst_db="image/".$file;
    move_uploaded_file($_FILES['image']['tmp_name'],$destination);
    
    // Check if the department already exists in tbldept
    $deptQuery = "SELECT dept_id FROM department WHERE department = '$deptname'";
    
    try {
        // Execute the department query
        $deptResult = mysqli_query($conn, $deptQuery);
        if ($deptResult && mysqli_num_rows($deptResult) > 0) {
            // If the department exists, fetch the department ID from the result
            $row = mysqli_fetch_assoc($deptResult);
            $deptid = $row['dept_id'];
        }else {
            // If the department doesn't exist, insert it into tbldept
            $insertDeptQuery = "INSERT INTO department (department) VALUES ('$deptname')";
            $insertDeptResult = mysqli_query($conn, $insertDeptQuery);
            
            if (!$insertDeptResult) {
                echo "Failed to insert department: " . mysqli_error($conn);
                exit; // Exit the script if insertion fails
            }

            // Retrieve the newly inserted department's ID
            $deptid = mysqli_insert_id($conn);
        }
    $query = "INSERT INTO teachers (tea_id, tea_name,tea_last,tea_email,tea_pass,specialization,tea_image,dept_id)
    VALUE (NULL, '$fname', '$lname' , '$email','$pass',
                    '$specialization','$dst_db,' ,'$deptid')";
                    
    $result = mysqli_query($conn, $query);
    if($result) {
        header("Location: teachers.php");
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
        <h3>Add Professors</h3>
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class = "mb-3">
                    <label for="fname" class="form-label">First Name: </label>
                    <input type="text" name="fname" required />
                </div>
                <div class = "mb-3">
                    <label for="lname" class="form-label">Last Name: </label>
                    <input type="text" name="lname" required/>
                </div>
                <div class = "mb-3">
                    <label for="email" class="form-label">Email: </label>
                    <input type="email" name="email" required/>
                </div>
                <div class = "mb-3">
                    <label for="pass" class="form-label">Password: </label>
                    <input type="password" name="pass" required/>
                </div>

                <div class = "mb-3">
                    <label for="spec" class="form-label">Specialization: </label>
                    <input type="text" name="spec" required/>
                </div>

                <div class = "mb-3">
                    <label for="dept" class="form-label">Department </label>
                    <input type="text" name="dept" required/>
                </div>

                <div class = "mb-3">
                    <label for="image" class="form-label">Upload Photo: </label>
                    <input type="file" name="image" required/>
                </div>
                <div class = "mb-3">
                  
                    <input type="submit" name="submit" value="Register Professor" class = "btn btn-danger" required/>
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