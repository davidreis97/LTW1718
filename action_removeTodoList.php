<?php
include_once('includes/init.php');

$ID = $_GET['id'];

if(empty($ID)) {
    echo 'NO ID';      
    //header('Location: todoPage.php?list='.$todoList);
    return;
}

if (!removeTodoList($ID)){
    header('Location: no_permissions.php');
    return;
}

header('Location: index.php');
?>