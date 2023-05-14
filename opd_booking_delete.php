<?php 

// Database connection
include 'connection.php';
$id=$_POST['id'];
//$name=$_POST['name'];
$qry=mysqli_query($conn,"DELETE FROM opd_patient_booking where Booking_Id='".$id."'");
?>