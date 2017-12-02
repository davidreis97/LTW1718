<?php
include_once('includes/init.php');

$ID = $_GET['id'];

if(empty($ID)) {
    echo 'NO ID';      
    //header('Location: todoPage.php?list='.$todoList);
    return;
}

removeTodoList($ID);
header('Location: index.php');
?>