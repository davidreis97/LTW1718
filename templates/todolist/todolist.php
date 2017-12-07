<section id="todoList">
  <article id="todoListTitle">
    <p><?=$todoListTitle['title']?></p>
    <a href="action_removeTodoList.php?id=<?=$todoListId?>"><i class="material-icons">delete</i></a>
  </article>
  <ul id=TodoItemlu>
      <?php foreach ($listItems as $listItem) { ?>
        <li id="listTodoItem-<?=$listItem['ID']?>" 
        <?php if($listItem['status']=="done"):?>
          class="checked"
      <?php endif; ?>
      <?php if($listItem['status']=="ongoing"):?>
          class="ongoing"
      <?php endif; ?>>
          <?php include('todoItem.php'); ?>
          <?php include('editTodoItem.php'); ?>
        </li>
      <?php } ?>
  </ul>
  <ul><li>
  <article>
            <form action="action_addTodoItem.php" method="post" id="addTodoItem">
              <input type="text" placeholder="New Todo Item" name="content" id="content">
              <input type="hidden" name="todoList" id="todoList" value="<?=$todoListId?>">
              <input type="submit" value="Add">
            </form>
          </article></li></ul>
</section>
