<?php
error_reporting(0);
SESSION_START();
include("dbconn.php");  //database connection
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}else if($_SESSION['u_type']=='student'){
    header("location: ../login.php");
}
//if user is trying to access student dashboard through url, it will redirect to login page
 if(isset($_POST['submit'])){
    $id = $_GET['teaid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $spec = $_POST['spec'];
    $dept =$_POST['dept'];
    $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);

    $file = $_FILES['image']['name'];
    $dst = "./image/" .$file;
    $dst_db = "image/" .$file;
    move_uploaded_file($_FILES['image']['tmp_name'], $dst);

    $query2 = "SELECT dept_id FROM department WHERE department = '$dept'";
    $result = mysqli_query($conn,$query2);
    $dept_id = mysqli_fetch_assoc($result)["dept_id"];

    $query1 = "UPDATE teachers SET tea_name = '$fname',tea_last = '$lname', tea_email = '$email', specialization = '$spec', tea_pass = '$pass',tea_image='$dst_db', dept_id = '$dept_id' WHERE tea_id = '$id' ";
   
    $result1 = mysqli_query($conn,$query1);
    
    if($result1){
        header("location:ADMIN/teachers.php");
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
    <title>Update Teacher</title>
    <style type="text/css">

        label{
            display: inline-block;
            text-align: right;
            width: 100px;
        }
        .stud_form{
            background-color: white;
            width: 600px;
            padding-top: 40px;
            padding-bottom: 50px;
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
          
        <div class="text-center mb-4">
            <h3>Update Teacher Data</h3>
        </div>
        <?php
            include("dbconn.php");
            $id = $_GET['teaid'];
            $query = "SELECT * FROM teachers
            INNER JOIN department ON teachers.dept_id = department.dept_id
             WHERE tea_id =  '$id' ";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);    
           ?>
            
            <form action="#" method="POST" enctype = multipart/form-data>
          
                <div class = "mb-3">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" name="fname" 
                   value = "<?php echo $row['tea_name']?>"required/>
                </div>

                <div class = "mb-3">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" name="lname"
                    value = "<?php echo $row['tea_last']?>" required/>
                </div>

                <div class = "mb-3">
                    <label for="ename" class="form-label">Email</label>
                    <input type="email" name="email"
                    value = "<?php echo $row['tea_email']?>" required/>
                </div>

                <div class = "mb-3">
                    <label for="spec" class="form-label">Specialization</label>
                    <input type="text" name="spec"
                    value = "<?php echo $row['specialization']?>"required/>
                </div>
                <div class = "mb-3">
                    <label for="dept" class="form-label">Department</label>
                    <input type="text" name="dept"
                    value = "<?php echo $row['department']?>"required/>
                </div>

                <div class = "mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" name="pass"
                    value = "<?php echo $row['tea_pass']?>" required/>
                </div>

                <div class = "mb-3">
                    <label for="dept" class="form-label">Image</label>
                    <input type="file" name="image"
                    value = "<?php echo $row['tea_image']?>"required/>
                </div>

                <div class="mb-3">
                    <input type="submit" name="submit" value="Update" class = "btn btn-danger" required/>
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