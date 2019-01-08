<?php

	include 'connect.php';

	$delId = $_GET['id'];

	$sql = "DELETE FROM task WHERE id = $delId";
	$result = mysqli_query($conn, $sql);

	if($result){
		echo 1;
	} else {
		echo 0;
	}