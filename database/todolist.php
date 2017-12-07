<?php
    $todoListId = $_GET['list'];

    if (empty($todoListId)) {
        echo 'NO TODOLIST ID';
        #header('Location: index.php');
        return;
    }

    if(!checkOwnership($todoListId)){
        header('Location: no_permissions.php');
        return;
    }

    $stmt = $db->prepare("SELECT title
                          FROM TodoLists
                          WHERE ID = ?");
    $stmt->execute(array($todoListId));

    $todoListTitle = $stmt->fetch();

    $stmt = $db->prepare("SELECT *
                          FROM TodoItems
                          WHERE todoList = ?");
    $stmt->execute(array($todoListId));

    $listItems = $stmt->fetchAll();

?>