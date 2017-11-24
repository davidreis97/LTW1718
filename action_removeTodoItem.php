<?php
include_once('includes/init.php');

$ID = $_GET['id'];
$todoList = $_GET['todoList'];

if(empty($todoList)) {
    echo 'NO TODOLIST';        
    //header('Location: index.php');
    return;
}

if(empty($ID)) {
    echo 'NO ID';      
    //header('Location: todoPage.php?list='.$todoList);
    return;
}

removeTodoItem($ID);
header('Location: todoPage.php?list='.$todoList);
?>