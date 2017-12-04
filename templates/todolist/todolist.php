<section id="todoList">
  <article id="todoListTitle">
    <p><?=$todoListTitle['title']?></p>
    <a href="action_removeTodoList.php?id=<?=$todoListId?>"><i class="material-icons">delete</i></a>
  </article>
  <ul>
      <?php foreach ($listItems as $listItem) { ?>
        <li id="listTodoItem-<?=$listItem['ID']?>">
          <?php include('todoItem.php'); ?>
        </li>
      <?php } ?>
        <li>
          <article>
            <form action="action_addTodoItem.php" method="post" id="addTodoItem">
              <input type="text" placeholder="New Todo Item" name="content" id="content">
              <input type="hidden" name="todoList" id="todoList" value="<?=$todoListId?>">
              <input type="submit" value="Add">
            </form>
          </article>
        </li>
  </ul>
</section>
