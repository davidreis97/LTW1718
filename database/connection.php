<?php 
$db = new PDO('sqlite:database/todo.db');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec('PRAGMA foreign_keys = ON;');

function isLoginCorrect($username, $password) {
  global $db;
  $stmt = $db->prepare("SELECT *
                          FROM Users
                          WHERE username = ? AND passwordHash = ?");
  $stmt->execute(array($username, sha1($password)));
  $user=$stmt->fetch();
  return ($user['name']!== false && sha1($password)==$user['passwordHash']);

}

function createUser($username, $password, $name) {
  global $db;  

  $hash = sha1($password);
  $sessId = bin2hex(openssl_random_pseudo_bytes(16));

  $stmt = $db->prepare('INSERT INTO users VALUES (?, ?, ?, ?)');
  $stmt->execute(array($name, $username, $hash, $sessId));
}

function addTodoItemToList($content, $todoPage) {
  global $db;  
  
  date_default_timezone_set('Europe/Lisbon');
  $date = date('h:i d/m/Y', time());
  $stmt = $db->prepare('INSERT INTO TodoItems VALUES (NULL,?, ?, ?, "notdone")');
  $stmt->execute(array($content, $date, $todoPage));
}


function addTodoList($username, $title) {
  global $db;  
  
  $stmt = $db->prepare('INSERT INTO TodoLists VALUES (NULL, ?, ?, "1")');
  $stmt->execute(array($title, $username));
}

function removeTodoItem($ID) {
    global $db;

    $stmt = $db->prepare('DELETE FROM TodoItems WHERE ID=?');
    $stmt->execute(array($ID));
}

function removeTodoList($ID) {
  global $db;

  $stmt = $db->prepare('DELETE FROM TodoLists WHERE ID=?');
  $stmt->execute(array($ID));
}
?>
