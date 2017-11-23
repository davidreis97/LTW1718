<?php 
$db = new PDO('sqlite:todo.db');

function isLoginCorrect($username, $password) {
  global $db;
  $stmt = $db->prepare("SELECT *
                          FROM Users
                          WHERE username = ? AND passwordHash = ?");
  $stmt->execute(array($username, sha1($password)));
  return $stmt->fetch() == true;
}

function createUser($username, $password) {
  global $db;  
    
  $hash = sha1($password);

  $stmt = $db->prepare('INSERT INTO users VALUES (?, ?)');
  $stmt->execute(array($username, $hash));
}

?>
