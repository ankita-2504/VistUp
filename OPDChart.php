<?php  
	include 'connection.php';
	$dataopd = array();
	for($i=1; $i<=12; $i++) {
    	$sql = "SELECT month(Booking_Date) As MonthNo, count(Booking_Id) as total FROM opd_patient_booking where month(Booking_Date)='".$i."' group by month(Booking_Date) ORDER BY month(Booking_Date) asc";
    	$result = $conn->query($sql);
	    $row=$result->fetch_assoc();
	        if($row['MonthNo']=="") {
	            $dataopd[] = "0";
	        } else {
	            $dataopd[] = $row['total'];
	        }
    }
?> 
