<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>To-Do's</title>
</head>

<body>

	<input type="text" name="newTask" id="addText"> <button type="submit" id="addBtn">Add Task</button>
	<h1>Task List</h1>

	<table>
		<tbody id="resultTable"></tbody>
	</table>



	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	
	<script type="text/javascript">
		

		//ADD FUNCTION
		$(document).on('click','#addBtn', function(){

			const addedTask = $('#addText').val();

			$.post({
				url: '../controllers/add_task.php',
				data: {
					newTask : addedTask
				},
				success: function(result){
					if(result == 1){
						$('#addText').val("");
						view();
					} else {
						alert("Failed");
					}
				}
			});
		});

		// VIEW FUNCTION
		function view(){
			$.post({
				url: '../controllers/viewtask.php',
				success: function(result){
					$('#resultTable').html(result);
				}
			});
		}

		view();

		//DELETE FUNCTION
		$(document).on('click', '.delBtn', function(){
			const delBtnId = $(this).attr('id');

			$.get({
				url: '../controllers/delete_task.php',
				data: {
					id : delBtnId
				},
				success: function(result){
					view();
				}
			});

		});

	</script>
</body>
</html>
