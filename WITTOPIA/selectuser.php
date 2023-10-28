<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
    <title>Home</title>

    <style>
    .container {
        margin-top: 200px;
        width: 50%;
    }
    .navbar {
        padding: 10px 20px;
    }

    .card {
        width: 300px;
        height: 200px;
        background-color: #fb6c3c;
        
    }

    a:hover{
        text-decoration: none;
    }
    .card-header {
          font-size: 24px;
          color: black;
    }
    .card-header {
          font-size: 24px;
          color: black;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }
    .card-body i {
        height: 100%;
        width: 100%;
        color: black;
    }
   


    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="logo\logo2.png" alt="Logo" style="width: 100%; height: 50px;"></a>    
    </div>
</nav>
<center>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <a href="login.php" class="card">
          <div class="card-header">
            Admin
          </div>
          <div class="card-body">
            <i class="fas fa-user fa-3x"></i>
          
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="login.php" class="card">
          <div class="card-header">
            Student
          </div>
          <div class="card-body">
            <i class="fas fa-user-graduate fa-3x"></i>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="teacherlogin.php" class="card">
          <div class="card-header">
            Teacher
          </div>
          <div class="card-body">
            <i class="fas fa-chalkboard-teacher fa-3x"></i>
          </div>
        </a>
      </div>
    </div>
  </div>
</center>

</body>
</html>