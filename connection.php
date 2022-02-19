<?php 

$host = "localhost";
$username = "root";
$password = "";
$DBname = "exchangedb";

$conn = mysqli_connect($host, $username, $password, $DBname);

if( $conn == true) {
	 //echo "successful";
}else{
	echo mysqli_error($conn);
}

 ?>

 