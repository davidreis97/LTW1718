<?php
include_once('includes/init.php');

$ID = $_GET['id'];

if(empty($ID)) {
    echo 'NO ID';      
    //header('Location: todoPage.php?list='.$todoList);
    return;
}

removeTodoItem($ID);
//header('Location: todoPage.php?list='.$todoList); //No redirect: Done with AJAX
?>