<?php
include_once('includes/init.php');

$content = $_POST['content'];
$todoItem= $_POST['todoItem'];

if(empty($content)) {
    echo 'NO CONTENT';
    //header('Location: todoPage.php?list='.$todoList);
    return; 
}

if(empty($todoItem)) {
    echo 'NO TODOITEM ID';    
    //header('Location: index.php');
    return;
}

editItem($content, $todoItem);
//header('Location: todoPage.php?list='.$todoList); //No redirect, meant to be used with ajax
?>