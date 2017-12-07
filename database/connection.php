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

function checkOwnership($todoPageID) {
  global $db;
  
  $username = null;

  if(!empty($_SESSION['username'])){
    $username = $_SESSION['username'];
  }

  $stmt = $db->prepare("SELECT *
                        FROM TodoLists
                        WHERE ID=?");
  $stmt->execute(array($todoPageID));

  $todoPage = $stmt->fetch(); 

  if($todoPage['public'] == '1'){
    return true;
  }else if(!empty($username) && $todoPage['user'] == $username){
    return true;
  }else{
    return false;
  }
}

function createUser($username, $password, $name) {
  global $db;  

  $hash = sha1($password);

  $stmt = $db->prepare('INSERT INTO users VALUES (?, ?, ?)');
  $stmt->execute(array($name, $username, $hash));
}

function addTodoItemToList($content, $todoPage) {
  global $db;

  if (!checkOwnership($todoPage)){
    return false;
  }
  
  date_default_timezone_set('Europe/Lisbon');
  $date = date('h:i d/m/Y', time());
  $stmt = $db->prepare('INSERT INTO TodoItems VALUES (NULL,?, ?, ?, "notdone")');
  $stmt->execute(array($content, $date, $todoPage));

  return true;
}


function addTodoList($username, $title, $public) {
  global $db;  
  
  $stmt = $db->prepare('INSERT INTO TodoLists VALUES (NULL, ?, ?, ?)');
  $stmt->execute(array($title, $username, $public));
}

function removeTodoItem($ID) {
    global $db;

    $todoItem = getTodoItemByID($ID);
    if (!checkOwnership($todoItem['todoList'])){
      return false;
    }

    $stmt = $db->prepare('DELETE FROM TodoItems WHERE ID=?');
    $stmt->execute(array($ID));
    
    return true;
}

function removeTodoList($ID) {
  global $db;

  if (!checkOwnership($ID)){
    return false;
  }

  $stmt = $db->prepare('DELETE FROM TodoLists WHERE ID=?');
  $stmt->execute(array($ID));

  return true;
}

function editUser($old_username, $username, $password, $name) {
  global $db;
  
  $hash = sha1($password);

  $stmt = $db->prepare('UPDATE USERS 
                        SET username=?, passwordHash=?, name=?
                        WHERE username=?');
  $stmt->execute(array($username,$hash,$name,$old_username));


  $_SESSION['username'] = $username;  
}

function editItem($content, $todoItemID) {
  global $db;

  $todoItem = getTodoItemByID($todoItemID);

  if (!checkOwnership($todoItem['todoList'])){
    return false;
  }

  $stmt = $db->prepare('UPDATE TodoItems 
                        SET content=?
                        WHERE ID=?');
  $stmt->execute(array($content,$todoItemID));

  return true;
 
}

function editstatusItem($status, $todoItemID) {
  global $db;

  $todoItem = getTodoItemByID($todoItemID);
  
  if (!checkOwnership($todoItem['todoList'])){
    return false;
  }

  $stmt = $db->prepare('UPDATE TodoItems 
                        SET status=?
                        WHERE ID=?');
  $stmt->execute(array($status,$todoItemID)); 

  return true;
}


function getTodoItemByID($todoItemID) {
  global $db;

  $stmt = $db->prepare("SELECT *
                        FROM TodoItems
                        WHERE ID=?");
  $stmt->execute(array($todoItemID));

  $todoItem = $stmt->fetch();

  if (!checkOwnership($todoItem['todoList'])){
    return false;
  }

  return $todoItem;
}

function getLastTodoItem(){
  global $db;

  $stmt = $db->prepare("SELECT *
                        FROM TodoItems
                        ORDER BY ID DESC");
  $stmt->execute();
  
  $todoItem = $stmt->fetch();
  
  if (!checkOwnership($todoItem['todoList'])){
    return false;
  }
  
  return $todoItem;
}
?>
