<?php 
include_once('includes/init.php');
include_once('database/connection.php');

$listItem = getTodoItemByID($_GET['todoItem']);

if(!$listItem) {
    header('Location: no_permissions.php');
    return false;
}
?>

<?php include('templates/todolist/todoItem.php'); ?>