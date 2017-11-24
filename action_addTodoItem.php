<?php
include_once('includes/init.php');

$content = $_POST['content'];
$todoList = $_POST['todoList'];

if(empty($content)) {
    echo 'NO CONTENT';
    //header('Location: todoPage.php?list='.$todoList);
    return; 
}

if(empty($todoList)) {
    echo 'NO TODOLIST';    
    //header('Location: index.php');
    return;
}

addTodoItemToList($content,$todoList);
header('Location: todoPage.php?list='.$todoList);
?>