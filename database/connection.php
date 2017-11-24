<?php 
$db = new PDO('sqlite:database/todo.db');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function isLoginCorrect($username, $password) {
  global $db;
  $stmt = $db->prepare("SELECT *
                          FROM Users
                          WHERE username = ? AND passwordHash = ?");
  $stmt->execute(array($username, sha1($password)));
  return $stmt->fetch() == true;
}

function createUser($username, $password, $name) {
  global $db;  

  $hash = sha1($password);

  $stmt = $db->prepare('INSERT INTO users VALUES (?, ?, ?)');
  $stmt->execute(array($name, $username, $hash));
}

?>
