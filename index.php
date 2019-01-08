<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>To-Do's</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>



</head>

<body>

	<div class="row mt-5">
		<div class="col-md-6 offset-3">
			<input class="form-control" type="text" name="newTask" id="addText"> 
			<button class="btn btn-primary mt-3" type="submit" id="addBtn">Add Task</button>
			<h1>Task List</h1>

			<table>
				<tbody id="resultTable"></tbody>
			</table>
		</div>
	</div>

	



	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	
	<script type="text/javascript">
		

		//ADD FUNCTION
		$(document).on('click','#addBtn', function(){

			const addedTask = $('#addText').val();

			$.post({
				url: 'app/controllers/add_task.php',
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
				url: 'app/controllers/viewtask.php',
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
				url: 'app/controllers/delete_task.php',
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
