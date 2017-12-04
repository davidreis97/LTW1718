<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/database/connection.php');

$listItem = getTodoItemByID($_GET['todoItem']);
?>

<?php include('todoItem.php'); ?>