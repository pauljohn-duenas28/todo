<?php

	include 'connect.php';

	$newTask = $_POST['newTask'];

	$sql = "INSERT INTO task(name) VALUES ('$newTask')";
	$result = mysqli_query($conn, $sql);

	if($result === TRUE){
		echo 1;
	} else {
		echo 0;
	}