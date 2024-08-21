<?php
$con = new mysqli("localhost","root","","project");
	if($con->connect_error){
		die("Connection Failed!".$con->connect_error);
	}
	if(mysqli_connect_errno()){
		printf("Connect failed:%s\n",mysqli_connect_error());
		exit();
	}


?>