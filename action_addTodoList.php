<?php
include_once('includes/init.php');

$username = $_SESSION['username'];
$title = trim(strip_tags($_POST['title']));
$public = $_POST['public'];
$public_value = "0";

if(empty($username)) {
    echo 'NO USERNAME';
    //header('Location: todoPage.php?list='.$todoList);
    return;
}

if(empty($title)) {
    echo 'NO TODOLIST';
    //header('Location: index.php');
    return;
}

if(isset($public)){
    $public_value = "1";
}else{
    $public_value = "0";
}

$todoList = addTodoList($username,$title, $public_value);
header('Location: index.php');
?>
