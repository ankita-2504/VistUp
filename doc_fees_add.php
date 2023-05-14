<?php 



// Database connection

include 'connection.php';



// Insert data Query

$sql = "INSERT INTO doctor_fees_master 

VALUES ( '".$_POST['docid']."' , '".$_POST['dept']."', '".$_POST['fees_type']."' , '".$_POST['fees']."','".$_POST['referral']."')";



if ($conn->query($sql) === TRUE) 

{

  echo 1;

} 

else

{

	echo 0;

}

?>