<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="animal_info";

	$conn=mysqli_connect($servername,$username,$password,$dbname);

	if($conn)
	{
		//echo "conn is ok";
	}
	else
	{
		echo "error";
	}
?>