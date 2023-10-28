<?php
session_start();
session_destroy();
include "dbconn.php";
header("location:index.php");
?>