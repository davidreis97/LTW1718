<?php 
	
function getDB() {
	$db = new PDO('sqlite:todo.db');
    return $db;
}

?>
