<?php
	require_once 'db.php';
	require_once 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Todo List</title>
</head>
<body>
<h1>My TodoList</h1>
<form action="?" method="POST">
	<?php if(isset($_GET['id_update']) && !empty($_GET['id_update'])){
		$row = getTodoById($dbh, $_GET['id_update']);
		echo '<input type="hidden" name="id" value="'.$row['id'].'">';
	}?>
	<input name="message" 
		<?php if(isset($row)){ echo ' value="'.$row['message'].'" ';} ?>
	type="text">
	<input name="check" 
		<?php if(isset($row) && $row['check'] == 1){ echo ' checked=checked ';} ?>
	value=1 type="checkbox">
	<input type="submit">
</form>
<?php
	if(isset($_POST) && !empty($_POST)){
		$check = false;
		if(isset($_POST['check'])){
			$check = true;
		}
		if(isset($_POST['id'])){
			updateTodoById($dbh, $_POST['id'], $_POST['message'], $check);
		}else {
			insertTodo($dbh, $_POST['message'], $check);
		}
	}
	if(isset($_GET) && !empty($_GET)){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			deleteTodoById($dbh, $_GET['id']);
		}
	}
?>
<?php  $rows = getTodos($dbh); ?>
<table>
	<thead>
		<th>#</th>
		<th>Message</th>
		<th>Check</th>
		<th>Actions</th>
	</thead>
	<tbody>
		<?php
			foreach ($rows as $key => $value) {
				echo "<tr>";
				echo "<td>" . $value['id'] . "</td>"; 
				echo "<td>" . $value['message'] . "</td>";
				echo "<td>" . $value['check'] . "</td>";
				echo "<td><a href='?id_update=" .$value['id'] . "'>Modifier</a></td>";
				echo "<td><a href='?id=" .$value['id'] . "'>Delete</a></td>";
				echo "</tr>";
			}
		?>
	</tbody>
</table>
</body>
</html>