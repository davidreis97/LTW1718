<?php
include_once('includes/init.php');

$content = trim(strip_tags($_POST['content']));
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

if (!addTodoItemToList($content,$todoList)){
    header('Location: no_permissions.php');
    return;
}
header('Location: todoPage.php?list='.$todoList);
?>
