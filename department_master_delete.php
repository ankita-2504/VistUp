<?php 

// Database connection
include 'connection.php';
$id=$_POST['id'];
//$name=$_POST['name'];
$qry=mysqli_query($conn,"DELETE FROM department_master where Department_Id='".$id."'");
?>