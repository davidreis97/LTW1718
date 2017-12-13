<?php
include_once('includes/init.php');

$content = trim(strip_tags($_POST['content']));
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

if (!editItem($content, $todoItem)){
    header('Location: no_permissions.php');
    return;
}
//header('Location: todoPage.php?list='.$todoList); //No redirect, meant to be used with ajax
?>
