<?php

function getTodos($dbh){
	$sql = 'SELECT * FROM  `todo`.`table_todo`;';
	$sth = $dbh->prepare($sql);
	$sth->execute();
	$todos = $sth->fetchAll(PDO::FETCH_ASSOC);
	return $todos;
}

function getTodoById($dbh, $id){
	$sql = 'SELECT * FROM  `todo`.`table_todo`
			WHERE  `id` = :id;';
	$sth = $dbh->prepare($sql);
	$sth->execute(array(':id' => $id));
	//$sth->bindParam(':id', $id);
	//$sth->execute();
	$todo = $sth->fetch(PDO::FETCH_ASSOC);
	return $todo;
}

function insertTodo($dbh, $message, $check){
	$sql = 'INSERT INTO `todo`.`table_todo` 
				(`id`, `message`, `check`) 
			VALUES (NULL, :message, :check);';
	$sth = $dbh->prepare($sql);
	$sth->execute(array(
					':message' => $message,
					':check' => $check
				));
	//$sth->bindParam(':message', $message);
	//$sth->bindParam(':check', $check);
	//$sth->execute();
	$lastInsertId = $dbh->lastInsertId();
	return $lastInsertId;
}

function deleteTodoById($dbh, $id){
	$sql = 'DELETE 
			FROM `todo`.`table_todo`
			WHERE `table_todo`.`id` = :id;';
	$sth = $dbh->prepare($sql);
	$sth->execute(array(':id' => $id));
	//$sth->bindParam(':id', $id);
	//$sth->execute();
	return $sth->rowCount();
}

function updateTodoById($dbh, $id, $message, $check){
	$sql = 'UPDATE  `todo`.`table_todo` 
			SET  `message` =  :message, `check` = :check 
			WHERE  `table_todo`.`id` = :id;';
	$sth = $dbh->prepare($sql);
	$sth->execute(array(
					':id' => $id,
					':message' => $message,
					':check' => $check
				));
	//$sth->bindParam(':message', $message);
	//$sth->bindParam(':check', $check);
	//$sth->execute();
	return $sth->rowCount();
}