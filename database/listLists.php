<?php

    $stmt = $db->prepare("SELECT *
                          FROM TodoLists
                          WHERE user = ?");
    $stmt->execute(array($_SESSION['username']));

    $listItems = $stmt->fetchAll();

?>