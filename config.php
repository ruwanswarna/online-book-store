<?php

$con = new mysqli("localhost","root","","project");
	if($con->connect_error){
		die("Connection Failed!".$con->connect_error);
	}
	
?>