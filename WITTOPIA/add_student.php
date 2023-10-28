<?php
SESSION_START();
include("dbconn.php");  //database connection
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
    $phone = $_POST['phone'];
    $utype = "student";
    $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
   
    $check="SELECT * FROM users WHERE u_name = '$fname'";

    $check_user=mysqli_query($conn,$check);

    $row_count=mysqli_num_rows($check_user);
    if($row_count==1){
        echo "<script type='text/javascript'>alert('Email already taken!')</script>";
    }else{
        
   

    $query = "INSERT INTO users (u_name, u_last, u_phone, u_email, u_type, u_pass)
    VALUES('$fname','$lname','$email','$phone','$utype','$pass')";

    $result = mysqli_query($conn,$query);

    if($result){
        echo "<script type='text/javascript'>alert('You added a new Wittopian!')</script>";
        header("location: ADMIN/students.php");
    }else{
        echo("Error description: " . mysqli_error($con));
    }
}
}
//add data from database to display in table
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
   
    <style type="text/css">
        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .stud_form{
            background-color: white;
            width: 400px;
            padding-top: 40px;
            padding-bottom: 70px;
        }
    </style>

   
    <title>Students</title>
</head>
<body>
    <!-- header file -->
        <?php include("student_header.php"); ?>

    <!-- sidebar file -->
        <?php include("admsidebar.php"); ?>
   

    <div class="content">
        <center>
        <div class="stud_form">
        <h3>Add a WITTopian!</h3>
            <form action="#" method="POST">
                <div class = "mb-3">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" name="fname" required />
                </div>
                <div class = "mb-3">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" name="lname" required/>
                </div>
                <div class = "mb-3">
                    <label for="ename" class="form-label">Email</label>
                    <input type="email" name="email" required/>
                </div>
                <div class = "mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" required/>
                </div>

                <div class = "mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" name="pass" required/>
                </div>
                <divdiv class = "mb-3">
                  
                    <input type="submit" name="submit" value="Add Student" class = "btn btn-danger" required/>
                </divdiv>
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