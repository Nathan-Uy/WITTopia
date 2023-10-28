<?php
SESSION_START();
include("dbconn.php");  //database connection
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}elseif($_SESSION['u_type'] == 'admin'){
    header("location:login.php");
}
//if user is trying to access student dashboard through url, it will redirect to login page
$query = "SELECT * FROM modules;";
$result = mysqli_query($conn,$query);

$videoIDs = array();
while ($row = mysqli_fetch_assoc($result)) {
    $videoIDs[] = $row['mod_id'];
}

// Create a loop to iterate over the IDs of the videos.
foreach ($videoIDs as $videoId) {
    // Get the video URL from the database.
    $query = "SELECT mod_url FROM modules WHERE mod_id = $videoId;";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    $videoURL = $row['mod_url'];

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
    <title>Student Dashboard</title>
</head>
<body>
    <!-- header file -->
        <?php include("./student_header.php"); ?>
    

    <div class="content">
        <h1>WELCOME STUDENT</h1>
    </div>
<section>
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-12">
                <iframe src="<?php echo $videoURL?>" frameborder="0" allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen width="560" height="315"></iframe>
            </div>

            <div class="col-lg-12">
                <iframe src="<?php echo $videoURL?>" frameborder="0" allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen width="560" height="315"></iframe>
            </div>

            <div class="col-lg-12">
                <iframe src="<?php echo $videoURL?>" frameborder="0" allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen width="560" height="315"></iframe>
            </div>

            <div class="col-lg-12">
                <iframe src="<?php echo $videoURL?>" frameborder="0" allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen width="560" height="315"></iframe>
            </div>
        </div>
    </div>
</section>

</body>
</html>



    <!--Bootstrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- external javascript-->
    
 
</body>
</html>