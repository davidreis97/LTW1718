<?php
    $stmt = $db->prepare("SELECT *
                          FROM Users
                          WHERE username = ?");
    $stmt->execute(array($_SESSION['username']));
    
    $user = $stmt->fetch();
?>