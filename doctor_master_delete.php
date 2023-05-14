<?php 

// Database connection
include 'connection.php';
$id=$_POST['id'];
//$name=$_POST['name'];
$qry=mysqli_query($conn,"DELETE FROM doctor_master where Doctor_Id='".$id."'");
$qry2=mysqli_query($conn,"DELETE FROM opd_doctor_appointment_master where Doctor_Id='".$id."'");
$qry2=mysqli_query($conn,"DELETE FROM doctor_fees_master where Doctor_Id='".$id."'");

?>