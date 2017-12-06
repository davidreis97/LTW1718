<?php
include_once('includes/init.php');
$status = $_POST['status'];
$todoItem= $_POST['todoItem'];

editstatusItem($status, $todoItem);
//header('Location: todoPage.php?list='.$todoList); //No redirect, meant to be used with ajax
?>