<?php
include_once('includes/init.php');
$status = $_POST['status'];
$todoItem= $_POST['todoItem'];

if (empty($status)){
    echo 'NO STATUS';
    return;
}

if (empty($todoItem)){
    echo 'NO TODOITEM';
    return;
}

if (!editstatusItem($status, $todoItem)){
    header('Location: no_permissions.php');
    return;
}
//header('Location: todoPage.php?list='.$todoList); //No redirect, meant to be used with ajax
?>