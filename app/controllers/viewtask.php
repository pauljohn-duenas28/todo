<?php

	include 'connect.php';

	$sql = "SELECT * FROM task";
	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)){

		echo "<tr>
			<td>".$row['name']."</td>
			<td><button class=delBtn btn btn-danger id=".$row['id'].">Remove</button></td>
		</tr>";


	}