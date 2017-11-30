<?php
include_once('includes/init.php');

$username = $_SESSION['username'];
$title = $_POST['title'];

if(empty($username)) {
    echo 'NO CONTENT';
    //header('Location: todoPage.php?list='.$todoList);
    return; 
}

if(empty($title)) {
    echo 'NO TODOLIST';    
    //header('Location: index.php');
    return;
}

$todoList = addTodoList($username,$title);
header('Location: index.php');
?>