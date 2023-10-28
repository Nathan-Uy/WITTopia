<?php 
    session_start();

    include("dbconn.php");

    if(isset($_GET['id'])){ // Check if 'uid' is set in the $_GET array
        
        $id = $_GET['id'];
        $query = "DELETE FROM users WHERE userid = '".$id."'";
        $result = mysqli_query($conn, $query);

        if($result){
           $_SESSION['message'] = 'You just deleted a WITTopian!';
            header("location:ADMIN/students.php");
        }else {
            echo "Error: " . mysqli_error($conn);
    }
}
?>
