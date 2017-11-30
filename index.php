<?php
  include_once('includes/init.php');
  if (isset($_SESSION['username']))
    include_once('database/listLists.php');  
  include_once('templates/common/header.php');
  include_once('templates/lists/lists.php');
  if (isset($_SESSION['username']))
    include_once('templates/listLists/listLists.php');
  include_once('templates/common/footer.php');
?>
