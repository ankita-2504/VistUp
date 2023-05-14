<?php
session_start();
error_reporting(0);

$conn = new mysqli('localhost', 'root', '', 'visitup');
if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}

?>