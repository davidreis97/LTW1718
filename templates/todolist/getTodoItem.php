<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/database/connection.php');

$todoItem = getTodoItemByID($_GET['todoItem']);

echo $todoItem['content'];
?>